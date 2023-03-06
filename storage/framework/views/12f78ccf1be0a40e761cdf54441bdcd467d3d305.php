<?php
   $login = "no";
   $title = "Contact Details";
   ?>

<?php $__env->startSection('content'); ?>
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="content">
<div class="row">
   <div class="col-lg-3" style="padding: 0;">
      <div class="user_details_view" id="user_details_view">
         <div class="user_profile_view">
            <div class="img-holder">
               <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
            </div>
            <div class="text-holder">
               <h3>Saddam Hussain</h3>
               <span class="d-block">Frontend Developer</span>
               <a href="#">
               saddamh4477@gmail.com
               </a> 
            </div>
         </div>
         <form class="row g-3 mb-6">
            <div class="col-sm-6 col-md-12">
               <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Email"><label for="floatingInputGrid">Email</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="saddamh4477@gmail.com"><label for="floatingInputBudget">saddamh4477@gmail.com</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="Contact Owner"><label for="floatingInputBudget">Contact Owner</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="Lead Status"><label for="floatingInputBudget">Lead Status</label></div>
            </div>
            <div class="col-12 ">
               <div class="text-right">
                  <button class="btn btn-primary contact_view_btn" type="button" onclick="myFunction()">Edit</button>
               </div>
            </div>
         </form>
      </div>
      <!-- user edit view start -->
      <div class="user_edit_view" id="user_edit_view" style="display: none;">
         <form class="row g-3 mb-6">
            <div class="col-sm-6 col-md-12">
               <label class="form-label" for="customFile">File input example</label>
               <input class="form-control" id="customFile" type="file" />
            </div>
            <div class="col-sm-6 col-md-12">
               <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Name"><label for="floatingInputGrid">Name</label></div>
            </div>
            <div class="col-sm-6 col-md-12">
               <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Designation"><label for="floatingInputGrid">Designation</label></div>
            </div>
            <div class="col-sm-6 col-md-12">
               <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Email"><label for="floatingInputGrid">Email</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="saddamh4477@gmail.com"><label for="floatingInputBudget">saddamh4477@gmail.com</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="Contact Owner"><label for="floatingInputBudget">Contact Owner</label></div>
            </div>
            <div class="col-md-12 ">
               <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="Lead Status"><label for="floatingInputBudget">Lead Status</label></div>
            </div>
            <div class="col-12 ">
               <div class="text-right">
                  <button class="btn btn-primary contact_view_btn">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="col-lg-6" style="padding-right: 0;">
      <ul class="nav nav-underline" id="myTab" role="tablist">
         <li class="nav-item"><a class="nav-link active" id="activity-tab" data-bs-toggle="tab" href="#tab-activity" role="tab" aria-controls="tab-activity" aria-selected="true">Activity</a></li>
         <li class="nav-item"><a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#tab-email" role="tab" aria-controls="tab-email" aria-selected="true">Emails</a></li>
         <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Tasks</a></li>
         <li class="nav-item"><a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Meetings</a></li>
      </ul>
      <div class="tab-content contact_details_view_tabs mt-3" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-activity" role="tabpanel" aria-labelledby="activity-tab">
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown 
            aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. 
            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure 
            terry richardson ex squid. Aliquip placeat salvia cillum iphone.
         </div>
         <div class="tab-pane fade" id="tab-email" role="tabpanel" aria-labelledby="email-tab">
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown 
            aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. 
            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure 
            terry richardson ex squid. Aliquip placeat salvia cillum iphone.
         </div>
         <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. 
            Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan 
            four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft 
            beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic.
         </div>
         <div class="tab-pane fade" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">
            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's 
            organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify 
            pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy 
            hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <nav class="navbar contact_details_nav navbar-vertical">
         <!-- scrollbar removed-->
         <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav2">
               <li class="nav-item">
                  <hr class="navbar-vertical-line">
                  <!-- parent pages-->
                  <!-- <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                           <div class="d-flex align-items-center">
                              <div class="dropdown-indicator-icon">
                                 <svg height="12" class="private-icon-caret UIExpandableSection__ExpandableCaret-yn3fbw-6 bqCath" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                    <title></title>
                                    <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                                 </svg>
                                 
                              </div>
                              <span class="nav-link-text">Companies (1)</span>
                           </div>
                        </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="e-commerce">
                           
                           <li class="nav-item">
                              <a class="nav-link dropdown-indicator" href="#customer" data-bs-toggle="collapse" aria-expanded="true" aria-controls="e-commerce">
                                 <div class="d-flex align-items-center">
                                    
                                    <span class="nav-link-text">Customer</span>
                                 </div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div> -->
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#CRM" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="CRM">
                        <div class="d-flex align-items-center">
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret UIExpandableSection__ExpandableCaret-yn3fbw-6 bqCath" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <title></title>
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                              
                           </div>
                           <span class="nav-link-text">Deals (01)</span>
                           <span class="badge ms-2 badge badge-phoenix badge-phoenix-info nav-link-badge">New</span>
                           
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="CRM">
                           
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo e(route('user.dealslisting')); ?>" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Deals Listing</span></div>
                              </a>
                              <!-- more inner pages-->
                           </li>
                           
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                        <div class="d-flex align-items-center">
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret UIExpandableSection__ExpandableCaret-yn3fbw-6 bqCath" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <title></title>
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                              
                           </div>
                           <span class="nav-link-text">Contact create attribution</span>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="social">
                           
                           <li class="nav-item">
                              <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span></div>
                              </a>
                              <!-- more inner pages-->
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#view-documents" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="view-documents">
                        <div class="d-flex align-items-center">
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret UIExpandableSection__ExpandableCaret-yn3fbw-6 bqCath" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <title></title>
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                              
                           </div>
                           <span class="nav-link-text">View Documents</span>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="view-documents">
                           
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo e(route('user.viewportal')); ?>" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">View BCC Portal</span></div>
                              </a>
                              <!-- more inner pages-->
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crm\resources\views/admin/contactdetails.blade.php ENDPATH**/ ?>