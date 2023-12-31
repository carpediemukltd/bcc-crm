<!doctype html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title data-setting="app_name" data-rightJoin=" | CRM">Lendotics</title>
   <meta name="description" content="">
   <meta name="keywords" content="Lendotics">
   <meta name="author" content="Lendotics">
   <meta name="DC.title" content="">

   <link rel="shortcut icon" href="{{asset('assets/images/bcc-favicon.png')}}" />
   <!-- Library / Plugin Css Build -->
   <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />
   <!-- BCC Design System Css -->
   <link rel="stylesheet" href="{{asset('assets/css/hope-ui.min.css?v=3.0.0')}}" />
   <link rel="stylesheet" href="{{asset('assets/css/pro.min.css?v=3.0.0')}}" />
   <!-- Custom Css -->
   <link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=3.0.0')}}" />
   <link rel="stylesheet" href="{{asset('assets/css/crm_responsiveness.css')}}" />
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
   <meta name="csrf-token" content="{{ csrf_token() }}">

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
         <div class="row m-0 align-items-center bg-white h-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card iq-auth-form">
                        <div class="card-body">
                           <a href="#" class="navbar-brand login-brand-logo mb-4">
                              <!--Logo start-->
                              <div class="logo-main">
                                 <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:250px">
                              </div>
                              <!--logo End-->
                           </a>
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <p class="text-center">Login to stay connected.</p>
                           <div style="display: none;" class="alert alert-danger alert-block"></div>
                           <div style="display: none;" class="alert alert-success alert-block"></div>

                           <form id="login-form" class="bcc_login_form" action="{{ route('login.post') }}" method="POST">
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
                                 <button type="submit" class="btn btn-primary" >Sign In

                                 <span id="spiner" class="spinner-border spinner-border-sm hide" role="status" aria-hidden="true"></span>
                                 </button>
                              </div>

                           </form>
                           <!-- Add this HTML inside your login-form div -->
                           <div class="2fa-form" style="display: none;">
                              <form id="2fa-verification-form" action="{{ route('verify-2fa') }}" method="POST">
                                 {{ csrf_field() }}
                                 <input type="hidden" name="email" value="">
                                 <input type="hidden" name="password" value="">
                                 <div class="group mb-2">
                                    <label for="2fa-code" class="label">2FA Code</label>
                                    <input id="2fa-code" type="text" class="form-control" name="verification_code" required>
                                 </div>
                                 <div class="group mb-0">
                                    <!-- <input type="submit" class="btn btn-primary mt-2" value="Verify Code"> -->
                                    <button type="submit" class="btn btn-primary mt-2" value="Verify Code">
                                       Verify Code
                                    <span id="spiner" class="spinner-border spinner-border-sm hide" role="status" aria-hidden="true"></span>
                                    </button>
                                 </div>
                                 <div class="group mb-3 mt-3">
                                    <p>Didn't receive a code? <b style="cursor: pointer;" class="resend-code">Resend</b></p>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="col-md-6 d-md-block d-none p-0 vh-100 overflow-hidden">
               <img src="{{asset('assets/images/auth/login-bg.png')}}" class="img-fluid login-brand-banner gradient-main" alt="images">
               <!-- <img id="v-code" src="{{asset('assets/images/auth/v-code.png')}}" class="img-fluid v-code gradient-main animated-scaleX" alt="images" loading="lazy"> -->
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
   <script>
      $(document).ready(function() {
         $('#login-form').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();
            $('.alert-danger').hide();
            // Get the form data
            var formData = $(this).serialize();
            $('#spiner').css("display","inline-block");
            
            // Send an Ajax POST request for initial login
            $.ajax({
               type: 'POST',
               url: $(this).attr('action'),
               data: formData,
               success: function(response) {
                  // Check if 2FA is required
                  if (response.success) {
                     if (response.success == 'loggedin') {
                        window.location.href = 'dashboard';
                     } else {
                        // Hide the initial login form
                        $('#login-form').hide();
                        
                        // Show the 2FA form
                        $('.2fa-form').show();
                        // Set the email value in the 2FA form
                        $('#2fa-verification-form input[name="email"]').val($('#email').val());
                        $('#2fa-verification-form input[name="password"]').val($('#password').val());

                     }

                  } else if (response.error) {
                     $('.alert-danger').html('<ul><li>' + response.error + '</li></ul>').show();
                     $('#spiner').css("display","none");
                  }
               },
               error: function(response) {
                  $('.alert-danger').html('<ul><li>Oops! Something went Wrong.</li></ul>').show();
                  $('#spiner').css("display","none");
               }
            });
         });

         $('#2fa-verification-form').submit(function(event) {
            //$('#spiner').css("display","inline-block");
            // Prevent the default form submission
            event.preventDefault();

            // Get the form data
            var formData = $(this).serialize();
            $('#spiner').css("display","inline-block");
            // Send an Ajax POST request for 2FA verification
            $.ajax({
               type: 'POST',
               url: $(this).attr('action'),
               data: formData,
               success: function(response) {
                  if (response.error) {
                     $('.alert-danger').html('<ul><li>' + response.error + '</li></ul>').show();
                     $('#spiner').css("display","none");
                  } else {
                     window.location.href = 'dashboard';
                  }
               },
               error: function(response) {
                  $('.alert-danger').html('<ul><li>Oops! Something went Wrong.</li></ul>').show();
                  $('#spiner').css("display","none");
               }
            });
         });
         //resend code
         $(".resend-code").click(function() {
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            email = $('#2fa-verification-form input[name="email"]').val();
            password = $('#2fa-verification-form input[name="password"]').val();
            $.ajax({
               type: 'POST',
               url: '/resend-verification-code',
               data: {
                  'email': email,
                  'password': password
               },
               success: function(response) {
                  if (response.error) {
                     $('.alert-danger').html('<ul><li>' + response.error + '</li></ul>').show();
                  } else {
                     //code sent successfully
                     $('.alert-success').html('<ul><li>' + response.success + '</li></ul>').show();
                  }
               },
               error: function(response) {
                  $('.alert-danger').html('<ul><li>Too many attempts! Try again in 5 minutes.</li></ul>').show();
               }
            });

         });
      });
   </script>
</body>

</html>