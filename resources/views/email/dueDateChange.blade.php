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
<h3>Hi {{$first_name}},</h3>
<p>The due date of your document package submission for the following documents is now {{$due_date}} :</p>
<ul>
    @foreach($documents as $document)
        <li>{{$document->title}}</li>
    @endforeach
</ul>
<p>Please understand the importance of providing these documents to expedite your financing application. We want to ensure a smooth and as timely submission as possible.</p>
<p>Please, Login to your secure Bank portal to upload these and expedite your fundings. <a href="https://dashboard.bccusa.com/">Bank Portal - Login</a></p>
<p>Thank you!</p>
<br/>
<p><b>Team BCCUSA</b></p>
</body>
</html>
