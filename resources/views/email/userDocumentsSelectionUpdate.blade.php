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
<p>An additional document request has been added for your bank financing application! The additional documents are:</p>
<ul>
    @foreach($documents as $document)
        <li>{{$document->title}}</li>
    @endforeach
</ul>
<p>Please login to your secure bank portal <a href="{{route('login')}}">https://dashboard.bccusa.com/</a> to upload these and expedite your funding.</p>
<p>Thank you!</p>
<p><b>Team BCCUSA</b></p>
</body>
</html>
