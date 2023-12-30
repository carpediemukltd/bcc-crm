<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiResponse::success(EmailTemplate::orderBy('id', 'ASC')->get(), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEmailTemplate(Request $request)
    {
        if ($request->isMethod('post')) {

            if (empty($request->subject)) {
                return redirect()->back()->withError('Subject can not be empty.')->withInput();
            }

            if (empty($request->body)) {
                return redirect()->back()->withError('Body can not be empty.')->withInput();
            }

            $body = str_replace("\n", '<br />', $request->body);
            $data = EmailTemplate::create(['subject' => $request->subject, 'body' => $body]);

            return response(['message' => 'success', 'data' => EmailTemplate::where('id', $data->id)->first()]);
        }
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
}
