<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Jobs\MarketingCampaign as JobsMarketingCampaign;
use App\Jobs\MarketingCampaignUser as JobsMarketingCampaignUser;
use App\Models\Marketing\MarketingCampaign;
use App\Models\Marketing\MarketingCampaignReporting;
use App\Models\Marketing\MarketingCampaignSequence;
use App\Models\Marketing\MarketingCampaignUser;
use App\Models\Marketing\MarketingEmailTemplate;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarketingCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MarketingCampaign::whereCompanyId(auth()->user()->company_id)->orderBy('id', 'DESC')->paginate(10);
        return view('marketing.email.campaign.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['templates'] = MarketingEmailTemplate::whereCompanyId(auth()->user()->company_id)->orderBy('id', 'DESC')->get();
        return view('marketing.email.campaign.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'                     => 'required',
            'sequences'                 => 'required|array',
            'sequences.*.subject'       => 'required',
            'sequences.*.htmlContent'   => 'required',
            'sequences.*.waitFor'       => 'required',
            'start_date'                => 'required',
            'select_type'               => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $campaign = new MarketingCampaign();
        $campaign->company_id   = auth()->user()->company_id;
        $campaign->name         = $request->title;
        $campaign->start_date   = $request->start_date;
        $campaign->status       = $request->status;
        $campaign->save();

        if ($campaign) {
            // Initialize current start date
            $currentStartDate = $campaign->start_date;

            foreach ($request->sequences as $key => $sequenceData) {
                $campaignSequence = new MarketingCampaignSequence();
                $campaignSequence->marketing_campaign_id = $campaign->id;
                $campaignSequence->subject               = $sequenceData['subject'];
                $campaignSequence->body                  = urldecode($sequenceData['htmlContent']);
                $campaignSequence->wait_for              = $sequenceData['waitFor'];

                // Set the wait_for based on the previous sequence or use 0 for the first sequence
                $waitFor = ($key === 0) ? 0 : $request->sequences[$key - 1]['waitFor'];

                // Set the start date based on the current start date and wait_for
                $campaignSequence->start_date = ($waitFor > 0)
                    ? date('Y-m-d H:i:s', strtotime("$currentStartDate +{$waitFor} days"))
                    : $currentStartDate;

                $campaignSequence->save();

                // Update $currentStartDate only if wait_for is greater than 0
                if ($waitFor > 0) {
                    $currentStartDate = date('Y-m-d H:i:s', strtotime("$currentStartDate +{$waitFor} days"));
                }
            }


            if ($request->select_type == 'all') {
                JobsMarketingCampaignUser::dispatch($campaign);
            } else {
                $campaignUsersArray = explode(',', $request->contacts);
                foreach ($campaignUsersArray as $value) {
                    $campaignUsers = new MarketingCampaignUser();
                    $campaignUsers->user_id = $value;
                    $campaignUsers->marketing_campaign_id = $campaign->id;
                    $campaignUsers->save();
                }
            }
        }
        if ($campaign && $campaignSequence) {
            return \Redirect::route('marketing-campaigns.index', $request->app_id)->with('success', 'Campaign created successfully.');
        }
        return redirect()->back()->with('error', 'Error creating campaign');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign   = MarketingCampaign::with(['marketingCampaignSequence'])->find($id);
        $data['campaign']   = $campaign;
        $data['users']      = MarketingCampaignUser::where('marketing_campaign_id', $id)->paginate(10);
        if($campaign->type =='automate'){
            return view('marketing.email.campaign.automate-show', ['data' => $data]);
        }else{
            return view('marketing.email.campaign.show', ['data' => $data]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['campaign']   = MarketingCampaign::with(['marketingCampaignSequence'])->find($id);
        $data['users']      = MarketingCampaignUser::where('marketing_campaign_id', $id)->paginate(10);
        $data['templates']  = MarketingEmailTemplate::whereCompanyId(auth()->user()->company_id)->orderBy('id', 'DESC')->get();
        return view('marketing.email.campaign.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the marketing campaign by ID
        $campaign = MarketingCampaign::findOrFail($id);

        // Check if the request contains a status field
        if ($request->has('status')) {
            // Update the campaign status
            $campaign->status = $request->input('status');

            // Save the changes
            $campaign->save();

            // Redirect back or return a response as needed
            return redirect()->back()->with('success', 'Campaign status updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarketingCampaign::whereId($id)->delete();
        return redirect()->back()->with('success', 'Campaign has been deleted successfully!');
    }
    public function searchUsers()
    {
        $q = request('search');
        return User::whereIn('role', ['user', 'contact'])->whereCompanyId(auth()->user()->company_id)->where(function ($query) use ($q) {
            $query->where('first_name', 'like', '%' . $q . '%')
                ->orWhere('last_name', 'like', '%' . $q . '%')
                // ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $q . '%'])
                ->orWhere('email', 'like', '%' . $q . '%');
        })->select('id', 'first_name', 'last_name', 'phone_number', 'email', 'status')
            ->orderBy('id', 'DESC')->get();
    }

    public function runActiveCampaign()
    {
        // Get the current date and time in 'America/New_York' time zone
        $date = Carbon::now('America/New_York');
        // Fetch active campaigns starting from the current 'America/New_York' time
        $campaigns = MarketingCampaign::whereStatus('active')
            ->where('start_date', '<=', $date->toDateTimeString())
            ->get();

        // Dispatch jobs for eligible campaigns
        if (count($campaigns)) {
            foreach ($campaigns as $campaign) {
                JobsMarketingCampaign::dispatch($campaign);
                $campaign->update(['status' => 'inprogress']);
            }
        }
    }
    public function marketingAnalyticsData(Request $request)
    {
        $marketingCampaignId        = request('id');
        $marketingSequenceId        = request('sequence');
        $marketingCampaign = MarketingCampaign::with(['marketingCampaignSequence.marketingCampaignReporting'])->find($marketingCampaignId);

        $totalEmails     = 0;
        $totalSentEmails = 0;
        $totalOpened     = 0;
        $totalFailed     = 0;
        $graphData = [];


        foreach ($marketingCampaign->marketingCampaignSequence as $sequence) {
            // Check if the sequence ID matches the selected one
            if ($marketingSequenceId && $sequence->id != $marketingSequenceId) {
                continue;
            }
            foreach ($sequence->marketingCampaignReporting as $reporting) {
                $totalEmails++;
                $sentDate = Carbon::parse($reporting->sent_date);

                // Check if the email was sent within the last 30 days
                if ($sentDate->isBetween(Carbon::now()->subDays(30), Carbon::now())) {
                    $dateKey = $sentDate->toDateString();

                    // Increment the counts for the corresponding date
                    $graphData[$dateKey]['sent'] = ($graphData[$dateKey]['sent'] ?? 0) + $reporting->email_sent;
                    $graphData[$dateKey]['opened'] = ($graphData[$dateKey]['opened'] ?? 0) + $reporting->email_open;
                    $graphData[$dateKey]['failed'] = ($graphData[$dateKey]['failed'] ?? 0) + $reporting->email_failed;
                }
                if ($reporting->email_sent) {
                    $totalSentEmails++;
                }
                if ($reporting->email_open) {
                    $totalOpened++;
                }
                if ($reporting->email_failed) {
                    $totalFailed++;
                }
            }
        }

        $openRate = ($totalOpened / $totalSentEmails) * 100;
        $bounceRate = ($totalFailed / $totalSentEmails) * 100;

        $data['totalEmails']    = $totalEmails;
        $data['totalSentEmails'] = $totalSentEmails;
        $data['totalOpened']    = $totalOpened;
        $data['totalFailed']    = $totalFailed;
        $data['openRate']       = $openRate;
        $data['bounceRate']     = $bounceRate;

        $formattedGraphData = [];

        // Prepare the data in the desired format
        foreach ($graphData as $date => $counts) {
            $formattedGraphData[] = [
                'date'          => $date,
                'emails_sent'   => $counts['sent'] ?? 0,
                'opened_emails' => $counts['opened'] ?? 0,
                'failed_emails' => $counts['failed'] ?? 0,
            ];
        }

        $data['graphData'] = $formattedGraphData;

        return ApiResponse::success($data);
    }
    public function marketingCampaignUsers(Request $request, $id)
    {
        $data['users'] = MarketingCampaignUser::where('marketing_campaign_id', $id)->paginate(10);
        return view('marketing.email.campaign.user_pagination', ['data' => $data])->render();
    }
    public function marketingGlobalReporting()
    {
        $data['campaign'] = MarketingCampaign::whereCompanyId(auth()->user()->company_id)->orderBy('id', 'DESC')->get();
        return view('marketing.email.reporting.global-reporting', ['data'=> $data]);
    }
    public function marketingGlobalReportingData()
    {
        $companyId = auth()->user()->company_id;
        $marketingCampaignId = request('id') ?? 0;

        $marketingCampaigns = MarketingCampaign::whereCompanyId($companyId)->with(['marketingCampaignSequence.marketingCampaignReporting']);

        if ($marketingCampaignId) {
            // If a specific campaign is selected, filter by its ID
            $marketingCampaigns->where('id', $marketingCampaignId);
        }

        $totalEmails = 0;
        $totalSentEmails = 0;
        $totalOpened = 0;
        $totalFailed = 0;
        $graphData = [];

        foreach ($marketingCampaigns->get() as $marketingCampaign) {
            foreach ($marketingCampaign->marketingCampaignSequence as $sequence) {

                foreach ($sequence->marketingCampaignReporting as $reporting) {
                    $totalEmails++;
                    $sentDate = Carbon::parse($reporting->sent_date);

                    // Check if the email was sent within the last 30 days
                    if ($sentDate->isBetween(Carbon::now()->subDays(30), Carbon::now())) {
                        $dateKey = $sentDate->toDateString();

                        // Increment the counts for the corresponding date
                        $graphData[$dateKey]['sent'] = ($graphData[$dateKey]['sent'] ?? 0) + $reporting->email_sent;
                        $graphData[$dateKey]['opened'] = ($graphData[$dateKey]['opened'] ?? 0) + $reporting->email_open;
                        $graphData[$dateKey]['failed'] = ($graphData[$dateKey]['failed'] ?? 0) + $reporting->email_failed;
                    }
                    if ($reporting->email_sent) {
                        $totalSentEmails++;
                    }
                    if ($reporting->email_open) {
                        $totalOpened++;
                    }
                    if ($reporting->email_failed) {
                        $totalFailed++;
                    }
                }
            }
        }

        $openRate = $totalSentEmails > 0 ? ($totalOpened / $totalSentEmails) * 100 : 0;
        $bounceRate = $totalSentEmails > 0 ? ($totalFailed / $totalSentEmails) * 100 : 0;

        $data['totalEmails'] = $totalEmails;
        $data['totalSentEmails'] = $totalSentEmails;
        $data['totalOpened'] = $totalOpened;
        $data['totalFailed'] = $totalFailed;
        $data['openRate'] = $openRate;
        $data['bounceRate'] = $bounceRate;

        $formattedGraphData = [];

        // Prepare the data in the desired format
        foreach ($graphData as $date => $counts) {
            $formattedGraphData[] = [
                'date' => $date,
                'emails_sent' => $counts['sent'] ?? 0,
                'opened_emails' => $counts['opened'] ?? 0,
                'failed_emails' => $counts['failed'] ?? 0,
            ];
        }

        $data['graphData'] = $formattedGraphData;

        return ApiResponse::success($data);
    }
    
}
