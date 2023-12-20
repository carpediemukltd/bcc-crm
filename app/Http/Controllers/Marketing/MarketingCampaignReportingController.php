<?php

namespace App\Http\Controllers\Marketing;
use App\Http\Controllers\Controller;
use App\Models\Marketing\MarketingCampaignReporting;
use App\Models\Marketing\MarketingCampaignSequence;
use App\Models\Marketing\MarketingCampaignUser;
use App\Models\User;
use Illuminate\Http\Request;

class MarketingCampaignReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function emailOpen($uuid)
    {
        $sequence = request('sequence');
        $marketingCampaignUser = MarketingCampaignUser::whereUuid($uuid)->first();
        if ($marketingCampaignUser) {

            $sequence = MarketingCampaignSequence::find($sequence);
            MarketingCampaignReporting::whereUserId($marketingCampaignUser->user_id)->whereMarketingCampaignSequenceId($sequence->id)->update(['email_open' => '1', 'opened_date' => date('Y-m-d H:i:s')]);
            
            header('Content-Type: image/png');

            $graphic_http = 'https://crm.lendotics.com/small-logo.png';

            //Get the filesize of the image for headers
            $filesize = filesize(public_path('small-logo.png'));

            //Now actually output the image requested (intentionally disregarding if the database was affected)
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            //header( 'Content-Disposition: attachment; filename="fb.png"' );
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . $filesize);
            readfile($graphic_http);

        }

    }
}
