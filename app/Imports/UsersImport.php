<?php

namespace App\Imports;

use App\Jobs\SendNotification;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserOwner;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;


class UsersImport implements ToModel, WithHeadingRow, WithEvents
{
    private $rowsInserted = 0;
    private $rowsCount    = 0;
    private $rowsDuplicate = 0;
    private $companyId;

    public function __construct($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $existingUser = User::where('email', $row['email'])->first();
        if (!$existingUser) {
            ++$this->rowsInserted;
            
            $createdAtSerial = $row['create_date'];
            // Convert the Excel serial number to a DateTime object
            $createdAt = ExcelDate::excelToDateTimeObject($createdAtSerial);

            $user = new User([
                'first_name'    => $row['first_name'],
                'last_name'     => $row['last_name'],
                'email'         => $row['email'],
                'phone_number'  => $row['phone_number'],
                'password'      => Hash::make('BCCUSA.COM'),
                'role'          => 'user',
                'company_id'    => $this->companyId,
                'created_at'    => $createdAt,
                'updated_at'    => $createdAt               

            ]);
            $user->save();

            Activity::create([
                'moduleName' => 'Contact',
                'user_id' => auth()->id(),
                'contact_id' => $user->id
            ]);
            //$user->documentManagers()->attach($request->document_types);
            $randomUserId = User::where('company_id', $this->companyId)->whereIn('role', ['admin', 'owner'])->inRandomOrder()->value('id');
            if ($randomUserId) {
                UserOwner::create([
                    'user_id' => $user->id,
                    'owner_id' => $randomUserId,
                ]);
            }
            SendNotification::dispatch(['id' => $user->id, 'type' => 'contact_added']);
            return $user;
        } else {
            ++$this->rowsDuplicate;
        }
    }
    public function getInsertedRowCount(): int
    {
        return $this->rowsInserted;
    }
    public function getRowsCount()
    {
        return $this->rowsCount['Sheet1'] - 1;
    }
    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $this->rowsCount = $event->getReader()->getTotalRows(); // Set the total rows count
            },
        ];
    }
    public function getDuplicateRows()
    {
        return $this->rowsDuplicate;
    }
}
