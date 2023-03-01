<?php
   $login = "no";
   $title = "Home";
   ?>
@extends('layout.app')
@section('content')
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="container-fluid">
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block" id="alert_success_session">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
   @endif
   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
   @endif
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
</div>
<div class="slidebanner-home-background-image">
   <div class="container-fluid">
   <div class="row ">
      <div class="col-lg-5" data-aos="fade-up">
        <div class="banner-text">
          <!-- <img src="{{asset('uploads/images/1_0065_Shape.png')}}"> -->
          <div class="homeslidertext">
              <h3 class="color-yellow-light">We Streamline <br> SBA Loans</h3>
              <p class="color-white">Let BCC help you get the best financing for your business needs.</p>
          </div>
         </div>
      </div>
   </div>
   <div class="row background-dark-to-light parent-interest-rates">
      <div class="col-lg-4 interest-rates">
         <h6 class="text-white-50">INTEREST RATES</h6>
         <h3 class="color-white">4.55% - 7.00%</h3>
      </div>
      <div class="col-lg-4 interest-rates">
         <h6 class="text-white-50">SBA LOAN AMOUNTS</h6>
         <h3 class="color-white">$30,000 - $5 million</h3>
      </div>
      <div class="col-lg-4 interest-rates">
         <h6 class="text-white-50">PAYMENT TERMS</h6>
         <h3 class="color-white">10 - 25 years</h3>
      </div>
   </div>
   </div>
</div>
<div class="container-fluid">
  <div class="row">
   <div class="col-lg-12">
      <center>
         <h4 class="see-if-you-pre-qualify"><a class="color-white" href="{{route('loan.index')}}"> See if you pre-qualify</a></h4>
         <br>
         <p>Only takes 5 minutes and does not impact your credit score.</p>
      </center>
   </div>
</div>
</div>
<!-- HOW TO APPLY FOR PPP LOAN FORGIVENESS Start-->
<div class="container-fluid">
   <div class="row flex-section mb-5 loan-forgiveness-div">
      <div class="col-lg-5 leftdiv-loan-forgiveness" data-aos="fade-up"
     data-aos-duration="1000">
         <img class="mlminus20" src="{{asset('uploads/images/apply-for-forgiveness.jpg')}}">
      </div>
      <div class="col-lg-7">
        <div class="rightdiv-loan-forgiveness">
         <div class="forgiveness-bar">
            <h4>HOW TO APPLY FOR PPP LOAN FORGIVENESS</h4>
         </div>
         <p class="color-white text-white-50">Funding for the Paycheck Protection Program
            (PPP)) ended on May 31 2021. Our BCC
            team is honored that we could assist nearly
            200,000 small businesses with successfully
            processing their PPP Ioan applications
            with a bank in our network.
          </p>
         <p class="color-white text-white-50">We're also excited that 60% of the businesses
            we heiped are women owned. minority, or
            veteran owned businesses all across
            America. Now we re gearing up to
            assist the banks in our network with
            processing the PPP loan
            forgiveness applications for the small
            businesses they funded.
          </p>
        </div>
      </div>
   </div>
</div>
<!-- HOW TO APPLY FOR PPP LOAN FORGIVENESS END -->
<div class="container-fluid">
   <center>
      <div class="row mt-5 mb-5">
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
            <h2><span class="color-yellow">The smartest way to</span> <span class="color-blue">"yes"<span></h2>
            <p>
               BCCLoans guides your business through the application process to help you get the
               best and lowest cost financing that meets your needs. Our experienced
               proressionals use our unique technology platform to help match your loan
               application with the trusted bank most likely to fund your business. About 90% of
               qualitied applications we refer to banks get funded.<br>
               The select banks in our business lending network have funded nearly <span class="color-blue"><b><i>$4.0 billion ih
               SBA 7(a), PPP (Paycheck Protection program) and bank term loans</i></b> </span>, helping
               Growth Fund Capital becomne the nations #l online tacilitator ol SBA and bank term loans under
               S550.000. Weve helped over 20.000 small businesses get funded to support 3o0.000
               small businessjobs. Over 50% of the leans funded by our banks are for
               women-Owned, minority, Or veteran busing5sC5. BanKs utilize the Growth Fund Capital platlorm
               tO process more than 10% of the entire nations volume of traditional SBA 7(a) Ioans
               under s350,000
            </p>
            <br>
         </div>
      </div>
   </center>
