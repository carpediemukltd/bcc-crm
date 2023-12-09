<?php

namespace App\Http\Controllers\EmailMarketing;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailTemplateController extends Controller
{
    private $sg;

    public function __construct()
    {
        $apiKey = getenv('SENDGRID_API_KEY');
        $this->sg = new \SendGrid($apiKey);
    }

    public function index()
    {
        try {
            $templates = $this->getTemplates();
            return view('email-marketing.email-template.index', ['templates' => $templates]);
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function create()
    {
        return view('email-marketing.email-template.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'subject'       => 'required',
            'html_content'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $wrappedHtmlContent = $this->wrapHtmlContent($request->html_content);
        $data = $this->prepareTemplateData($request->name, $request->subject, $wrappedHtmlContent);

        try {
            $this->sg->client->designs()->post($data);
            return redirect()->route('email-templates.index')->with('success', 'New Email Template added successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $template = $this->getTemplateById($id);
            return view('email-marketing.email-template.show', ['template' => $template]);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $template = $this->getTemplateById($id);
            return view('email-marketing.email-template.edit', ['template' => $template]);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

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

        $wrappedHtmlContent = $this->wrapHtmlContent($request->html_content);
        $data = $this->prepareTemplateData($request->name, $request->subject, $wrappedHtmlContent, true);
        try {
            $this->sg->client->designs()->_($request->id)->patch($data);
            return redirect()->back()->with('success', 'Template updated successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->sg->client->designs()->_($id)->delete();
            return redirect()->back()->with('success', 'Template deleted successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    private function getTemplates()
    {
        $query_params = json_decode('{"page_size": 100, "summary": false}');
        $response = $this->sg->client->designs()->get(null, $query_params);
        return json_decode($response->body(), true);
    }

    private function getTemplateById($id)
    {
        $response = $this->sg->client->designs()->_($id)->get();
        return json_decode($response->body(), true);
    }

    private function wrapHtmlContent($html_content)
    {
        if (strpos($html_content, '<!DOCTYPE html>') !== 0) {
            return <<<HTML
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
                        $html_content
                    </div>
                </center>
            </body>
            </html>
HTML;
        } else {
            return $html_content;
        }
    }

    private function prepareTemplateData($name, $subject, $html_content, $isUpdate = false)
    {
        $data = [
            "name"                  => $name,
            "subject"               => $subject,
            "generate_plain_content"=> true,
            "html_content"          => $html_content,
            "plain_content"         => ""
        ];
        if (!$isUpdate) {
            $data["editor"] = "design";
        }
        return $data;
    }
}
