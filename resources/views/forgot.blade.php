<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forgot | BCC LEAD</title>
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
   <style>
    .login-wrap{width:100%; margin: auto; height:100%; position:relative; 	background:url("uploads/images/apply-online-banner.png") no-repeat center; background-size:cover; background-position:center; padding:50px 0;}
	.login-html{margin:0 auto; width:525px; border-radius:10px; height:100%; max-width:525px; padding:60px 70px 50px 70px; background:rgba(40,57,101,.9);}
	.login-html .sign-in-htm, .login-html .sign-up-htm{top:0; left:0; right:0; bottom:0; position:absolute;  backface-visibility:hidden; transition:all .4s linear;}
	.login-html .sign-in, .login-html .sign-up, .login-form .group .check{display:none;}
	.login-html .tab, .login-form .group .label, .login-form .group .button{text-transform:uppercase;}
	.login-html .tab{font-size:22px; margin-right:15px; padding-bottom:5px; margin:0 15px 30px 0; display:inline-block; border-bottom:2px solid transparent;}
	.login-html .sign-in:checked + .tab, .login-html .sign-up:checked + .tab{color:#fff; border-color:#dba04b;}
	.login-form{min-height:345px; position:relative; perspective:1000px; transform-style:preserve-3d;}
	.login-form .group{margin-bottom:15px;}
	.login-form .group .label, .login-form .group .input, .login-form .group .button{width:100%; color:#fff; display:block;}
	.login-form .group .input, .login-form .group .button{border:none; padding:15px 20px; border-radius:25px; background:rgba(255,255,255,.1);}
	.login-form .group input[data-type="password"]{text-security:circle; -webkit-text-security:circle;}
	.login-form .group .label{color:#aaa; font-size:12px;}
	.login-form .group .button{background:#dba04b;}
	.login-form .group label .icon{width:15px; height:15px; border-radius:2px; position:relative; display:inline-block; background:rgba(255,255,255,.1);}
	.login-form .group label .icon:before, .login-form .group label .icon:after{content:''; width:10px; height:2px; background:#fff; position:absolute; transition:all .2s ease-in-out 0s;}
	.login-form .group label .icon:before{left:3px; width:5px; bottom:6px; transform:scale(0) rotate(0);}
	.login-form .group label .icon:after{top:6px; right:0; transform:scale(0) rotate(0);}
	.login-form .group .check:checked + label{color:#fff;}
	.login-form .group .check:checked + label .icon{background:#dba04b;}
	.login-form .group .check:checked + label .icon:before{transform:scale(1) rotate(45deg);}
	.login-form .group .check:checked + label .icon:after{transform:scale(1) rotate(-45deg);}
	.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{transform:rotate(0);}
	.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{transform:rotate(0);}
	.hr{height:2px; margin:40px 0 40px 0; background:rgba(255,255,255,.2);}
	.foot-lnk{text-align:center;}
   </style>
   <body>
      
   <div class="login-wrap">
	<div class="login-html">
		<div class="alert-msgs">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block" id="alert_success_session">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif
			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul class="mb-0">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="" method="POST">
					<div class="group">
						<label for="email_address" class="label">E-Mail Address</label>
						<input id="email_address" type="text" class="input" required value="{{ old('email')}}" name="email">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Reset Password">
					</div>
				</form>
			</div>
		</div>
	</div>
   </body>
</html>