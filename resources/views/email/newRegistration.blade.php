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
<p>Your secure login to the BCCUSA bank portal has been created! It is accessible here: <a href="{{route('login')}}">https://dashboard.bccusa.com/</a>.</p>
<p>Your email address is is your login and your password is BCCUSA.com until you login and change it.</p>
<p>The following documents have been requested to provide your requested financing:</p>
<ul>
    @foreach($documents as $document)
        <li>{{$document->title}}</li>
    @endforeach
</ul>
<p>If you have any questions, we're here to help every step of the way.</p>
<p>Sincerely,</p>
<p><b>Team BCCUSA</b></p>
</body>
</html>
