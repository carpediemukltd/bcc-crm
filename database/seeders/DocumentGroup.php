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
            [
                'name' => 'BCC Documents',
                'order' => 3
            ],
            [
                'name' => 'Financial Documents',
                'order' => 4
            ],
            [
                'name' => 'ID Docs',
                'order' => 5
            ],
            [
                'name' => 'SBA Documents',
                'order' => 6
            ],
            [
                'name' => 'Expedited',
                'order' => 1
            ],
            [
                'name' => 'Fully Underwritten',
                'order' => 2
            ],
        ];

        foreach($group_data as $data){
            \App\Models\DocumentGroup::updateOrInsert(
                ['name' => $data['name']],
                ['order' => $data['order']]
            );
        }
    }
}
