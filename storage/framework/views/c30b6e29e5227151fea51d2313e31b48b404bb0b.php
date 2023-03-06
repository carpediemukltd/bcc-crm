<!DOCTYPE html>
<html lang="en">
   <head>
      <title>BCC Dashboard</title>
      <link rel="icon" type="image/x-icon" href="<?php echo e(asset('../bcc-favicon.png')); ?>">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- theme css strat -->
      <link href="<?php echo e(asset('custom.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('assets/theme/css/theme.min.css')); ?>" type="text/css" rel="stylesheet" id="style-default">
      <link href="<?php echo e(asset('assets/theme/css/choices.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('assets/theme/css/flatpickr.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('assets/css/theme-font.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('assets/theme/css/simplebar.min.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('assets/theme/css/line.css')); ?>">
      <link href="<?php echo e(asset('assets/theme/css/theme-rtl.min.css')); ?>" type="text/css" rel="stylesheet" id="style-rtl" disabled="true">
      <link href="<?php echo e(asset('assets/theme/css/user-rtl.min.css')); ?>" type="text/css" rel="stylesheet" id="user-style-rtl" disabled="true">
      <link href="<?php echo e(asset('assets/theme/css/user.min.css')); ?>" type="text/css" rel="stylesheet" id="user-style-default">
      <!-- theme css end -->
      <!-- jQuery library -->
      <script src="<?php echo e(asset('assets/theme/js/imagesloaded.pkgd.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/theme/js/simplebar.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/theme/js/config.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
      <!-- <style type="text/css">
         @font-face {
         font-weight: 400;
         font-style:  normal;
         font-family: 'Circular-Loom';
         src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Book.woff2') format('woff2');
         }
         @font-face {
         font-weight: 500;
         font-style:  normal;
         font-family: 'Circular-Loom';
         src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Medium.woff2') format('woff2');
         }
         @font-face {
         font-weight: 700;
         font-style:  normal;
         font-family: 'Circular-Loom';
         src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Bold.woff2') format('woff2');
         }
         @font-face {
         font-weight: 900;
         font-style:  normal;
         font-family: 'Circular-Loom';
         src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Black.woff2') format('woff2');
         }
         </style> -->
   </head>
   <body class="bcc-dashboard">
      <!-- Bcc Header Start -->
     
      <!-- Bcc Header End -->
      <main class="main" id="top">
      <div class="container-fluid px-0" data-layout="container">
      <nav class="navbar navbar-vertical navbar-expand-lg">
         <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <!-- scrollbar removed-->
            <div class="navbar-vertical-content">
               <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                  <li class="nav-item">
                     <p class="navbar-vertical-label">Apps</p>
                     <hr class="navbar-vertical-line">
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.dashboard')); ?>" role="button" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span>
                           </div>
                        </a>
                     </div>
                     <!--  -->
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.contactlisting')); ?>" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Contact Listing</span></span>
                           </div>
                        </a>
                     </div>
                     <!--  -->
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.contactdetails')); ?>" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Contact Detail</span></span>
                           </div>
                        </a>
                     </div>
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.stagesview')); ?>" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Stages Cards</span></span>
                           </div>
                        </a>
                     </div>
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.customfields')); ?>" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Custom Fields</span></span>
                           </div>
                        </a>
                     </div>
                     <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="<?php echo e(route('user.dealslisting')); ?>" data-bs-toggle="" aria-expanded="false">
                           <div class="d-flex align-items-center">
                              <span class="nav-link-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                              </span>
                              <span class="nav-link-text-wrapper"><span class="nav-link-text">Deals Listing</span></span>
                           </div>
                        </a>
                     </div>
                     <!-- <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 collapsed" href="#CRM" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="CRM">
                           <div class="d-flex align-items-center">
                              <div class="dropdown-indicator-icon">
                                 <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="" viewBox="0 0 256 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path>
                                 </svg>
                              </div>
                              <span class="nav-link-icon">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                 </svg>
                              </span>
                              <span class="nav-link-text">CRM </span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info nav-link-badge">New</span>
                           </div>
                        </a>
                        <div class="parent-wrapper label-1">
                           <ul class="nav parent collapse" data-bs-parent="#navbarVerticalCollapse" id="CRM" style="">
                              <li class="collapsed-nav-item-title d-none">CRM</li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo e(route('user.dashboard')); ?>" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Dashboard</span></div>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo e(route('user.contactlisting')); ?>" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Contact Listing</span></div>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo e(route('user.contactdetails')); ?>" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Contact Detail</span></div>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo e(route('user.stagesview')); ?>" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Stages</span></div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div> -->
                  </li>
               </ul>
            </div>
         </div>
         <div class="navbar-vertical-footer">
            <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><i class="fs-0 fal fa-arrow-to-left"></i><i class="fs-0 fal fa-arrow-from-left"></i><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
      </nav>
      <nav class="navbar navbar-top navbar-expand" id="navbarDefault">
         <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-logo">
               <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
               <a class="navbar-brand me-1 me-sm-3" href="#">
                  <div class="d-flex align-items-center">
                     <div class="d-flex align-items-center">
                        <img src="<?php echo e(asset('assets/theme/images/bcc-logo.png')); ?>" alt="BCC CRM" width="100px">
                        
                     </div>
                  </div>
               </a>
            </div>
            <div class="search-box navbar-top-search-box d-none d-lg-block" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}" style="width:25rem;">
               <form class="position-relative" data-bs-toggle="search" data-bs-display="static" aria-expanded="false">
                  <input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search">
                  <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                  </svg>
               </form>
               <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
               <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                  <div class="scrollbar-overlay" style="max-height: 30rem;" data-simplebar="init">
                     <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                           <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                           <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                              <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                 <div class="simplebar-content" style="padding: 0px;">
                                    <div class="list pb-3">
                                       <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                                       <div class="py-2">
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                      <g transform="translate(256 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C201.7 512 151.2 495 109.7 466.1C95.2 455.1 91.64 436 101.8 421.5C111.9 407 131.8 403.5 146.3 413.6C177.4 435.3 215.2 448 256 448C362 448 448 362 448 256C448 149.1 362 64 256 64C202.1 64 155 85.46 120.2 120.2L151 151C166.1 166.1 155.4 192 134.1 192H24C10.75 192 0 181.3 0 168V57.94C0 36.56 25.85 25.85 40.97 40.97L74.98 74.98C121.3 28.69 185.3 0 255.1 0L256 0zM256 128C269.3 128 280 138.7 280 152V246.1L344.1 311C354.3 320.4 354.3 335.6 344.1 344.1C335.6 354.3 320.4 354.3 311 344.1L239 272.1C234.5 268.5 232 262.4 232 256V152C232 138.7 242.7 128 256 128V128z" transform="translate(-256 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Store Macbook
                                                </div>
                                             </div>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                      <g transform="translate(256 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C201.7 512 151.2 495 109.7 466.1C95.2 455.1 91.64 436 101.8 421.5C111.9 407 131.8 403.5 146.3 413.6C177.4 435.3 215.2 448 256 448C362 448 448 362 448 256C448 149.1 362 64 256 64C202.1 64 155 85.46 120.2 120.2L151 151C166.1 166.1 155.4 192 134.1 192H24C10.75 192 0 181.3 0 168V57.94C0 36.56 25.85 25.85 40.97 40.97L74.98 74.98C121.3 28.69 185.3 0 255.1 0L256 0zM256 128C269.3 128 280 138.7 280 152V246.1L344.1 311C354.3 320.4 354.3 335.6 344.1 344.1C335.6 354.3 320.4 354.3 311 344.1L239 272.1C234.5 268.5 232 262.4 232 256V152C232 138.7 242.7 128 256 128V128z" transform="translate(-256 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   MacBook Air - 13″
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                                       <div class="py-2">
                                          <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                             <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                             <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                                             </div>
                                          </a>
                                          <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                             <div class="file-thumbnail me-2"><img class="img-fluid" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                             <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                             </div>
                                          </a>
                                       </div>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                                       <div class="py-2">
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-link text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                                      <g transform="translate(320 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" transform="translate(-320 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Support MacBook House
                                                </div>
                                             </div>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-link text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                                      <g transform="translate(320 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" transform="translate(-320 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Store MacBook″
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                                       <div class="py-2">
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-file-zipper text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-zipper" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                                      <g transform="translate(192 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM96 32h64v32H96V32zM96 96h64v32H96V96zM96 160h64v32H96V160zM128.3 415.1c-40.56 0-70.76-36.45-62.83-75.45L96 224h64l30.94 116.9C198.7 379.7 168.5 415.1 128.3 415.1zM144 336h-32C103.2 336 96 343.2 96 352s7.164 16 16 16h32C152.8 368 160 360.8 160 352S152.8 336 144 336z" transform="translate(-192 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   <!-- <span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com --> Library MacBook folder.rar
                                                </div>
                                             </div>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-file-lines text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-lines" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                                      <g transform="translate(192 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272 416h-160C103.2 416 96 408.8 96 400C96 391.2 103.2 384 112 384h160c8.836 0 16 7.162 16 16C288 408.8 280.8 416 272 416zM272 352h-160C103.2 352 96 344.8 96 336C96 327.2 103.2 320 112 320h160c8.836 0 16 7.162 16 16C288 344.8 280.8 352 272 352zM288 272C288 280.8 280.8 288 272 288h-160C103.2 288 96 280.8 96 272C96 263.2 103.2 256 112 256h160C280.8 256 288 263.2 288 272z" transform="translate(-192 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Feature MacBook extensions.txt
                                                </div>
                                             </div>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-image text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                      <g transform="translate(256 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" transform="translate(-256 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   MacBook Pro_13.jpg
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                                       <div class="py-2">
                                          <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                             <div class="avatar avatar-l status-online  me-2 text-900">
                                                <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                             </div>
                                             <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                             </div>
                                          </a>
                                          <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                             <div class="avatar avatar-l  me-2 text-900">
                                                <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                             </div>
                                             <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">John Smith</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                             </div>
                                          </a>
                                       </div>
                                       <hr class="text-200 my-0">
                                       <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                                       <div class="py-2">
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-firefox-browser text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="firefox-browser" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                      <g transform="translate(256 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M130.2 127.5C130.4 127.6 130.3 127.6 130.2 127.5V127.5zM481.6 172.9C471 147.4 449.6 119.9 432.7 111.2C446.4 138.1 454.4 165 457.4 185.2C457.4 185.3 457.4 185.4 457.5 185.6C429.9 116.8 383.1 89.11 344.9 28.75C329.9 5.058 333.1 3.518 331.8 4.088L331.7 4.158C284.1 30.11 256.4 82.53 249.1 126.9C232.5 127.8 216.2 131.9 201.2 139C199.8 139.6 198.7 140.7 198.1 142C197.4 143.4 197.2 144.9 197.5 146.3C197.7 147.2 198.1 147.1 198.6 148.6C199.1 149.3 199.8 149.9 200.5 150.3C201.3 150.7 202.1 150.1 202.1 151.1C203.8 151.1 204.7 151 205.5 150.8L206 150.6C221.5 143.3 238.4 139.4 255.5 139.2C318.4 138.7 352.7 183.3 363.2 201.5C350.2 192.4 326.8 183.3 304.3 187.2C392.1 231.1 368.5 381.8 246.1 376.4C187.5 373.8 149.9 325.5 146.4 285.6C146.4 285.6 157.7 243.7 227 243.7C234.5 243.7 255.1 222.8 256.4 216.7C256.3 214.7 213.8 197.8 197.3 181.5C188.4 172.8 184.2 168.6 180.5 165.5C178.5 163.8 176.4 162.2 174.2 160.7C168.6 141.2 168.4 120.6 173.5 101.1C148.4 112.5 128.1 130.5 114.8 146.4H114.7C105 134.2 105.7 93.78 106.3 85.35C106.1 84.82 99.02 89.02 98.1 89.66C89.53 95.71 81.55 102.6 74.26 110.1C57.97 126.7 30.13 160.2 18.76 211.3C14.22 231.7 12 255.7 12 263.6C12 398.3 121.2 507.5 255.9 507.5C376.6 507.5 478.9 420.3 496.4 304.9C507.9 228.2 481.6 173.8 481.6 172.9z" transform="translate(-256 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Search in the Web MacBook
                                                </div>
                                             </div>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title">
                                                   <svg class="svg-inline--fa fa-chrome text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chrome" role="img" xmlns="" viewBox="0 0 496 512" data-fa-i2svg="" style="transform-origin: 0.484375em 0.5em;">
                                                      <g transform="translate(248 256)">
                                                         <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                            <path fill="currentColor" d="M131.5 217.5L55.1 100.1c47.6-59.2 119-91.8 192-92.1 42.3-.3 85.5 10.5 124.8 33.2 43.4 25.2 76.4 61.4 97.4 103L264 133.4c-58.1-3.4-113.4 29.3-132.5 84.1zm32.9 38.5c0 46.2 37.4 83.6 83.6 83.6s83.6-37.4 83.6-83.6-37.4-83.6-83.6-83.6-83.6 37.3-83.6 83.6zm314.9-89.2L339.6 174c37.9 44.3 38.5 108.2 6.6 157.2L234.1 503.6c46.5 2.5 94.4-7.7 137.8-32.9 107.4-62 150.9-192 107.4-303.9zM133.7 303.6L40.4 120.1C14.9 159.1 0 205.9 0 256c0 124 90.8 226.7 209.5 244.9l63.7-124.8c-57.6 10.8-113.2-20.8-139.5-72.5z" transform="translate(-248 -256)"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Store MacBook″
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="text-center">
                                       <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                     </div>
                     <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                     </div>
                     <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                     </div>
                  </div>
               </div>
            </div>
            <ul class="navbar-nav navbar-nav-icons flex-row">
               <li class="nav-item">
                  <div class="theme-control-toggle fa-icon-wait px-2">
                     <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle">
                     <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                        <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon icon">
                           <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                     </label>
                     <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme" data-bs-original-title="Switch theme">
                        <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun icon">
                           <circle cx="12" cy="12" r="5"></circle>
                           <line x1="12" y1="1" x2="12" y2="3"></line>
                           <line x1="12" y1="21" x2="12" y2="23"></line>
                           <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                           <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                           <line x1="1" y1="12" x2="3" y2="12"></line>
                           <line x1="21" y1="12" x2="23" y2="12"></line>
                           <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                           <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                     </label>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
                     <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell" style="height:20px;width:20px;">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                     </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                     <div class="card position-relative border-0">
                        <div class="card-header p-2">
                           <div class="d-flex justify-content-between">
                              <h5 class="text-black mb-0">Notificatons</h5>
                              <button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                           </div>
                        </div>
                        <div class="card-body p-0">
                           <div class="scrollbar-overlay" style="height: 27rem;" data-simplebar="init">
                              <div class="simplebar-wrapper" style="margin: 0px;">
                                 <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                 </div>
                                 <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                       <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                          <div class="simplebar-content" style="padding: 0px;">
                                             <div class="border-300">
                                                <div class="p-3 border-300 notification-card position-relative read border-bottom">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">10:41 AM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3">
                                                            <div class="avatar-name rounded-circle"><span>J</span></div>
                                                         </div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Jane Foster</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">10:20 AM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">9:30 AM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="border-300">
                                                <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">9:11 AM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="p-3 border-300 notification-card position-relative unread border-bottom">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Herman Carter</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">10:58 PM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="p-3 border-300 notification-card position-relative read ">
                                                   <div class="d-flex align-items-center justify-content-between position-relative">
                                                      <div class="d-flex">
                                                         <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                         <div class="me-3 flex-1">
                                                            <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class="me-1 fs--2">👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0">
                                                               <svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                  <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                               </svg>
                                                               <span class="fw-bold">10:18 AM </span>August 7,2021
                                                            </p>
                                                         </div>
                                                      </div>
                                                      <div class="font-sans-serif d-none d-sm-block">
                                                         <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                            <svg class="svg-inline--fa fa-ellipsis fs--2 text-900" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                                            </svg>
                                                         </button>
                                                         <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                              </div>
                              <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                 <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                              </div>
                              <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                 <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                           <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="#">Notification history</a></div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
                     <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                     </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
                     <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                           <div class="row text-center align-items-center gx-0 gy-0">
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="20">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                 </a>
                              </div>
                              <div class="col-4">
                                 <a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                                    <img src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" width="30">
                                    <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                     <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                     </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                     <div class="card position-relative border-0">
                        <div class="card-body p-0">
                           <div class="text-center pt-4 pb-3">
                              <div class="avatar avatar-xl ">
                                 <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                              </div>
                              <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                           </div>
                           <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status"></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                           <ul class="nav d-flex flex-column mb-2 pb-1">
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-2 text-900">
                                       <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                       <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Profile</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart me-2 text-900">
                                       <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                       <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                    </svg>
                                    Dashboard
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock me-2 text-900">
                                       <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                       <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    Posts &amp; Activity
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings me-2 text-900">
                                       <circle cx="12" cy="12" r="3"></circle>
                                       <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                    Settings &amp; Privacy 
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle me-2 text-900">
                                       <circle cx="12" cy="12" r="10"></circle>
                                       <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                       <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                    Help Center
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 text-900">
                                       <circle cx="12" cy="12" r="10"></circle>
                                       <line x1="2" y1="12" x2="22" y2="12"></line>
                                       <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                    Language
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                           <ul class="nav d-flex flex-column my-3">
                              <li class="nav-item">
                                 <a class="nav-link px-3" href="#!">
                                    <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus me-2 text-900">
                                       <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                       <circle cx="8.5" cy="7" r="4"></circle>
                                       <line x1="20" y1="8" x2="20" y2="14"></line>
                                       <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                    Add another account
                                 </a>
                              </li>
                           </ul>
                           <hr>
                           <div class="px-3">
                              <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out me-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                 </svg>
                                 Sign out
                              </a>
                           </div>
                           <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>•<a class="text-600 mx-1" href="#!">Terms</a>•<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
         <div class="modal-dialog">
            <div class="modal-content mt-15 rounded-pill">
               <div class="modal-body p-0">
                  <div class="search-box navbar-top-search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}" style="width: auto;">
                     <form class="position-relative" data-bs-toggle="search" data-bs-display="static" aria-expanded="false">
                        <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search">
                        <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                        </svg>
                     </form>
                     <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
                     <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                        <div class="scrollbar-overlay" style="max-height: 30rem;" data-simplebar="init">
                           <div class="simplebar-wrapper" style="margin: 0px;">
                              <div class="simplebar-height-auto-observer-wrapper">
                                 <div class="simplebar-height-auto-observer"></div>
                              </div>
                              <div class="simplebar-mask">
                                 <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                       <div class="simplebar-content" style="padding: 0px;">
                                          <div class="list pb-3">
                                             <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                                             <div class="py-2">
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                            <g transform="translate(256 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C201.7 512 151.2 495 109.7 466.1C95.2 455.1 91.64 436 101.8 421.5C111.9 407 131.8 403.5 146.3 413.6C177.4 435.3 215.2 448 256 448C362 448 448 362 448 256C448 149.1 362 64 256 64C202.1 64 155 85.46 120.2 120.2L151 151C166.1 166.1 155.4 192 134.1 192H24C10.75 192 0 181.3 0 168V57.94C0 36.56 25.85 25.85 40.97 40.97L74.98 74.98C121.3 28.69 185.3 0 255.1 0L256 0zM256 128C269.3 128 280 138.7 280 152V246.1L344.1 311C354.3 320.4 354.3 335.6 344.1 344.1C335.6 354.3 320.4 354.3 311 344.1L239 272.1C234.5 268.5 232 262.4 232 256V152C232 138.7 242.7 128 256 128V128z" transform="translate(-256 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Store Macbook
                                                      </div>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                            <g transform="translate(256 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C201.7 512 151.2 495 109.7 466.1C95.2 455.1 91.64 436 101.8 421.5C111.9 407 131.8 403.5 146.3 413.6C177.4 435.3 215.2 448 256 448C362 448 448 362 448 256C448 149.1 362 64 256 64C202.1 64 155 85.46 120.2 120.2L151 151C166.1 166.1 155.4 192 134.1 192H24C10.75 192 0 181.3 0 168V57.94C0 36.56 25.85 25.85 40.97 40.97L74.98 74.98C121.3 28.69 185.3 0 255.1 0L256 0zM256 128C269.3 128 280 138.7 280 152V246.1L344.1 311C354.3 320.4 354.3 335.6 344.1 344.1C335.6 354.3 320.4 354.3 311 344.1L239 272.1C234.5 268.5 232 262.4 232 256V152C232 138.7 242.7 128 256 128V128z" transform="translate(-256 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         MacBook Air - 13″
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                                             <div class="py-2">
                                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                                   <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                   <div class="flex-1">
                                                      <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                                      <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                                   <div class="file-thumbnail me-2"><img class="img-fluid" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                                   <div class="flex-1">
                                                      <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                                      <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                                   </div>
                                                </a>
                                             </div>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                                             <div class="py-2">
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-link text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                                            <g transform="translate(320 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" transform="translate(-320 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Support MacBook House
                                                      </div>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-link text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                                            <g transform="translate(320 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" transform="translate(-320 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Store MacBook″
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                                             <div class="py-2">
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-file-zipper text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-zipper" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                                            <g transform="translate(192 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM96 32h64v32H96V32zM96 96h64v32H96V96zM96 160h64v32H96V160zM128.3 415.1c-40.56 0-70.76-36.45-62.83-75.45L96 224h64l30.94 116.9C198.7 379.7 168.5 415.1 128.3 415.1zM144 336h-32C103.2 336 96 343.2 96 352s7.164 16 16 16h32C152.8 368 160 360.8 160 352S152.8 336 144 336z" transform="translate(-192 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         <!-- <span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com --> Library MacBook folder.rar
                                                      </div>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-file-lines text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-lines" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                                            <g transform="translate(192 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272 416h-160C103.2 416 96 408.8 96 400C96 391.2 103.2 384 112 384h160c8.836 0 16 7.162 16 16C288 408.8 280.8 416 272 416zM272 352h-160C103.2 352 96 344.8 96 336C96 327.2 103.2 320 112 320h160c8.836 0 16 7.162 16 16C288 344.8 280.8 352 272 352zM288 272C288 280.8 280.8 288 272 288h-160C103.2 288 96 280.8 96 272C96 263.2 103.2 256 112 256h160C280.8 256 288 263.2 288 272z" transform="translate(-192 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Feature MacBook extensions.txt
                                                      </div>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-image text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                            <g transform="translate(256 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" transform="translate(-256 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         MacBook Pro_13.jpg
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                                             <div class="py-2">
                                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                                   <div class="avatar avatar-l status-online  me-2 text-900">
                                                      <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                                   </div>
                                                   <div class="flex-1">
                                                      <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                                      <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                                   <div class="avatar avatar-l  me-2 text-900">
                                                      <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                                   </div>
                                                   <div class="flex-1">
                                                      <h6 class="mb-0 text-1000 title">John Smith</h6>
                                                      <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                                   </div>
                                                </a>
                                             </div>
                                             <hr class="text-200 my-0">
                                             <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                                             <div class="py-2">
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-firefox-browser text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="firefox-browser" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                            <g transform="translate(256 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M130.2 127.5C130.4 127.6 130.3 127.6 130.2 127.5V127.5zM481.6 172.9C471 147.4 449.6 119.9 432.7 111.2C446.4 138.1 454.4 165 457.4 185.2C457.4 185.3 457.4 185.4 457.5 185.6C429.9 116.8 383.1 89.11 344.9 28.75C329.9 5.058 333.1 3.518 331.8 4.088L331.7 4.158C284.1 30.11 256.4 82.53 249.1 126.9C232.5 127.8 216.2 131.9 201.2 139C199.8 139.6 198.7 140.7 198.1 142C197.4 143.4 197.2 144.9 197.5 146.3C197.7 147.2 198.1 147.1 198.6 148.6C199.1 149.3 199.8 149.9 200.5 150.3C201.3 150.7 202.1 150.1 202.1 151.1C203.8 151.1 204.7 151 205.5 150.8L206 150.6C221.5 143.3 238.4 139.4 255.5 139.2C318.4 138.7 352.7 183.3 363.2 201.5C350.2 192.4 326.8 183.3 304.3 187.2C392.1 231.1 368.5 381.8 246.1 376.4C187.5 373.8 149.9 325.5 146.4 285.6C146.4 285.6 157.7 243.7 227 243.7C234.5 243.7 255.1 222.8 256.4 216.7C256.3 214.7 213.8 197.8 197.3 181.5C188.4 172.8 184.2 168.6 180.5 165.5C178.5 163.8 176.4 162.2 174.2 160.7C168.6 141.2 168.4 120.6 173.5 101.1C148.4 112.5 128.1 130.5 114.8 146.4H114.7C105 134.2 105.7 93.78 106.3 85.35C106.1 84.82 99.02 89.02 98.1 89.66C89.53 95.71 81.55 102.6 74.26 110.1C57.97 126.7 30.13 160.2 18.76 211.3C14.22 231.7 12 255.7 12 263.6C12 398.3 121.2 507.5 255.9 507.5C376.6 507.5 478.9 420.3 496.4 304.9C507.9 228.2 481.6 173.8 481.6 172.9z" transform="translate(-256 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Search in the Web MacBook
                                                      </div>
                                                   </div>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                   <div class="d-flex align-items-center">
                                                      <div class="fw-normal text-1000 title">
                                                         <svg class="svg-inline--fa fa-chrome text-900" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chrome" role="img" xmlns="" viewBox="0 0 496 512" data-fa-i2svg="" style="transform-origin: 0.484375em 0.5em;">
                                                            <g transform="translate(248 256)">
                                                               <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                  <path fill="currentColor" d="M131.5 217.5L55.1 100.1c47.6-59.2 119-91.8 192-92.1 42.3-.3 85.5 10.5 124.8 33.2 43.4 25.2 76.4 61.4 97.4 103L264 133.4c-58.1-3.4-113.4 29.3-132.5 84.1zm32.9 38.5c0 46.2 37.4 83.6 83.6 83.6s83.6-37.4 83.6-83.6-37.4-83.6-83.6-83.6-83.6 37.3-83.6 83.6zm314.9-89.2L339.6 174c37.9 44.3 38.5 108.2 6.6 157.2L234.1 503.6c46.5 2.5 94.4-7.7 137.8-32.9 107.4-62 150.9-192 107.4-303.9zM133.7 303.6L40.4 120.1C14.9 159.1 0 205.9 0 256c0 124 90.8 226.7 209.5 244.9l63.7-124.8c-57.6 10.8-113.2-20.8-139.5-72.5z" transform="translate(-248 -256)"></path>
                                                               </g>
                                                            </g>
                                                         </svg>
                                                         Store MacBook″
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="text-center">
                                             <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                           </div>
                           <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                              <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                           </div>
                           <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                              <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php /**PATH C:\xampp7.4.29\htdocs\carpediem\bcc_crm\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>