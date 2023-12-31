@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>User Add</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
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
         <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div>
      <div class="row">
         <div class="col-xl-3 col-lg-4">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add New User</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <div class="profile-img-edit position-relative">
                           <img src="{{asset('assets/images/avatars/01.png')}}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100" loading="lazy">
                           <img src="{{asset('assets/images/avatars/avtar_1.png')}}" alt="profile-pic" class="theme-color-purple-img profile-pic rounded avatar-100" loading="lazy">
                           <img src="{{asset('assets/images/avatars/avtar_2.png')}}" alt="profile-pic" class="theme-color-blue-img profile-pic rounded avatar-100" loading="lazy">
                           <img src="{{asset('assets/images/avatars/avtar_4.png')}}" alt="profile-pic" class="theme-color-green-img profile-pic rounded avatar-100" loading="lazy">
                           <img src="{{asset('assets/images/avatars/avtar_5.png')}}" alt="profile-pic" class="theme-color-yellow-img profile-pic rounded avatar-100" loading="lazy">
                           <img src="{{asset('assets/images/avatars/avtar_3.png')}}" alt="profile-pic" class="theme-color-pink-img profile-pic rounded avatar-100" loading="lazy">
                           <div class="upload-icone bg-primary">
                              <svg class="upload-button icon-14" width="14" height="14" viewBox="0 0 24 24">
                                 <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                              </svg>
                              <input class="file-upload" type="file" accept="image/*">
                           </div>
                        </div>
                        <div class="img-extension mt-3">
                           <div class="d-inline-block align-items-center">
                              <span>Only</span>
                              <a href="#">.jpg</a>
                              <a href="#">.png</a>
                              <a href="#">.jpeg</a>
                              <span>allowed</span>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-label">User Role:</label>
                        <select name="type" class="selectpicker form-control" data-style="py-0">
                           <option>Select</option>
                           <option>Web Designer</option>
                           <option>Web Developer</option>
                           <option>Tester</option>
                           <option>Php Developer</option>
                           <option>Ios Developer </option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="furl">Facebook Url:</label>
                        <input type="text" class="form-control" id="furl" placeholder="Facebook Url">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="turl">Twitter Url:</label>
                        <input type="text" class="form-control" id="turl" placeholder="Twitter Url">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="instaurl">Instagram Url:</label>
                        <input type="text" class="form-control" id="instaurl" placeholder="Instagram Url">
                     </div>
                     <div class="form-group mb-0">
                        <label class="form-label" for="lurl">Linkedin Url:</label>
                        <input type="text" class="form-control" id="lurl" placeholder="Linkedin Url">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-xl-9 col-lg-8">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">New User Information</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <form>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">First Name:</label>
                              <input type="text" class="form-control" id="fname" placeholder="First Name">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="lname">Last Name:</label>
                              <input type="text" class="form-control" id="lname" placeholder="Last Name">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add1">Street Address 1:</label>
                              <input type="text" class="form-control" id="add1" placeholder="Street Address 1">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add2">Street Address 2:</label>
                              <input type="text" class="form-control" id="add2" placeholder="Street Address 2">
                           </div>
                           <div class="form-group col-md-12">
                              <label class="form-label" for="cname">Company Name:</label>
                              <input type="text" class="form-control" id="cname" placeholder="Company Name">
                           </div>
                           <div class="form-group col-sm-12">
                              <label class="form-label">Country:</label>
                              <select name="type" class="selectpicker form-control" data-style="py-0">
                                 <option>Select Country</option>
                                 <option>Caneda</option>
                                 <option>Noida</option>
                                 <option >USA</option>
                                 <option>India</option>
                                 <option>Africa</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="mobno">Mobile Number:</label>
                              <input type="text" class="form-control" id="mobno" placeholder="Mobile Number">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="altconno">Alternate Contact:</label>
                              <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Email:</label>
                              <input type="email" class="form-control" id="email" placeholder="Email">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pno">Pin Code:</label>
                              <input type="text" class="form-control" id="pno" placeholder="Pin Code">
                           </div>
                           <div class="form-group col-md-12">
                              <label class="form-label" for="city">Town/City:</label>
                              <input type="text" class="form-control" id="city" placeholder="Town/City">
                           </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Security</h5>
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label class="form-label" for="uname">User Name:</label>
                              <input type="text" class="form-control" id="uname" placeholder="User Name">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pass">Password:</label>
                              <input type="password" class="form-control" id="pass" placeholder="Password">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="rpass">Repeat Password:</label>
                              <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                           </div>
                        </div>
                        <div class="checkbox">
                           <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexchexked">Enable Two-Factor-Authentication</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Add New User</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection