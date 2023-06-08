<?php
   $title = "Edit Profile";
   ?>
@extends('admin.layout.app')
@section('content')
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
      <div class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="card has-blue-border">
                  <div class="card-header">
                     <div class="card-title mb-0">
                        <h3 class="mb-0">Add Custom Field</h3>
                     </div>
                  </div>
                  <div class="card-body">
                        <div class="row">      
                           <!-- <div class="col-lg-3">
                           </div> -->
                           <div class="col-lg-12">
                              <?php
                                 if(isset($_SESSION['msg_success']) && !empty($_SESSION['msg_success'])){
                              ?>
                                    <div class="alert alert-outline-success d-flex align-items-center" id="alert_success_session">
                                    <svg class="svg-inline--fa fa-circle-check text-success fs-3 me-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"></path></svg>
                                       <p class="mb-0 flex-1"><?=$_SESSION['msg_success'];?></p>
                                       <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                              <?php
                                    unset($_SESSION["msg_success"]);
                                 }else if(isset($_SESSION['msg_error']) && !empty($_SESSION['msg_error'])){
                              ?>
                                    <div class="alert alert-outline-danger d-flex align-items-center">
                                    <svg class="svg-inline--fa fa-circle-xmark text-danger fs-3 me-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"></path></svg>
                                       <p class="mb-0 flex-1"><?=$_SESSION['msg_error'];?></p>
                                       <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                              <?php
                                    unset($_SESSION["msg_error"]);
                                 }
                              ?>

                              <form class="upload-profile" action="{{route('user.customfields.add')}}" method="POST">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group p-0 mb-3">
                                          <label class="form-label">Title</label>
                                          <input required type="text" class="form-control form-control-lg" name="title">
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group p-0 mb-3">
                                          <label class="form-label">Type</label>
                                          <select class="form-control form-control-lg" name="type">
                                             <option value="contact">Contact</option>
                                             <option value="deals">Deals</option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                       <div class="form-group p-0 text-right">
                                          <button type="submit" class="btn btn-primary">SAVE</button>
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
@endsection()