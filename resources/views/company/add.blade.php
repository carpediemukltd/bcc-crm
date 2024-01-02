@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Company Onboarding</h1>
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
   <div class="row">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">Add Company Details</h4>
            </div>
         </div>
         <div class="card-body">
            <form action="{{route('company.add')}}" method="POST">
               @csrf
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-label" for="title">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value="{{old('name')}}" required>
                        @if ($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="hidden" id="role" name="role" value="admin" required>
                     </div>
                  </div>
               </div>
               
                <div class="header-title mt-3 mb-4">
                   <h4 class="card-title">Admin Details</h4>
                </div>
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{old('first_name')}}" required>
                        @if ($errors->has('first_name'))
                           <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" required>
                        @if ($errors->has('last_name'))
                           <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
                        @if ($errors->has('email'))
                           <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                           <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <input type="hidden" name="phone_country_code" id="selected-country-code" value="+1">
                        <label class="form-label" for="phone_number">Phone number:</label>
                        <div class="phone-input">
                           <input name="phone_number" class="form-control" type="tel" id="phone-number" placeholder="Enter your phone number" class="form-control" required>
                        </div>
                        @if ($errors->has('phone_number'))
                           <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                  </div>
               </div>
            
               <div class="row"><div class="col"><br></div></div>

               <div class="row">
                  <div class="col">
                     <a href="#" class="btn btn-danger">Cancel</a>
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection