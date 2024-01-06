<?php

namespace Database\Seeders;

use App\Models\BusinessSettingEntityType;
use Illuminate\Database\Seeder;

class BusinessSettingEntityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Industry/Sector',
            'Compliance Documents',
            'Legal Entity Type',
            'Funding Sources',
            'Bank Services',
            'Types of loan',
        ];

        foreach ($types as $type) {
            // Check if the type already exists
            $existingType = BusinessSettingEntityType::where('name', $type)->first();

            if (!$existingType) {
                BusinessSettingEntityType::create([
                    'name' => $type,
                ]);
            }
        }
    }
}
