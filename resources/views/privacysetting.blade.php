@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1><a href="{{ url()->previous() }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>  BCC Privacy</h1>
                     <p>This Privacy Policy outlines the data collection, use, and disclosure practices of BCC ("we," "us," or "our") in connection with our CRM services (the "Services"). <br>By using our Services, you consent to the practices described in this Privacy Policy.</p>
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
                     <h4 class="mb-2">1. Information We Collect</h4>
                     <p class="sub_text">Personal Information: We may collect personal information such as name, email address, phone number, and company information provided by users of the Services.</p>
<p class="sub_text"><b>Usage Data:</b> We may collect information about how the Services are accessed and used, including browser type, device information, and other diagnostic data.</p>
<p class="sub_text">Cookies and Tracking Technologies: We may use cookies and other tracking technologies to understand user preferences and improve the Services.</p>
                     
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">2. How We Use the Information</h4>
                     <p>We may use the collected information for various purposes, including:</p>
                     <p class="sub_text">To provide and maintain the Services</p>
                     <p class="sub_text">To notify you about changes to our Services</p>
                     <p class="sub_text">To provide customer support</p>
                     <p class="sub_text">To gather analysis or valuable information to improve the Services</p>
                     <p class="sub_text">To monitor the usage of the Services</p>
                     
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">3. Information Sharing and Disclosure </h4>
                     <p>We may share your personal information with third parties under the following circumstances:
                     </p>
                     <p class="sub_text">Compliance with Laws: We may disclose your information where required by law or regulatory request.</p>
<p class="sub_text"><b>Business Transfers:</b> In the event of a merger, acquisition, or asset sale, your information may be transferred.</p>
<p class="sub_text"><b>Service Providers:</b> We may employ third-party companies to facilitate our Services and provide service on our behalf.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">4. Security Measures </h4>
                     
                     <p class="sub_text">We implement appropriate security measures to protect against unauthorized access, alteration, or destruction of your personal information. However, no method of transmission or electronic storage is 100% secure, and we cannot guarantee absolute security.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">5. Your Choices and Rights </h4>
                     
                     
                     <p class="sub_text">Depending on your jurisdiction, you may have certain rights related to your personal information, such as access, correction, deletion, or objection to processing. To exercise these rights, please contact us at [contact information].
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">6. Changes to This Privacy Policy </h4>
                     
                     <p class="sub_text">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. You are advised to review this Privacy Policy periodically for any changes.
                     </p>
                  </div>
                  <hr>
                  <div class="data-privacy">
                     <h4 class="mb-2">7. Contact Us</h4>
                     <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                     <p class="sub_text">Email: <a href="#">TeamBCCUSA@bccusa.com</a></p>
                     <p class="sub_text">Address: 200 Vesey Street, 24th Floor New York, NY 10281</p>
                     <p class="sub_text">Your use of our Services is also governed by our Terms of Service, available at <a href="#">Terms & Conditions</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection