<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Marketing\MarketingCampaign;
use App\Models\Marketing\MarketingCampaignSequence;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AutomateCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all existing companies
        $companies = Company::all();

        // Seed campaigns with sequences for each company
        foreach ($companies as $company) {
            $this->seedBirthdayWishesCampaign($company);
            $this->seedDealCreationCampaign($company);
            $this->seedDealCompletedCampaign($company);
        }
    }

    /**
     * Seed a campaign with sequences for birthday wishes.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    private function seedBirthdayWishesCampaign(Company $company)
    {
        // Seed the Birthday Wishes campaign
        $birthdayCampaign = MarketingCampaign::create([
            'company_id' => $company->id,
            'name' => 'Birthday Wishes',
            'status' => 'active',
            'start_date' => now(),
            'type' => 'automate',
        ]);

        // Seed a sequence for the Birthday Wishes campaign
        MarketingCampaignSequence::create([
            'marketing_campaign_id' => $birthdayCampaign->id,
            'wait_for' => 1,
            'start_date' => now(),
            'subject' => 'Happy Birthday!',
            'body' => 'Dear {name},

            Wishing you a fantastic birthday filled with joy and happiness! 🎉

            Best regards,
            Lendotics',
            'status' => 'active',
        ]);
    }

    /**
     * Seed a campaign with sequences for deal creation.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    private function seedDealCreationCampaign(Company $company)
    {
        // Seed the Deal Creation campaign
        $dealCreationCampaign = MarketingCampaign::create([
            'company_id' => $company->id,
            'name' => 'Deal Creation',
            'status' => 'active',
            'start_date' => now(),
            'type' => 'automate',
        ]);

        // Seed a sequence for the Deal Creation campaign
        MarketingCampaignSequence::create([
            'marketing_campaign_id' => $dealCreationCampaign->id,
            'wait_for' => 1,
            'start_date' => now(),
            'subject' => 'New Deal Created!',
            'body' => 'Dear {name},

            We are excited to inform you that your deal has been received. Stay tuned for more details!

            Best regards,
            Lendotics',
            'status' => 'active',
        ]);
    }

    /**
     * Seed a campaign with sequences for deal completion.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    private function seedDealCompletedCampaign(Company $company)
    {
        // Seed the Deal Completed campaign
        $dealCompletedCampaign = MarketingCampaign::create([
            'company_id' => $company->id,
            'name' => 'Deal Completed',
            'status' => 'active',
            'start_date' => now(),
            'type' => 'automate',
        ]);

        // Seed a sequence for the Deal Completed campaign
        MarketingCampaignSequence::create([
            'marketing_campaign_id' => $dealCompletedCampaign->id,
            'wait_for' => 1,
            'start_date' => now(),
            'subject' => 'Deal Completed!',
            'body' => 'Dear {name},

            We are delighted to announce that your deal has been successfully completed. Thank you for choosing us!

            Best regards,
            Lendotics',
            'status' => 'active',
        ]);
    }
}
