@extends('layout.appTheme')
@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Email Template Edit</h1>
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
<div class="content-inner pb-0 container-fluid" id="page_layout">
    <div>
        @include('alert_message')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Email Templates Edit</h4>
                        </div>
                    </div>
                    <form action="{{ route('email-templates.update', $template['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Template Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$template['name']}}" required>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="subject">Subject of the Design:</label>
                                        <input type="text" class="form-control" id="subject" name="subject" value="{{$template['subject']}}" required>
                                        @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label" for="html_content">Content</label>

                                    <textarea name="html_content" rows="4" cols="100" class="form-control tiny-integerate"> {!! $template['html_content'] !!}</textarea>
                                    <input type="hidden" name="id" value="{{$template['id']}}">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: '.tiny-integerate',
        toolbar_location: "top",
        menubar: true,
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
    });
</script>


@endsection