<?php

namespace App\Jobs;

use App\Models\Marketing\MarketingCampaign;
use App\Models\Marketing\MarketingCampaignUser as MarketingMarketingCampaignUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MarketingCampaignUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 50000;
    private $campaignClass;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MarketingCampaign $campaign)
    {
        $this->campaignClass = $campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::whereIn('role', ['user', 'contact'])->whereCompanyId($this->campaignClass->company_id)->get();
        if (count($users)) {
            foreach ($users as $user) {
                $campaignUsers = new MarketingMarketingCampaignUser();
                $campaignUsers->user_id = $user->id;
                $campaignUsers->marketing_campaign_id = $this->campaignClass->id;
                $campaignUsers->save();
            }
        }
    }
}
