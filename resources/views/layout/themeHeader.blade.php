<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>
         @if(isset($current_slug))
         {{$current_slug}} |
         @endif
         BCC CRM
      </title>
      <meta name="description" content="">
      <meta name="keywords" content="BCC CRM">
      <meta name="author" content="Carpe Diem">
      <meta name="DC.title" content="">
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/bcc-favicon.png')}}" />
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />
      <!-- Flatpickr css -->
      <link rel="stylesheet" href="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/vendor/sheperd/dist/css/sheperd.css')}}">
      <!-- BCC Design System Css -->
      <link rel="stylesheet" href="{{asset('assets/css/hope-ui.min.css?v=3.0.0')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/pro.min.css?v=3.0.0')}}" />
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{asset('assets/css/dark.min.css?v=3.0.0')}}" />
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css?v=3.0.0')}}" />
      <!-- RTL Css -->
      <!-- <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css?v=3.0.0')}}" /> -->
      <!-- Google Font -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
      <script type="text/javascript" src="{{asset('assets/js/jsFunctions.js?v=1.0')}}"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
       <link href="{{asset('assets/css/chat-style.css')}}" rel="stylesheet" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

      @yield('css')
   </head>
   <body class="dual-compact light theme-default theme-with-animation card-default theme-color-default">
      <!-- loader Start -->
      <?php $notificationService = app('App\Services\NotificationService');
    ?>
      <div id="loading">
         <div class="loader simple-loader">
            <div class="loader-body">
               <img id="loading-image" src="{{asset('assets/images/loader.webp')}}" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
            </div>
         </div>
      </div>
      <main class="main-content">
      <div class="position-relative">
         <!--Nav Start-->
         <nav class="nav navbar navbar-expand-lg fixed-top shadow-sm navbar-light iq-navbar header-hover-menu left-border">
            <div class="container-fluid navbar-inner">
               <a href="{{route('dashboard')}}" class="navbar-brand">
                  <!--Logo start-->
                  <div class="logo-main">
                     <div class="logo-normal">
                        <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:100px">
                     </div>
                  </div>
                  <!--logo End-->
               </a>
               <!-- <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                  <i class="icon d-flex">
                     <svg class="icon-20" width="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                     </svg>
                  </i>
                  </div> -->
               <div class="d-flex align-items-center justify-content-between product-offcanvas">
                  <!-- <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                     <small class="mb-0 text-capitalize">
                        @if(isset($current_slug))
                           {{$current_slug}}
                        @endif
                     </small>
                     </div> -->
                  <div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive" tabindex="-1" id="offcanvasBottom">
                     <div class="offcanvas-body">
                        <ul class="iq-nav-menu list-unstyled">
                           <li class="nav-item iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'dashboard'){echo 'active';}?>" aria-current="page"
                                 href="{{route('dashboard')}}">
                                 <i class="icon">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                                       <path opacity="0.4"
                                          d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                          fill="currentColor"></path>
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                          fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Dashboard</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'dashboard-sandbox'){echo 'active';}?>"
                                 href="{{url('dashboard-sandbox')}}">
                                 <i class="icon">
                                    <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                       xmlns="">
                                       <path
                                          d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                          fill="currentColor"></path>
                                       <path opacity="0.4"
                                          d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                          fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Dashboard Sandbox</span>
                              </a>
                           </li>
                           <li class="nav-item iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'dashboard-sandbox'){echo 'active';}?>" aria-current="page"
                                 href="#sidebar-user">
                                 <i class="icon">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                                       <path opacity="0.4"
                                          d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                          fill="currentColor"></path>
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                          fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Reports</span>
                                 <i class="right-icon">
                                    <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                 </i>

                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11" style="width: 15rem;">
                                 
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'deals-sandbox'){echo 'active';}?>"
                                       href="{{url('deals-sandbox')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">Deals</span>
                                    </a>
                                 </li>

                              </ul>
                           </li>

                           @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
                           <li class="nav-item dropdown iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($slug) && in_array($slug, ['add_user', 'user_list', 'edit_user', 'user_details', 'user_deals', 'user_add_deal', 'user_edit_deal']) && !isset($_GET['type'])){echo 'active';}?>" data-bs-toggle="dropdown" href="#sidebar-user" role="button" aria-expanded="false"
                                 aria-controls="sidebar-special">
                                 <i class="icon">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                                       <path
                                          d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z"
                                          fill="currentColor"></path>
                                       <path opacity="0.4"
                                          d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z"
                                          fill="currentColor"></path>
                                       <path opacity="0.4"
                                          d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z"
                                          fill="currentColor"></path>
                                       <path
                                          d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z"
                                          fill="currentColor"></path>
                                       <path opacity="0.4"
                                          d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z"
                                          fill="currentColor"></path>
                                       <path
                                          d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z"
                                          fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Contacts</span>
                                 <i class="right-icon">
                                    <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                 </i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11"
                                 style="width: 15rem;">
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'add_user' && !isset($_GET['type'])){echo 'active';}?>"
                                       href="{{route('user.add')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path
                                                d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                                fill="currentColor"></path>
                                             <path opacity="0.4"
                                                d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name"> Add Contact</span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'user_list'){echo 'active';}?>"
                                       href="{{route('user.list')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">Contact List</span>
                                    </a>
                                 </li>
                                 @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'roundrobin'){echo 'active';}?>"
                                       href="{{route('roundrobin')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">Round Robin</span>
                                    </a>
                                 </li>
                                 @endif
                              </ul>
                           </li>
                           @if (Auth::user()->role == 'superadmin')
                           <li class="nav-item dropdown iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($slug) && in_array($slug, ['add_field', 'field_list', 'edit_field'])){echo 'active';}?>" role="button" data-bs-toggle="dropdown"
                                 aria-expanded="false" href="#sidebar-custon-fields">
                                 <i class="icon" >
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                       xmlns="">
                                       <path opacity="0.4"
                                          d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2"
                                          fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z"
                                          fill="currentColor" />
                                    </svg>
                                 </i>
                                 <span class="item-name">Custom Fields</span>
                                 <i class="right-icon">
                                    <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                 </i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11"
                                 style="width: 15rem;">
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'add_field'){echo 'active';}?>"
                                       href="{{route('customfield.add')}}">
                                       <i class="icon" >
                                          <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2"
                                                fill="currentColor" />
                                             <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z"
                                                fill="currentColor" />
                                          </svg>
                                       </i>
                                       <span class="item-name"> Add Custom Field</span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'field_list'){echo 'active';}?>"
                                       href="{{route('customfield.list')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">List of Custom Fields</span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           @endif
                           @if (Auth::user()->role == 'superadmin')
                           <li class="nav-item dropdown iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($slug) && in_array($slug, ['companies', 'list_company', 'edit_company', 'add_company'])){echo 'active';}?>" role="button" data-bs-toggle="dropdown"
                                 aria-expanded="false" href="#sidebar-companies">
                                 <i class="icon" >
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                       <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Companies</span>
                                 <i class="right-icon">
                                    <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                 </i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11"
                                 style="width: 15rem;">
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'add_company'){echo 'active';}?>"
                                       href="{{ route('company.add')}}">
                                       <i class="icon" >
                                          <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                             <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name"> Add Company</span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'list_company'){echo 'active';}?>"
                                       href="{{ route('company.list')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">List Companies</span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'deals_company'){echo 'active';}?>"
                                       href="{{ route('company.deals')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">Company Deals</span>
                                    </a>
                                 </li>
                              </ul>
                              @endif
                           </li>
                           @if (Auth::user()->role == 'superadmin')
                           <li class="nav-item iq-responsive-menu d-block">
                              <a class="nav-link <?php if(isset($_GET['type']) && $_GET['type'] == 'admin'){echo 'active';} ?>" aria-current="page"
                                 href="#">
                                 <i class="icon">
                                 <svg fill="none" class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1583 8.23285C16.1583 10.5825 14.2851 12.4666 11.949 12.4666C9.61292 12.4666 7.73974 10.5825 7.73974 8.23285C7.73974 5.88227 9.61292 4 11.949 4C14.2851 4 16.1583 5.88227 16.1583 8.23285ZM11.949 20C8.51785 20 5.58809 19.456 5.58809 17.2802C5.58809 15.1034 8.49904 14.5396 11.949 14.5396C15.3802 14.5396 18.31 15.0836 18.31 17.2604C18.31 19.4362 15.399 20 11.949 20ZM17.9571 8.30922C17.9571 9.50703 17.5998 10.6229 16.973 11.5505C16.9086 11.646 16.9659 11.7748 17.0796 11.7946C17.2363 11.8216 17.3984 11.8369 17.5631 11.8414C19.2062 11.8846 20.6809 10.821 21.0883 9.21974C21.6918 6.84123 19.9198 4.7059 17.6634 4.7059C17.4181 4.7059 17.1835 4.73201 16.9551 4.77884C16.9238 4.78605 16.8907 4.80046 16.8728 4.82838C16.8513 4.8626 16.8674 4.90853 16.8889 4.93825C17.5667 5.8938 17.9571 7.05918 17.9571 8.30922ZM20.6782 13.5126C21.7823 13.7296 22.5084 14.1727 22.8093 14.8166C23.0636 15.3453 23.0636 15.9586 22.8093 16.4864C22.349 17.4851 20.8654 17.8058 20.2887 17.8886C20.1696 17.9066 20.0738 17.8031 20.0864 17.6833C20.3809 14.9157 18.0377 13.6035 17.4315 13.3018C17.4055 13.2883 17.4002 13.2676 17.4028 13.255C17.4046 13.246 17.4154 13.2316 17.4351 13.2289C18.7468 13.2046 20.1571 13.3847 20.6782 13.5126ZM6.43711 11.8413C6.60186 11.8368 6.76304 11.8224 6.92063 11.7945C7.03434 11.7747 7.09165 11.6459 7.02718 11.5504C6.4004 10.6228 6.04313 9.50694 6.04313 8.30913C6.04313 7.05909 6.43353 5.89371 7.11135 4.93816C7.13284 4.90844 7.14806 4.86251 7.12746 4.82829C7.10956 4.80127 7.07553 4.78596 7.04509 4.77875C6.81586 4.73192 6.58127 4.70581 6.33593 4.70581C4.07951 4.70581 2.30751 6.84114 2.91191 9.21965C3.31932 10.8209 4.79405 11.8845 6.43711 11.8413ZM6.59694 13.2545C6.59962 13.268 6.59425 13.2878 6.56918 13.3022C5.9621 13.6039 3.61883 14.9161 3.91342 17.6827C3.92595 17.8034 3.83104 17.9061 3.71195 17.889C3.13531 17.8061 1.65163 17.4855 1.19139 16.4867C0.936203 15.9581 0.936203 15.3457 1.19139 14.817C1.49225 14.1731 2.21752 13.73 3.32156 13.512C3.84358 13.385 5.25294 13.2049 6.5656 13.2292C6.5853 13.2319 6.59515 13.2464 6.59694 13.2545Z" fill="currentColor"></path>
                                 </svg>
                                 </i>
                                 <span class="item-name">Admin Console</span>
                                 <i class="right-icon">
                                    <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                 </i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11" style="width: 15rem;">
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['type']) && $_GET['type'] == 'admin'){echo 'active';} ?>" href="{{ route('user.add', ['type' => 'admin']) }}">
                                       <i class="icon">
                                       <svg fill="none" class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 12.5537C12.2546 12.5537 14.4626 10.3171 14.4626 7.52684C14.4626 4.73663 12.2546 2.5 9.5 2.5C6.74543 2.5 4.53737 4.73663 4.53737 7.52684C4.53737 10.3171 6.74543 12.5537 9.5 12.5537ZM9.5 15.0152C5.45422 15.0152 2 15.6621 2 18.2464C2 20.8298 5.4332 21.5 9.5 21.5C13.5448 21.5 17 20.8531 17 18.2687C17 15.6844 13.5668 15.0152 9.5 15.0152ZM19.8979 9.58786H21.101C21.5962 9.58786 22 9.99731 22 10.4995C22 11.0016 21.5962 11.4111 21.101 11.4111H19.8979V12.5884C19.8979 13.0906 19.4952 13.5 18.999 13.5C18.5038 13.5 18.1 13.0906 18.1 12.5884V11.4111H16.899C16.4027 11.4111 16 11.0016 16 10.4995C16 9.99731 16.4027 9.58786 16.899 9.58786H18.1V8.41162C18.1 7.90945 18.5038 7.5 18.999 7.5C19.4952 7.5 19.8979 7.90945 19.8979 8.41162V9.58786Z" fill="currentColor"></path>
                                       </svg>
                                       </i>
                                       <span class="item-name">Add Admin / Super User</span>
                                    </a>
                                 </li>
                                 
                                 <li class="nav-item">
                                    <a class="nav-link <?php if(isset($slug) && $slug == 'stages'){echo 'active';}?>"
                                       href="{{ route('stage.list')}}">
                                       <i class="icon">
                                          <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path opacity="0.4"
                                                d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                                fill="currentColor"></path>
                                             <path
                                                d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                                fill="currentColor"></path>
                                          </svg>
                                       </i>
                                       <span class="item-name">Stages</span>
                                    </a>
                                 </li>

                              </ul>
                           </li> 
                           <li class="nav-item">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'pipelines'){echo 'active';}?>"
                                 href="{{ route('pipeline.list')}}">
                                 <i class="icon">
                                    <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                       xmlns="">
                                       <path opacity="0.4"
                                          d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                                          fill="currentColor"></path>
                                       <path
                                          d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                                          fill="currentColor"></path>
                                       <path
                                          d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                                          fill="currentColor"></path>
                                       <path
                                          d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                                          fill="currentColor"></path>
                                    </svg>
                                 </i>
                                 <span class="item-name">Pipelines</span>
                              </a>
                           </li>     
                           @endif()
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="d-flex align-items-center">
                  <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon">
                        <span class="navbar-toggler-bar bar1 mt-1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                     </span>
                  </button>
               </div>
               <div class="navbar-collapse collapse" id="navbarSupportedContent">
                  <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                     <!-- <li class="nav-item dropdown pe-3 d-none d-xl-block">
                        <div class="form-group input-group mb-0 search-input">
                           <input type="text" class="form-control" placeholder="Search...">
                           <span class="input-group-text">
                              <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="">
                                 <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                                 <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </span>
                        </div>
                        </li> -->
                     <!-- <li class="nav-item dropdown iq-responsive-menu border-end d-block d-xl-none">
                        <div class="btn btn-sm bg-body" id="navbarDropdown-search-11" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                           <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round"></circle>
                              <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-search-11"
                           style="width: 25rem;">
                           <li class="px-3 py-0">
                              <div class="form-group input-group mb-0">
                                 <input type="text" class="form-control" placeholder="Search...">
                                 <span class="input-group-text">
                                    <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                       xmlns="">
                                       <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></circle>
                                       <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                 </span>
                              </div>
                           </li>
                        </ul>
                        </li> -->
                     <li class="nav-item dropdown notification_view">
                        @if($notificationService::recent()['bell_notification_count'])
                           @if($notificationService::recent()['bell_notification_count'] > 99)
                              <span class="custom-notification-badge">99+</span>
                           @elseif($notificationService::recent()['bell_notification_count'] > 0)
                              <span class="custom-notification-badge">{{$notificationService::recent()['bell_notification_count']}}</span>
                           @endif
                        @endif()
                        <a class="nav-link clear-bell-icon" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell" style="height: 20px; width: 20px; color: rgb(84, 95, 245);">
                              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                           </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                        @if(count($notificationService::recent()['notifications']))
                        @foreach($notificationService::recent()['notifications'] as $notification)
                        <div id="notification_listing-{{$notification->id}}" class="notification_listing {{ $notification->is_read == '1' ? 'notification_listing_color_read' : 'notification_listing_color_unread' }}" data-id="{{ $notification->id }}">
                              <div class="img-holder">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell" style="height: 20px; width: 20px; color: rgb(84, 95, 245);">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                 </svg>
                              </div>
                              <div class="text-holder d-flex align-items-center justify-content-between">
                                 <a data-type="header" data-status="{{$notification->is_read}}" data-url="{{$notification->target_url}}" data-id="{{$notification->id}}" href="#" class="notification-list-header"><p class="hoverable-element">{{$notification->title}} <p><b>{{$notification->formatted_created_at}}</b></p></p></a>
                                 <div class="font-sans-serif d-sm-block">
                                    <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                          <path d="M14 12a2 2 0 11-2-2 2 2 0 012 2zM4 10a2 2 0 102 2 2 2 0 00-2-2zm16 0a2 2 0 102 2 2 2 0 00-2-2z"></path>
                                       </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2 mark-as-read" data-id="{{ $notification->id }}"><a class="dropdown-item" href="#" data-id="{{ $notification->id }}">Mark as read</a></div>
                                 </div>
                              </div>
                           </div>
                           @endforeach()
                           @endif()
                           <div class="see-more-text-header">
                              <a href="{{ route('notifications') }}"><b>See More...</b></a>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item dropdown" id="itemdropdown1">
                        <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                              <span class="btn-inner">
                                 <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path
                                       d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                       fill="currentColor"></path>
                                    <path opacity="0.4"
                                       d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </span>
                           </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                           <li>
                              <span class="user_list_detail">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</span>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('privacy') }}">Privacy Setting</a>
                           </li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <!--Nav End-->
      </div>
