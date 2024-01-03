<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Hello {{$first_name}},</h3>
<p>Your documents required for your bank financing application require your immediate attention and are overdue by {{$days}} Days. The following documents remain pending in your portal:</p>
<ul>
    @foreach($documents as $document)
        <li>{{$document->title}}</li>
    @endforeach
</ul>
<p>Please continue to access and upload your documents <a href="https://dashboard.bccusa.com/">https://dashboard.bccusa.com/</a>.</p>
<p>If you have any questions, you can log in and interface with our AI Chatbot. You can also arrange a call, text, or scheduled meeting through the bot by asking for a human.</p>
<p>Want a more optimized mobile experience? Download our free Mobile App! <a href="https://apps.apple.com/us/app/lendotics/id6471336721">IOS App</a> or <a href="https://play.google.com/store/apps/details?id=com.liendotics">Android App</a>.</p>
<p>Sincerely,</p>
<p><b>Team BCCUSA</b></p>
</body>
</html>
