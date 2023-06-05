<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login | BCC CRM</title>
      <link rel="icon" type="image/x-icon" href="<?php echo e(asset('../bcc-favicon.png')); ?>">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
      
      <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
      <!-- Style -->
      <link rel="stylesheet" href="<?php echo e(asset('custom.css')); ?>">
      <!-- jQuery library -->
      <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>
      <div class="login-wrap">
      <div class="login-html">
         <div class="login-form">
            <div class="bcc_crm_login">
               <div class="container-fluid">
                  <div class="row login-box">
                     <div class="col-lg-6 align-self-center pad-0 form-section">
                        <div class="form-inner">
                           <a href="#" class="logo">
                              <img src="../bcc-logo.png" alt="logo" style="width:200px">
                           </a>
                           <br />
                           <h3>Sign Into Your Account</h3>
                           <br /><br />
                           <?php
                                 if(isset($_SESSION['msg_error']) && !empty($_SESSION['msg_error'])){
                           ?>
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['msg_error'];?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                           <?php
                                 unset($_SESSION["msg_error"]);
                              }
                           ?>
                     
                           <form action="<?php echo e(route('login')); ?>" method="POST" id="commonForm" novalidate="novalidate">
                              <?php echo e(csrf_field()); ?>

                              <div class="form-group position-relative clearfix">
                                 <input name="email" required value="<?php echo e(old('email')); ?>" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                              </div>
                              <div class="form-group clearfix position-relative password-wrapper">
                                 <input name="password" type="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
                              </div>
                              
                              <!-- <div class="checkbox form-group clearfix">
                                 <div class="form-check float-start">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label" for="rememberme">
                                    Remember me
                                    </label>
                                 </div>
                                 <a href="#" class="link-light float-end forgot-password">Forgot your password?</a>
                              </div> -->

                              <div class="form-group clearfix">
                                 <button type="submit" class="btn btn-primary btn-lg btn-theme">Login</button>
                              </div>
                              <!-- <div class="extra-login clearfix">
                                 <span>Or Login With</span>
                              </div> -->
                           </form>
                           <div class="clearfix"></div>
                           <!-- <div class="social-list clearfix">
                              <div class="icon facebook">
                                 <div class="tooltip">Facebook</div>
                                 <span><i class="fa fa-facebook"></i></span>
                              </div>
                              <div class="icon twitter">
                                 <div class="tooltip">Twitter</div>
                                 <span><i class="fa fa-twitter"></i></span>
                              </div>
                              <div class="icon instagram">
                                 <div class="tooltip">Google</div>
                                 <span><i class="fa fa-google"></i></span>
                              </div>
                              <div class="icon github mr-0">
                                 <div class="tooltip">Linkedin</div>
                                 <span><i class="fa fa-linkedin"></i></span>
                              </div>
                           </div>
                           <p>Don't have an account? <a href="#" class="thembo"> Register here</a></p> -->
                        </div>
                     </div>
                     <div class="col-lg-6 pad-0 none-992 bg-img">
                        <div class="lines">
                           <div class="line"></div>
                           <div class="line"></div>
                           <div class="line"></div>
                           <div class="line"></div>
                           <div class="line"></div>
                           <div class="line"></div>
                        </div>
                        <div class="info">
                           <div class="animated-text">
                              <h1>Welcome <span>to BCC CRM</span></h1>
                           </div>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  make a type specimen book.  make a type specimen book.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html><?php /**PATH C:\xampp\htdocs\crm\resources\views/login.blade.php ENDPATH**/ ?>