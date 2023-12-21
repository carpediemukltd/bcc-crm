@extends('layout.appTheme')
@section('content')
    <style>
        /* disable arrow keys from input field */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>My Profile</h1>
                     <p>Edit your profile details and password also.</p>
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
<div class="content-inner container-fluid pb-0 edit-profile" id="page_layout">
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{route('profile')}}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="first_name">First name:</label>
                              <input type="text" class="form-control" id="first_name" placeholder="First name" value="{{$user->first_name}}" name="first_name" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="last_name">Last name:</label>
                              <input type="text" class="form-control" id="last_name" placeholder="Last name" value="{{$user->last_name}}" name="last_name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="email">Email address:</label>
                              <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="hidden" name="phone_country_code" id="selected-country-code" >
                              <input type="hidden" name="old_phone_number" id="old_phone_number" value="{{str_replace("+1 ","",$user->phone_number)}}">
                              <label class="form-label" for="phone_number">Phone number:</label>
                              <div class="phone-input">
                                 <input value="{{$user->phone_number}}" name="phone_number" type="tel" id="phone-number" placeholder="Enter your phone number" class="form-control" required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row mb-3">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="password">Password:</label>
                              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                              @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="confirm_password">Confirm Password:</label>
                              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                              @if ($errors->has('confirm_password'))
                              <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="row">

                        <div class="col-lg-3">
                           <div class="form-group  p-0 mb-0">
                              <label for="toggle2FA">Enable 2FA</label>
                              <label class="switch">
                                 <input type="checkbox" id="toggle2FA" name="two_factor" {{ auth()->user()->two_factor_enabled ? 'checked' : '' }}>
                                 <span class="slider round"></span>
                              </label>
                           </div>
                        </div>
                        <div id="twoFactorType" class="{{ auth()->user()->two_factor_enabled ? 'col-lg-3' : 'col-lg-3 display-none' }}">
                           <div class="form-group p-0 mb-0">
                               @php
                                   $mobileVerified = (auth()->user()->two_factor_type == 'both'|| auth()->user()->two_factor_type == 'phone') ? 'checked' : '';
                                   $emailVerified = (auth()->user()->two_factor_type == 'both' || auth()->user()->two_factor_type == 'email') ? 'checked' : '';
                               @endphp
                               <div class="col-lg-6 ml-1">
                                   <input class="form-check-input" type="checkbox" value="1" id="mobileVerifiedCheckbox" {{$mobileVerified}} onchange="showModal(this)" name="mobileVerifiedcheckbox">
                                   <label class="form-check-label" for="mobileVerifiedCheckbox">Mobile</label>
                               </div>
                               <div class="col-lg-6">
                                   <input class="form-check-input" type="checkbox" value="1" id="emailVerifiedCheckbox" {{$emailVerified}} onchange="showModal(this)" name="emailVerifiedcheckbox">
                                   <label class="form-check-label" for="emailVerifiedCheckbox">Email</label>
                               </div>
                           </div>
                        </div>
                         @php $disabled = (auth()->user()->role == 'admin') ? 'disabled' : '' @endphp
                         <div class="col-lg-12 mt-3">
                             <div class="form-group">
                                 <label class="form-label" for="mobileVerified">Mobile Verified:</label>
                                 <input type="radio" name="mobileVerified" id="mobileVerified" value="1" @php echo (auth()->user()->mobile_verified == 1) ? 'checked' : '' @endphp onchange="checkMobileVerification()" {{$disabled}}> Yes
                                 <input type="radio" name="mobileVerified" id="mobileVerified" value="0" @php echo (auth()->user()->mobile_verified == 0) ? 'checked' : '' @endphp data-id="notVerified" {{$disabled}}> No
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="form-label" for="emailVerified">Email Verified:</label>
                                 <input type="radio" name="emailVerified" id="emailVerified" value="1" @php echo (auth()->user()->email_verified == 1) ? 'checked' : '' @endphp {{$disabled}}> Yes
                                 <input type="radio" name="emailVerified" id="emailVerified" value="0" @php echo (auth()->user()->email_verified == 0) ? 'checked' : '' @endphp {{$disabled}}> No
                             </div>
                         </div>
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
<script>
   const toggle = document.getElementById('toggle2FA');
   const twoFactorTypeContainer = document.getElementById('twoFactorType');
   // Function to toggle the design
   toggle.addEventListener('change', function() {
      console.log(toggle)
      if (toggle.checked) {
         twoFactorTypeContainer.style.display = 'block';

      } else {
         twoFactorTypeContainer.style.display = 'none';

      }
   });

   function showModal(obj) {
       var TargetId = $(obj).attr("id");
       var email = $("#email").val();
       var phoneNumber = $("#phone-number").val();

       if(phoneNumber == "" || phoneNumber == "null" || phoneNumber == null)
       {
           if($(obj).is(':checked'))
               $(obj).prop('checked',false);
           else
               $(obj).prop('checked',true);

           Swal.fire({
               icon: "error",
               title: "Error!",
               text: "Enter Phone number"
           });
           return false;
       }

       if (TargetId == "mobileVerifiedCheckbox")
       {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
               }
           });
           var iMobileVerified = $("input[name='mobileVerified']:checked").val();
           var iEmailVerified = ($("#emailVerifiedCheckbox").is(':checked')) ? 1 : 0;

           if(iMobileVerified == 0)
           {
               $.ajax({
                   type: 'POST',
                   url: '/resend-verification-code',
                   data: {'email': email, 'phoneNumber': $("#selected-country-code").val()+' '+phoneNumber},
                   success: function(response) {
                       if(response.error){
                           if($(obj).is(':checked'))
                               $(obj).prop('checked',false);
                           else
                               $(obj).prop('checked',true);
                           Swal.fire({
                               icon: "error",
                               title: "Error!",
                               text: response.error
                           });
                           return false;
                       }else{
                           //code sent successfully
                           Swal.fire({
                               icon: "success",
                               title: "2FA-Code Sent!",
                               text: response.success,
                               confirmButtonText: "Enter Code"
                           }).then((result) => {
                               if (result.isConfirmed) {
                                   Swal.fire({
                                       title: "Verify Code",
                                       input: "number",
                                       showCancelButton: true,
                                       confirmButtonText: "Verify",
                                       showLoaderOnConfirm: true,
                                       didOpen: function (){
                                           // Disable Up and Down Arrows on mouse wheel
                                           $("#swal2-input").on('mousewheel',function(e){
                                               $(this).blur();
                                           });

                                           $("#swal2-input").on('keydown',function(e) {
                                               var key = e.charCode || e.keyCode;
                                               // Disable Up and Down Arrows on Keyboard
                                               if(key == 38 || key == 40 || key == 190)
                                                   e.preventDefault();
                                           });
                                       },
                                       preConfirm: async (code) => {
                                           $.ajax({
                                               type: "POST",
                                               url: "{{route('verify-2fa')}}",
                                               data: {'verification_code': code, 'email': email,'mobileVerified': 1, 'EmailVerified' : iEmailVerified},
                                               success: function(response){
                                                   if(response.error)
                                                   {
                                                       if($(obj).is(':checked'))
                                                           $(obj).prop('checked',false);
                                                       else
                                                           $(obj).prop('checked',true);
                                                       Swal.fire({
                                                           icon: "error",
                                                           title: "Error!",
                                                           text: response.error
                                                       });
                                                       return false;
                                                   }
                                                   else
                                                   {
                                                       Swal.fire({
                                                           icon: "success",
                                                           title: "Record Updated!",
                                                           text: response.success
                                                       });
                                                       location.reload();
                                                   }
                                               }
                                           });
                                       },
                                       allowOutsideClick: () => !Swal.isLoading()
                                   }).then((result) => {
                                       if (result.isDismissed){
                                           if($(obj).is(':checked'))
                                               $(obj).prop('checked',false);
                                           else
                                               $(obj).prop('checked',true);
                                       }
                                   });
                               }
                               else if(result.isDismissed)
                               {
                                   if($(obj).is(':checked'))
                                       $(obj).prop('checked',false);
                                   else
                                       $(obj).prop('checked',true);
                               }
                           });
                       }
                   },
                   error: function() {
                       if($(obj).is(':checked'))
                           $(obj).prop('checked',false);
                       else
                           $(obj).prop('checked',true);
                       Swal.fire({
                           icon: "error",
                           title: "Error!",
                           text: "Too Many Attempts."
                       });
                       return false;
                   }
               });
           }
       }
   }

   function checkMobileVerification() {
       var iMobileVerified = ($("#mobileVerifiedCheckbox").is(':checked')) ? 1 : 0;

       if (iMobileVerified === 0)
       {
           Swal.fire({
               icon: "error",
               title: "Error!",
               text: "First Verify the Mobile Number."
           });
           $("input[data-id='notVerified']").prop("checked",true);
           return false;
       }
   }
</script>
@endsection
