@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Email Template Create</h1>
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
                     <h4 class="card-title">Email Templates Create</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route('marketing-email-templates.store') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label" for="name">Template Name:</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                              @error('name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label" for="email_subject">Email Subject:</label>
                              <input type="text" class="form-control" id="email_subject" name="email_subject" value="{{ old('email_subject') }}" required>
                              @error('email_subject')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label class="form-label" for="content">Content</label>
                           <textarea name="content" rows="4" cols="100" class="form-control tiny-integerate"></textarea>
                           @error('content')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <br><br><br>
                     <div class="row">
                        <div class="col text-right">
                           <button type="submit" class="btn btn-primary">Submit</button>
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