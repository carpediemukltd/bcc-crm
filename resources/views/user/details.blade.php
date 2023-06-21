@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Contact Details</h1>
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
            <div class="card-body">
               <div class="d-flex flex-wrap align-items-center justify-content-between">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                        <img src="{{asset('assets/images/avatars/01.png')}}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100" loading="lazy" />
                        <img src="{{asset('assets/images/avatars/avtar_1.png')}}" alt="User-Profile" class="theme-color-purple-img img-fluid rounded-pill avatar-100" loading="lazy" />
                        <img src="{{asset('assets/images/avatars/avtar_2.png')}}" alt="User-Profile" class="theme-color-blue-img img-fluid rounded-pill avatar-100" loading="lazy" />
                        <img src="{{asset('assets/images/avatars/avtar_4.png')}}" alt="User-Profile" class="theme-color-green-img img-fluid rounded-pill avatar-100" loading="lazy" />
                        <img src="{{asset('assets/images/avatars/avtar_5.png')}}" alt="User-Profile" class="theme-color-yellow-img img-fluid rounded-pill avatar-100" loading="lazy" />
                        <img src="{{asset('assets/images/avatars/avtar_3.png')}}" alt="User-Profile" class="theme-color-pink-img img-fluid rounded-pill avatar-100" loading="lazy" />
                     </div>
                     <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                        <h4 class="me-2 mb-0 h4">{{ucwords($rs_user->first_name. ' '. $rs_user->last_name)}}</h4>
                        <!-- <span> - Web Developer</span> -->
                     </div>
                  </div>
                  <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Meetings</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Activity</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab" aria-selected="false">Emails</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab" aria-selected="false">Tasks</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Contact Forms</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="user_details_view" id="user_details_view">
                  <form action="" method="POST">
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control" id="first_name" placeholder="Name" name="first_name" value="{{$rs_user->first_name}}" required>
                              <label for="floatingInputGrid">First Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control" id="last_name" placeholder="Name" name="last_name" value="{{$rs_user->last_name}}" required>
                              <label for="floatingInputGrid">Last Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control" id="email" value="{{$rs_user->email}}" disabled>
                              <label for="floatingInputGrid">Email</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="email" class="form-control" id="contact_owner" placeholder="Contact Owner" name="email" required="">
                              <label for="floatingInputGrid">Contact Owner</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" id="lead_status" class="form-control" name="lead_status" placeholder="Lead Status" required="">
                              <label for="floatingInputGrid">Lead Status</label>
                           </div>
                        </div>
                     </div>
                     @include('user.partial._custom_fields')
                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary contact_view_btn" onclick="myFunction()">Edit</button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- user edit view start -->
               <div class="user_edit_view" id="user_edit_view" style="display: none;">
                  <form class="row g-3 mb-6" method="POST" action="{{route('user.details', $id)}}">
                     @method('PUT')
                     @csrf
                     <div class="col-sm-6 col-md-12">
                        <label class="form-label" for="customFile">File input example</label>
                        <input class="form-control" id="customFile" type="file" />
                     </div>
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input class="form-control" id="floatingInputGrid" type="text" placeholder="Name" name="name">
                           <label for="floatingInputGrid">Name</label>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input class="form-control" id="floatingInputGrid" type="text" placeholder="Designation" name="designation">
                           <label for="floatingInputGrid">Designation</label>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input class="form-control" id="floatingInputGrid" type="text" placeholder="Email" name="email">
                           <label for="floatingInputGrid">Email</label>
                        </div>
                     </div>
                     <div class="col-md-12 ">
                        <div class="form-floating">
                           <input class="form-control" id="floatingInputBudget" type="text" placeholder="Contact Owner" name="contact_owner">
                           <label for="floatingInputBudget">Contact Owner</label>
                        </div>
                     </div>
                     <div class="col-md-12 ">
                        <div class="form-floating">
                           <input class="form-control" id="floatingInputBudget" type="text" placeholder="Lead Status" name="lead_status">
                           <label for="floatingInputBudget">Lead Status</label>
                        </div>
                     </div>       
                     @unless (count($custom_fields)==0)   
                     <input type="hidden" id="custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">
                     @foreach($custom_fields as $field)
                     <div class="col-md-12">
                        <div class="form-group form-floating">
                           <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" value="{{$field->data}}" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]" required="">
                           <label for="floatingInputGrid">{{$field->title}}</label>
                        </div>
                     </div>
                     @endforeach
                     @endif
                     <div class="col-12 ">
                        <div class="text-right">
                           <button class="btn btn-primary contact_view_btn">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="profile-content tab-content iq-tab-fade-up">
            <div id="profile-feed" class="tab-pane fade active show">
               <div class="card">
                  
                  <div class="card-body p-0">
                     <p class="p-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                     
                  </div>
               </div>
            </div>
            <div id="profile-activity" class="tab-pane fade">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Activity</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="list-inline p-0 m-0">
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <h6 class="float-left mb-1">Client Login</h6>
                              <small class="float-right mt-1">24 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                              <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                              <small class="float-right mt-1">23 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                              <h6 class="float-left mb-1">Dev Meetup</h6>
                              <small class="float-right mt-1">20 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                 <div class="iq-media-group iq-media-group-1">
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                    </a>
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                    </a>
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                    </a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <h6 class="float-left mb-1">Client Call</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                              <h6 class="float-left mb-1">Mega event</h6>
                              <small class="float-right mt-1">15 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="profile-friends" class="tab-pane fade">
               <div class="card">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Emails</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline m-0 p-0">
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/01.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paul Molive</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton9">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paul Molive</h6>
                              <p class="mb-0">trainee</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton10">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Anna Mull</h6>
                              <p class="mb-0">Web Developer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton11">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paige Turner</h6>
                              <p class="mb-0">trainee</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton12">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/04.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Barb Ackue</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton13">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Greta Life</h6>
                              <p class="mb-0">Tester</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton14">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />                              
                           <div class="ms-3 flex-grow-1">
                              <h6>Ira Membrit</h6>
                              <p class="mb-0">Android Developer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton15">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Pete Sariya</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton16">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div id="profile-profile" class="tab-pane fade">
               <div class="card">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Tasks</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="user-bio">
                        <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                     </div>
                     <div class="mt-2">
                        <h6 class="mb-1">Joined:</h6>
                        <p>Feb 15, 2021</p>
                     </div>
                     <div class="mt-2">
                        <h6 class="mb-1">Lives:</h6>
                        <p>United States of America</p>
                     </div>
                     <div class="mt-2">
                        <h6 class="mb-1">Email:</h6>
                        <p><a href="#" class="text-body"> austin@gmail.com</a></p>
                     </div>
                     <div class="mt-2">
                        <h6 class="mb-1">Url:</h6>
                        <p><a href="#" class="text-body" target="_blank"> www.bootstrap.com </a></p>
                     </div>
                     <div class="mt-2">
                        <h6 class="mb-1">Contact:</h6>
                        <p><a href="#" class="text-body">(001) 4544 565 456</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card">
            <div class="card-body">
               <div class="contact_details_nav">
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#CRM" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="CRM">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">Deals ({{@count($deals)}})</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="CRM">
                           <div id="deals_list">
                              @unless (count($deals)==0)
                              @foreach($deals as $deal)
                              <div class="nav-item">
                              <span>{{$deal->title}} ({{$deal->deal_owner}})</span>
                              <span>{{$deal->pipeline}} ({{$deal->stage}})</span><br />
                              </div>
                              @endforeach
                              @endif
                           </div>
                           <br style="clear: both" />
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.deals', $rs_user->id)}}" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text"> All Deals</span></div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.deals.add', $rs_user->id)}}" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Add New Deal</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">Contact create attribution</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="social">
                           <li class="nav-item">
                              <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#view-documents" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="view-documents">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">View Documents</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <title></title>
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="view-documents">
                           <li class="nav-item">
                              <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">View BCC Portal</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
      <div class="offcanvas-header">
         <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body small">
         <div class="d-flex flex-wrap align-items-center">
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/08.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>Facebook</h6>
            </div>
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/09.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>Twitter</h6>
            </div>
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/10.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>Instagram</h6>
            </div>
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/11.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>Google Plus</h6>
            </div>
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/13.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>In</h6>
            </div>
            <div class="text-center me-3 mb-3">
               <img src="{{asset('assets/images/brands/12.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
               <h6>YouTube</h6>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function myFunction() {
  var x = document.getElementById("user_edit_view");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  var y = document.getElementById("user_details_view");
  if (y.style.display === "block") {
   y.style.display = "none";
  } else {
   y.style.display = "none";
  }
}

</script>
@endsection