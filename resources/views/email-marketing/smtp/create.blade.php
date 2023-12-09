@extends('layout.appTheme')
@section('content')

<div class="position-relative iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Add New SMTP</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{ asset('assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>

<div class="content-inner container-fluid pb-0" id="page_layout">
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add New SMTP</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route('custom-smtps.store') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="host">Host:</label>
                              <input type="text" class="form-control" id="host" name="host" value="{{ old('host') }}" required>
                              @error('host')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="port">Port:</label>
                              <input type="number" class="form-control" id="port" name="port" value="{{ old('port') }}" required>
                              @error('port')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="username">Username:</label>
                              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                              @error('username')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="password">Password:</label>
                              <input type="password" class="form-control" id="password" name="password" required>
                              @error('password')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="encryption_type">Encryption type:</label>
                              <input type="text" class="form-control" id="encryption_type" name="encryption_type" value="{{ old('encryption_type') }}" placeholder="eg. ssl, tls" required>
                              @error('encryption_type')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="reply_to">Reply To:</label>
                              <input type="email" class="form-control" id="reply_to" name="reply_to" value="{{ old('reply_to') }}" required>
                              @error('reply_to')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="username_display">Display name:</label>
                              <input type="text" class="form-control" id="username_display" name="username_display" value="{{ old('username_display') }}" placeholder="BCCUSA COMPANY" required>
                              @error('username_display')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col"><br /></div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
