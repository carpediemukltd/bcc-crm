<?php
$title = "Profile";
?>
@extends('layout.app')
@section('content')

<?php
$notificationService = app('App\Services\NotificationService');
$helperService = app('App\Services\HelperService');
$authUser = Auth()->user();
?>

<div class="container">
    <div class="row">
        <div class="md-col-10">
            <h3>My Profile</h3>
        </div>
    </div>

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

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="{{route('user.editProfile')}}" style="color:000;">Edit Profile</a>
                    |
                    <a href="{{route('user.lead')}}" style="color:000;">View Lead</a>
                </div>
                <div class="panel-body">
                    <h3>Full name: {{auth()->user()->full_name}}</h3>
                    <h3>Email: {{auth()->user()->email}}</h3>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection()