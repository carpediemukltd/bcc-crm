@extends('layout.appTheme')
@section('content')

<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Add Contact</h1>
                     <p>Add new contact.</p>
                  </div>
                  <div>
                     <!-- <a href="" class="btn btn-link btn-soft-light">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                           <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                        </svg>
                        Announcements
                     </a> -->
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
      <div class="all_type_alert_boxes">
         @if (session('success'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulations!</strong> {{ session('success') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif

         @if (session('error'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> {{ session('error') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif
      </div>

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
                              <label class="form-label" for="phone_number">Phone number:</label>
                              <input type="number" id="phone_number" class="form-control" name="phone_number" placeholder="123456789" value="{{old('phone_number')}}" required>
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
                     <input type="hidden" id="roles_count"  name="roles_count" value="{{count($roles)}}">
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label" for="role">Roles</label>
                              <select class="form-select" id="role" name="role" onchange="toggleRoles()" required>
                                 <option value="">Select</option>
                              @foreach($roles as $role)
                                 <option value="{{$role}}" <?=(count($roles)==1)? 'selected="selected"':'' ?>>{{ucfirst($role)}}</option>
                              @endforeach
                           </select>
                           </div>
                        </div>
                        
                        <div class="col-6" id="owners_list" style="display: <?=(count($owners)==1)? 'block':'none' ?>;">
                           <div class="form-group">
                              <label class="form-label" for="role">Owners</label>
                              <select class="form-select" id="owner" name="owner">
                                 <option value="">Select</option>
                              @foreach($owners as $owner)
                                 <option value="{{$owner->id}}" <?=(count($owners)==1)? 'selected="selected"':'' ?>>{{$owner->first_name}} {{$owner->last_name}}</option>
                              @endforeach
                           </select>
                           </div>
                        </div>
                     @endif
                     </div>
                     
                     @unless (count($custom_fields)==0)
                     <input type="hidden" id="custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">
                     <div class="row">
                         @foreach($custom_fields as $field)        
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label" for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
                              <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]">
                           </div>
                        </div>
                        @endforeach
                     </div>
                     @endif

                     <div class="row"><div class="col"><br /></div></div>

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
  function toggleRoles(){
   var roles = $('#role :selected').val();
   console.log(roles);
   if(roles=='user'){
      $('#owner').attr('required','required');
      console.log('added');
      $('#owners_list').show();
   }else {
      $('#owner').removeAttr('required');
      $('#owners_list').hide();
      console.log('removed');
   }
  }
   </script>

@endsection