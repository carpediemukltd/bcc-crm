<?php

namespace App\Http\Controllers\EmailMarketing;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);
        $query_params = json_decode('{
            "page_size": 100,
            "summary": false
        }');

        try {
            $response = $sg->client->designs()->get(null, $query_params);
            $templates = json_decode($response->body(), true); // Convert JSON to array

            return view('email-marketing.email-template.index', ['templates' => $templates]);
        } catch (Exception $ex) {
            return  $ex->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('email-marketing.email-template.create');
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
            'name'            => 'required',
            'subject'         => 'required',
            'html_content'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if html_content is already wrapped
        if (strpos($request->html_content, '<!DOCTYPE html>') !== 0) {
            // Wrap html_content in the specified HTML structure
            $wrappedHtmlContent = <<<HTML
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
            <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=Edge">
            <style type="text/css">
            </style>
        </head>
        <body>
            <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:arial,helvetica,sans-serif; color:#000000; background-color:#FFFFFF;">
                <div class="webkit">
                    {$request->html_content}
                </div>
            </center>
        </body>
        </html>
HTML;
        } else {
            // html_content is already wrapped
            $wrappedHtmlContent = $request->html_content;
        }

        // Encode the entire data array to JSON
        $data = [
            "name" => $request->name,
            "editor" => "design",
            "subject" => $request->subject,
            "generate_plain_content" => true,
            "html_content" => $wrappedHtmlContent, // Use 'content' field for HTML content
            "plain_content" => ""
        ];


        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);

        try {
            $sg->client->designs()->post($data);
            return \Redirect::route('email-templates.index')->with('success', 'New Email Template added successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);
        try {
            $response = $sg->client->designs()->_($id)->get();
            $template = json_decode($response->body(), true); // Convert JSON to array

            return view('email-marketing.email-template.show', ['template' => $template]);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
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
        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);
        try {
            $response = $sg->client->designs()->_($id)->get();
            $template = json_decode($response->body(), true); // Convert JSON to array

            return view('email-marketing.email-template.edit', ['template' => $template]);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
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
            'id'            => 'required',
            'subject'       => 'required',
            'name'          => 'required',
            'html_content'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if html_content is already wrapped
        if (strpos($request->html_content, '<!DOCTYPE html>') !== 0) {
            // Wrap html_content in the specified HTML structure
            $wrappedHtmlContent = <<<HTML
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
            <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=Edge">
            <style type="text/css">
            </style>
        </head>
        <body>
            <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:arial,helvetica,sans-serif; color:#000000; background-color:#FFFFFF;">
                <div class="webkit">
                    {$request->html_content}
                </div>
            </center>
        </body>
        </html>
HTML;
        } else {
            // html_content is already wrapped
            $wrappedHtmlContent = $request->html_content;
        }

        // Encode the entire data array to JSON
        $request_body = [
            "name" => $request->name,
            "subject" => $request->subject,
            "generate_plain_content" => true,
            "html_content" => $wrappedHtmlContent, // Use 'content' field for HTML content
            "plain_content" => ""
        ];

        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);

        try {
            $response = $sg->client->designs()->_($request->id)->patch($request_body);
            return redirect()->back()->with('success', 'Template updated successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
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
        $apiKey = getenv('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);

        try {
            $response = $sg->client->designs()->_($id)->delete();
            return redirect()->back()->with('success', 'Template deleted successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
