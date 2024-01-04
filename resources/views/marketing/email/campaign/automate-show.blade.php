@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Campaign View</h1>
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
<div class="content-inner pb-0 container-fluid email-marketing-campaign" id="page_layout">
    <div>
        @include('alert_message')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="mb-3">Sequence Subject</h4>
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" value="{{$campaign->marketingCampaignSequence[0]->subject}}">
                            </div>
                            <div class="col-sm-8">
                                <h4 class="mb-3">Sequence Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="title">Campaign name</label>
                                        <input disabled type="text" class="form-control" id="title" name="title" value="{{ $campaign->name }}" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option>{{$campaign->status}}</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="content_view_holder mt-4">
                                    <!-- <label class="form-label" for="html_content">Content</label> -->
                                    <textarea id="html_content" name="html_content" rows="4" cols="100" class="form-control tiny-integerate">{{$campaign->marketingCampaignSequence[0]->body}}</textarea>
                                    @error('html_content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
<script>
    $(document).ready(function() {


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

    });
</script>

@endsection