@extends('layout.appTheme')
@section('content')

<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Add Admin / Super User </h1>
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
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{route('user.add')}}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="first_name">First name:</label>
                              <input type="text" class="form-control" id="first_name" placeholder="First name" name="first_name" value="{{old('first_name')}}" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="last_name">Last name:</label>
                              <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" value="{{old('last_name')}}" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="email">Email address:</label>
                              <input type="email" class="form-control" id="email" placeholder="Email address" name="email" value="{{old('email')}}" required>
                              @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
                           </div>
                        </div>
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

                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label" for="password">Password:</label>
                              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                              @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        @if (count($roles)>0)
                        <input type="hidden" id="roles_count" name="roles_count" value="{{count($roles)}}">
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label" for="role">Roles</label>
                              <select class="form-select" id="role" name="role" onchange="toggleRoles()" required>
                                 <option value="">Select</option>
                                 @foreach($roles as $role)
                                 <option value="{{$role}}" <?= (count($roles) == 1) ? 'selected="selected"' : '' ?>>{{ucfirst($role =='owner'?'Super User':$role)}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label" for="role">Company</label>
                              <select class="form-select" id="company" name="company" required>
                                 <option value="">Select</option>
                                 @foreach($companies as $company)
                                 <option value="{{$company->id}}">{{$company->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>

                        @endif
                     </div>
                     <div class="row">
                        <div class="col"><br /></div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function toggleRoles() {
      var roles = $('#role :selected').val();
      if (roles == 'user') {
         $('#owner').attr('required', 'required');
         $('#owners_list').show();
      } else {
         $('#owner').removeAttr('required');
         $('#owners_list').hide();
      }
   }
</script>


@endsection