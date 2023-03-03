<!DOCTYPE html>
<html lang="en">
	<head>
      <title>Forgot | BCC CRM</title>
      <link rel="icon" type="image/x-icon" href="{{asset('../bcc-favicon.png')}}">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
      
      <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{asset('custom.css')}}">
      <!-- jQuery library -->
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
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