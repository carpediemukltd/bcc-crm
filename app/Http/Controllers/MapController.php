<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function show()
    {
        $data['current_slug'] = 'Banks Map';
        $data['slug']         = 'map';
        $userRole = auth()->user()->role;
        $companyId = auth()->user()->company_id;
        if (!in_array($userRole, ['bank', 'superadmin'])) {
            return redirect()->back()->with(['error' => "You don't have access to this page!"]);
        }
        $data['mapData'] = $this->getData($userRole, $companyId); // Implement the method to get the data

        if ($userRole == 'superadmin') {
            return view('maps.global-show', $data);
        } else {
            return view('maps.bank-show', $data);
        }
    }
    private function getData($userRole, $companyId)
    {
        $data['bankDetail']     = array();
        $data['activeDeals']    = array();
        $data['fundedDeals']    = array();
        $data['deadDeals']      = array();
        $data['totalDeals']     = array();

        if ($userRole == 'superadmin') {
            // Get all banks for the specified company
            $banks = User::whereRole('bank')->get();

            foreach ($banks as $bank) {
                $bankDetails = [
                    'bank_name'    => $bank->full_name,
                    'bank_address' => $bank->address ?? 'testing address',
                ];
                $companyId = $bank->company_id;

                // Fetch and store data for each bank
                $activeDeals = Deal::join('users', 'deals.user_id', '=', 'users.id')
                    ->where('users.company_id', $companyId)
                    ->whereHas('stage', function ($query) {
                        $query->whereIn('title', ['Document Collection', 'Submitted', 'Close to close']);
                    })
                    ->count();

                $fundedDeals = Deal::join('users', 'deals.user_id', '=', 'users.id')
                    ->where('users.company_id', $companyId)
                    ->whereHas('stage', function ($query) {
                        $query->where('title', 'Funded');
                    })
                    ->count();

                $deadDeals   = Deal::join('users', 'deals.user_id', '=', 'users.id')
                    ->where('users.company_id', $companyId)
                    ->whereHas('stage', function ($query) {
                        $query->where('title', 'Dead / Did not Fund');
                    })
                    ->count();

                $totalDeals  = $activeDeals + $fundedDeals + $deadDeals;

                // Store data in the $data array
                $data['bankDetail'][]   = $bankDetails;
                $data['activeDeals'][]  = $activeDeals;
                $data['fundedDeals'][]  = $fundedDeals;
                $data['deadDeals'][]    = $deadDeals;
                $data['totalDeals'][]   = $totalDeals;
            }
        } else {
            // Logic for non-superadmin users (if needed)
        }

        return $data;
    }
}
