@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Sample Template</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
                  </div>
                  <!-- <div>
                     <a href="#" class="btn btn-link btn-soft-light">
                     <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Add New Setting
                     </a>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body px-0">
                <div class="sample-tamplate-holder">
                    <div class="theme-brand">
                        <a href="{{route('dashboard')}}" class="navbar-brand">
                            <div class="logo-main">
                                <div class="logo-normal">
                                    <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="" style="width:300px">
                                </div>
                            </div>
                        </a>
                    </div>
                    <h2>Scott Henson mentioned you on the <br> company <b>"OnBoard IT Tech"</b></h2>
                    
                    <div class="sample-tamplate-description">
                        <div class="user-name">
                            <b>@Saddam Hussain</b>
                        </div>
                        <!-- can be repeate like loop and whatever start -->
                        <div class="user-list-view">
                            <div class="img-holder">
                                <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="company logo">
                            </div>
                            <div class="text-holder">
                                <h3>Company XYZ</h3>
                                <a href="#">Company OnBoard IT Tech</a>
                                <a href="#">+ 3333 5555 8776</a>
                            </div>
                        </div>
                        <!-- can be repeate loop and whatever start end -->
                        <!-- can be repeate like loop and whatever start -->
                        <div class="user-list-view">
                            <div class="img-holder">
                                <img src="{{asset('assets/images/bcc-update-logo.png')}}" alt="company logo">
                            </div>
                            <div class="text-holder">
                                <h3>Contact XYZ</h3>
                                <a href="#">Company OnBoard IT Tech</a>
                                <a href="#">+ 3333 5555 8776</a>
                            </div>
                        </div>
                        <div class="user-redirect-btn">
                            <a href="#">View Activities</a>
                        </div>
                        <!-- can be repeate loop and whatever start end -->
                    </div>
                    <p class="mt-3 mb-0">This message was sent to waleed@carpediem.team</p>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection