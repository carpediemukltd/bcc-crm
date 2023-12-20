<?php

namespace App\Http\Controllers\Marketing;
use App\Http\Controllers\Controller;
use App\Models\Marketing\MarketingEmailTemplate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MarketingEmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = MarketingEmailTemplate::whereCompanyId(auth()->user()->company_id)->paginate(10);
        return view('marketing.email.template.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.email.template.create');

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
            'name'          => 'required',
            'email_subject' => 'required',
            'content'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $template = new MarketingEmailTemplate();
        $template->name         = $request->name;
        $template->email_subject= $request->email_subject;
        $template->content      = $request->content;
        $template->company_id   = auth()->user()->company_id;
        $template->save(); 
        if($template){
            return redirect()->route('marketing-email-templates.index')->with('success', 'New Email Template added successfully.');
        }
        return redirect()->back()->with('error', 'Error creating Email Template');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MarketingEmailTemplate::find($id);
        return view('marketing.email.template.show', ['data'=> $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MarketingEmailTemplate::find($id);
        return view('marketing.email.template.edit', ['data'=> $data]);
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
         $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email_subject' => 'required',
            'content'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $template = MarketingEmailTemplate::find($id);
        $template->name         = $request->name;
        $template->email_subject= $request->email_subject;
        $template->content      = $request->content;
        $template->company_id   = auth()->user()->company_id;
        $template->save(); 
        if($template){
            return redirect()->back()->with('success', 'Email Template updated successfully.');
        }
        return redirect()->back()->with('error', 'Error updating Email Template');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MarketingEmailTemplate::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Email Template deleted successfully.');
    }
}
