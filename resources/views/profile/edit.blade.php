<?php
   $title = "Edit Profile";
   ?>
@extends('admin.layout.app')
@section('content')
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-md-12">
               <div class="card has-blue-border">
                  <div class="card-header">
                     <div class="card-title" style="color:#000;">Edit Profile</div>
                  </div>
                  <div class="bg-holder"></div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-3">
                           <div class="position-relative mb-7">
                              <!--/.bg-holder-->
                              <div class="avatar-5xl avatar-profile">
                                 @if(auth()->user()->profile_image)
                                 <div class="user_img">
                                    <img id="p-image-preview" class="rounded-circle img-thumbnail shadow-sm" src="{{auth()->user()->profile_image}}" width="200" alt="">
                                 </div>
                                 @else
                                 <div class="user_img">
                                    <img id="p-image-preview" class="rounded-circle img-thumbnail shadow-sm" src="{{asset('assets/client/theme/img/2.jpg')}}" width="200" alt="">
                                 </div>
                                 @endif()	
                                 <form class="upload-profile" action="{{route('user.profile')}}" method="POST" enctype="multipart/form-data" >
                                    <label> Upload 
                                       <input type="file" size="60" name="profile_image" onchange="loadFile(event)" >
                                    </label> 
                                    
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-9">
                        <div class="form-group p-0">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block fadeInUp animated" id="alert_success_session">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="es_alert">
                        <div class="alert_icon">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                        <div class="alert_text">
                        <h5>Success!</h5>
                        <p>{{ $message }}</p>
                        </div>
                        </div>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block fadeInUp animated">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="es_alert">
                        <div class="alert_icon">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                        <div class="alert_text">
                        <h5>Info!</h5>
                        <p>{{ $message }}</p>
                        </div>
                        </div>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger fadeInUp animated">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="es_alert">
                        @foreach ($errors->all() as $error)
                        <div class="alert_icon">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                        <div class="alert_text">
                        <h5>Info!</h5>
                        <p>{{ $error }}</p>
                        </div>
                        @endforeach
                        </div>
                        </div>
                        @endif
                        @csrf
                        <div class="row pt-4">
                           <div class="col-lg-6">
                              <div class="form-group p-0 mb-3">
                                 <label for="">First Name</label>
                                 <input required type="text" id="first_name" class="form-control" name="first_name" value="{{auth()->user()->first_name}}">
                              </div>
                           </div>
                        
                           <div class="col-lg-6">
                              <div class="form-group p-0 mb-3">
                                 <label for="">Last Name</label>
                                 <input required type="text" id="last_name" class="form-control" name="last_name" value="{{auth()->user()->last_name}}">
                              </div>
                           </div>

                           <div class="col-lg-6">
                              <div class="form-group p-0 mb-3">
                                 <label for="">Email</label>
                                 <input required type="email" disabled id="email" class="form-control" value="{{auth()->user()->email}}">
                              </div>
                           </div>

                           <div class="col-lg-6">
                              <div class="form-group p-0 mb-3">
                                 <label for="">Phone</label>
                                 <input required type="phone" id="phone" class="form-control" name="phone_number" value="{{auth()->user()->phone_number}}">
                              </div>
                           </div>

                        </div>

                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group p-0 mb-3">
                                 <label for="">Password</label>
                                 <input type="password" id="password" class="form-control" name="password" >
                              </div>
                           </div>
                        <div class="col-lg-6">
                        <div class="form-group p-0 mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" id="confirm-password" class="form-control" name="password_confirmation" >
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group p-0 text-right">
                        <button type="submit" class="btn btn-primary">
                        Update
                        </button>
                        </div>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>   
@endsection()