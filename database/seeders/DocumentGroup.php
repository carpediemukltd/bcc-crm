<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_data = [
            ['name' => 'BCC Documents'],
            ['name' => 'Financial Documents'],
            ['name' => 'ID Docs'],
            ['name' => 'SBA Documents'],
        ];

        foreach($group_data as $data){
            \App\Models\DocumentGroup::create($data);
        }
    }
}
