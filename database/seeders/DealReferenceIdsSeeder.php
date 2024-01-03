<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;

class DealReferenceIdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        Deal::whereNull('reference_id')->each(function ($deal) use ($characters) {
            $rand   = mt_rand(1, 99);
            $randomString = substr(str_shuffle($characters), 0, 10);

            // Append the deal id to the random string
            $referenceId = $randomString . $rand;

            $deal->update(['reference_id' => $referenceId]);
        });
    }
}
