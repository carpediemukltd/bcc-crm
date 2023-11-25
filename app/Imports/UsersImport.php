<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;

class UsersImport implements ToModel, WithHeadingRow, WithEvents
{
    private $rowsInserted = 0;
    private $rowsCount    = 0;


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rowsInserted;

        return new User([
            'first_name'    => $row['first_name'],
            'last_name'     => $row['last_name'],
            'email'         => $row['email'],
            'phone_number'  => $row['phone_number'], 
            'password'      => Hash::make('BCCUSA.COM'),
            'role'          => 'user'
         ]);
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
}
