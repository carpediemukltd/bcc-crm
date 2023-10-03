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
                     <p>Experience a simple yet powerful way to build Dashboard</p>
                  </div>
                  <!-- <div>
                     <a href="" class="btn btn-link btn-soft-light">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                           <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                        </svg>
                        Announcements
                     </a>
                  </div> -->
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
                  <div class="col">
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
                  <div class="col">
                     <div class="form-group">
                        <input type="hidden" name="phone_country_code" id="selected-country-code" value="+1">
                        <label class="form-label" for="phone_number">Phone number:</label>
                        <div class="phone-input">
                           <input name="phone_number" type="tel" id="phone-number" placeholder="Enter your phone number" class="form-control" required>
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