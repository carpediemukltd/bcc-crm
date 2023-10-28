@extends('layout.appTheme')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mentiony.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <style>
        textarea {width: 100%}
        .mentiony-container, .mentiony-content{width: 100%!important;}
        .demo-item{ height: 300px;}
        .demo-item .demo, .demo-item .demo > *{ height: 100%; }
        .demo-item .code, .demo-item .code > *{ height: 100%; }
        .demo-item .code, .demo-item .code > pre > code{ padding: 0; background: none }
        .demo-item .code > pre > code{
            width: 999px !important;
            display: block;
        }
        pre.prettyprint {
            background-color: #693d3d!important;
        }

        .note_highlight{
            border: 2px solid #eb3484 !important;
            border-radius: 10px !important;
            box-shadow: 2px 2px 2px #eecaca !important;
        }
    </style>
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
                <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header"
                     class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">

            </div>
        </div>
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="mb-3 mb-sm-0 contact_user_details">
                                <h4 class="me-2 mb-3 h4">{{ucwords($user->first_name. ' '. $user->last_name)}}</h4>
                                <!-- <span> - Web Developer</span> -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <a class="" href="mailto:{{$user->email}}">
                                        <i class="user_icon icon">
                                            <svg width="22" class="icon-22" viewBox="0 0 22 22" fill="currentColor"
                                                 xmlns="">
                                                <path opacity="0.4"
                                                      d="M21.9999 15.9402C21.9999 18.7302 19.7599 20.9902 16.9699 21.0002H16.9599H7.04991C4.26991 21.0002 1.99991 18.7502 1.99991 15.9602V15.9502C1.99991 15.9502 2.00591 11.5242 2.01391 9.29821C2.01491 8.88021 2.49491 8.64621 2.82191 8.90621C5.19791 10.7912 9.44691 14.2282 9.49991 14.2732C10.2099 14.8422 11.1099 15.1632 12.0299 15.1632C12.9499 15.1632 13.8499 14.8422 14.5599 14.2622C14.6129 14.2272 18.7669 10.8932 21.1789 8.97721C21.5069 8.71621 21.9889 8.95021 21.9899 9.36721C21.9999 11.5762 21.9999 15.9402 21.9999 15.9402Z"
                                                      fill="currentColor"></path>
                                                <path
                                                    d="M21.476 5.6736C20.61 4.0416 18.906 2.9996 17.03 2.9996H7.05001C5.17401 2.9996 3.47001 4.0416 2.60401 5.6736C2.41001 6.0386 2.50201 6.4936 2.82501 6.7516L10.25 12.6906C10.77 13.1106 11.4 13.3196 12.03 13.3196C12.034 13.3196 12.037 13.3196 12.04 13.3196C12.043 13.3196 12.047 13.3196 12.05 13.3196C12.68 13.3196 13.31 13.1106 13.83 12.6906L21.255 6.7516C21.578 6.4936 21.67 6.0386 21.476 5.6736Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span>{{$user->email}}</span>
                                    </a>
                                    <a class="" href="tel:{{$user->phone_number}}">
                                        <i class="user_icon icon">
                                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="22" class="icon-22"
                                                 height="22" viewBox="0 0 22 22">
                                                <path
                                                    d="M14.4183 5.49C13.9422 5.40206 13.505 5.70586 13.4144 6.17054C13.3238 6.63522 13.6285 7.08891 14.0916 7.17984C15.4859 7.45166 16.5624 8.53092 16.8353 9.92995V9.93095C16.913 10.3337 17.2675 10.6265 17.6759 10.6265C17.7306 10.6265 17.7854 10.6215 17.8412 10.6115C18.3043 10.5186 18.609 10.0659 18.5184 9.60018C18.1111 7.51062 16.5027 5.89672 14.4183 5.49Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M14.3558 2.00793C14.1328 1.97595 13.9087 2.04191 13.7304 2.18381C13.5472 2.32771 13.4326 2.53557 13.4078 2.76841C13.355 3.23908 13.6946 3.66479 14.1646 3.71776C17.4063 4.07951 19.9259 6.60477 20.2904 9.85654C20.3392 10.2922 20.7047 10.621 21.1409 10.621C21.1738 10.621 21.2057 10.619 21.2385 10.615C21.4666 10.59 21.6698 10.4771 21.8132 10.2972C21.9556 10.1174 22.0203 9.89351 21.9944 9.66467C21.5403 5.60746 18.4002 2.45862 14.3558 2.00793Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M11.0317 12.9724C15.0208 16.9604 15.9258 12.3467 18.4656 14.8848C20.9143 17.3328 22.3216 17.8232 19.2192 20.9247C18.8306 21.237 16.3616 24.9943 7.6846 16.3197C-0.993478 7.644 2.76158 5.17244 3.07397 4.78395C6.18387 1.67385 6.66586 3.08938 9.11449 5.53733C11.6544 8.0765 7.04266 8.98441 11.0317 12.9724Z"
                                                      fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span>{{$user->phone_number}}</span>
                                    </a>
                                    <a class="" href="https://dashboard.bccusa.com/user/documents/view/{{$user->id}}"
                                       target="_blank">
                                        <i class="user_icon icon">
                                            <svg fill="none" style="width:20px" xmlns="http://www.w3.org/2000/svg"
                                                 class="icon-32" width="32" height="32" viewBox="0 0 24 24">
                                                <path
                                                    d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span>Bank Portal</span>
                                    </a>
                                    <a class="" href="javascript:void(0);" id="send_documents_toggle">
                                        <i class="user_icon icon">
                                            <svg width="22" class="icon-22" viewBox="0 0 22 22" fill="currentColor"
                                                 xmlns="">
                                                <path opacity="0.4"
                                                      d="M21.9999 15.9402C21.9999 18.7302 19.7599 20.9902 16.9699 21.0002H16.9599H7.04991C4.26991 21.0002 1.99991 18.7502 1.99991 15.9602V15.9502C1.99991 15.9502 2.00591 11.5242 2.01391 9.29821C2.01491 8.88021 2.49491 8.64621 2.82191 8.90621C5.19791 10.7912 9.44691 14.2282 9.49991 14.2732C10.2099 14.8422 11.1099 15.1632 12.0299 15.1632C12.9499 15.1632 13.8499 14.8422 14.5599 14.2622C14.6129 14.2272 18.7669 10.8932 21.1789 8.97721C21.5069 8.71621 21.9889 8.95021 21.9899 9.36721C21.9999 11.5762 21.9999 15.9402 21.9999 15.9402Z"
                                                      fill="currentColor"></path>
                                                <path
                                                    d="M21.476 5.6736C20.61 4.0416 18.906 2.9996 17.03 2.9996H7.05001C5.17401 2.9996 3.47001 4.0416 2.60401 5.6736C2.41001 6.0386 2.50201 6.4936 2.82501 6.7516L10.25 12.6906C10.77 13.1106 11.4 13.3196 12.03 13.3196C12.034 13.3196 12.037 13.3196 12.04 13.3196C12.043 13.3196 12.047 13.3196 12.05 13.3196C12.68 13.3196 13.31 13.1106 13.83 12.6906L21.255 6.7516C21.578 6.4936 21.67 6.0386 21.476 5.6736Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span>Send Documents</span>
                                    </a>
                                </div>
                            </div>
                            <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab"
                                id="profile-pills-tab" role="tablist">
                                <!-- <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab"
                                        aria-selected="false">Meetings</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="tab" href="#profile-activity" role="tab"
                                       aria-selected="false">Activity</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab"
                                        aria-selected="false">Emails</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-notes" role="tab"
                                       aria-selected="false">Notes</a>
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
                            <form>
                            <!-- <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="first_name" placeholder="First Name" value="{{$user->first_name}}">
                              <label for="first_name">First Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="last_name" placeholder="Last Name" value="{{$user->last_name}}">
                              <label for="last_name">Last Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="email" value="{{$user->email}}" disabled>
                              <label for="email">Email</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="phone_number" placeholder="Phone number" value="{{$user->phone_number}}">
                              <label for="phone_number">Phone number</label>
                           </div>
                        </div>
                     </div> -->
                                @include('user.partial._custom_fields')
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-primary contact_view_btn"
                                                onclick="myFunction()">Edit</button>
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
                                    <div class="form-floating">
                                        <input type="text" class="form-control border_none" id="first_name"
                                               placeholder="First Name" name="first_name" value="{{$user->first_name}}"
                                               required>
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border_none" id="last_name"
                                               placeholder="Last Name" name="last_name" value="{{$user->last_name}}" required>
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control border_none" id="email" type="text" placeholder="Email"
                                               name="email" value="{{$user->email}}" disabled>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border_none" id="phone_number"
                                               placeholder="Phone number" name="phone_number" value="{{$user->phone_number}}">
                                        <label for="phone_number">Phone number</label>
                                    </div>
                                </div>
                                @if (count($custom_fields)>0)
                                    <input type="hidden" id="show_custom_fields_count" name="custom_fields_count"
                                           value="{{count($custom_fields)}}">
                                    @foreach($custom_fields as $field)
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border_none"
                                                       id="show_custom_fields[{{$field->id}}]" value="{{$field->data}}"
                                                       placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]">
                                                <label for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
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
            <div class="col-lg-5 p-0">
                <div class="card">

                    <div class="profile-content tab-content iq-tab-fade-up">
                        <!-- <div id="profile-feed" class="tab-pane fade active show">
                            <div class="card-body p-0">
                                <p class="p-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla
                                    dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra.
                                    Proin blandit ac massa sed rhoncus</p>

                            </div>
                        </div> -->
                        <div id="profile-activity" class="tab-pane fade active show">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Activity</h4>
                                </div>
                            </div>
                            <div class="card-body" style="min-height: 580px;">
                                There is no Activity
                                <!-- <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
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
                                                <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly
                                                    lollipop apple</p>
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
                                </div> -->
                            </div>
                        </div>
                    <!-- <div id="profile-friends" class="tab-pane fade">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Emails</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline m-0 p-0">
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/01.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Paul Molive</h6>
                                        <p class="mb-0">Web Designer</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown"
                                            aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton9">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Paul Molive</h6>
                                        <p class="mb-0">trainee</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton10"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton10">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Anna Mull</h6>
                                        <p class="mb-0">Web Developer</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton11"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton11">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Paige Turner</h6>
                                        <p class="mb-0">trainee</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton12"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton12">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/04.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Barb Ackue</h6>
                                        <p class="mb-0">Web Designer</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton13"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton13">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Greta Life</h6>
                                        <p class="mb-0">Tester</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton14"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton14">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Ira Membrit</h6>
                                        <p class="mb-0">Android Developer</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton15"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton15">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img"
                                        class="rounded-pill avatar-40" loading="lazy" />
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Pete Sariya</h6>
                                        <p class="mb-0">Web Designer</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton16"
                                            data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton16">
                                            <a class="dropdown-item " href="#">Unfollow</a>
                                            <a class="dropdown-item " href="#">Unfriend</a>
                                            <a class="dropdown-item " href="#">block</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                        <div id="profile-notes" class="tab-pane fade">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title">Notes</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mt-2">
                                    <h6 class="mb-1">Add Note</h6>
                                    <form action="{{ route('note.add') }}" method="POST" onsubmit="return false;">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="hidden" id="contact_id" name="contact_id"
                                                               value="{{$user->id}}">
                                                        <textarea type="text" class="form-control notes_field" id="note"
                                                                  name="note" placeholder="Note" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="show_loading" style="display: none;">
                                            <div class="col-md-2">
                                                <div class="preloader-dot-loading">
                                                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary"
                                                        onclick="saveNote();">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br />
                                <div class="mt-2">
                                    <div id="notes">
                                        @include('note.list')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="contact_details_nav">
                            <div class="nav-item-wrapper">
                                <a class="nav-link dropdown-indicator label-1" href="#CRM" role="button"
                                   data-bs-toggle="collapse" aria-expanded="true" aria-controls="CRM">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Deals ({{@count($deals)}})</h4>
                                        <div class="dropdown-indicator-icon">
                                            <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 11.5 21.1" width="5">
                                                <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none"
                                                      stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="CRM">
                                        <div id="deals_list">
                                            @if (count($deals) > 0)
                                                @foreach($deals as $deal)
                                                    <div class="nav-item">
                                                        <span>{{$deal->title}} ({{$deal->deal_owner}})</span>
                                                        <span>{{$deal->pipeline}} ({{$deal->stage}})</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <br style="clear: both" />
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('user.deals', [$user->id,'listing'])}}"
                                               data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text"> All
                                                    Deals</span></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('user.deals.add', $user->id)}}"
                                               data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">Add New
                                                    Deal</span></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- parent pages-->
                            <!-- <div class="nav-item-wrapper">
                                <a class="nav-link dropdown-indicator label-1" href="#social" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Contact create attribution</h4>
                                        <div class="dropdown-indicator-icon">
                                            <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 11.5 21.1" width="5">
                                                <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none"
                                                    stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="social">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text">Profile</span></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- parent pages-->
                            <div class="nav-item-wrapper">
                                <a class="nav-link dropdown-indicator label-1" href="#view-documents" role="button"
                                   data-bs-toggle="collapse" aria-expanded="false" aria-controls="view-documents">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">View Documents</h4>
                                        <div class="dropdown-indicator-icon">
                                            <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 11.5 21.1" width="5">
                                                <title></title>
                                                <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none"
                                                      stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse"
                                        id="view-documents">
                                        <li class="nav-item">
                                            {{-- <a class="nav-link"
                                                href="{{ url('magic-link/'.Auth::user()->id.'?contact_id='.$user->id) }}"
                                                data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">View BCC
                                                        Portal</span></div>
                                            </a> --}}
                                            <a class="nav-link" data-userid="{{Auth::user()->id}}" data-contact_id="{{$user->id}}"
                                               href="javascript:;"
                                               data-bs-toggle="" aria-expanded="false" id="viewBCCPortal">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">View BCC
                                                   Portal</span></div>
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
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="TestModal">
        <div class="modal-dialog view_documents_portal" role="document">
            <div class="modal-content">

                <div class="modal-body" id="modalBody">


                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <button type="button" id="close_view_portal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-sm" tabindex="-1" role="dialog" id="sendDocuments">
        <div class="modal-dialog" role="document" style="max-width: 100%;margin-right: 0;margin-left: 0;">
            <div class="modal-content" style="width: 142%;">
                <div class="modal-header" >
                    {{-- <h5 class="modal-title">Modal title</h5> --}}
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="row">
                        <div class="col-md-8 offset-2 mb-4">
                            <div class="response-send-email-notification"></div>
                            <select name="bank_users" id="bank_users" class="form-control" multiple>
                                <option value="" disabled>Select Bank User</option>
                                @foreach($bankusers as $bank_user)
                                    <option value="{{$bank_user->id}}">
                                        {{$bank_user->first_name. " ".$bank_user->last_name. " ".$bank_user->email}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <button disabled type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button>
                        </div>
                    </div>
                </div>
                {{--            <div class="modal-footer">--}}
                {{--              <button type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button>--}}
                {{--              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /* function listNotes(){
          $('#notes').html('Loading...');
          $.get({
              url: "{{ route('note.list', $id) }}",
          success: function(res){
              $('#notes').html(res);
          }
        });
   } */
        $(document).ready(function(){
            $(document).on('click', '#viewBCCPortal', function(){
                // $('#TestModal').modal('show');
                var userid     = $(this).data("userid");
                var contact_id = $(this).data("contact_id");
                var url = '{{ url("magic-link") }}/'+contact_id;

                $.ajax({
                    method: 'GET',
                    url: url,
                    beforeSend: function () {
                        // $("#loader").show();
                    },
                    dataType: 'JSON', // The expected data type of the response
                    success: function (response) {

                        var data = `<iframe src="https://dashboard.bccusa.com/documents/view/`+response.contact_id+`?token=`+response.token+`&hide-header=true" width="70%" height="800"></iframe>`;
                        $('#modalBody').append(data);
                        $('#TestModal').modal('show');

                        // console.table(response);
                        // $("#loader").hide();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // This function is executed if there's an error in the request
                    }
                });
            });

            $('#bank_users').on('change', function (e) {
                if($(this).val() != ''){
                    $("#send_email_notification").prop("disabled", false);
                }
            });

            $("#send_documents_toggle").click(function(){
                $('#sendDocuments').modal('show');
            })

            $("#send_email_notification").click(function(){
                $("#send_email_notification").prop("disabled", true);
                $.post({
                    url: '{{route('user.sendEmailNotification')}}',
                    data: {
                        bank_users: $('#bank_users').val(),
                        user_id: '{{$id}}',
                        '_token': '{{csrf_token()}}',
                        url: "https://dashboard.bccusa.com/user/documents/view/{{$id}}?username={{$user->username}}&email={{$user->email}}"
                    },
                    success: function (response){
                        $("#send_email_notification").prop("disabled", false);
                        var html = '<div class="alert alert-success">' +
                            '<p>Email send successfully</p>' +
                            '</div>';
                        $(".response-send-email-notification").html(html)
                        setTimeout(stopTimer, 5000);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $("#send_email_notification").prop("disabled", false);
                        var html = '<div class="alert danger">' +
                            '<p>Something went wrong</p>' +
                            '</div>';
                        $(".response-send-email-notification").html(html)
                        setTimeout(stopTimer, 5000);
                    }
                })
            })
            $(document).on('click', '#close_view_portal', function(){
                $('#TestModal').modal('hide');
            });
        });

        function stopTimer() {
            $(".response-send-email-notification").hide()
            $(".response-send-email-notification").html('')
        }
        function saveNote() {
            var contact_id = $('#contact_id').val();
            var note = $('#note').val();
            var mentionLinks = $('.mention-area a');
            // Collect all values of the data-item-id attribute into an array
            var metionItemIds = mentionLinks.map(function() {
                return $(this).data('item-id');
            }).get();
            if (note !== '') {
                $('#show_loading').show();
                $.post({
                    url: "{{ route('note.add') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        contact_id: contact_id,
                        note: note,
                        mentions: metionItemIds
                    },
                    success: function (res) {
                        $('#show_loading').hide();
                        $('#note').val('');
                        $('#note').next('.mentiony-content').text('');
                        $('#notes').html(res);
                    }
                });
            }
        }

        function showEditNote(id, user_id) {
            $('#show_note_' + id).hide();
            $('#show_edit_note_' + id).show();
            $('#show_edit_note_' + id+' .mentiony-content').html($('#show_edit_note_' + id+' .notes_field').text());
            $('#note_rights_' + id).hide();
            $('#note_save_rights_' + id).show();
            $('#l_' + id).hide();
        }

        function cancelEdit(id, user_id) {
            $('#show_note_' + id).show();
            $('#show_edit_note_' + id).hide();
            $('#note_rights_' + id).show();
            $('#note_save_rights_' + id).hide();
            $('#l_' + id).hide();
        }

        function saveEditNote(id, user_id) {
            var contact_id = $('#contact_id').val();
            var note = $('#note_' + id).val();
            var mentionLinks = $('.mention-area a');
            // Collect all values of the data-item-id attribute into an array
            var metionItemIds = mentionLinks.map(function() {
                return $(this).data('item-id');
            }).get();
            if (note !== '') {
                $('#l_' + id).html($('#show_loading').html());
                $('#l_' + id).show();
                var url = "{{ route('note.edit',':note_id') }}";
                url = url.replace(':note_id', id);
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        contact_id: contact_id,
                        user_id: user_id,
                        note: note,
                        mentions: metionItemIds
                    },
                    success: function (res) {
                        $('#notes').html(res);
                    },
                    error: function (res) {
                        if (res.responseJSON.error_msg) {
                            $('#l_' + id).hide();
                            alert(res.responseJSON.error_msg);
                        }
                    }
                });
            }
        }

        function deleteNote(id, user_id) {
            var contact_id = $('#contact_id').val();
            var r = confirm('Are you sure you want to delete this note?');
            if (r) {
                $('#l_' + id).html($('#show_loading').html());
                $('#l_' + id).show();
                var url = "{{ route('note.delete',':note_id') }}";
                url = url.replace(':note_id', id);
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        contact_id: contact_id,
                        user_id: user_id
                    },
                    success: function (res) {
                        $('#notes').html(res);
                    }
                });
            }
        }

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
    <script src="{{asset('assets/js/jquery.mentiony.js')}}" defer></script>
    <script>
        $(document).ready(function(){
            // $('textarea[name="note"]').mentiony({
            //     onDataRequest: function (mode, keyword, onDataRequestCompleteCallback) {
            //
            //         var data = [
            //             { id:1, name:'Nguyen Luat', info: 'waleed@gmail.com', href: 'http://a.co/id'},
            //             { id:2, name:'Dinh Luat', href: 'http://a.co/id'},
            //             { id:3, name:'Max Luat', href: 'http://a.co/id'},
            //             { id:4, name:'John Neo', href: 'http://a.co/id'},
            //             { id:5, name:'John Dinh', href: 'http://a.co/id'},
            //             { id:6, name:'Test User', href: 'http://a.co/id'},
            //             { id:7, name:'Test User 2', href: 'http://a.co/id'},
            //             { id:8, name:'No Test', href: 'http://a.co/id'},
            //             { id:9, name:'The User Foo', href: 'http://a.co/id'},
            //             { id:10, name:'Foo Bar', href: 'http://a.co/id'},
            //         ];
            //
            //         data = jQuery.grep(data, function( item ) {
            //             return item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1;
            //         });
            //
            //         // Call this to populate mention.
            //         onDataRequestCompleteCallback.call(this, data);
            //     },
            //     timeOut: 0,
            //     debug: 1,
            // });

            $('.notes_field').mentiony({
                onDataRequest: function (mode, keyword, onDataRequestCompleteCallback) {
                    var mentionLinks = $('.mention-area a');
                    // Collect all values of the data-item-id attribute into an array
                    var itemIds = mentionLinks.map(function() {
                        return $(this).data('item-id');
                    }).get();
                    $.post({
                        url: '{{route('search.user.to.mention')}}',
                        data: {
                            '_token': '{{csrf_token()}}',
                            keyword: keyword,
                            skip_ids: itemIds
                        },
                        success: function (response) {
                            var data = response.users.map(function(user){
                                return {id: user.id, name: user.first_name+" "+user.last_name, info: user.email, href: '#'}
                            })

                            // NOTE: Assuming this filter process was done on server-side
                            // data = jQuery.grep(data, function( item ) {
                            //     return item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1;
                            // });
                            // End server-side

                            // Call this to populate mention.
                            onDataRequestCompleteCallback.call(this, data);
                        }
                    });

                },
                timeOut: 500, // Timeout to show mention after press @
                debug: 1, // show debug info
            });

            var hash = window.location.hash;
            // Check if the hash exists and it matches the ID of any tab
            if (hash && hash.includes('profile-notes')) {
                // Remove the "active" class from all tabs
                $('.nav-link').removeClass('active show').prop('aria-selected',false).prop('tabindex', '-1');

                // Add the "active" class to the corresponding tab link
                $('a[href="#profile-notes"]').trigger('click')

                $('.tab-pane').removeClass('active show')
                // Show the corresponding tab content
                $('#profile-notes').addClass('active show');
            }

            // Get the URL
            var url = window.location.href;

            // Extract the value of the "note" parameter
            var noteValue = getParameterByName('note', url);
            if (noteValue !== null) {
                $('html, body').animate({
                    scrollTop: $('#show_note_'+noteValue).offset().top
                }, 1000, function() {
                    // After scrolling is complete, add the highlight class
                    $('#show_note_'+noteValue).parent().addClass("note_highlight");

                });
            }

            // Function to get parameter value by name from URL
            function getParameterByName(name, url) {
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }
        })
    </script>
@endsection
