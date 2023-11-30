<?php

namespace App\Imports;

use App\Jobs\SendNotification;
use App\Models\Activity;
use App\Models\StopUserImport;
use App\Models\User;
use App\Models\UserImport;
use App\Models\UserOwner;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;



class UsersImport implements ToModel, WithHeadingRow, WithEvents, WithChunkReading
{
    private $rowsInserted   = 0;
    private $rowsCount      = 0;
    private $rowsDuplicate  = 0;
    private $isStopped      = false;
    private $status         = 'pending';
    private $companyId;
    private $userImportId;
    private $authUserId;

    public function __construct($companyId, $userImportId, $authUserId)
    {
        $this->companyId    = $companyId;
        $this->userImportId = $userImportId;
        $this->authUserId   = $authUserId;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        ini_set('memory_limit', '2048M'); // Set memory limit to 2 GB
        ini_set('max_execution_time', 0);
        $checkStoppedUsersImport = StopUserImport::where('user_imports_id', $this->userImportId)->first();
        if (!$checkStoppedUsersImport) {
            $existingUser = User::where('email', $row['email'])->first();
            if (!$existingUser && $row['email']) {
                ++$this->rowsInserted;

                $createdAtSerial = $row['create_date'];
                // Convert the Excel serial number to a DateTime object
                $createdAt = ExcelDate::excelToDateTimeObject($createdAtSerial);
                $firstName = $row['first_name'];
                $lastName  = $row['last_name'];
                if(!$firstName){
                    $firstName = 'Misc';
                }
                if(!$lastName){
                    $lastName = 'User';
                }
                $user = new User([
                    'first_name'    => $firstName,
                    'last_name'     => $lastName,
                    'email'         => $row['email'],
                    'phone_number'  => $row['phone_number'],
                    'password'      => Hash::make('BCCUSA.COM'),
                    'role'          => 'user',
                    'company_id'    => $this->companyId,
                    'created_at'    => $createdAt,
                    'updated_at'    => $createdAt

                ]);
                $user->save();

                // Update UserImport records
                $this->status = 'inprogress';
                $this->updateUserImportRecords();

                Activity::create([
                    'moduleName'    => 'Contact',
                    'user_id'       => $this->authUserId,
                    'contact_id'    => $user->id
                ]);
                //$user->documentManagers()->attach($request->document_types);
                $randomUserId = User::where('company_id', $this->companyId)->whereIn('role', ['admin', 'owner'])->inRandomOrder()->value('id');
                if ($randomUserId) {
                    UserOwner::create([
                        'user_id' => $user->id,
                        'owner_id' => $randomUserId,
                    ]);
                }
                // SendNotification::dispatch(['id' => $user->id, 'type' => 'contact_added']);

                return $user;
            } else {
                ++$this->rowsDuplicate;
                $this->updateUserImportRecords();
            }
        } else {
            if (!$this->isStopped) {
                $this->isStopped = true;
                $this->status = 'stopped';
                $this->updateUserImportRecords();
            }
        }
    }
    public function getInsertedRowCount(): int
    {
        return $this->rowsInserted;
    }
    public function getRowsCount()
    {
        $userImport = UserImport::find($this->userImportId);
        $this->rowsCount = $userImport->records;
        return $this->rowsCount;
    }
    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $getSheetData = $event->getReader()->getTotalRows(); // Set the total rows count
                $userImport = UserImport::find($this->userImportId);
                $userImport->records = $getSheetData['Sheet1'] - 1;
                $userImport->save();
            },
        ];
    }
    public function getDuplicateRows()
    {
        return $this->rowsDuplicate;
    }
    private function updateUserImportRecords()
    {
        $userImport = UserImport::find($this->userImportId);
        $userImport->records_imported = $this->rowsInserted;
        $userImport->duplicate_records = $this->rowsDuplicate;
        $userImport->status = $this->status;
        $userImport->save();
    }
    // public function batchSize(): int
    // {
    //     return 500;
    // }
    
    public function chunkSize(): int
    {
        return 500;
    }
}