</div>
<div class="mb-3 background-dark-to-light ideas-section">
   <div class="container">
      <div class="row desktopview">
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="bcc-icon-holder">
               <div class="icon-holder">
                  <img data-aos="fade-right" class="ideas-icon margintominus225 width35percent" src="{{asset('uploads/images/setting-icon.png')}}">
               </div>
               <h3 class="color-yellow ">Get to know you</h3>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="bcc-icon-holder">
               <div class="icon-holder">
                  <img data-aos="fade-right" class="ideas-icon margintominus225 width35percent" src="{{asset('uploads/images/idea-icon.png')}}">
               </div>
               <h3 class="color-yellow ">Understand your options</h3>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="bcc-icon-holder">
               <div class="icon-holder">
                  <img  data-aos="fade-left" class="ideas-icon margintominus225 width35percent" src="{{asset('uploads/images/bank-icon.png')}}">
               </div>
               <h3 class="color-yellow ">Match you with the right lender</h3>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="bcc-icon-holder">
               <div class="icon-holder">
                  <img   data-aos="fade-left" class="ideas-icon margintominus225 width35percent" src="{{asset('uploads/images/hand-icon.png')}}">
               </div>
               <h3 class="color-yellow ">Stay by your side</h3>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up"
     data-aos-duration="1000">
            <center>
               <img class="ideas-icon margintominus225 width35percent mobileview" src="{{asset('uploads/images/idea-cirle2.png')}}">
               <h3 class="color-yellow mobileview">Get to know you</h3>
               <p class="ideas-section-para desktopparacss">Complete one streamnlined loan application online so we can learn more about you and your unique business.</p>
            </center>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up"
     data-aos-duration="1000">
            <center>
               <img class="ideas-icon margintominus225 width35percent mobileview" src="{{asset('uploads/images/idea-cirle.png')}}">
               <h3 class="color-yellow mobileview">Understand your options</h3>
               <p class="ideas-section-para desktopparacss">Your dedicated BCC team member walks you through the loan application and recommends the best options based on your business and financial profle.</p>
            </center>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up"
     data-aos-duration="1000">
            <center>
               <img class="ideas-icon margintominus225 width35percent mobileview" src="{{asset('uploads/images/idea-cirle4.png')}}">
               <h3 class="color-yellow mobileview">Match you with the right lender</h3>
               <p class="ideas-section-para desktopparacss">We match you with the banks non-bank lenders in the BCC network most likely to approve your loan application </p>
            </center>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up"
     data-aos-duration="1000">
            <center>
               <img class="ideas-icon margintominus225 width35percent mobileview " src="{{asset('uploads/images/idea-cirle3.png')}}">
               <h3 class="color-yellow mobileview">Stay by your side</h3>
               <p class="ideas-section-para desktopparacss">BCC Advisor, our free online tool, helps you track the financial health of your business over time.</p>
            </center>
         </div>
      </div>
   </div>
</div>

<div class="container-fluid">
   <center>
      <div class="row mt-5 mb-5">
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
            <h2><span class="color-yellow">Compare your </span> <span class="color-blue">"options"<span></h2>
            <p>Whether you ate seeking an SBA loan, Bank Term loan, or a more Customized fi-
               nancing option, oùr team of friendly professionals helps you find the right option for
               your individual situation. Our single, streamlined application process can help you
               apply for the best loan option for your needs.
            </p>
         </div>
      </div>
   </center>
