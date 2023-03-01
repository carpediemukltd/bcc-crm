<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ModelsUser::create([
            'first_name'   => 'Adward',
            'last_name'    => 'Collin',
            'email'        => 'admin@bcc.com',
            'password'     => Hash::make('admin123'),
            'phone_number' => 1111111111, 
            'status'       => 'active',
            'role'         => 'superadmin'
        ]);
    }
}
