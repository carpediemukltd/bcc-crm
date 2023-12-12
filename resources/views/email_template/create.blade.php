@extends('layout.appTheme')
@section('content')
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <div class="position-relative iq-banner default">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="email-template-title single-sub-heading">ADD Email Template</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('assets/images/dashboard/top-header.png') }}" alt="header"
                    class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            </div>
        </div>
    </div>
    <div class="content-inner pb-0 container-fluid" id="page_layout">
        <div>
            @include('alert_message')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">ADD Email Template</h4>
                            </div>
                        </div>
                        <div class="row" id="show_loading" style="display: none;">
                            <div class="col-md-2">
                                <div class="preloader-dot-loading">
                                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div id="container">
                                <form action="{{ route('email_template.add') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <title>Subject</title>
                                                <input type="text" placeholder="New Subject" id="email_subject" name="email_subject" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea id="editor1" class="form-control" name="email_body" rows="18" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Add Template</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- 
                            <div class="row">
                                        <title>Body</title>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="editor"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script> --}}
    <script>
         CKEDITOR.replace('editor1');
      
    </script>
    
@endsection
	