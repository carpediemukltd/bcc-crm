<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Forgot Password Link | Lendotics</title>
      <meta name="description" content="">
      <meta name="keywords" content="Lendotics">
      <meta name="author" content="Lendotics">
      <meta name="DC.title" content="">
      <!-- Google Font Api KEY-->
      
      <link rel="shortcut icon" href="{{asset('assets/images/bcc-favicon.png')}}" />
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />
      <!-- BCC Design System Css -->
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
      <!-- <div id="loading">
         <div class="loader simple-loader">
            <div class="loader-body">
               <img src="{{asset('assets/images/loader.webp')}}" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
            </div>
         </div>
      </div> -->
      <div class="loader">
         <div class="logo">
            <img src="{{asset('assets/images/app-icon.png')}}" style="width:50px;height:50px;" />
         </div>
      </div>
      <!-- loader END -->
      <div class="wrapper">
         <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
               <div class="col-md-6 d-md-block d-none p-0 vh-100 overflow-hidden">
                  <img src="{{asset('assets/images/auth/login-bg.png')}}" class="img-fluid login-brand-banner gradient-main" alt="images">
               </div>
               <div class="col-md-6 p-0">
                  <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                     <div class="card-body">
                        <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                           <!--Logo start-->
                           <div class="logo-main">
                              <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:150px">
                           </div>
                           <!--logo End-->                        
                        </a>
                        <h2 class="mb-2">Reset Password</h2>
                        <!-- <p>Enter your email address and we'll send you an email with instructions to reset your password.</p> -->
                        <form action="{{ route('reset.password.post') }}" method="POST">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
                           
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="example@example.com"  name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="******" name="password" required autofocus>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password-confirm" aria-describedby="password-confirm" placeholder="******" name="password_confirmation" required autofocus>
                                    @if ($errors->has('password-confirm'))
                                    <span class="text-danger">{{ $errors->first('password-confirm') }}</span>
                                    @endif
                                 </div>
                              </div>
                           </div>

                           <button type="submit" class="btn btn-primary">Reset</button>
                        </form>
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