</div>
<!-- PRICE TABLE START -->
<div class="page-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="price-table">
               <div class="table-scroll" style="overflow-x:auto">
                  <table class="table">
                     <tbody>
                        <tr>
                           <th colspan="3" style="background-color:#0f407a"></th>
                           <th colspan="2">
                              <div class="price-logo">
                                 <img src="{{asset('uploads/images/logo.png')}}">
                              </div>
                           </th>
                        </tr>
                        <!-- header with logo end -->
                        <tr>
                           <th></th>
                           <th class="text-center">Competitor Non-Bank Lenders</th>
                           <th class="text-center">
                              Competitor Cash Advance Providers
                           </th>
                           <th class="text-center">
                              SBA LOAN
                           </th>
                           <th class="text-center">
                              BANK TERM LOAN
                           </th>
                        </tr>
                        <tr class="has-bg">
                           <td>
                              <div class="table-desc">
                                 <p><b>ESTIMATED APR</b></p>
                                 <p>Include interest rate and fees</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">9% - 36%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">20% - 100%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">504% - 1029%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">11.67% - 31.66%</p>
                              </div>
                           </td>
                        </tr>
                        <!-- next row start -->
                        <tr class="has-no-top-border">
                           <td>
                              <div class="table-desc">
                                 <p><b>Funding Process</b></p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">9% - 36%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">20% - 100%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">504% - 1029%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">11.67% - 31.66%</p>
                              </div>
                           </td>
                        </tr>
                        <!-- next row start -->
                        <tr class="has-bg">
                           <td>
                              <div class="table-desc">
                                 <p><b>Loan Term</b></p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">9% - 36%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">20% - 100%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">504% - 1029%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">11.67% - 31.66%</p>
                              </div>
                           </td>
                        </tr>
                        <!-- next row start -->
                        <tr class="has-no-top-border">
                           <td>
                              <div class="table-desc">
                                 <p><b>Typical Payment For A $100,000 Loan</b></p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">9% - 36%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">20% - 100%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">504% - 1029%</p>
                              </div>
                           </td>
                           <td>
                              <div class="table-desc">
                                 <p class="text-center">11.67% - 31.66%</p>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="apply-now-section text-right">
                  <a href="#" class="bcc-default-btn">Apply Now</a>
               </div>
            </div>
            <!-- <img class="width99percent" usemap="#applyNow" src="{{asset('uploads/images/chart.jpg')}}">  -->
            <map name="applyNow">
               <area  shape="rect" coords="1110,660,1340,725" alt="Apply now" href="{{route('loan.index')}}">
            </map>
         </div>
      </div>
   </div>
</div>
<!-- PRICE TABLE END -->
<!-- Frequently asked questions start -->
<div class="page-section bcc-faq">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="background-dark-to-light faqs mt-5">
               <div class="row flex-section">
                  <div class="col-lg-4">
                     <h2 class="color-yellow">Frequently asked questions</h2>
                  </div>
                  <div class="col-lg-8">
                     <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">What's the difference between an SBA loan and a bank term loan?</a>
                           </h4>
                           </div>
                           <div id="collapse1" class="panel-collapse collapse in">
                           <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How much can I borrow?</a>
                           </h4>
                           </div>
                           <div id="collapse2" class="panel-collapse collapse">
                           <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Will checking my rates affect my credit score?</a>
                           </h4>
                           </div>
                           <div id="collapse3" class="panel-collapse collapse">
                           <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">How quickly will I recieve my funds?</a>
                           </h4>
                           </div>
                           <div id="collapse4" class="panel-collapse collapse">
                           <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Are there fees or other costs involved?</a>
                           </h4>
                           </div>
                           <div id="collapse5" class="panel-collapse collapse">
                           <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class=" row">
      <div class="col-lg-12">
         <div class="morefaqs">
            <a href="#" class="btn btn-primary color-gold rounded-btn">More FAQ's</a>
         </div>
      </div>
   </div>
</div>
<!-- Frequently asked questions end -->
<div class="container">
   <div class="row mt-5 mb-5">
      <div class="col-lg-12">
         <center>
            <h2 class="color-yellow">Learn</h2>
            <p>Whether you've gradutated with an MBA or you've never taken a business class in your life,<br> we've got the resources to help you finance, manage, and expand your small business.</p>
         </center>
      </div>
   </div>
</div>
<div class="container">
   <div class="row mt-5 mb-5">
      <div class="col-lg-4 col-md-6">
         <div class="learn-process"  data-aos="zoom-in">
            <div class="img-holder">
               <img src="{{asset('uploads/images/learn-image1.png')}}" alt="">
            </div>
            <div class="text-holder">
               <h4>Business Credit Reports Explained</h4>
               <p>
                  Your credit information is important. It helps lenders get a sense of your ability to repay a loan. Here’s what you need to know about credit reports.
               </p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-6">
         <div class="learn-process"  data-aos="zoom-in">
            <div class="img-holder">
               <img src="{{asset('uploads/images/learn-image2.png')}}" alt="">
            </div>
            <div class="text-holder">
               <h4>Business Credit Reports Explained</h4>
               <p>
                  Your credit information is important. It helps lenders get a sense of your ability to repay a loan. Here’s what you need to know about credit reports.
               </p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-6">
         <div class="learn-process"  data-aos="zoom-in">
            <div class="img-holder">
               <img src="{{asset('uploads/images/learn-image3.png')}}" alt="">
            </div>
            <div class="text-holder">
               <h4>Business Credit Reports Explained</h4>
               <p>
                  Your credit information is important. It helps lenders get a sense of your ability to repay a loan. Here’s what you need to know about credit reports.
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-4 ">
      </div>
      <div class="col-lg-4 ">
      </div>
      <div class="col-lg-4 testitopbarborder">
      </div>
   </div>
