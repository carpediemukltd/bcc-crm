<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Crm Email Template">
    <meta name="keywords" content="Crm Email Template">
    <meta name="author" content="Crm Email Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crm Email Template</title>
    <!-- <link rel="icon" href="images/favicon.png" type="image/gif" sizes="16x16">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <script src="js/custom.js"></script>
    <script src="js/aos.js"></script>
    <script src="https://kit.fontawesome.com/8612db66ee.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- please use folowing section for email template  -->
            <div class="crm_email_view" style="background-color:#efefef;padding: 40px 100px;">
                <table class="table"
                       style="width:100%;background-color: #fff;padding: 20px 30px 0; border-top: 4px solid #dda146;">
                    <tr style="border-bottom: 1px solid #efefef;">
                        <td style="text-align: center;">
                            <img src="https://crm.lendotics.com/assets/images/bcc-update-logo.png" style="width:200px">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <h2 style="border-top:1px solid #efefef;border-bottom:1px solid #efefef;padding: 10px 0;">
                                {{$sender_full_name}} mentioned you on the <br> client note <b>"{!! $note !!}"</b></h2>
                        </td>
                    </tr>
                </table>
                <table class="table" style="width:100%;background-color: #fff;padding:0  30px 30px;">
                    <tr>
                        <td style="text-align: center;">
                            <div class="user-name" style="background-color: #efefef;
                                padding: 10px;
                                border: 1px solid #ddd;">
                                <b>@ {{$mention}}</b>
                            </div>
                        </td>
                    </tr>
                </table>
                <table class="table" style="width:100%; background-color: #fff;padding:0 30px 30px;">
                    @foreach($companies as $company)
                    <tr>
                        <td style="vertical-align: middle;">
                            <div class="user-list-view" style="margin-bottom: 20px;display: inline-block;width: 100%;">
                                <div class="text-holder">
                                    <h3 style="font-size: 16px;margin: 0;">{{$company->name}}</h3>
{{--                                    <a href="#" style="display: block;font-size: 12px;text-decoration: none">Company--}}
{{--                                        OnBoard IT Tech</a>--}}
{{--                                    <a href="#" style="display: block;font-size: 12px;text-decoration: none">+ 3333 5555--}}
{{--                                        8776</a>--}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <table class="table" style="width:100%;background-color: #fff;padding: 0 0 30px;">
                    <tr>
                        <td style="text-align: center;">
                            <div class="user-redirect-btn">
                                <a href="{{$url}}" style="display: inline-block;
                                    background-color: #000;
                                    padding: 10px 30px;
                                    color: #fff;
                                    border-radius: 5px;text-decoration:none">View Activities</a>
                            </div>
                        </td>
                    </tr>
                </table>
                <p class="mt-3 mb-0" style="text-align: center;">This message was sent to {{$email}}</p>
            </div>
            <!-- please use above section for email template  -->
        </div>
    </div>
</div>
<!-- <script src="js/poper.js"></script>
<script src="js/boostrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/calendar.js"></script> -->
</body>
</html>
