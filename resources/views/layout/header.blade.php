<!DOCTYPE html>
<html lang="en">
   <head>
      <title>BCC LEAD</title>
      <link rel="icon" type="image/x-icon" href="{{asset('uploads/images/favicon.png')}}">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="{{asset('carousel-16/css/owl.carousel.min.css')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('carousel-16/css/bootstrap.min.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{asset('carousel-16/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('custom.css')}}">
      <!-- <link rel="stylesheet" href="{{asset('bcc-stepform-animation.css')}}"> -->
      <link rel="stylesheet" href="{{asset('aos.css')}}">
      <!-- jQuery library -->
      <script src="{{asset('aos.js')}}"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- <script src="{{asset('bcc-stepform-animation.js')}}"></script> -->
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      <script src="{{asset('jquery-input-mask-phone-number.js')}}"></script>
   </head>
   <body class="">
      <!-- Bcc Header Start -->
      <header>
         <div class="bcc-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('uploads/images/logo.png')}}"></a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active"><a class="nav-link" href="#">SBA,
                                PPP,
                                and Bank Loans<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">Advisor</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Partners</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">About us</a></li>
                            </ul>
                            <a href="{{route('loan.index')}}" class="navbar-btn apply-now-btn">APPLY NOW</a>
                            @if (Auth::user())
                            <a href="{{route('user.logout')}}" class="navbar-btn login-btn">LOGOUT</a>
                            @else
                            <a href="{{route('login')}}" class="navbar-btn login-btn">LOGIN</a>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
         </div>
      </header>
      <!-- Bcc Header End -->