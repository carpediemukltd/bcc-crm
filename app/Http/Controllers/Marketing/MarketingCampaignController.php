<?php

namespace App\Http\Controllers\Marketing;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.email.campaign.create');
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
    public function searchUsers()
    {
        $q = request('search');
        return User::where(function ($query) use ($q) {
            $query->where('first_name', 'like', '%' . $q . '%')
                ->orWhere('last_name', 'like', '%' . $q . '%')
                // ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $q . '%'])
                ->orWhere('email', 'like', '%' . $q . '%');
        })->select('id', 'first_name', 'last_name', 'phone_number', 'email', 'status')
            ->orderBy('id', 'DESC')->get();
    }
}
