@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Notification</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
                  </div>
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
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title"></h4>
               </div>
            </div>
            <div class="card-body px-0">
                <div class="notification_view_holder">
                    <div class="notification-ui_dd-content">
                        <div class="notification-list notification-list--unread">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                    <img src="{{asset('assets/images/notification-profile.jpg')}}" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>John Doe</b> reacted to your post</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                    <p class="text-muted"><small>10 mins ago</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{asset('assets/images/notification-profile2.jpg')}}" alt="Feature image">
                            </div>
                        </div>
                        <div class="notification-list notification-list--unread">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                    <img src="{{asset('assets/images/notification-profile.jpg')}}" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>Richard Miles</b> liked your post</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                    <p class="text-muted"><small>10 mins ago</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{asset('assets/images/notification-profile2.jpg')}}" alt="Feature image">
                            </div>
                        </div>
                        <div class="notification-list">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                    <img src="{{asset('assets/images/notification-profile.jpg')}}" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>Brian Cumin</b> reacted to your post</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                    <p class="text-muted"><small>10 mins ago</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{asset('assets/images/notification-profile2.jpg')}}" alt="Feature image">
                            </div>
                        </div>
                        <div class="notification-list">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                    <img src="{{asset('assets/images/notification-profile.jpg')}}" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>Lance Bogrol</b> reacted to your post</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                    <p class="text-muted"><small>10 mins ago</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{asset('assets/images/notification-profile2.jpg')}}" alt="Feature image">
                            </div>
                        </div>
                        <div class="notification-list">
                            <div class="notification-list_content">
                                <div class="notification-list_img">
                                    <img src="{{asset('assets/images/notification-profile.jpg')}}" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>Parsley Montana</b> reacted to your post</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                    <p class="text-muted"><small>10 mins ago</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{asset('assets/images/notification-profile2.jpg')}}" alt="Feature image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection