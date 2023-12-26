<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lendotics | Unsubscribe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
        background-color: #eee;
    }
    
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    .jumbotron {
      margin-bottom: 0;
    }
   
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:200px"><br>
    <h1>Hello {{$user->full_name}},</h1>      
    <p>You have successfully unsubscribed from Lendotics communications.</p>
    <p>We respect your decision and appreciate the time you spent with us. If you ever change your mind, feel free to re-subscribe at any time.</p>
    <p>For any inquiries or concerns, please contact our support team at <a href="mailto:support@lendotics.com">support@lendotics.com</a>.</p>
    <p>Thank you for being a part of Lendotics!</p>
  </div>
</div>

</body>
</html>
