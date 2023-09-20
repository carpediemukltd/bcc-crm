<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::create([
            'title' => 'Document Collection',
            'sort' => 1
        ]);
        Stage::create([
            'title' => 'Submitted',
            'sort' => 2
        ]);
        Stage::create([
            'title' => 'Close to close',
            'sort' => 3
        ]);
        Stage::create([
            'title' => 'Funded',
            'sort' => 4
        ]);
        Stage::create([
            'title' => 'Dead / Did not Fund',
            'sort' => 5
        ]);
    }
}
