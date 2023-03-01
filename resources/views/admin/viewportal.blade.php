<?php
   $login = "no";
   $title = "View Portal";
   ?>
@extends('admin.layout.app')
@section('content')
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="content">
   <!-- <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Page 1</a></li>
         <li class="breadcrumb-item"><a href="#">Page 2</a></li>
         <li class="breadcrumb-item active">Default</li>
      </ol>
   </nav> -->
   <div class="view_portal_documents">
    <iframe src="https://dashboard.bccusa.com/user/dashboard" frameborder="0"></iframe>
   </div>
   
   
@endsection()