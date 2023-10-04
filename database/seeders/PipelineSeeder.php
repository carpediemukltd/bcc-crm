<?php

namespace Database\Seeders;

use App\Models\Pipeline;
use Illuminate\Database\Seeder;

class PipelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Pipeline::create([
            'title' => 'Default Pipeline'
        ]);
    }
}
