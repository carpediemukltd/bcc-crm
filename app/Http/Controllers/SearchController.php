<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Deal;
use App\Models\Pipeline;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $selectedFilter = $request->input('filter', 'all');
        $q = request('q');
        $userRole = auth()->user()->role;
        $contactsHtml   = '';
        $dealsHtml      = '';
        $companiesHtml  = '';
        $pipelinesHtml  = '';
        $stagesHtml     = '';
        if ($selectedFilter == 'all') {
            $deals    = Deal::where('title', 'like', '%' . $q . '%')->latest()->limit(5)->get();
            $contacts = User::where(function ($query) use ($q) {
                $query->where('first_name', 'like', '%' . $q . '%')
                    ->orWhere('last_name', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('phone_number', 'like', '%' . $q . '%');
            })
                ->select('id', 'first_name', 'last_name', 'phone_number', 'email', 'status')
                ->limit(5)
                ->get();

            $companies  = $userRole == 'superadmin' ? Company::where('name', 'like', '%' . $q . '%')->latest()->take(10)->get() : [];
            $pipelines  = $userRole == 'superadmin' ? Pipeline::where('title', 'like', '%' . $q . '%')->latest()->take(10)->get() : [];
            $stages     = $userRole == 'superadmin' ? Stage::where('title', 'like', '%' . $q . '%')->latest()->take(10)->get() : [];

            foreach ($contacts as $value) {
                $contactsHtml .= "<tr>";
                $contactsHtml .= "<td>" . $value->full_name . "</td>";
                $contactsHtml .= "<td>" . $value->phone_number . "</td>";
                $contactsHtml .= "<td>" . $value->email . "</td>";
                $contactsHtml .= "<td>" . $value->status . "</td>";
                $contactsHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Details" href="' . route('user.details', $value->id) . '" aria-label="Details" data-bs-original-title="Details">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 4C2 2.89543 2.89543 2 4 2H9C10.1046 2 11 2.89543 11 4V20C11 21.1046 10.1046 22 9 22H4C2.89543 22 2 21.1046 2 20V4Z" fill="currentColor" />
                                <path d="M1 3 4C13 2.89543 13.8954 2 15 2H20C21.1046 2 22 2.89543 22 4V9C22 10.1046 21.1046 11 20 11H15C13.8954 11 13 10.1046 13 9V4Z" fill="currentColor" />
                                <path d="M13 15C13 13.8954 13.8954 13 15 13H20C21.1046 13 22 13.8954 22 15V20C22 21.1046 21.1046 22 20 22H15C13.8954 22 13 21.1046 13 20V15Z" fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </td>';
                $contactsHtml .= "</tr>";
            }

            foreach ($deals as $key => $value) {
                $dealsHtml .= "<tr>";
                $dealsHtml .= "<td>" . $value->title . "</td>";
                $dealsHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('company.deals') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $dealsHtml .= "</tr>";
            }
            foreach ($companies as $value) {
                $companiesHtml .= "<tr>";
                $companiesHtml .= "<td>" . $value->name . "</td>";
                $companiesHtml .= "<td>" . $value->status . "</td>";
                $companiesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('company.edit', $value->id) . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $companiesHtml .= "</tr>";
            }

            foreach ($stages as $key => $value) {
                $stagesHtml .= "<tr>";
                $stagesHtml .= "<td>" . $value->title . "</td>";
                $stagesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('stage.list') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $stagesHtml .= "</tr>";
            }
            foreach ($pipelines as $key => $value) {
                $pipelinesHtml .= "<tr>";
                $pipelinesHtml .= "<td>" . $value->title . "</td>";
                $pipelinesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('pipeline.list') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $pipelinesHtml .= "</tr>";
            }
        } elseif ($selectedFilter == 'contacts') {
            $contacts = User::where(function ($query) use ($q) {
                $query->where('first_name', 'like', '%' . $q . '%')
                    ->orWhere('last_name', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('phone_number', 'like', '%' . $q . '%');
            })->select('id', 'first_name', 'last_name', 'phone_number', 'email', 'status')->limit(40)->get();
            foreach ($contacts as $value) {
                $contactsHtml .= "<tr>";
                $contactsHtml .= "<td>" . $value->full_name . "</td>";
                $contactsHtml .= "<td>" . $value->phone_number . "</td>";
                $contactsHtml .= "<td>" . $value->email . "</td>";
                $contactsHtml .= "<td>" . $value->status . "</td>";
                $contactsHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Details" href="' . route('user.details', $value->id) . '" aria-label="Details" data-bs-original-title="Details">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 4C2 2.89543 2.89543 2 4 2H9C10.1046 2 11 2.89543 11 4V20C11 21.1046 10.1046 22 9 22H4C2.89543 22 2 21.1046 2 20V4Z" fill="currentColor" />
                                <path d="M1 3 4C13 2.89543 13.8954 2 15 2H20C21.1046 2 22 2.89543 22 4V9C22 10.1046 21.1046 11 20 11H15C13.8954 11 13 10.1046 13 9V4Z" fill="currentColor" />
                                <path d="M13 15C13 13.8954 13.8954 13 15 13H20C21.1046 13 22 13.8954 22 15V20C22 21.1046 21.1046 22 20 22H15C13.8954 22 13 21.1046 13 20V15Z" fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </td>';
                $contactsHtml .= "</tr>";
            }
        } elseif ($selectedFilter == 'deals') {
            $deals    = Deal::where('title', 'like', '%' . $q . '%')->latest()->limit(40)->get();
            foreach ($deals as $key => $value) {
                $dealsHtml .= "<tr>";
                $dealsHtml .= "<td>" . $value->title . "</td>";
                $dealsHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('company.deals') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $dealsHtml .= "</tr>";
            }
        } elseif ($selectedFilter == 'companies') {
            $companies  = $userRole == 'superadmin' ? Company::where('name', 'like', '%' . $q . '%')->latest()->take(20)->get() : [];
            foreach ($companies as $value) {
                $companiesHtml .= "<tr>";
                $companiesHtml .= "<td>" . $value->name . "</td>";
                $companiesHtml .= "<td>" . $value->status . "</td>";
                $companiesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('company.edit', $value->id) . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $companiesHtml .= "</tr>";
            }
        } elseif ($selectedFilter == 'pipelines') {
            $pipelines  = $userRole == 'superadmin' ? Pipeline::where('title', 'like', '%' . $q . '%')->latest()->take(40)->get() : [];
            foreach ($pipelines as $key => $value) {
                $pipelinesHtml .= "<tr>";
                $pipelinesHtml .= "<td>" . $value->title . "</td>";
                $pipelinesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('pipeline.list') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $pipelinesHtml .= "</tr>";
            }
        } elseif ($selectedFilter == 'stages') {
            $stages     = $userRole == 'superadmin' ? Stage::where('title', 'like', '%' . $q . '%')->latest()->take(40)->get() : [];
            foreach ($stages as $key => $value) {
                $stagesHtml .= "<tr>";
                $stagesHtml .= "<td>" . $value->title . "</td>";
                $stagesHtml .= '<td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="' . route('stage.list') . '" aria-label="Edit" data-bs-original-title="Edit">
                            <span class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </td>';
                $stagesHtml .= "</tr>";
            }
        }


        return array('contacts' => $contactsHtml, 'deals' => $dealsHtml, 'companies' => $companiesHtml, 'pipelines' => $pipelinesHtml, 'stages' => $stagesHtml);
    }
    public function show(Request $request)
    {
        return view('search');
    }
}
