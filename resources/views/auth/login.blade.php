<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title data-setting="app_name" data-rightJoin=" Pro | Responsive Bootstrap 5 Admin Dashboard Template">BCC CRM</title>
      <meta name="description" content="">
      <meta name="keywords" content="BCC CRM">
      <meta name="author" content="Carpe Diem">
      <meta name="DC.title" content="">
     
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
            <div class="row m-0 align-items-center bg-white h-100">
               <div class="col-md-6">
                  <div class="row justify-content-center">
                     <div class="col-md-10">
                        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card iq-auth-form">
                           <div class="card-body">
                              <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                                 <!--Logo start-->
                                 <div class="logo-main">
                                    <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:150px">
                                 </div>
                                 <!--logo End-->                              
                              </a>
                              <h2 class="mb-2 text-center">Sign In</h2>
                              <p class="text-center">Login to stay connected.</p>
                              @include('alert_message')

                              <form class="bcc_login_form" action="{{ route('login.post') }}" method="POST">
                                @csrf
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="example@example.com" name="email" value="{{old('email')}}" required autofocus>
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="password" class="form-label">Password</label>
                                          <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="******" name="password" required>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-between">
                                       <div class="form-check mb-3">
                                          <input type="checkbox" class="form-check-input" id="customCheck1" name="remember">
                                          <label class="form-check-label" for="customCheck1">Remember Me</label>
                                       </div>
                                       <a href="{{ route('forget.password.get') }}">Forgot Password?</a>
                                    </div>
                                 </div>
                                 <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                 </div>
                                 
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
               <div class="col-md-6 d-md-block d-none bg-primary p-0 vh-100 overflow-hidden">
                  <img src="{{asset('assets/images/auth/01.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images" loading="lazy">
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