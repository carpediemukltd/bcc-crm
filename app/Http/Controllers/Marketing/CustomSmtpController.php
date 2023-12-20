<?php

namespace App\Http\Controllers\Marketing;
use App\Http\Controllers\Controller;
use App\Models\Marketing\CustomSmtp;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Http\Request;
use Exception;


class CustomSmtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CustomSmtp::whereCompanyId(auth()->user()->company_id)->paginate(10);
        return view('marketing.email.smtp.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.email.smtp.create');
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
            'host'              => 'required',
            'username'          => 'required',
            'password'          => 'required',
            'encryption_type'   => 'required',
            'port'              => 'required',
            'reply_to'          => 'required',
            'username_display'  => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //check if email smtp is valid
        try {
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = 3;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $request->host;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $request->username;                     //SMTP username
            $mail->Password   = $request->password;                                //SMTP password
            $mail->SMTPSecure = $request->encryption_type;              //Enable implicit TLS encryption
            $mail->Port       = $request->port;

            $mail->setFrom($request->username);

            $mail->addAddress('bccusa@mailinator.com');               //Name is optional
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'SMTP checking';
            $mail->Body    = 'Lorem Ipsum';
            $mail->send();
            $smtpArrToAdd['host']               = $request->host;
            $smtpArrToAdd['port']               = $request->port;
            $smtpArrToAdd['encryption_type']    = $request->encryption_type;
            $smtpArrToAdd['username']           = $request->username;
            $smtpArrToAdd['password']           = $request->password;
            $smtpArrToAdd['company_id']         = auth()->user()->company_id;
            $smtpArrToAdd['reply_to']           = $request->reply_to;
            $smtpArrToAdd['username_display']   = $request->username_display;
            CustomSmtp::create($smtpArrToAdd);
            return \Redirect::route('custom-smtps.index', $request->app_id)->with('success', 'New Smtp added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        CustomSmtp::whereId($id)->delete();
        return redirect()->back()->with('success', 'SMTP deleted successfully!');
    }
}