</div>
<!-- testimonial start -->
<div class="container">
   <div class="row mt-5">
      <div class="col-lg-12">
         <div class="site-section bg-left-half mb-5">
            <div class="container owl-2-style">
               <div class="owl-carousel owl-2">
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Alex Fought</a></h3>
                  </div>
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Ben Stafford</a></h3>
                  </div>
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Devin Bridges</a></h3>
                  </div>
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Joshua Jones</a></h3>
                  </div>
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Kellie Kenney</a></h3>
                  </div>
                  <div class="media-29101">
                     <img src="{{asset('carousel-16/images/person_3_sm.jpg')}}" alt="Image" class="img-fluid">
                     <img src="{{asset('uploads/images/testimonial-symbol.jpg')}}" alt="Image" class="img-fluid">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, dolorem iusto officia! Quis tenetur maxime, laboriosam saepe, voluptate necessitatibus tempora!</p>
                     <h3><a href="#">Will Reagan</a></h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- testimonial end -->
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-4 testitopbarborder">
      </div>
      <div class="col-lg-4 ">
      </div>
      <div class="col-lg-4 ">
      </div>
   </div>
</div>
<!-- apply online start -->
<div class="apply-online-background-img">
  <div class="container">
    <div class="row flex-section">
      <div class="col-lg-6">
        <div class="apply-online">
          <div class="col-half">
            <figure>
               <img src="{{asset('uploads/images/1_0018_cheerful-young-caucasian-businessman.png')}}">
            </figure>
          </div>
          <div class="col-half">
            <figure>
               <img src="{{asset('uploads/images/1_0016_man-working-night.png')}}">
            </figure>
            <figure>
               <img src="{{asset('uploads/images/1_0014_widely-smiling-businesswoman-working-laptop-sitting-cafe.png')}}">
            </figure>
          </div>
        </div>
      </div>
      <div class="col-lg-6 pl-5">
        <h4 class="color-blue">APPLY ONLINE<br>
        See if you pre-qualify</h4>
        <p class="color-blue">It only takes 5 minutes</p>
        <p class="color-blue">and won't affect your</p>
        <p class="color-blue">credit scrore</p>
        <br>
        <a href="{{route('loan.index')}}"><button class="btn btn-primary color-gold rounded-btn">Get Started</button></a>
      </div>
    </div>
  </div>
</div>
<!-- apply online end -->
<div class="container-fluid">
   <div class="row mt-2 mb-2">
      <div class="col-lg-6">
      </div>
      <div class="col-lg-6">
         <img class="mlminus200 mtminus70" src="{{asset('uploads/images/1_0013_Rectangle-3-copy-11.png')}}">
      </div>
   </div>
</div>
<div class="container">
   <center>
      <div class="row mt-4 mb-4">
         <div class="col-lg-12">
            <h3>WE'RE HERE TO HELP YOU SUCCEED</h3>
            <div class="talk-to-consultant background-dark-to-light" data-aos="fade-up"
     data-aos-duration="1000">
               <a href="{{route('loan.bookACall')}}">
                  <h4 class="mb-0">Talk to a BCC Loan Consultant</h4>
               </a>
            </div>
            <p>1.SBA loans through banks in the BCC lending nework have a variable rate of Prime Rate plus 1.5% to 3.75%</p>
            <p> 2.We conduct a soft credit pull that will not affect your credit score. However, in processing your loan application
               the lenders with whom we work will reguest your full credit report from one or more consumer reporting agenc
               whicn is considered a hard credit puil and nappens afrter your application is in the funding process and matched with a lender who is likely to fund your loan
            </p>
            <p> rate on bank term loans stepends on foan term and the applicant's credit and financial profile</p>
            <p>4.Monthily payment rate on bank term ioans S based ona qualiftied applicant receving a 5-year
               term at anaverage interest rate of 8.99%
            </p>
         </div>
      </div>
   </center>
</div>
@endsection()