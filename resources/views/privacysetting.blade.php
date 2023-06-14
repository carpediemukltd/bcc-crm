@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>BCC Provacy</h1>
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
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <!-- <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Privacy Setting</h4>
               </div>
            </div> -->
            <div class="card-body">
               <div class="acc-privacy">
                  <div class="data-privacy">
                     <h4 class="mb-2">Account Privacy</h4>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheck5">
                        <label class="form-check-label pl-2" for="customCheck5">Private Account</label>
                     </div>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">Activity Status</h4>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="activety">
                        <label class="form-check-label pl-2" for="activety">Show Activity Status</label>
                     </div>
                     <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2"> Story Sharing </h4>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="story">
                        <label class="form-check-label pl-2" for="story">Allow Sharing</label>
                     </div>
                     <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2"> Photo Of You </h4>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio0" id="automatically" checked="">
                        <label for="automatically" class="form-check-label pl-2">Add Automatically</label>
                     </div>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio0" id="manualy">
                        <label for="manualy" class="form-check-label pl-2">Add Manualy</label>
                     </div>
                     <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2"> Your Profile </h4>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio1" id="public">
                        <label for="public" class="form-check-label pl-2">Public</label>
                     </div>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio1" id="friend">
                        <label for="friend" class="form-check-label pl-2">Friend</label>
                     </div>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio1" id="spfriend">
                        <label for="spfriend" class="form-check-label pl-2">Specific Friend</label>
                     </div>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio1" id="onlyme">
                        <label for="onlyme" class="form-check-label pl-2">Only Me</label>
                     </div>
                     <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2"> Login Notification </h4>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio2" id="enable">
                        <label for="enable" class="form-check-label pl-2">Enable</label>
                     </div>
                     <div class="form-check">
                        <input type="radio" class="form-check-input" name="customRadio2" id="disable">
                        <label for="disable" class="form-check-label pl-2">Disable</label>
                     </div>
                     <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">Privacy Help</h4>
                     <a href="#"><i class="ri-customer-service-2-line me-2"></i>Support</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection