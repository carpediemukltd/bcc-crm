<?php
   $title = "Edit Profile";
   ?>

<?php $__env->startSection('content'); ?>
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-md-12">
               <div class="card has-blue-border">
                  <div class="card-header">
                     <div class="card-title" style="color:#000;">Edit Profile</div>
                  </div>
                  <div class="card-body">
                        <div class="row">      
                           <div class="col-lg-3">
                              <!-- nothing happend -->
                           </div>
                           <div class="col-lg-9">
                              <?php
                                 if(isset($_SESSION['msg_success']) && !empty($_SESSION['msg_success'])){
                              ?>
                                    <div class="alert alert-success alert-block" id="alert_success_session">
                                       <button type="button" class="close" data-dismiss="alert">×</button>
                                       <strong><?=$_SESSION['msg_success'];?></strong>
                                    </div>
                              <?php
                                    unset($_SESSION["msg_success"]);
                                 }else if(isset($_SESSION['msg_error']) && !empty($_SESSION['msg_error'])){
                              ?>
                                    <div class="alert alert-danger alert-block">
                                       <button type="button" class="close" data-dismiss="alert">×</button>
                                       <strong><?=$_SESSION['msg_error'];?></strong>
                                    </div>
                              <?php
                                    unset($_SESSION["msg_error"]);
                                 }
                              ?>

                              <form class="upload-profile" action="<?php echo e(route('user.profile')); ?>" method="POST">
                                 <div class="row pt-4">
                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">First Name</label>
                                          <input required type="text" id="first_name" class="form-control" name="first_name" value="<?=$login_user['first_name'];?>">
                                       </div>
                                    </div>
                                 
                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">Last Name</label>
                                          <input required type="text" id="last_name" class="form-control" name="last_name" value="<?=$login_user['last_name'];?>">
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">Email</label>
                                          <input type="email" disabled id="email" class="form-control" value="<?=$login_user['email'];?>">
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">Phone</label>
                                          <input required type="phone" id="phone" class="form-control" name="phone_number" value="<?=$login_user['phone_number'];?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">Password</label>
                                          <input type="password" id="password" class="form-control" name="password" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group p-0 mb-3">
                                          <label for="">Confirm Password</label>
                                          <input type="password" id="confirm-password" class="form-control" name="confirm_password" >
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group p-0 text-right">
                                          <button type="submit" class="btn btn-primary">Update</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/profile/edit.blade.php ENDPATH**/ ?>