@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Add Settings</h1>
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
    @include('alert_message')

    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('company-bank-settings.update', $setting->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$setting->setting_name}}" required>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="type">Select Setting Type</label>
                            <select name="type" id="type" class="form-select">
                                @foreach ($setting_types as $setting_type)
                                    <option value="{{ $setting_type->id }}" {{ $setting_type->id == $setting->type->id ? 'selected' : '' }}>
                                        {{ $setting_type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"><br></div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection