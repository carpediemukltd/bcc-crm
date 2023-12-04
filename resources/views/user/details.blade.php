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
   .error{
       color: #7c0303;
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
                  </div>
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
      @include('alert_message')
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
                        <a target="_blank" href="{{ env('LENDOTICS_DASHBOARD_URL') }}/crm-trigger-bankportal-login/{{auth()->user()->uuid}}?redirect={{ env('LENDOTICS_DASHBOARD_URL') }}/user/documents/view/{{ $user->id }}">
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
                              <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                 <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                              </svg>
                           </i>
                           <span>Send Documents</span>
                        </a>
                        <a class="" href="javascript:void(0);" id="document_request_manager">
                           <i class="user_icon icon">
                              <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                 <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                              </svg>
                           </i>
                           <span>Document Request Manager</span>
                        </a>
                        @if ($user->ocrolus_csv_path)
                           <a href="{{$user->ocrolus_csv_path}}">
                              <i class="user_icon icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16"> <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/> <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/> </svg>
                              </i>
                              Download Report
                           </a>
                        @endif
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

                     <div class="row">
                        <div class="col text-right">
                           <button type="button" class="btn btn-primary contact_view_btn"
                              onclick="myFunction()">Edit</button>
                        </div>
                     </div>
                     <div class="user-details-scroll">
                     @include('user.partial._custom_fields')
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
               <div id="profile-activity" class="tab-pane fade active show">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Activity</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <!-- There is no Activity -->
                     <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="activity_scroll_view activity-details-view list-inline p-0 m-0">
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <!-- Contact created start -->
                              <div class="accordion doc-upload-view custom-accordion" id="contact-created">
                              <div class="accordion-item">
                                 <h5 class="accordion-header" id="contact-created-ac">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-created-view" aria-expanded="false" aria-controls="custom-collapseThree" fdprocessedid="1gvakd">
                                          <h6 class="float-left mb-0">Contact Created</h6>
                                       </button>
                                 </h5>
                                 <div id="contact-created-view" class="accordion-collapse collapse" aria-labelledby="contact-created-ac" data-bs-parent="#CustomAccordionExample">
                                       <div class="accordion-body">
                              @foreach($activity as $activeities)
                              @if($activeities->moduleName == 'Contact')
                              <small class="float-right mt-1">
                                 <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="20" width="18">
                                    <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
                                    <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
                                 </svg>
                                 <p>{{date('d-m-Y h:i:s', strtotime($activeities->created_at));}}</p>
                              </small>
                              @foreach($userRecord as $userrecord)
                              @if($activeities->user_id == $userrecord->id)
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                    </svg>
                                    <b>Created By :</b>
                                    <p>{{$userrecord->first_name}} {{$userrecord->last_name}}</p>
                                 </small>
                              </div>
                            @endif
                              @endforeach
                              @endif
                              @endforeach

                              </div>
                                 </div>
                              </div>
                           </div>

                              <!-- Contact created end -->
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                              <!-- Deals created start -->
                              <div class="accordion doc-upload-view custom-accordion" id="deal-created">
                                 <div class="accordion-item">
                                    <h5 class="accordion-header" id="deal-created-ac">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#deal-created-view" aria-expanded="false" aria-controls="custom-collapseThree" fdprocessedid="1gvakd">
                                             <h6 class="float-left mb-0">Deal Created</h6>
                                          </button>
                                    </h5>
                                    <div id="deal-created-view" class="accordion-collapse collapse" aria-labelledby="deal-created-ac" data-bs-parent="#CustomAccordionExample">
                                          <div class="accordion-body">
                                          @foreach($activity as $activeities)
                              @if($activeities->moduleName == 'Deal')
                              <small class="float-right mt-1">
                                 <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="20" width="18">
                                    <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
                                    <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
                                 </svg>
                                 <p>{{date('d-m-Y h:i:s', strtotime($activeities->created_at));}}</p>
                              </small>
                              @foreach($userRecord as $userrecord)
                              @if($activeities->user_id == $userrecord->id)
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                    </svg>
                                    <b>Created By :</b>
                                    <p>{{$userrecord->first_name}}</p>
                                    <p>{{$userrecord->last_name}}</p>
                                 </small>
                              </div>
                              @endif
                              @endforeach
                              @endif
                              @endforeach
                                          </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- deals created end -->
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                              <!-- stages moves start -->
                              <div class="accordion doc-upload-view custom-accordion" id="stages-moves">
                                 <div class="accordion-item">
                                    <h5 class="accordion-header" id="stages-moves-ac">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stages-moves-view" aria-expanded="false" aria-controls="custom-collapseThree" fdprocessedid="1gvakd">
                                             <h6 class="float-left mb-0">Stage moves</h6>
                                          </button>
                                    </h5>
                                    <div id="stages-moves-view" class="accordion-collapse collapse" aria-labelledby="stages-moves-ac" data-bs-parent="#CustomAccordionExample">
                                       <div class="accordion-body">
                              @foreach($activity as $activeities)
                              @if($activeities->moduleName == 'Stage')
                              <small class="float-right mt-1">
                                 <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="20" width="18">
                                    <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
                                    <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
                                 </svg>
                                 <p>{{date('d-m-Y h:i:s', strtotime($activeities->created_at));}} </p>
                              </small>
                              @foreach($userRecord as $userrecord)
                              @if($activeities->user_id == $userrecord->id)
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                    </svg>
                                    <b>Created By :</b>
                                    <p>{{$userrecord->first_name}}</p>
                                    <p>{{$userrecord->last_name}}</p>
                                 </small>
                              </div>
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <b>Stage Name :</b>
                                    <p>{{$activeities->details}} </p>
                                 </small>
                              </div>
                              @endif
                              @endforeach
                              @endif
                              @endforeach
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- stages moves end -->
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <!-- custom field start -->
                              <div class="accordion doc-upload-view custom-accordion" id="custom-field">
                                 <div class="accordion-item">
                                    <h5 class="accordion-header" id="custom-field-ac">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom-field-view" aria-expanded="false" aria-controls="custom-collapseThree" fdprocessedid="1gvakd">
                                             <h6 class="float-left mb-0">Custom Field</h6>
                                          </button>
                                    </h5>
                                    <div id="custom-field-view" class="accordion-collapse collapse" aria-labelledby="custom-field-ac" data-bs-parent="#CustomAccordionExample">
                                       <div class="accordion-body">
                              @foreach($activity as $activeities)
                              @if($activeities->moduleName == 'Custom Field')
                              <small class="float-right mt-1">
                                 <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="20" width="18">
                                    <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
                                    <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
                                 </svg>
                                 <p>{{date('d-m-Y h:i:s', strtotime($activeities->created_at));}}</p>
                              </small>
                              @foreach($userRecord as $userrecord)
                              @if($activeities->user_id == $userrecord->id)
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                    </svg>
                                    <b>Created By :</b>
                                    <p>{{$userrecord->first_name}}</p>
                                    <p>{{$userrecord->last_name}}</p>
                                 </small>
                              </div>
                              @endif
                              @endforeach
                              @endif
                              @endforeach
                              @foreach($customFieldDetails as $customFieldDetails)
                              @foreach($customField as $customFields)
                              @if( $customFields->id == $customFieldDetails->custom_field_id )
                              <div class="d-flex w-100">
                                 <small class="w-100 float-right mt-1">
                                    <b>Title :</b>
                                    <p>{{$customFields->title }}</p>
                                 </small>
                                 <small class="w-100 float-right mt-1">
                                    <b>Data :</b>
                                    <p>{{$customFieldDetails->data}}</p>
                                 </small>
                              </div>
                              @endif
                              @endforeach
                              @endforeach
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- custom field end -->
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                              <!-- documents upload start -->
                              <div class="accordion doc-upload-view custom-accordion" id="documents-upload">
                                 <div class="accordion-item">
                                    <h5 class="accordion-header" id="documents-upload-ac">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#documents-upload-view" aria-expanded="false" aria-controls="custom-collapseThree" fdprocessedid="1gvakd">
                                          <h6 class="float-left mb-0">Document Uploaded</h6>
                                       </button>
                                    </h5>
                                    <div id="documents-upload-view" class="accordion-collapse collapse" aria-labelledby="documents-upload-ac" data-bs-parent="#CustomAccordionExample">
                                       <div class="accordion-body">
                              @foreach($document as $document)
                              <small class="float-right mt-1">
                                 <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="20" width="18">
                                    <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
                                    <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
                                 </svg>
                                 <p>{{date('d-m-Y h:i:s', strtotime($document->created_at));}} </p>
                              </small>
                              <div class="d-inline-block w-100">
                                 <small class="float-right mt-1">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5495 13.73H14.2624C14.6683 13.73 15.005 13.4 15.005 12.99C15.005 12.57 14.6683 12.24 14.2624 12.24H12.5495V10.51C12.5495 10.1 12.2228 9.77 11.8168 9.77C11.4109 9.77 11.0743 10.1 11.0743 10.51V12.24H9.37129C8.96535 12.24 8.62871 12.57 8.62871 12.99C8.62871 13.4 8.96535 13.73 9.37129 13.73H11.0743V15.46C11.0743 15.87 11.4109 16.2 11.8168 16.2C12.2228 16.2 12.5495 15.87 12.5495 15.46V13.73ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0446 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.61 7.5662C18.7961 7.5692 17.8367 7.5662 17.1466 7.5592C16.0516 7.5592 15.1496 6.6482 15.1496 5.5422V2.9062C15.1496 2.4752 15.6674 2.2612 15.9635 2.5722C16.4995 3.1351 17.2361 3.90891 17.9693 4.67913C18.7002 5.44689 19.4277 6.21108 19.9496 6.7592C20.2387 7.0622 20.0268 7.5652 19.61 7.5662Z" fill="currentColor"></path>
                                    </svg>
                                    <b>Document :</b>
                                    <p>{{$document->file_group_name}} : </p>
                                 </small>
                                 <small class="float-right mt-1">
                                    <b>URL :</b>
                                    <p><a href="{{$document->file_path}}">{{$document->file_name}}</a> </p>
                                 </small>
                              </div>
                              @endforeach
                              </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- documents upload end -->
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div id="profile-notes" class="tab-pane fade">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Notes</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="mt-2">
                        <h6 class="mb-1">Add Note</h6>
                        <form action="{{ route('note.add') }}" id="note_form" method="POST" onsubmit="return false;">
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
                              <div class="col-md-12">
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
                                    Deals</span>
                                 </div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.deals.add', $user->id)}}"
                                 data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Add New
                                    Deal</span>
                                 </div>
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
                              {{--
                              <a class="nav-link"
                                 href="{{ url('magic-link/'.Auth::user()->id.'?contact_id='.$user->id) }}"
                                 data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">View BCC
                                    Portal</span>
                                 </div>
                              </a>
                              --}}
                              <a class="nav-link" data-userid="{{Auth::user()->id}}" data-contact_id="{{$user->id}}"
                                 href="javascript:;"
                                 data-bs-toggle="" aria-expanded="false" id="viewBCCPortal">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">View BCC
                                    Portal</span>
                                 </div>
                              </a>
                               @if($due_date != '')
                                   <p>Due Date : {{date('F d Y', strtotime($due_date))}} <a href="javascript:void(0);" id="change_due_date">Change</a></p>
                               @endif
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
            <button type="button" id="close_view_portal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="sendDocuments">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <div class="response-send-email-notification"></div>
            <div class="form-group">
               <label for="">Bank Documents</label>
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
         <div class="modal-footer">
            <button disabled type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button>
            <!-- <button type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button> -->
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal modal-xl" tabindex="-1" role="dialog" id="documentRequestManager">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         {!! Form::open(['route' => ['document.manager.update', $user->id],'method' => 'post']) !!}
         <div class="modal-body documents_view_holder">
            <div class="response-send-email-notification"></div>
            <h4> Document Types:</h4>
            <div class="form-group ">
               <div class="row">
                  @php
                  $already_selected_documents = []
                  @endphp
                  @foreach($selected_documents as $selected_document)
                  @php
                  $already_selected_documents[] = $selected_document->id;
                  @endphp
                  @endforeach
                   @foreach($document_groups as $group)
                       <div class="col-md-2">
                           <label class="checkbox-inline">
                               <div class="check-doc-field">
                                   <input type="checkbox" class="document_group_checkbox" name="{{$group->name}}" value="{{$group->id}}">
                               </div>
                               <p><b>{{$group->name}}</b></p>
                           </label>
                       </div>
                   @endforeach
                  @foreach($documents as $document)
                  <div class="col-md-4">
                     <label class="checkbox-inline">
                     <div class="check-doc-field">
                         @php
                             $group_ids = [];
                             foreach($document->DocumentGroup as $group_id){
                                 $group_ids[] = $group_id->id;
                             }
                             $serializedGroupIds = json_encode($group_ids);
                         @endphp
                         <input type="checkbox" name="document_types[]" class="document_group_checkbox_option" data-group-id="{{$serializedGroupIds}}" value="{{$document->id}}" {{in_array($document->id, $already_selected_documents) ? 'checked' : ''}}>
                     </div>
                     <p>{{$document->title}}</p>
                     </label>
                  </div>
                  @endforeach
                  @if ($errors->has('document_types'))
                  <span class="text-danger">{{ $errors->first('document_types') }}</span>
                  @endif
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" id="updateDocumentManager"><i class="fa fa-envelope"></i> Update</button>
            <!-- <button type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button> -->
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>
@if($due_date != '')
    <div class="modal" tabindex="-1" role="dialog" id="changeDueDate">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['user.due_date', $user->id], 'method' => 'post', 'id' => 'due_date_form']) !!}
            <div class="modal-content">
                <div class="modal-body">
                    <div class="response-send-email-notification"></div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        {!! Form::date('due_date',$due_date,['class' => 'form-control', 'min' => date('Y-m-d', strtotime(date('Y-m-d') . ' +1 days'))]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Change Due Date</button>
                    <!-- <button type="button" class="btn btn-primary" id="send_email_notification"><i class="fa fa-envelope"></i> Send Email Notification</button> -->
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endif
<script type="text/javascript">

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

       $("#document_request_manager").click(function(){
           $('#documentRequestManager').modal('show');
       })

       $("#change_due_date").click(function(){
           $('#changeDueDate').modal('show');
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
       $(".response-send-email-notification").html('')
   }
   function saveNote() {
       var contact_id = $('#contact_id').val();
       var note = $('#note').val();
       var mentionLinks = $('#note_form .mention-area a');
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
                   applyMentionyToNotesFields();
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
       // Collect all values of the data-item-id attribute into an array
       var  metionItemIds = $('#show_edit_note_' + id).find('[data-item-id]').map(function() {
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
                   applyMentionyToNotesFields();
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
                   applyMentionyToNotesFields();
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

   $('.document_group_checkbox').click(function(){
       var group_id = parseInt($(this).val());
       if($(this).prop('checked')){
           $(".document_group_checkbox_option").each(function() {
               var optionGroupIds = JSON.parse($(this).attr('data-group-id'));
               if (optionGroupIds.includes(group_id)) {
                   // Check the checkbox
                   $(this).prop('checked', true);
               }
           });
       }else{
           $(".document_group_checkbox_option").each(function() {
               var optionGroupIds = JSON.parse($(this).attr('data-group-id'));
               if (optionGroupIds.includes(group_id)) {
                   // Check the checkbox
                   $(this).prop('checked', false);
               }
           });
       }

   })

</script>
<script src="{{asset('assets/js/jquery.mentiony.js')}}" defer></script>
<script>
   function applyMentionyToNotesFields() {
       $('.notes_field').mentiony({
           onDataRequest: function (mode, keyword, onDataRequestCompleteCallback) {
               $.post({
                   url: '{{route('search.user.to.mention')}}',
                   data: {
                       '_token': '{{csrf_token()}}',
                       keyword: keyword,
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
           debug: 0, // show debug info
       });
   }
   $(document).ready(function(){
       $('.container').on('input', '.notes_field', function() {

       })

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

       applyMentionyToNotesFields();
   })

</script>
<script src="{{asset('assets/js/jquery-validation.min.js')}}" defer></script>
<script>
    $(document).ready(function(){
        $("#due_date_form").validate({
            rules: {
                due_date: {
                    required: true
                },
            },
            messages: {
                due_date: {
                    required: "Due date required"
                }
            }
        });
    })

</script>
@endsection
