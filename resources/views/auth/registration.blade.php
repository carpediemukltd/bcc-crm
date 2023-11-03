<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title data-setting="app_name" data-rightJoin=" | Lendotics">Registeration</title>
      <meta name="description" content="">
      <meta name="keywords" content="Lendotics">
      <meta name="author" content="Lendotics">
      <meta name="DC.title" content="">
      <!-- Library / Plugin Css Build -->
      <link rel="shortcut icon" href="{{asset('assets/images/bcc-favicon.png')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />
      <!-- Lendotics Design System Css -->
      <link rel="stylesheet" href="{{asset('assets/css/hope-ui.min.css?v=3.0.0')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/pro.min.css?v=3.0.0')}}" />
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=3.0.0')}}" />
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{asset('assets/css/dark.min.css?v=3.0.0')}}" />
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css?v=3.0.0')}}" />
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css?v=3.0.0')}}" />
      <!-- Google Font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
   </head>
   <body class=" ">
      <!-- loader Start -->
      <div id="loading">
         <div class="loader simple-loader">
            <div class="loader-body">
               <img src="{{asset('assets/images/loader.webp')}}" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
            </div>
         </div>
      </div>
      <!-- loader END -->
      <div class="wrapper">
         <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
               <div class="col-md-6 d-md-block d-none bg-primary p-0 vh-100 overflow-hidden">
                  <img src="{{asset('assets/images/auth/05.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images" loading="lazy">
               </div>
               <div class="col-md-6">
                  <div class="row justify-content-center">
                     <div class="col-md-10">
                        <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                           <div class="card-body">
                              <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                                 <!--Logo start-->
                                 <div class="logo-main">
                                    <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:150px">
                                 </div>
                                 <!--logo End-->                              
                              </a>
                              <h2 class="mb-2 text-center">Sign Up</h2>
                              <p class="text-center">Create your Lendotics account.</p>
                              <form action="{{ route('register.post') }}" method="POST">
                                 @csrf
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="first_name" class="form-label">First Name</label>
                                          <input type="text" class="form-control" id="first_name" placeholder="Edward" name="first_name" required autofocus>
                                          @if ($errors->has('first_name'))
                                             <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="last-name" class="form-label">Last Name</label>
                                          <input type="text" class="form-control" id="last-name" placeholder="Cullen" name="last_name" required autofocus>
                                          @if ($errors->has('last_name'))
                                             <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="email" class="form-control" id="email" placeholder="example@example.com" name="email" required autofocus>
                                          @if ($errors->has('email'))
                                             <span class="text-danger">{{ $errors->first('email') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="phone" class="form-label">Phone No.</label>
                                          <input type="text" class="form-control" id="phone" placeholder="+111111111" name="phone_number" required autofocus>
                                          @if ($errors->has('phone_number'))
                                             <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="password" class="form-label">Password</label>
                                          <input type="password" class="form-control" id="password" placeholder="******" name="password" required autocomplete="current-password">
                                          @if ($errors->has('password'))
                                             <span class="text-danger">{{ $errors->first('password') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="confirm-password" class="form-label">Confirm Password</label>
                                          <input type="password" class="form-control" id="confirm-password" placeholder="******" name="password_confirmation" required autocomplete="current-password">
                                       </div>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center">
                                       <div class="form-check mb-3">
                                          <input type="checkbox" class="form-check-input" id="customCheck1" name="remember">
                                          <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                 </div>
                                 <!-- <p class="text-center my-3">or sign in with other accounts?</p>
                                 <div class="d-flex justify-content-center">
                                    <ul class="list-group list-group-horizontal list-group-flush">
                                       <li class="list-group-item border-0 pb-0">
                                          <a href="#"><img src="{{asset('assets/images/brands/fb.svg')}}" alt="fb" loading="lazy"></a>
                                       </li>
                                       <li class="list-group-item border-0 pb-0">
                                          <a href="#"><img src="{{asset('assets/images/brands/gm.svg')}}" alt="gm" loading="lazy"></a>
                                       </li>
                                       <li class="list-group-item border-0 pb-0">
                                          <a href="#"><img src="{{asset('assets/images/brands/im.svg')}}" alt="im" loading="lazy"></a>
                                       </li>
                                       <li class="list-group-item border-0 pb-0">
                                          <a href="#"><img src="{{asset('assets/images/brands/li.svg')}}" alt="li" loading="lazy"></a>
                                       </li>
                                    </ul>
                                 </div>
                                 <p class="mt-3 text-center">
                                    Already have an Account <a href="{{ route('login') }}" class="text-underline">Sign In</a>
                                 </p> -->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
         </section>
      </div>
      <!-- Live Customizer start -->
      
      <!-- Live Customizer end -->
      <!-- Library Bundle Script -->
<script src="{{asset('assets/js/core/libs.min.js')}}"></script>
<!-- Plugin Scripts -->
<!-- Slider-tab Script -->
<script src="{{asset('assets/js/plugins/slider-tabs.js')}}"></script>
<!-- Select2 Script -->
<!-- Lodash Utility -->
<script src="{{asset('assets/vendor/lodash/lodash.min.js')}}"></script>
<!-- Utilities Functions -->
<script src="{{asset('assets/js/iqonic-script/utility.min.js')}}"></script>
<!-- Settings Script -->
<script src="{{asset('assets/js/iqonic-script/setting.min.js')}}"></script>
<!-- Settings Init Script -->
<script src="{{asset('assets/js/setting-init.js')}}"></script>
<!-- External Library Bundle Script -->
<script src="{{asset('assets/js/core/external.min.js')}}"></script>
<!-- Widgetchart Script -->
<script src="{{asset('assets/js/charts/widgetcharts.js?v=3.0.0')}}" defer></script>
<!-- Dashboard Script -->
<script src="{{asset('assets/js/charts/dashboard.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/charts/alternate-dashboard.js?v=3.0.0')}}" defer></script>
<!-- Hopeui Script -->
<script src="{{asset('assets/js/hope-ui.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/hope-uipro.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/sidebar.js?v=3.0.0')}}" defer></script>   
   </body>
</html>