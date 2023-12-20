<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Jobs\MarketingCampaign as JobsMarketingCampaign;
use App\Jobs\MarketingCampaignUser as JobsMarketingCampaignUser;
use App\Models\Marketing\MarketingCampaign;
use App\Models\Marketing\MarketingCampaignSequence;
use App\Models\Marketing\MarketingCampaignUser;
use App\Models\Marketing\MarketingEmailTemplate;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
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
            'title'         => 'required',
            'html_content'  => 'required',
            'subject'       => 'required',
            'wait_for'      => 'required',
            'start_date'    => 'required',
            'select_type'   => 'required'
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
            $campaignSequence = new MarketingCampaignSequence();
            $campaignSequence->marketing_campaign_id = $campaign->id;
            $campaignSequence->subject = $request->subject;
            $campaignSequence->body = $request->html_content;
            $campaignSequence->wait_for = $request->wait_for;
            $campaignSequence->save();

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
        $data = MarketingCampaign::with(['marketingCampaignSequence', 'marketingCampaignUser'])->find($id);
        return view('marketing.email.campaign.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            }
        }
    }
}
