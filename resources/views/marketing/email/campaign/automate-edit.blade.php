@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Campaign Edit</h1>
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
                    <form method="POST" action="{{route('marketing-campaigns.update', $data['campaign']->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row" style="padding:20px">
                            <input type="hidden" name="type" value="automate">
                            <div class="col-sm-4">
                                <label class="form-label" for="title">Campaign name</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data['campaign']->name }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-control" name="status" id="status" name="status">
                                    <option <?php if ($data['campaign']->status == 'active') {
                                                echo 'selected';
                                            } ?> value="active">Active</option>
                                    <option <?php if ($data['campaign']->status == 'paused') {
                                                echo 'selected';
                                            } ?> value="paused">Paused</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="status">Stage</label>
                                <select class="form-control" name="stage" id="stage">
                                    <option value="0" {{ !$data['campaign']->stage ? 'selected' : '' }}>--Select Stage--</option>
                                    @if(count($data['stages']))
                                    @foreach($data['stages'] as $stage)
                                    <option {{ $data['campaign']->stage && $stage->id == $data['campaign']->stage->id ? 'selected' : '' }} value="{{ $stage->id }}">{{ $stage->title }}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="col-sm-2 pt-5">
                                <label class="form-label" for="subject">Subject</label>
                                <input required type="text" class="form-control" name="subject" id="subject" value="{{$data['campaign']->marketingCampaignSequence[0]->subject}}">
                            </div>
                            <div class="col-sm-8 pt-5">
                                <label class="form-label" for="html_content">Content</label>
                                <textarea required id="html_content" name="html_content" rows="4" cols="100" class="form-control tiny-integerate">{{$data['campaign']->marketingCampaignSequence[0]->body}}</textarea>
                                @error('html_content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 pt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
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