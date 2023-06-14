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
      <!-- Favicon -->
      <!-- <link rel="shortcut icon" href="../assets/images/favicon.ico" /> -->
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
      <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css?v=3.0.0')}}" />
      <!-- Google Font -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
   </head>
   <body class="">
    <!-- loader Start -->
    <div id="loading">
         <div class="loader simple-loader">
            <div class="loader-body">
               <img src="{{asset('assets/images/loader.webp')}}" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
            </div>
         </div>
      </div>
      <!-- loader END -->
      <aside class="sidebar sidebar-base " id="first-tour" data-toggle="main-sidebar"
         data-sidebar="responsive">
         <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{route('dashboard')}}" class="navbar-brand">
               <!--Logo start-->
               <!-- <div class="logo-main">
                  <div class="logo-normal">
                     <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                     </svg>
                  </div>
               </div> -->
               <!--logo End-->            
               <h4 class="logo-title" data-setting="app_name">BCC CRM</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
               <i class="icon">
                  <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     xmlns="">
                     <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </i>
            </div>
         </div>
         <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
               <!-- Sidebar Menu Start -->
               <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                  <li class="nav-item static-item">
                     <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                     </a>
                  </li>
                  
                  <li class="nav-item">
                     <a class="nav-link <?php if(isset($slug) && $slug == 'dashboard'){echo 'active';}?>" aria-current="page"
                        href="{{route('dashboard')}}">
                        <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">
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
                  
                  @if (Auth::user()->role == 'superadmin')
                     <li class="nav-item <?php if(isset($slug) && in_array($slug, ['add_user', 'user_list', 'edit_user'])){echo 'active';}?>">
                        <a class="nav-link <?php if(isset($slug) && $slug == 'edit_user'){echo 'active';}?>" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false"
                           aria-controls="sidebar-special">
                           <i class="icon" data-bs-toggle="tooltip" title="Users" data-bs-placement="right">
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
                        <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                           <li class="nav-item">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'add_user'){echo 'active';}?>"
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
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add Contact"
                                 data-bs-placement="right"> A </i>
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
                                 <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Contact List" data-bs-placement="right"> C
                                 </i>
                                 <span class="item-name">Contact List</span>
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-item <?php if(isset($slug) && in_array($slug, ['add_field', 'field_list', 'edit_field'])){echo 'active';}?>">
                        <a class="nav-link <?php if(isset($slug) && $slug == 'edit_field'){echo 'active';}?>" data-bs-toggle="collapse" href="#sidebar-custon-fields" role="button" aria-expanded="false"
                           aria-controls="sidebar-special">
                           <i class="icon" data-bs-toggle="tooltip" title="Custom Fields" data-bs-placement="right">
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
                        <ul class="sub-nav collapse" id="sidebar-custon-fields" data-bs-parent="#sidebar-menu">
                           <li class="nav-item">
                              <a class="nav-link <?php if(isset($slug) && $slug == 'add_field'){echo 'active';}?>"
                                 href="{{route('customfield.add')}}">
                                 <i class="icon" data-bs-toggle="tooltip" title="Chat" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                       xmlns="">
                                       <path opacity="0.4"
                                          d="M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z"
                                          fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.9805 13.2901C11.2705 13.2801 10.7005 12.7101 10.7005 12.0001C10.7005 11.3001 11.2805 10.7201 11.9805 10.7301C12.6905 10.7301 13.2605 11.3001 13.2605 12.0101C13.2605 12.7101 12.6905 13.2901 11.9805 13.2901ZM7.3701 13.2901C6.6701 13.2901 6.0901 12.7101 6.0901 12.0101C6.0901 11.3001 6.6601 10.7301 7.3701 10.7301C8.0801 10.7301 8.6501 11.3001 8.6501 12.0101C8.6501 12.7101 8.0801 13.2801 7.3701 13.2901ZM15.3103 12.0101C15.3103 12.7101 15.8803 13.2901 16.5903 13.2901C17.3003 13.2901 17.8703 12.7101 17.8703 12.0101C17.8703 11.3001 17.3003 10.7301 16.5903 10.7301C15.8803 10.7301 15.3103 11.3001 15.3103 12.0101Z"
                                          fill="currentColor" />
                                    </svg>
                                 </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add Custom Field"
                                 data-bs-placement="right"> A </i>
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
                                 <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="List of Custom Fields" data-bs-placement="right"> L
                                 </i>
                                 <span class="item-name">List of Custom Fields</span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  @endif

                  <?php
                     /*
                  ?>  
                  <li class="nav-item">
                     <a class="nav-link " aria-current="page"
                        href="#">
                        <i class="icon" data-bs-toggle="tooltip" title="Alternate Dashboard" data-bs-placement="right">
                           <svg xmlns="" width="20" viewBox="0 0 24 24" fill="none">
                              <path opacity="0.4"
                                 d="M2 4C2 2.89543 2.89543 2 4 2H9C10.1046 2 11 2.89543 11 4V20C11 21.1046 10.1046 22 9 22H4C2.89543 22 2 21.1046 2 20V4Z"
                                 fill="currentColor" />
                              <path
                                 d="M13 4C13 2.89543 13.8954 2 15 2H20C21.1046 2 22 2.89543 22 4V9C22 10.1046 21.1046 11 20 11H15C13.8954 11 13 10.1046 13 9V4Z"
                                 fill="currentColor" />
                              <path
                                 d="M13 15C13 13.8954 13.8954 13 15 13H20C21.1046 13 22 13.8954 22 15V20C22 21.1046 21.1046 22 20 22H15C13.8954 22 13 21.1046 13 20V15Z"
                                 fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Alternate Dashboard</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false"
                        aria-controls="horizontal-menu">
                        <i class="icon" data-bs-toggle="tooltip" title="Menu Style" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                 fill="currentColor"></path>
                              <path opacity="0.4"
                                 d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Pages</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('userlist')}}">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Horizontal" data-bs-placement="right">
                              H </i>
                              <span class="item-name"> User List </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('useradd')}}">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Horizontal"
                                 data-bs-placement="right"> D </i>
                              <span class="item-name">User Add</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('register')}}">
                              <i class="icon svg-icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Compact"
                                 data-bs-placement="right"> D </i>
                              <span class="item-name">User Form</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('userprofile')}}">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Boxed Horizontal"
                                 data-bs-placement="right"> B </i>
                              <span class="item-name">User Profile</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('usertable')}}">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Boxed Fancy" data-bs-placement="right">
                              B </i>
                              <span class="item-name">User Table</span>
                           </a>
                        </li>
                        
                        
                        
                        
                        
                        <li class="nav-item">
                           <a class="nav-link "
                              href="{{route('outlinedicon')}}">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Boxed Fancy" data-bs-placement="right">
                              B </i>
                              <span class="item-name">Outline Icon</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#"
                        target="_blank">
                        <i class="icon" data-bs-toggle="tooltip" title="Design System" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z"
                                 fill="currentColor"></path>
                              <path opacity="0.4"
                                 d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z"
                                 fill="currentColor"></path>
                              <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                           </svg>
                        </i>
                        <span class="item-name">Design System<span class="badge rounded-pill bg-success item-name">UI</span></span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="E-commerce" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M5.91064 20.5886C5.91064 19.7486 6.59064 19.0686 7.43064 19.0686C8.26064 19.0686 8.94064 19.7486 8.94064 20.5886C8.94064 21.4186 8.26064 22.0986 7.43064 22.0986C6.59064 22.0986 5.91064 21.4186 5.91064 20.5886ZM17.1606 20.5886C17.1606 19.7486 17.8406 19.0686 18.6806 19.0686C19.5106 19.0686 20.1906 19.7486 20.1906 20.5886C20.1906 21.4186 19.5106 22.0986 18.6806 22.0986C17.8406 22.0986 17.1606 21.4186 17.1606 20.5886Z"
                                 fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M20.1907 6.34909C20.8007 6.34909 21.2007 6.55909 21.6007 7.01909C22.0007 7.47909 22.0707 8.13909 21.9807 8.73809L21.0307 15.2981C20.8507 16.5591 19.7707 17.4881 18.5007 17.4881H7.59074C6.26074 17.4881 5.16074 16.4681 5.05074 15.1491L4.13074 4.24809L2.62074 3.98809C2.22074 3.91809 1.94074 3.52809 2.01074 3.12809C2.08074 2.71809 2.47074 2.44809 2.88074 2.50809L5.26574 2.86809C5.60574 2.92909 5.85574 3.20809 5.88574 3.54809L6.07574 5.78809C6.10574 6.10909 6.36574 6.34909 6.68574 6.34909H20.1907ZM14.1307 11.5481H16.9007C17.3207 11.5481 17.6507 11.2081 17.6507 10.7981C17.6507 10.3781 17.3207 10.0481 16.9007 10.0481H14.1307C13.7107 10.0481 13.3807 10.3781 13.3807 10.7981C13.3807 11.2081 13.7107 11.5481 14.1307 11.5481Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">E-commerce</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="e-commerce" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../e-commerce/index.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path
                                       d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Admin Dashboard"
                                 data-bs-placement="right"> AD </i>
                              <span class="item-name"> Admin Dashboard</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="#">
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
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Wishlist" data-bs-placement="right"> VD
                              </i>
                              <span class="item-name">Vendor Dashboard</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#shop-main" role="button" aria-expanded="false"
                              aria-controls="shop-main">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop" data-bs-placement="right">
                              SP
                              </i>
                              <span class="item-name">Shop</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="shop-main" data-bs-parent="#e-commerce">
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="page"
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop Main"
                                       data-bs-placement="right"> SM </i>
                                    <span class="item-name">Shop Main</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop - Left Filter"
                                       data-bs-placement="right"> SL </i>
                                    <span class="item-name">Shop - Left Filter</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shop - Right Filter"
                                       data-bs-placement="right"> SR </i>
                                    <span class="item-name">Shop - Right Filter</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link product-grid" aria-current="page"
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Product Grid View"
                                       data-bs-placement="right"> PG </i>
                                    <span class="item-name">Product Grid View</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link product-list" aria-current="page"
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Product List View"
                                       data-bs-placement="right"> PL </i>
                                    <span class="item-name">Product List View</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Categories List"
                                       data-bs-placement="right"> C </i>
                                    <span class="item-name"> Categories List</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#products" role="button" aria-expanded="false"
                              aria-controls="products">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.34 1.99976H7.67C4.28 1.99976 2 4.37976 2 7.91976V16.0898C2 19.6198 4.28 21.9998 7.67 21.9998H16.34C19.73 21.9998 22 19.6198 22 16.0898V7.91976C22 4.37976 19.73 1.99976 16.34 1.99976Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M11.1246 8.18921C11.1246 8.67121 11.5156 9.06421 11.9946 9.06421C12.4876 9.06421 12.8796 8.67121 12.8796 8.18921C12.8796 7.70721 12.4876 7.31421 12.0046 7.31421C11.5196 7.31421 11.1246 7.70721 11.1246 8.18921ZM12.8696 11.362C12.8696 10.88 12.4766 10.487 11.9946 10.487C11.5126 10.487 11.1196 10.88 11.1196 11.362V15.782C11.1196 16.264 11.5126 16.657 11.9946 16.657C12.4766 16.657 12.8696 16.264 12.8696 15.782V11.362Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Product Detail"
                                 data-bs-placement="right"> PD </i>
                              <span class="item-name">Product Details</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="products" data-bs-parent="#e-commerce">
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Product Detail"
                                       data-bs-placement="right"> P </i>
                                    <span class="item-name">Product Detail</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="3D Product Detail"
                                       data-bs-placement="right"> 3D </i>
                                    <span class="item-name">3D Product Detail</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="360 Product Detail"
                                       data-bs-placement="right"> P </i>
                                    <span class="item-name"> 360 Product Detail</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Order Process"
                                 data-bs-placement="right"> OP </i>
                              <span class="item-name">Order Process</span>
                              <div>
                                 <span class="badge bg-info rounded-pill d-inline-block">21</span>
                              </div>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Invoice" data-bs-placement="right"> I
                              </i>
                              <span class="item-name">Invoice</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M11.7761 21.8374C9.49311 20.4273 7.37081 18.7645 5.44807 16.8796C4.09069 15.5338 3.05404 13.8905 2.41735 12.0753C1.27971 8.53523 2.60399 4.48948 6.30129 3.2884C8.2528 2.67553 10.3752 3.05175 12.0072 4.29983C13.6398 3.05315 15.7616 2.67705 17.7132 3.2884C21.4105 4.48948 22.7436 8.53523 21.606 12.0753C20.9745 13.8888 19.944 15.5319 18.5931 16.8796C16.6686 18.7625 14.5465 20.4251 12.265 21.8374L12.0161 22L11.7761 21.8374Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M12.0109 22.0001L11.776 21.8375C9.49013 20.4275 7.36487 18.7648 5.43902 16.8797C4.0752 15.5357 3.03238 13.8923 2.39052 12.0754C1.26177 8.53532 2.58605 4.48957 6.28335 3.28849C8.23486 2.67562 10.3853 3.05213 12.0109 4.31067V22.0001Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M18.2304 9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Wishlist" data-bs-placement="right"> W
                              </i>
                              <span class="item-name"> Wishlist</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="#">
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
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User Profile"
                                 data-bs-placement="right"> U </i>
                              <span class="item-name"> User Profile</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
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
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right"> U
                              </i>
                              <span class="item-name">User List</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#social" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="Social" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M13.3051 5.88243V6.06547C12.8144 6.05584 12.3237 6.05584 11.8331 6.05584V5.89206C11.8331 5.22733 11.2737 4.68784 10.6064 4.68784H9.63482C8.52589 4.68784 7.62305 3.80152 7.62305 2.72254C7.62305 2.32755 7.95671 2 8.35906 2C8.77123 2 9.09508 2.32755 9.09508 2.72254C9.09508 3.01155 9.34042 3.24276 9.63482 3.24276H10.6064C12.0882 3.2524 13.2953 4.43736 13.3051 5.88243Z"
                                 fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M15.164 6.08279C15.4791 6.08712 15.7949 6.09145 16.1119 6.09469C19.5172 6.09469 22 8.52241 22 11.875V16.1813C22 19.5339 19.5172 21.9616 16.1119 21.9616C14.7478 21.9905 13.3837 22.0001 12.0098 22.0001C10.6359 22.0001 9.25221 21.9905 7.88813 21.9616C4.48283 21.9616 2 19.5339 2 16.1813V11.875C2 8.52241 4.48283 6.09469 7.89794 6.09469C9.18351 6.07542 10.4985 6.05615 11.8332 6.05615C12.3238 6.05615 12.8145 6.05615 13.3052 6.06579C13.9238 6.06579 14.5425 6.07427 15.164 6.08279ZM10.8518 14.7459H9.82139V15.767C9.82139 16.162 9.48773 16.4896 9.08538 16.4896C8.67321 16.4896 8.34936 16.162 8.34936 15.767V14.7459H7.30913C6.90677 14.7459 6.57311 14.4279 6.57311 14.0233C6.57311 13.6283 6.90677 13.3008 7.30913 13.3008H8.34936V12.2892C8.34936 11.8942 8.67321 11.5667 9.08538 11.5667C9.48773 11.5667 9.82139 11.8942 9.82139 12.2892V13.3008H10.8518C11.2542 13.3008 11.5878 13.6283 11.5878 14.0233C11.5878 14.4279 11.2542 14.7459 10.8518 14.7459ZM15.0226 13.1177H15.1207C15.5231 13.1177 15.8567 12.7998 15.8567 12.3952C15.8567 12.0002 15.5231 11.6727 15.1207 11.6727H15.0226C14.6104 11.6727 14.2866 12.0002 14.2866 12.3952C14.2866 12.7998 14.6104 13.1177 15.0226 13.1177ZM16.7007 16.4318H16.7988C17.2012 16.4318 17.5348 16.1139 17.5348 15.7092C17.5348 15.3143 17.2012 14.9867 16.7988 14.9867H16.7007C16.2885 14.9867 15.9647 15.3143 15.9647 15.7092C15.9647 16.1139 16.2885 16.4318 16.7007 16.4318Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Social</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="social" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Social Dashboard"
                                 data-bs-placement="right"> D </i>
                              <span class="item-name">Dashboard</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="#">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                       fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Newsfeed" data-bs-placement="right"> N
                              </i>
                              <span class="item-name">Newsfeed</span>
                              <div>
                                 <span class="badge bg-info d-inline-block rounded-pill">45</span>
                              </div>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#friends" role="button" aria-expanded="false"
                              aria-controls="friends">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path
                                       d="M9.34933 14.8577C5.38553 14.8577 2 15.47 2 17.9173C2 20.3665 5.364 20.9999 9.34933 20.9999C13.3131 20.9999 16.6987 20.3876 16.6987 17.9403C16.6987 15.4911 13.3347 14.8577 9.34933 14.8577Z"
                                       fill="currentColor"></path>
                                    <path opacity="0.4"
                                       d="M9.34935 12.5248C12.049 12.5248 14.2124 10.4062 14.2124 7.76241C14.2124 5.11865 12.049 3 9.34935 3C6.65072 3 4.48633 5.11865 4.48633 7.76241C4.48633 10.4062 6.65072 12.5248 9.34935 12.5248Z"
                                       fill="currentColor"></path>
                                    <path opacity="0.4"
                                       d="M16.1733 7.84873C16.1733 9.19505 15.7604 10.4513 15.0363 11.4948C14.961 11.6021 15.0275 11.7468 15.1586 11.7698C15.3406 11.7995 15.5275 11.8177 15.7183 11.8216C17.6165 11.8704 19.3201 10.6736 19.7907 8.87116C20.4884 6.19674 18.4414 3.79541 15.8338 3.79541C15.551 3.79541 15.2799 3.82416 15.0157 3.87686C14.9795 3.88453 14.9404 3.90177 14.9208 3.93244C14.8954 3.97172 14.914 4.02251 14.9394 4.05605C15.7232 5.13214 16.1733 6.44205 16.1733 7.84873Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M21.779 15.1693C21.4316 14.4439 20.593 13.9465 19.3171 13.7022C18.7153 13.5585 17.0852 13.3544 15.5695 13.3831C15.547 13.386 15.5343 13.4013 15.5324 13.4109C15.5294 13.4262 15.5363 13.4492 15.5656 13.4655C16.2662 13.8047 18.9737 15.2804 18.6332 18.3927C18.6185 18.5288 18.729 18.6438 18.867 18.6246C19.5333 18.5317 21.2476 18.1704 21.779 17.0474C22.0735 16.4533 22.0735 15.7634 21.779 15.1693Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Friends" data-bs-placement="right"> F
                              </i>
                              <span class="item-name">Friends</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="friends" data-bs-parent="#social">
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Friends List"
                                       data-bs-placement="right"> FL </i>
                                    <span class="item-name">Friend List</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Friend Request"
                                       data-bs-placement="right"> FR </i>
                                    <span class="item-name">Friend Request</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/friend-profile.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Friend Profile"
                                       data-bs-placement="right"> FP </i>
                                    <span class="item-name"> Friend Profile</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#profile" role="button" aria-expanded="false"
                              aria-controls="profile">
                              <i class="icon">
                                 <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path
                                       d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                                       fill="currentColor"></path>
                                    <path opacity="0.4"
                                       d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Profile" data-bs-placement="right"> P
                              </i>
                              <span class="item-name">Profile</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="profile" data-bs-parent="#social">
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Profile Badges"
                                       data-bs-placement="right"> PB </i>
                                    <span class="item-name">Profile Badges</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Profile Images"
                                       data-bs-placement="right"> PI </i>
                                    <span class="item-name">Profile Images</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/profile-video.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Profile Videos"
                                       data-bs-placement="right"> PV </i>
                                    <span class="item-name"> Profile video</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/birthday.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Birthday"
                                       data-bs-placement="right"> B </i>
                                    <span class="item-name">Birthday</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/notification.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Notification"
                                       data-bs-placement="right"> N </i>
                                    <span class="item-name"> Notification</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/account-setting.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Account Setting"
                                       data-bs-placement="right"> A </i>
                                    <span class="item-name">Account setting</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#event" role="button" aria-expanded="false"
                              aria-controls="event">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.34 1.99976H7.67C4.28 1.99976 2 4.37976 2 7.91976V16.0898C2 19.6198 4.28 21.9998 7.67 21.9998H16.34C19.73 21.9998 22 19.6198 22 16.0898V7.91976C22 4.37976 19.73 1.99976 16.34 1.99976Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M11.1246 8.18921C11.1246 8.67121 11.5156 9.06421 11.9946 9.06421C12.4876 9.06421 12.8796 8.67121 12.8796 8.18921C12.8796 7.70721 12.4876 7.31421 12.0046 7.31421C11.5196 7.31421 11.1246 7.70721 11.1246 8.18921ZM12.8696 11.362C12.8696 10.88 12.4766 10.487 11.9946 10.487C11.5126 10.487 11.1196 10.88 11.1196 11.362V15.782C11.1196 16.264 11.5126 16.657 11.9946 16.657C12.4766 16.657 12.8696 16.264 12.8696 15.782V11.362Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Events" data-bs-placement="right"> E
                              </i>
                              <span class="item-name">Events</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="event" data-bs-parent="#social">
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/event-list.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Profile Event"
                                       data-bs-placement="right"> P </i>
                                    <span class="item-name">Profile Event</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="#">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Event Detail"
                                       data-bs-placement="right"> E </i>
                                    <span class="item-name">Event Detail</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#group" role="button" aria-expanded="false"
                              aria-controls="group">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
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
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Groups" data-bs-placement="right"> G
                              </i>
                              <span class="item-name">Groups</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="group" data-bs-parent="#social">
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/group.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Group List"
                                       data-bs-placement="right"> G </i>
                                    <span class="item-name">Group List</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../social-app/group-detail.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Group Detail"
                                       data-bs-placement="right"> GD </i>
                                    <span class="item-name">Group Detail</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../social-app/social-profile.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M2.00018 11.0785C2.05018 13.4165 2.19018 17.4155 2.21018 17.8565C2.28118 18.7995 2.64218 19.7525 3.20418 20.4245C3.98618 21.3675 4.94918 21.7885 6.29218 21.7885C8.14818 21.7985 10.1942 21.7985 12.1812 21.7985C14.1762 21.7985 16.1122 21.7985 17.7472 21.7885C19.0712 21.7885 20.0642 21.3565 20.8362 20.4245C21.3982 19.7525 21.7592 18.7895 21.8102 17.8565C21.8302 17.4855 21.9302 13.1445 21.9902 11.0785H2.00018Z"
                                       fill="currentColor" />
                                    <path
                                       d="M11.2454 15.3842V16.6782C11.2454 17.0922 11.5814 17.4282 11.9954 17.4282C12.4094 17.4282 12.7454 17.0922 12.7454 16.6782V15.3842C12.7454 14.9702 12.4094 14.6342 11.9954 14.6342C11.5814 14.6342 11.2454 14.9702 11.2454 15.3842Z"
                                       fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M10.2113 14.5564C10.1113 14.9194 9.7623 15.1514 9.38431 15.1014C6.8333 14.7454 4.39531 13.8404 2.33731 12.4814C2.12631 12.3434 2.00031 12.1074 2.00031 11.8554V8.3894C2.00031 6.2894 3.71231 4.5814 5.81731 4.5814H7.78431C7.97231 3.1294 9.20231 2.0004 10.7043 2.0004H13.2863C14.7873 2.0004 16.0183 3.1294 16.2063 4.5814H18.1833C20.2823 4.5814 21.9903 6.2894 21.9903 8.3894V11.8554C21.9903 12.1074 21.8633 12.3424 21.6543 12.4814C19.5923 13.8464 17.1443 14.7554 14.5763 15.1104C14.5413 15.1154 14.5073 15.1174 14.4733 15.1174C14.1343 15.1174 13.8313 14.8884 13.7463 14.5524C13.5443 13.7564 12.8213 13.1994 11.9903 13.1994C11.1483 13.1994 10.4333 13.7444 10.2113 14.5564ZM13.2863 3.5004H10.7043C10.0313 3.5004 9.46931 3.9604 9.30131 4.5814H14.6883C14.5203 3.9604 13.9583 3.5004 13.2863 3.5004Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Social Profile"
                                 data-bs-placement="right"> S </i>
                              <span class="item-name">Social Profile</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#blog" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="Blog" data-bs-placement="right">
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
                        <span class="item-name">Blog</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="blog" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../blog/index.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Dashboard"
                                 data-bs-placement="right"> D </i>
                              <span class="item-name">Dashboard</span>
                           </a>
                        </li>
                        <li class="nav-item ">
                           <a class="nav-link" data-bs-toggle="collapse" href="#blog1" role="button" aria-expanded="false"
                              aria-controls="blog">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog" data-bs-placement="right"> B </i>
                              <span class="item-name">Blog</span>
                              <i class="right-icon">
                                 <svg class="submit icon-18" xmlns="" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="blog1" data-bs-parent="#blog">
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="page"
                                    href="../blog/blog-main.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Main"
                                       data-bs-placement="right">BM</i>
                                    <span class="item-name">Blog Main</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="page"
                                    href="../blog/blog-detail.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Detail"
                                       data-bs-placement="right">BD</i>
                                    <span class="item-name">Blog Details</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="page"
                                    href="../blog/blog-grid.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Grid"
                                       data-bs-placement="right">BG</i>
                                    <span class="item-name">Blog Grid</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="page"
                                    href="../blog/blog-list.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog List"
                                       data-bs-placement="right">BL</i>
                                    <span class="item-name">Blog List</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link "
                                    href="../blog/blog-trending.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Trending"
                                       data-bs-placement="right">BT</i>
                                    <span class="item-name">Blog Trending</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../blog/blog-comments.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z"
                                       fill="currentColor"></path>
                                    <path opacity="0.4"
                                       d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Comment List"
                                 data-bs-placement="right">CL</i>
                              <span class="item-name">Comments List</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="../blog/blog-category.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                       d="M5.91061 20.5885C5.91061 19.7485 6.59061 19.0685 7.43061 19.0685C8.26061 19.0685 8.94061 19.7485 8.94061 20.5885C8.94061 21.4185 8.26061 22.0985 7.43061 22.0985C6.59061 22.0985 5.91061 21.4185 5.91061 20.5885ZM17.1606 20.5885C17.1606 19.7485 17.8406 19.0685 18.6806 19.0685C19.5106 19.0685 20.1906 19.7485 20.1906 20.5885C20.1906 21.4185 19.5106 22.0985 18.6806 22.0985C17.8406 22.0985 17.1606 21.4185 17.1606 20.5885Z"
                                       fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M20.1908 6.34899C20.8008 6.34899 21.2008 6.55899 21.6008 7.01899C22.0008 7.47899 22.0708 8.13899 21.9808 8.73799L21.0308 15.298C20.8508 16.559 19.7708 17.488 18.5008 17.488H7.5908C6.2608 17.488 5.1608 16.468 5.0508 15.149L4.1308 4.24799L2.6208 3.98799C2.2208 3.91799 1.9408 3.52799 2.0108 3.12799C2.0808 2.71799 2.4708 2.44799 2.8808 2.50799L5.2658 2.86799C5.6058 2.92899 5.8558 3.20799 5.8858 3.54799L6.0758 5.78799C6.1058 6.10899 6.3658 6.34899 6.6858 6.34899H20.1908ZM14.1308 11.548H16.9008C17.3208 11.548 17.6508 11.208 17.6508 10.798C17.6508 10.378 17.3208 10.048 16.9008 10.048H14.1308C13.7108 10.048 13.3808 10.378 13.3808 10.798C13.3808 11.208 13.7108 11.548 14.1308 11.548Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Blog Category"
                                 data-bs-placement="right">BC</i>
                              <span class="item-name">Blog Category</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#appointment" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="Appointment" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M3 16.87V9.25699H21V16.931C21 20.07 19.0241 22 15.8628 22H8.12733C4.99561 22 3 20.03 3 16.87ZM7.95938 14.41C7.50494 14.431 7.12953 14.07 7.10977 13.611C7.10977 13.151 7.46542 12.771 7.91987 12.75C8.36443 12.75 8.72997 13.101 8.73985 13.55C8.7596 14.011 8.40395 14.391 7.95938 14.41ZM12.0198 14.41C11.5653 14.431 11.1899 14.07 11.1701 13.611C11.1701 13.151 11.5258 12.771 11.9802 12.75C12.4248 12.75 12.7903 13.101 12.8002 13.55C12.82 14.011 12.4643 14.391 12.0198 14.41ZM16.0505 18.09C15.596 18.08 15.2305 17.7 15.2305 17.24C15.2206 16.78 15.5862 16.401 16.0406 16.391H16.0505C16.5148 16.391 16.8902 16.771 16.8902 17.24C16.8902 17.71 16.5148 18.09 16.0505 18.09ZM11.1701 17.24C11.1899 17.7 11.5653 18.061 12.0198 18.04C12.4643 18.021 12.82 17.641 12.8002 17.181C12.7903 16.731 12.4248 16.38 11.9802 16.38C11.5258 16.401 11.1701 16.78 11.1701 17.24ZM7.09989 17.24C7.11965 17.7 7.49506 18.061 7.94951 18.04C8.39407 18.021 8.74973 17.641 8.72997 17.181C8.72009 16.731 8.35456 16.38 7.90999 16.38C7.45554 16.401 7.09989 16.78 7.09989 17.24ZM15.2404 13.601C15.2404 13.141 15.596 12.771 16.0505 12.761C16.4951 12.761 16.8507 13.12 16.8705 13.561C16.8804 14.021 16.5247 14.401 16.0801 14.41C15.6257 14.42 15.2503 14.07 15.2404 13.611V13.601Z"
                                 fill="currentColor" />
                              <path opacity="0.4"
                                 d="M3.00336 9.2569C3.0162 8.6699 3.0656 7.5049 3.15846 7.1299C3.63267 5.0209 5.24298 3.6809 7.54485 3.4899H16.4559C18.738 3.6909 20.3681 5.0399 20.8423 7.1299C20.9342 7.4949 20.9836 8.6689 20.9964 9.2569H3.00336Z"
                                 fill="currentColor" />
                              <path
                                 d="M8.30486 6.59C8.73955 6.59 9.06556 6.261 9.06556 5.82V2.771C9.06556 2.33 8.73955 2 8.30486 2C7.87017 2 7.54416 2.33 7.54416 2.771V5.82C7.54416 6.261 7.87017 6.59 8.30486 6.59Z"
                                 fill="currentColor" />
                              <path
                                 d="M15.6949 6.59C16.1197 6.59 16.4556 6.261 16.4556 5.82V2.771C16.4556 2.33 16.1197 2 15.6949 2C15.2603 2 14.9342 2.33 14.9342 2.771V5.82C14.9342 6.261 15.2603 6.59 15.6949 6.59Z"
                                 fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Appointment</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="appointment" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../appointment/index.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Appointment"
                                 data-bs-placement="right">A</i>
                              <span class="item-name">Appointment</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../appointment/book-appointment.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M3 16.87V9.25699H21V16.931C21 20.07 19.0241 22 15.8628 22H8.12733C4.99561 22 3 20.03 3 16.87ZM7.95938 14.41C7.50494 14.431 7.12953 14.07 7.10977 13.611C7.10977 13.151 7.46542 12.771 7.91987 12.75C8.36443 12.75 8.72997 13.101 8.73985 13.55C8.7596 14.011 8.40395 14.391 7.95938 14.41ZM12.0198 14.41C11.5653 14.431 11.1899 14.07 11.1701 13.611C11.1701 13.151 11.5258 12.771 11.9802 12.75C12.4248 12.75 12.7903 13.101 12.8002 13.55C12.82 14.011 12.4643 14.391 12.0198 14.41ZM16.0505 18.09C15.596 18.08 15.2305 17.7 15.2305 17.24C15.2206 16.78 15.5862 16.401 16.0406 16.391H16.0505C16.5148 16.391 16.8902 16.771 16.8902 17.24C16.8902 17.71 16.5148 18.09 16.0505 18.09ZM11.1701 17.24C11.1899 17.7 11.5653 18.061 12.0198 18.04C12.4643 18.021 12.82 17.641 12.8002 17.181C12.7903 16.731 12.4248 16.38 11.9802 16.38C11.5258 16.401 11.1701 16.78 11.1701 17.24ZM7.09989 17.24C7.11965 17.7 7.49506 18.061 7.94951 18.04C8.39407 18.021 8.74973 17.641 8.72997 17.181C8.72009 16.731 8.35456 16.38 7.90999 16.38C7.45554 16.401 7.09989 16.78 7.09989 17.24ZM15.2404 13.601C15.2404 13.141 15.596 12.771 16.0505 12.761C16.4951 12.761 16.8507 13.12 16.8705 13.561C16.8804 14.021 16.5247 14.401 16.0801 14.41C15.6257 14.42 15.2503 14.07 15.2404 13.611V13.601Z"
                                       fill="currentColor" />
                                    <path opacity="0.4"
                                       d="M3.00336 9.2569C3.0162 8.6699 3.0656 7.5049 3.15846 7.1299C3.63267 5.0209 5.24298 3.6809 7.54485 3.4899H16.4559C18.738 3.6909 20.3681 5.0399 20.8423 7.1299C20.9342 7.4949 20.9836 8.6689 20.9964 9.2569H3.00336Z"
                                       fill="currentColor" />
                                    <path
                                       d="M8.30486 6.59C8.73955 6.59 9.06556 6.261 9.06556 5.82V2.771C9.06556 2.33 8.73955 2 8.30486 2C7.87017 2 7.54416 2.33 7.54416 2.771V5.82C7.54416 6.261 7.87017 6.59 8.30486 6.59Z"
                                       fill="currentColor" />
                                    <path
                                       d="M15.6949 6.59C16.1197 6.59 16.4556 6.261 16.4556 5.82V2.771C16.4556 2.33 16.1197 2 15.6949 2C15.2603 2 14.9342 2.33 14.9342 2.771V5.82C14.9342 6.261 15.2603 6.59 15.6949 6.59Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Book Appointment"
                                 data-bs-placement="right">BA</i>
                              <span class="item-name">Book Appointment</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../appointment/doctor-visit.html">
                              <i class="icon">
                                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                       d="M9.18824 3.74722C9.18824 3.33438 8.84724 3 8.42724 3H8.42624L6.79724 3.00098C4.60624 3.00294 2.82324 4.75331 2.82324 6.90279V8.76201C2.82324 9.17386 3.16424 9.50923 3.58424 9.50923C4.00424 9.50923 4.34624 9.17386 4.34624 8.76201V6.90279C4.34624 5.57604 5.44624 4.4964 6.79824 4.49444L8.42724 4.49345C8.84824 4.49345 9.18824 4.15907 9.18824 3.74722ZM17.1931 3.00029H15.6001C15.1801 3.00029 14.8391 3.33468 14.8391 3.74751C14.8391 4.15936 15.1801 4.49277 15.6001 4.49277H17.1931C18.5501 4.49277 19.6541 5.57535 19.6541 6.90603V8.7623C19.6541 9.17415 19.9951 9.50952 20.4151 9.50952C20.8361 9.50952 21.1761 9.17415 21.1761 8.7623V6.90603C21.1761 4.75165 19.3901 3.00029 17.1931 3.00029ZM9.23804 6.74266H14.762C15.367 6.74266 15.948 6.98094 16.371 7.40554C16.797 7.83407 17.033 8.40968 17.032 9.00883V10.2542C17.027 10.4003 16.908 10.5189 16.759 10.5229H7.23904C7.09104 10.518 6.97204 10.3993 6.96904 10.2542V9.00883C6.95804 7.76837 7.97404 6.75541 9.23804 6.74266Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M22.239 12.0413H1.762C1.342 12.0413 1 12.3756 1 12.7885C1 13.2003 1.342 13.5337 1.762 13.5337H2.823V17.0972C2.823 19.2467 4.607 20.9971 6.798 20.999L8.427 21C8.848 21 9.188 20.6656 9.189 20.2528C9.189 19.841 8.848 19.5066 8.428 19.5066L6.8 19.5056C5.447 19.5036 4.346 18.424 4.346 17.0972V13.5337H6.969V14.5251C6.959 15.7656 7.974 16.7795 9.238 16.7913H14.762C16.027 16.7795 17.042 15.7656 17.032 14.5251V13.5337H19.655V17.0933C19.655 18.425 18.551 19.5066 17.194 19.5066H15.601C15.18 19.5066 14.839 19.841 14.839 20.2528C14.839 20.6656 15.18 21 15.601 21H17.194C19.39 21 21.177 19.2487 21.177 17.0933V13.5337H22.239C22.659 13.5337 23 13.2003 23 12.7885C23 12.3756 22.659 12.0413 22.239 12.0413Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Doctor Visit"
                                 data-bs-placement="right"> DV </i>
                              <span class="item-name">Doctor Visit</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#file-manager" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="File Manager" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                              xmlns="">
                              <path opacity="0.4"
                                 d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z"
                                 fill="currentColor" />
                              <path opacity="0.4"
                                 d="M16.084 2.56729C15.785 2.25629 15.263 2.47029 15.263 2.90129V5.53829C15.263 6.64429 16.174 7.55429 17.28 7.55429C17.977 7.56229 18.945 7.56429 19.767 7.56229C20.188 7.56129 20.402 7.05829 20.11 6.75429C19.055 5.65729 17.166 3.69129 16.084 2.56729Z"
                                 fill="currentColor" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8.9739 11.3876H12.3589C12.7699 11.3876 13.1039 11.0546 13.1039 10.6436C13.1039 10.2326 12.7699 9.89861 12.3589 9.89861H8.9739C8.5629 9.89861 8.2299 10.2326 8.2299 10.6436C8.2299 11.0546 8.5629 11.3876 8.9739 11.3876ZM8.974 16.3818H14.418C14.829 16.3818 15.163 16.0488 15.163 15.6378C15.163 15.2268 14.829 14.8928 14.418 14.8928H8.974C8.563 14.8928 8.23 15.2268 8.23 15.6378C8.23 16.0488 8.563 16.3818 8.974 16.3818Z"
                                 fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">File Manager</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="file-manager" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../file-manager/index.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                       fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="File Manager - Dashboard"
                                 data-bs-placement="right">D</i>
                              <span class="item-name">Dashboard</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../file-manager/image-folder.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path
                                       d="M21.9999 14.7024V16.0859C21.9999 16.3155 21.9899 16.5471 21.9698 16.7767C21.6893 19.9357 19.4949 22 16.3286 22H7.67125C6.06804 22 4.71534 21.4797 3.74339 20.5363C3.36263 20.1864 3.04199 19.7753 2.79149 19.3041C3.12215 18.9021 3.49289 18.462 3.85361 18.0208C4.46484 17.289 5.05602 16.5661 5.42676 16.0959C5.97786 15.4142 7.43077 13.6196 9.4448 14.4617C9.85562 14.6322 10.2163 14.8728 10.547 15.0833C11.3586 15.6247 11.6993 15.7851 12.2704 15.4743C12.9017 15.1335 13.3125 14.4617 13.7434 13.76C13.9739 13.388 14.2043 13.0281 14.4548 12.6972C15.547 11.2736 17.2304 10.8926 18.6332 11.7348C19.3346 12.1559 19.9358 12.6872 20.4969 13.2276C20.6171 13.3479 20.7374 13.4592 20.8476 13.5695C20.9979 13.7198 21.4989 14.2211 21.9999 14.7024Z"
                                       fill="currentColor" />
                                    <path opacity="0.4"
                                       d="M16.3387 2H7.67134C4.27455 2 2 4.37607 2 7.91411V16.086C2 17.3181 2.28056 18.4119 2.79158 19.3042C3.12224 18.9022 3.49299 18.4621 3.85371 18.0199C4.46493 17.2891 5.05611 16.5662 5.42685 16.096C5.97796 15.4143 7.43086 13.6197 9.44489 14.4618C9.85571 14.6323 10.2164 14.8729 10.5471 15.0834C11.3587 15.6248 11.6994 15.7852 12.2705 15.4734C12.9018 15.1336 13.3126 14.4618 13.7435 13.759C13.9739 13.3881 14.2044 13.0282 14.4549 12.6973C15.5471 11.2737 17.2305 10.8927 18.6333 11.7349C19.3347 12.1559 19.9359 12.6873 20.497 13.2277C20.6172 13.348 20.7375 13.4593 20.8477 13.5696C20.998 13.7189 21.499 14.2202 22 14.7025V7.91411C22 4.37607 19.7255 2 16.3387 2Z"
                                       fill="currentColor" />
                                    <path
                                       d="M11.4544 8.79665C11.4544 10.2053 10.2811 11.3782 8.87325 11.3782C7.46644 11.3782 6.29309 10.2053 6.29309 8.79665C6.29309 7.38906 7.46644 6.21506 8.87325 6.21506C10.2811 6.21506 11.4544 7.38906 11.4544 8.79665Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Images" data-bs-placement="right">I</i>
                              <span class="item-name">Images</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../file-manager/video-folder.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M22 12.0048C22 17.5137 17.5116 22 12 22C6.48842 22 2 17.5137 2 12.0048C2 6.48625 6.48842 2 12 2C17.5116 2 22 6.48625 22 12.0048Z"
                                       fill="currentColor" />
                                    <path
                                       d="M16 12.0049C16 12.2576 15.9205 12.5113 15.7614 12.7145C15.7315 12.7543 15.5923 12.9186 15.483 13.0255L15.4233 13.0838C14.5881 13.9694 12.5099 15.3011 11.456 15.7278C11.456 15.7375 10.8295 15.9913 10.5312 16H10.4915C10.0341 16 9.60653 15.7482 9.38778 15.34C9.26847 15.1154 9.15909 14.4642 9.14915 14.4554C9.05966 13.8712 9 12.9769 9 11.9951C9 10.9657 9.05966 10.0316 9.16903 9.45808C9.16903 9.44836 9.27841 8.92345 9.34801 8.74848C9.45739 8.49672 9.65625 8.2819 9.90483 8.14581C10.1037 8.04957 10.3125 8 10.5312 8C10.7599 8.01069 11.1875 8.15553 11.3565 8.22357C12.4702 8.65128 14.598 10.051 15.4134 10.9064C15.5526 11.0425 15.7017 11.2087 15.7415 11.2467C15.9105 11.4605 16 11.723 16 12.0049Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Videos" data-bs-placement="right">V</i>
                              <span class="item-name">Videos</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../file-manager/document-folder.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z"
                                       fill="#currentColor" />
                                    <path opacity="0.4"
                                       d="M16.084 2.56729C15.785 2.25629 15.263 2.47029 15.263 2.90129V5.53829C15.263 6.64429 16.174 7.55429 17.28 7.55429C17.977 7.56229 18.945 7.56429 19.767 7.56229C20.188 7.56129 20.402 7.05829 20.11 6.75429C19.055 5.65729 17.166 3.69129 16.084 2.56729Z"
                                       fill="#currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8.9739 11.3876H12.3589C12.7699 11.3876 13.1039 11.0546 13.1039 10.6436C13.1039 10.2326 12.7699 9.89861 12.3589 9.89861H8.9739C8.5629 9.89861 8.2299 10.2326 8.2299 10.6436C8.2299 11.0546 8.5629 11.3876 8.9739 11.3876ZM8.974 16.3818H14.418C14.829 16.3818 15.163 16.0488 15.163 15.6378C15.163 15.2268 14.829 14.8928 14.418 14.8928H8.974C8.563 14.8928 8.23 15.2268 8.23 15.6378C8.23 16.0488 8.563 16.3818 8.974 16.3818Z"
                                       fill="#currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Documents"
                                 data-bs-placement="right">D</i>
                              <span class="item-name">Documents</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="../file-manager/all-files.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                       fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M20.8321 6.54346C21.1521 6.91754 21.3993 7.34785 21.5612 7.81235C21.8798 8.76704 22.0273 9.77029 21.9969 10.7761V16.0291C21.9956 16.4716 21.963 16.9134 21.8991 17.3512C21.7775 18.124 21.5057 18.8655 21.0989 19.5341C20.9119 19.8571 20.6849 20.1552 20.4231 20.4214C19.2383 21.5089 17.665 22.0749 16.0574 21.992H7.93061C6.32049 22.0743 4.74462 21.5085 3.55601 20.4214C3.2974 20.1547 3.07337 19.8566 2.88915 19.5341C2.48475 18.866 2.21869 18.1237 2.1067 17.3512C2.03549 16.9141 1.99981 16.472 2 16.0291V10.7761C1.99983 10.3373 2.02357 9.89895 2.07113 9.4628C2.08113 9.38628 2.09614 9.31101 2.11098 9.23652C2.13573 9.11233 2.16005 8.99031 2.16005 8.86829C2.25031 8.34196 2.41496 7.83108 2.64908 7.35094C3.34261 5.86908 4.76525 5.11484 7.09481 5.11484H16.8754C18.1802 5.01393 19.4753 5.40673 20.5032 6.21514C20.6215 6.31552 20.7316 6.42532 20.8321 6.54346ZM6.97033 15.5411H17.0355H17.0533C17.2741 15.5507 17.4896 15.4716 17.6517 15.3216C17.8137 15.1715 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3576 17.7379 14.2101C17.5924 14.0118 17.3618 13.8934 17.1155 13.8906H6.97033C6.51365 13.8906 6.14343 14.2601 6.14343 14.7159C6.14343 15.1716 6.51365 15.5411 6.97033 15.5411Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="All Files"
                                 data-bs-placement="right">AF</i>
                              <span class="item-name">All Files</span>
                              <div>
                                 <span class="badge bg-warning d-inline-block rounded-pill">21</span>
                              </div>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " aria-current="page"
                              href="../file-manager/trash.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M19.6433 9.48844C19.6433 9.55644 19.1103 16.2972 18.8059 19.1341C18.6153 20.875 17.493 21.931 15.8095 21.961C14.516 21.99 13.2497 22 12.0039 22C10.6812 22 9.38772 21.99 8.13215 21.961C6.50507 21.922 5.38177 20.845 5.20088 19.1341C4.88772 16.2872 4.36448 9.55644 4.35476 9.48844C4.34503 9.28345 4.41117 9.08846 4.54538 8.93046C4.67765 8.78447 4.86827 8.69647 5.06861 8.69647H18.9392C19.1385 8.69647 19.3194 8.78447 19.4624 8.93046C19.5956 9.08846 19.6627 9.28345 19.6433 9.48844Z"
                                       fill="currentColor" />
                                    <path
                                       d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Trash" data-bs-placement="right">T</i>
                              <span class="item-name">Trash</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " aria-current="page"
                        href="../chat/index.html" target="_blank">
                        <i class="icon" data-bs-toggle="tooltip" title="Chat" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                              xmlns="">
                              <path opacity="0.4"
                                 d="M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z"
                                 fill="currentColor" />
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M11.9805 13.2901C11.2705 13.2801 10.7005 12.7101 10.7005 12.0001C10.7005 11.3001 11.2805 10.7201 11.9805 10.7301C12.6905 10.7301 13.2605 11.3001 13.2605 12.0101C13.2605 12.7101 12.6905 13.2901 11.9805 13.2901ZM7.3701 13.2901C6.6701 13.2901 6.0901 12.7101 6.0901 12.0101C6.0901 11.3001 6.6601 10.7301 7.3701 10.7301C8.0801 10.7301 8.6501 11.3001 8.6501 12.0101C8.6501 12.7101 8.0801 13.2801 7.3701 13.2901ZM15.3103 12.0101C15.3103 12.7101 15.8803 13.2901 16.5903 13.2901C17.3003 13.2901 17.8703 12.7101 17.8703 12.0101C17.8703 11.3001 17.3003 10.7301 16.5903 10.7301C15.8803 10.7301 15.3103 11.3001 15.3103 12.0101Z"
                                 fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Chat</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#mail" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="Mail" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                              xmlns="">
                              <path opacity="0.4"
                                 d="M21.9999 15.9402C21.9999 18.7302 19.7599 20.9902 16.9699 21.0002H16.9599H7.04991C4.26991 21.0002 1.99991 18.7502 1.99991 15.9602V15.9502C1.99991 15.9502 2.00591 11.5242 2.01391 9.29821C2.01491 8.88021 2.49491 8.64621 2.82191 8.90621C5.19791 10.7912 9.44691 14.2282 9.49991 14.2732C10.2099 14.8422 11.1099 15.1632 12.0299 15.1632C12.9499 15.1632 13.8499 14.8422 14.5599 14.2622C14.6129 14.2272 18.7669 10.8932 21.1789 8.97721C21.5069 8.71621 21.9889 8.95021 21.9899 9.36721C21.9999 11.5762 21.9999 15.9402 21.9999 15.9402Z"
                                 fill="currentColor" />
                              <path
                                 d="M21.476 5.6736C20.61 4.0416 18.906 2.9996 17.03 2.9996H7.05001C5.17401 2.9996 3.47001 4.0416 2.60401 5.6736C2.41001 6.0386 2.50201 6.4936 2.82501 6.7516L10.25 12.6906C10.77 13.1106 11.4 13.3196 12.03 13.3196C12.034 13.3196 12.037 13.3196 12.04 13.3196C12.043 13.3196 12.047 13.3196 12.05 13.3196C12.68 13.3196 13.31 13.1106 13.83 12.6906L21.255 6.7516C21.578 6.4936 21.67 6.0386 21.476 5.6736Z"
                                 fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Mail</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="mail" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link " href="../mail/index.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M21.9999 15.9402C21.9999 18.7302 19.7599 20.9902 16.9699 21.0002H16.9599H7.04991C4.26991 21.0002 1.99991 18.7502 1.99991 15.9602V15.9502C1.99991 15.9502 2.00591 11.5242 2.01391 9.29821C2.01491 8.88021 2.49491 8.64621 2.82191 8.90621C5.19791 10.7912 9.44691 14.2282 9.49991 14.2732C10.2099 14.8422 11.1099 15.1632 12.0299 15.1632C12.9499 15.1632 13.8499 14.8422 14.5599 14.2622C14.6129 14.2272 18.7669 10.8932 21.1789 8.97721C21.5069 8.71621 21.9889 8.95021 21.9899 9.36721C21.9999 11.5762 21.9999 15.9402 21.9999 15.9402Z"
                                       fill="currentColor" />
                                    <path
                                       d="M21.476 5.6736C20.61 4.0416 18.906 2.9996 17.03 2.9996H7.05001C5.17401 2.9996 3.47001 4.0416 2.60401 5.6736C2.41001 6.0386 2.50201 6.4936 2.82501 6.7516L10.25 12.6906C10.77 13.1106 11.4 13.3196 12.03 13.3196C12.034 13.3196 12.037 13.3196 12.04 13.3196C12.043 13.3196 12.047 13.3196 12.05 13.3196C12.68 13.3196 13.31 13.1106 13.83 12.6906L21.255 6.7516C21.578 6.4936 21.67 6.0386 21.476 5.6736Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Mail" data-bs-placement="right">M</i>
                              <span class="item-name">Mail</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../mail/email-compose.html">
                              <i class="icon">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M19.9926 18.9532H14.2983C13.7427 18.9532 13.2909 19.4123 13.2909 19.9766C13.2909 20.5421 13.7427 21 14.2983 21H19.9926C20.5481 21 21 20.5421 21 19.9766C21 19.4123 20.5481 18.9532 19.9926 18.9532Z"
                                       fill="currentColor" />
                                    <path
                                       d="M10.309 6.90388L15.7049 11.264C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8345 7.72908 20.8452L4.23696 20.8882C4.05071 20.8904 3.88775 20.7614 3.84542 20.5765L3.05175 17.1258C2.91419 16.4916 3.05175 15.8358 3.45388 15.3306L9.88256 6.95548C9.98627 6.82111 10.1778 6.79746 10.309 6.90388Z"
                                       fill="currentColor" />
                                    <path opacity="0.4"
                                       d="M18.1206 8.66544L17.0804 9.96401C16.9756 10.0962 16.7872 10.1177 16.6571 10.0124C15.3925 8.98901 12.1544 6.36285 11.2559 5.63509C11.1247 5.52759 11.1067 5.33625 11.2125 5.20295L12.2157 3.95706C13.1258 2.78534 14.7131 2.67784 15.9936 3.69906L17.4645 4.87078C18.0677 5.34377 18.4698 5.96726 18.6074 6.62299C18.7661 7.3443 18.5968 8.0527 18.1206 8.66544Z"
                                       fill="currentColor" />
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Email Compose"
                                 data-bs-placement="right">EC</i>
                              <span class="item-name">Email Compose</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <hr class="hr-horizontal">
                  </li>
                  <li class="nav-item static-item">
                     <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                     <span class="default-icon">Pages</span>
                     <span class="mini-icon">-</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false"
                        aria-controls="sidebar-special">
                        <i class="icon" data-bs-toggle="tooltip" title="Spacial Pages" data-bs-placement="right">
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
                        <span class="item-name">Special Pages</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/special-pages/billing.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Billing"
                                 data-bs-placement="right">B</i>
                              <span class="item-name">Billing</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/special-pages/calender.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Calender"
                                 data-bs-placement="right">C</i>
                              <span class="item-name">Calender</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/special-pages/kanban.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="kanban" data-bs-placement="right">K</i>
                              <span class="item-name">kanban</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/special-pages/pricing.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Pricing"
                                 data-bs-placement="right">P</i>
                              <span class="item-name">Pricing</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/special-pages/timeline.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Timeline"
                                 data-bs-placement="right">T</i>
                              <span class="item-name">Timeline</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth" role="button" aria-expanded="false"
                        aria-controls="sidebar-user">
                        <i class="icon" data-bs-toggle="tooltip" title="Auth Skins" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Auth Skins</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-auth" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth1" role="button" aria-expanded="false"
                              aria-controls="sidebar-user">
                              <i class="icon" data-bs-toggle="tooltip" title="Default" data-bs-placement="right">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Default"
                                 data-bs-placement="right">DE</i>
                              <span class="item-name">Default</span>
                              <i class="right-icon">
                                 <svg xmlns="" width="18" class="icon-18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="sidebar-auth1" data-bs-parent="#sidebar-auth">
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth/sign-in.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Login"
                                       data-bs-placement="right">L</i>
                                    <span class="item-name">Login</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth/sign-up.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Register"
                                       data-bs-placement="right">R</i>
                                    <span class="item-name">Register</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth/confirm-mail.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Confirm Mail"
                                       data-bs-placement="right">CM</i>
                                    <span class="item-name">Confirm Mail</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth/lock-screen.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Lock Screen"
                                       data-bs-placement="right">LS</i>
                                    <span class="item-name">Lock Screen</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth/recoverpw.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Recover Password"
                                       data-bs-placement="right"> R </i>
                                    <span class="item-name">Recover password</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth2" role="button" aria-expanded="false"
                              aria-controls="sidebar-user">
                              <i class="icon" data-bs-toggle="tooltip" title="Animated" data-bs-placement="right">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Animated"
                                 data-bs-placement="right">AN</i>
                              <span class="item-name">Animated</span>
                              <i class="right-icon">
                                 <svg xmlns="" width="18" class="icon-18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="sidebar-auth2" data-bs-parent="#sidebar-auth">
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/sign-in.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign In"
                                       data-bs-placement="right"> SI </i>
                                    <span class="item-name">Sign in</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/sign-up.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign up"
                                       data-bs-placement="right"> S </i>
                                    <span class="item-name">Sign up</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/email.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Email"
                                       data-bs-placement="right"> E </i>
                                    <span class="item-name">Email</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/lock-screen.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Lock Screen "
                                       data-bs-placement="right"> LS </i>
                                    <span class="item-name">Lock Screen</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/reset-password.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Reset Password"
                                       data-bs-placement="right"> RP </i>
                                    <span class="item-name">Reset Password</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/two-factor.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Two Factor"
                                       data-bs-placement="right"> TF </i>
                                    <span class="item-name">Two Factor</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/auth-pro/account-deactivate.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Account Deactivate"
                                       data-bs-placement="right"> AD </i>
                                    <span class="item-name">Account deactivate</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth3" role="button" aria-expanded="false"
                              aria-controls="sidebar-user">
                              <i class="icon" data-bs-toggle="tooltip" title="Popup" data-bs-placement="right">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Popup" data-bs-placement="right">PP</i>
                              <span class="item-name">Popup</span>
                              <i class="right-icon">
                                 <svg xmlns="" width="18" class="icon-18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="sidebar-auth3" data-bs-parent="#sidebar-auth">
                              <li class="nav-item">
                                 <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign In"
                                       data-bs-placement="right"> SI </i>
                                    <span class="item-name">Sign In</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign Up"
                                       data-bs-placement="right"> SU </i>
                                    <span class="item-name">Sign Up</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth4" role="button" aria-expanded="false"
                              aria-controls="sidebar-user">
                              <i class="icon" data-bs-toggle="tooltip" title="Simple" data-bs-placement="right">
                                 <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path opacity="0.4"
                                       d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                       fill="currentColor"></path>
                                    <path
                                       d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Simple"
                                 data-bs-placement="right">SM</i>
                              <span class="item-name">Simple</span>
                              <i class="right-icon">
                                 <svg xmlns="" width="18" class="icon-18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                              </i>
                           </a>
                           <ul class="sub-nav collapse" id="sidebar-auth4" data-bs-parent="#sidebar-auth">
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/simple-auth-pro/sign-in.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign In"
                                       data-bs-placement="right"> S </i>
                                    <span class="item-name">Sign In</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../dashboard/simple-auth-pro/sign-up.html">
                                    <i class="icon">
                                       <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                          xmlns="">
                                          <g>
                                             <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                          </g>
                                       </svg>
                                    </i>
                                    <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sign Up"
                                       data-bs-placement="right"> SU </i>
                                    <span class="item-name">Sign Up</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false"
                        aria-controls="sidebar-user">
                        <i class="icon" data-bs-toggle="tooltip" title="Users" data-bs-placement="right">
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
                        <span class="item-name">Users</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/app/user-profile.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User Profile"
                                 data-bs-placement="right"> U </i>
                              <span class="item-name">User Profile</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/app/user-add.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add User" data-bs-placement="right"> A
                              </i>
                              <span class="item-name">Add User</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/app/user-list.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right"> U
                              </i>
                              <span class="item-name">User List</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#utilities-error" role="button" aria-expanded="false"
                        aria-controls="utilities-error">
                        <i class="icon" data-bs-toggle="tooltip" title="Utilities" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M11.9912 18.6215L5.49945 21.864C5.00921 22.1302 4.39768 21.9525 4.12348 21.4643C4.0434 21.3108 4.00106 21.1402 4 20.9668V13.7087C4 14.4283 4.40573 14.8725 5.47299 15.37L11.9912 18.6215Z"
                                 fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8.89526 2H15.0695C17.7773 2 19.9735 3.06605 20 5.79337V20.9668C19.9989 21.1374 19.9565 21.3051 19.8765 21.4554C19.7479 21.7007 19.5259 21.8827 19.2615 21.9598C18.997 22.0368 18.7128 22.0023 18.4741 21.8641L11.9912 18.6215L5.47299 15.3701C4.40573 14.8726 4 14.4284 4 13.7088V5.79337C4 3.06605 6.19625 2 8.89526 2ZM8.22492 9.62227H15.7486C16.1822 9.62227 16.5336 9.26828 16.5336 8.83162C16.5336 8.39495 16.1822 8.04096 15.7486 8.04096H8.22492C7.79137 8.04096 7.43991 8.39495 7.43991 8.83162C7.43991 9.26828 7.79137 9.62227 8.22492 9.62227Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Utilities</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="utilities-error" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/errors/error404.html">
                              <i class="icon" data-bs-toggle="tooltip" title="Error 404" data-bs-placement="right">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <span class="item-name">Error 404</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/errors/error500.html">
                              <i class="icon" data-bs-toggle="tooltip" title="Error 500" data-bs-placement="right">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <span class="item-name">Error 500</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/errors/maintenance.html">
                              <i class="icon" data-bs-toggle="tooltip" title="Maintenance" data-bs-placement="right">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <span class="item-name">Maintenance</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-plugins" role="button" aria-expanded="false"
                        aria-controls="sidebar-user">
                        <i class="icon" data-bs-toggle="tooltip" title="Plugins" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Plugins</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-plugins" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/apexcharts.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Apexcharts" data-bs-placement="right">
                              A </i>
                              <span class="item-name">Apexcharts</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/button-hover.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Button Hover"
                                 data-bs-placement="right"> BH </i>
                              <span class="item-name">Button Hover </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/tree-view.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Button Hover"
                                 data-bs-placement="right"> TV </i>
                              <span class="item-name">Treeview</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/choise-js.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Choice JS" data-bs-placement="right"> C
                              </i>
                              <span class="item-name">Choice JS</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/flatpickr.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Flatpickr" data-bs-placement="right"> F
                              </i>
                              <span class="item-name">Flatpickr </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/fslightbox.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="FSlightbox" data-bs-placement="right">
                              F </i>
                              <span class="item-name">FSlightbox </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/gallery-hover.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Gallery Hover"
                                 data-bs-placement="right"> G </i>
                              <span class="item-name">Gallery Hover </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/image-croper.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Image Croper"
                                 data-bs-placement="right"> I </i>
                              <span class="item-name">Image Croper </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/loader.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Loader" data-bs-placement="right"> L
                              </i>
                              <span class="item-name">Loader </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/rating.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Rating" data-bs-placement="right"> R
                              </i>
                              <span class="item-name">Rating</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/select2.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Select2" data-bs-placement="right"> S
                              </i>
                              <span class="item-name">Select2 </span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/sweet-alert.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sweet Alert" data-bs-placement="right">
                              S </i>
                              <span class="item-name">Sweet Alert</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/quill-editor.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="quill-editor"
                                 data-bs-placement="right"> T </i>
                              <span class="item-name">Quill</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/plugins/uppy.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Uppy" data-bs-placement="right"> U </i>
                              <span class="item-name">Uppy</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link "
                        href="../dashboard/blank-page.html">
                        <i class="icon" data-bs-toggle="tooltip" title="Blank Page" data-bs-placement="right">
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
                        <span class="item-name">Blank Page</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="../dashboard/admin.html">
                        <i class="icon" data-bs-toggle="tooltip" title="Admin & Permission" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                 fill="currentColor"></path>
                              <path opacity="0.4"
                                 d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Admin</span>
                     </a>
                  </li>
                  <li>
                     <hr class="hr-horizontal">
                  </li>
                  <li class="nav-item static-item">
                     <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                     <span class="default-icon">Elements</span>
                     <span class="mini-icon" data-bs-toggle="tooltip" title="Elements" data-bs-placement="right">-</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="../">
                        <i class="icon" data-bs-toggle="tooltip" title="Components" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z"
                                 fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z"
                                 fill="currentColor">
                              </path>
                           </svg>
                        </i>
                        <span class="item-name">Components</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link "
                        href="../dashboard/plugins/ui-color.html">
                        <i class="icon" data-bs-toggle="tooltip" title="Colors" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M13.7505 9.70303V7.68318C13.354 7.68318 13.0251 7.36377 13.0251 6.97859V4.57356C13.0251 4.2532 12.764 4.00049 12.4352 4.00049H5.7911C3.70213 4.00049 2 5.653 2 7.68318V10.1155C2 10.3043 2.07737 10.4828 2.21277 10.6143C2.34816 10.7449 2.53191 10.8201 2.72534 10.8201C3.46035 10.8201 4.02128 11.3274 4.02128 11.9944C4.02128 12.6905 3.45068 13.2448 2.73501 13.2533C2.33849 13.2533 2 13.5257 2 13.9203V16.3262C2 18.3555 3.70213 19.9995 5.78143 19.9995H12.4352C12.764 19.9995 13.0251 19.745 13.0251 19.4265V17.3963C13.0251 17.0027 13.354 16.6917 13.7505 16.6917V14.8701C13.354 14.8701 13.0251 14.5497 13.0251 14.1655V10.4076C13.0251 10.0224 13.354 9.70303 13.7505 9.70303Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M19.9787 11.9948C19.9787 12.69 20.559 13.2443 21.265 13.2537C21.6615 13.2537 22 13.5262 22 13.9113V16.3258C22 18.3559 20.3075 20 18.2186 20H15.0658C14.7466 20 14.4758 19.7454 14.4758 19.426V17.3967C14.4758 17.0022 14.1567 16.6921 13.7505 16.6921V14.8705C14.1567 14.8705 14.4758 14.5502 14.4758 14.1659V10.4081C14.4758 10.022 14.1567 9.70348 13.7505 9.70348V7.6827C14.1567 7.6827 14.4758 7.36328 14.4758 6.9781V4.57401C14.4758 4.25366 14.7466 4 15.0658 4H18.2186C20.3075 4 22 5.64406 22 7.6733V10.0407C22 10.2286 21.9226 10.4081 21.7872 10.5387C21.6518 10.6702 21.4681 10.7453 21.2747 10.7453C20.559 10.7453 19.9787 11.31 19.9787 11.9948Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Colors</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-widget" role="button" aria-expanded="false"
                        aria-controls="sidebar-widget">
                        <i class="icon" data-bs-toggle="tooltip" title="Widgets" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M21.25 13.4764C20.429 13.4764 19.761 12.8145 19.761 12.001C19.761 11.1865 20.429 10.5246 21.25 10.5246C21.449 10.5246 21.64 10.4463 21.78 10.3076C21.921 10.1679 22 9.97864 22 9.78146L21.999 7.10415C21.999 4.84102 20.14 3 17.856 3H6.144C3.86 3 2.001 4.84102 2.001 7.10415L2 9.86766C2 10.0648 2.079 10.2541 2.22 10.3938C2.36 10.5325 2.551 10.6108 2.75 10.6108C3.599 10.6108 4.239 11.2083 4.239 12.001C4.239 12.8145 3.571 13.4764 2.75 13.4764C2.336 13.4764 2 13.8093 2 14.2195V16.8949C2 19.158 3.858 21 6.143 21H17.857C20.142 21 22 19.158 22 16.8949V14.2195C22 13.8093 21.664 13.4764 21.25 13.4764Z"
                                 fill="currentColor"></path>
                              <path
                                 d="M15.4303 11.5887L14.2513 12.7367L14.5303 14.3597C14.5783 14.6407 14.4653 14.9177 14.2343 15.0837C14.0053 15.2517 13.7063 15.2727 13.4543 15.1387L11.9993 14.3737L10.5413 15.1397C10.4333 15.1967 10.3153 15.2267 10.1983 15.2267C10.0453 15.2267 9.89434 15.1787 9.76434 15.0847C9.53434 14.9177 9.42134 14.6407 9.46934 14.3597L9.74734 12.7367L8.56834 11.5887C8.36434 11.3907 8.29334 11.0997 8.38134 10.8287C8.47034 10.5587 8.70034 10.3667 8.98134 10.3267L10.6073 10.0897L11.3363 8.61268C11.4633 8.35868 11.7173 8.20068 11.9993 8.20068H12.0013C12.2843 8.20168 12.5383 8.35968 12.6633 8.61368L13.3923 10.0897L15.0213 10.3277C15.2993 10.3667 15.5293 10.5587 15.6173 10.8287C15.7063 11.0997 15.6353 11.3907 15.4303 11.5887Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Widgets</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-widget" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/widget/widgetbasic.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Widget Basic"
                                 data-bs-placement="right"> WB </i>
                              <span class="item-name">Widget Basic</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/widget/widgetchart.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Widget Chart"
                                 data-bs-placement="right"> WC </i>
                              <span class="item-name">Widget Chart</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/widget/widgetcard.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Widget Card" data-bs-placement="right">
                              WC </i>
                              <span class="item-name">Widget Card</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-maps" role="button" aria-expanded="false"
                        aria-controls="sidebar-maps">
                        <i class="icon" data-bs-toggle="tooltip" title="Maps" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z"
                                 fill="currentColor"></path>
                              <ellipse opacity="0.4" cx="12" cy="21" rx="5" ry="1" fill="currentColor"></ellipse>
                           </svg>
                        </i>
                        <span class="item-name">Maps</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-maps" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/maps/google.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Google" data-bs-placement="right"> G
                              </i>
                              <span class="item-name">Google</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/maps/vector.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Vector" data-bs-placement="right"> V
                              </i>
                              <span class="item-name">Vector</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-form" role="button" aria-expanded="false"
                        aria-controls="sidebar-form">
                        <i class="icon" data-bs-toggle="tooltip" title="Form" data-bs-placement="right">
                           <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="">
                              <path opacity="0.4"
                                 d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                 fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                                 fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Form</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-form" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/form/form-element.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Elements" data-bs-placement="right"> E
                              </i>
                              <span class="item-name">Elements</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/form/form-wizard.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Wizard" data-bs-placement="right"> W
                              </i>
                              <span class="item-name">Wizard</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/form/form-validation.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Validation" data-bs-placement="right">
                              V </i>
                              <span class="item-name">Validation</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-table" role="button" aria-expanded="false"
                        aria-controls="sidebar-table">
                        <i class="icon" data-bs-toggle="tooltip" title="Table" data-bs-placement="right">
                           <svg class="icon-20" xmlns="" width="20" viewBox="0 0 24 24" fill="none">
                              <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z"
                                 fill="currentColor" stroke="currentColor" />
                              <path
                                 d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20"
                                 stroke="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Table</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-table" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/table/bootstrap-table.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Bootstrap Table"
                                 data-bs-placement="right"> BT </i>
                              <span class="item-name">Bootstrap Table</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/table/table-data.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Datatable" data-bs-placement="right"> D
                              </i>
                              <span class="item-name">Datatable</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/table/border-table.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Bordered Table"
                                 data-bs-placement="right"> BT </i>
                              <span class="item-name">Bordered Table</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/table/fancy-table.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Fancy Table" data-bs-placement="right">
                              F </i>
                              <span class="item-name">Fancy Table</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/table/fixed-table.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Fixed Table" data-bs-placement="right">
                              FT </i>
                              <span class="item-name">Fixed Table</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item mb-4">
                     <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-icons" role="button" aria-expanded="false"
                        aria-controls="sidebar-icons">
                        <i class="icon" data-bs-toggle="tooltip" title="Icons" data-bs-placement="right">
                           <svg class="icon-20" xmlns="" width="20" viewBox="0 0 24 24"
                              fill="currentColor">
                              <path
                                 d="M8 10.5378C8 9.43327 8.89543 8.53784 10 8.53784H11.3333C12.4379 8.53784 13.3333 9.43327 13.3333 10.5378V19.8285C13.3333 20.9331 14.2288 21.8285 15.3333 21.8285H16C16 21.8285 12.7624 23.323 10.6667 22.9361C10.1372 22.8384 9.52234 22.5913 9.01654 22.3553C8.37357 22.0553 8 21.3927 8 20.6832V10.5378Z"
                                 fill="currentColor" />
                              <rect opacity="0.4" x="8" y="1" width="5" height="5" rx="2.5" fill="currentColor" />
                           </svg>
                        </i>
                        <span class="item-name">Icons</span>
                        <i class="right-icon">
                           <svg xmlns="" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                        </i>
                     </a>
                     <ul class="sub-nav collapse" id="sidebar-icons" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/icons/solid.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Solid" data-bs-placement="right"> S
                              </i>
                              <span class="item-name">Solid</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/icons/outline.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Outlined" data-bs-placement="right"> O
                              </i>
                              <span class="item-name">Outlined</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link "
                              href="../dashboard/icons/dual-tone.html">
                              <i class="icon">
                                 <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <g>
                                       <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                 </svg>
                              </i>
                              <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Tone" data-bs-placement="right"> D
                              </i>
                              <span class="item-name">Dual Tone</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <?php
                     */
                  ?>
               </ul>
               <!-- Sidebar Menu End -->        
            </div>
         </div>
         <div class="sidebar-footer"></div>
      </aside>  

      <main class="main-content">
      <div class="position-relative">
         <!--Nav Start-->
         <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu left-border">
            <div class="container-fluid navbar-inner">
               <a href="#" class="navbar-brand">
                  <!--Logo start-->
                  <!-- <div class="logo-main">
                     <div class="logo-normal">
                        <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="">
                           <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                           <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                           <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                           <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                        </svg>
                     </div>
                  </div> -->
                  <!--logo End-->         
                  <h4 class="logo-title d-block d-xl-none" data-setting="app_name">BCC CRM</h4>
               </a>
               <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                  <i class="icon d-flex">
                     <svg class="icon-20" width="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                     </svg>
                  </i>
               </div>
               <div class="d-flex align-items-center justify-content-between product-offcanvas">
                  <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                     <small class="mb-0 text-capitalize">
                        @if(isset($current_slug))
                           {{$current_slug}}
                        @endif
                     </small>
                  </div>

                  <?php /* ?>  
                  <div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive" tabindex="-1" id="offcanvasBottom">
                     <div class="offcanvas-body">
                        <ul class="iq-nav-menu list-unstyled">
                           <li class="nav-item active">
                              <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse" href="#homeData"
                                 role="button" aria-expanded="false" aria-controls="homeData">
                                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="">
                                    <path
                                       d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z"
                                       fill="currentColor" />
                                 </svg>
                                 <span class="nav-text ms-2">Home</span>
                              </a>
                              <ul class="iq-header-sub-menu list-unstyled collapse" id="homeData">
                                 <li class="nav-item"><a class="nav-link "
                                    href="">Dashboard</a>
                                 </li>
                                 <li class="nav-item"><a
                                    class="nav-link "
                                    href="../dashboard/alternate-dashboard.html">Alternate Dashboard</a></li>
                                 <li class="nav-item">
                                    <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#menuStyles" role="button"
                                       aria-expanded="false" aria-controls="menuStyles">
                                       Menu Style
                                       <i class="right-icon">
                                          <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                             xmlns="">
                                             <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>
                                       </i>
                                    </a>
                                    <ul aria-expanded="false" class="iq-header-sub-menu left list-unstyled collapse"
                                       id="menuStyles">
                                       <li class="nav-item"><a
                                          class="nav-link "
                                          href="../dashboard/index-horizontal.html">Horizontal Dashboard</a></li>
                                       <li class="nav-item"><a
                                          class="nav-link "
                                          href="../dashboard/index-dual-horizontal.html">Dual Horizontal Dashboard</a>
                                       </li>
                                       <li class="nav-item"><a
                                          class="nav-link "
                                          href="../dashboard/index-dual-compact.html">Dual Compact</a></li>
                                       <li class="nav-item"><a
                                          class="nav-link "
                                          href="../dashboard/index-boxed.html">Boxed Horizontal</a></li>
                                       <li class="nav-item"><a
                                          class="nav-link "
                                          href="../dashboard/index-boxed-fancy.html">Boxed Fancy</a></li>
                                    </ul>
                                 </li>
                                 <li class="nav-item"><a
                                    class="nav-link "
                                    href="../e-commerce/index.html">E-Commerce</a></li>
                                 <li class="nav-item"><a class="nav-link "
                                    href="../social-app/index.html">Social App</a></li>
                                 <li class="nav-item"><a
                                    class="nav-link "
                                    href="../blog/index.html">Blog</a></li>
                                 <li class="nav-item"><a
                                    class="nav-link "
                                    href="../appointment/index.html">Appointment</a></li>
                                 <li class="nav-item"><a
                                    class="nav-link "
                                    href="../file-manager/index.html">File Manager</a></li>
                                 <li class="nav-item"><a class="nav-link "
                                    href="../chat/index.html" target="_blank">Chat</a></li>
                                 <li class="nav-item"><a class="nav-link "
                                    href="../mail/index.html">Mail</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <?php */ ?>

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
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                     <li class="nav-item dropdown me-0 me-xl-3">
                        <div class="d-flex align-items-center mr-2 iq-font-style" role="group" aria-label="First group"
                           data-setting="radio">
                           <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm" id="font-size-sm">
                           <label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm" data-bs-toggle="tooltip"
                              title="Font size 14px" data-bs-placement="bottom">
                           <span class="mb-0 h6" style="color: inherit !important;">A</span>
                           </label>
                           <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md" id="font-size-md">
                           <label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                              title="Font size 16px" data-bs-placement="bottom">
                           <span class="mb-0 h4" style="color: inherit !important;">A</span>
                           </label>
                           <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg" id="font-size-lg">
                           <label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                              title="Font size 18px" data-bs-placement="bottom">
                           <span class="mb-0 h2" style="color: inherit !important;">A</span>
                           </label>
                        </div>
                     </li>
                     <li class="nav-item dropdown border-end pe-3 d-none d-xl-block">
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
                     </li>
                     <li class="nav-item dropdown iq-responsive-menu border-end d-block d-xl-none">
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
                     <li class="nav-item iq-full-screen d-none d-xl-block" id="fullscreen-item">
                        <a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
                           <div class="btn btn-primary btn-icon btn-sm rounded-pill">
                              <span class="btn-inner">
                                 <svg class="normal-screen icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="">
                                    <path d="M18.5528 5.99656L13.8595 10.8961" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.8574 18.896L10.5507 13.9964" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                 </svg>
                                 <svg class="full-normal-screen d-none icon-24" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="">
                                    <path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor"
                                       stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor"
                                       stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                 </svg>
                              </span>
                           </div>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <!--Nav End-->
      </div>