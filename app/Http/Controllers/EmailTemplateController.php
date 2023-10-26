<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;

class EmailTemplateController extends Controller
{
    protected $user;
    protected $data;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
            return $next($request);
        });
    }

    public function emailTemplateList()
    {
        $this->data['current_slug'] = 'Email Templates';
        $this->data['slug']         = 'email_templates';
        $this->data['data']  = EmailTemplate::orderBy('id', 'ASC')->get();
        return view("email_template.list", $this->data);
    }

    public function emailTemplateAdd(Request $request)
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

    public function emailTemplateEdit(Request $request, $id)
    {
        $this->data['EmailTemplate'] = EmailTemplate::where('id', $id)->first();

        if ($request->isMethod('post')) {
            
            if (!$this->data['EmailTemplate']) {
                return redirect()->back()->withError('Email Template not found.')->withInput();
            }

            if (empty($request->subject)) {
                return redirect()->back()->withError('Subject can not be empty.')->withInput();
            }

            if (empty($request->body)) {
                return redirect()->back()->withError('Body can not be empty.')->withInput();
            }

            $body = str_replace("\n", '<br />', $request->body);
            EmailTemplate::whereId($id)->update(['subject' => $request->subject, 'body' => $body]);

            return response(EmailTemplate::where('id', $id)->first());
        }
    }

    public function emailTemplateDelete(Request $request, $id)
    {
        $this->data['EmailTemplate'] = EmailTemplate::where('id', $id)->first();

        if ($request->isMethod('post')) {
            if (!$this->data['EmailTemplate']) {
                return redirect()->back()->withError('EmailTemplate not found.')->withInput();
            }

            EmailTemplate::whereId($id)->delete();
            return response(['message' => 'success', 'detail' => "Email Template deleted successfully."]);
        }
    }
}
