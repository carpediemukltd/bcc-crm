@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Add Robin Setting</h1>
                  </div>
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
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New Round Robin Setting</h4>
                </div>
            </div>
            <div class="card-body">
               <form action="#" method="POST">
                  <input type="hidden" name="_token" value="hSax8WAH4wIDnPtIsGhhHFy3Z19wZzieGkWNiN0i">                     
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="owner_name">Owner:</label>
                           <input type="text" class="form-control" id="owner_name" placeholder="Owner" name="first_name" value="" required="">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="module_name">Modules:</label>
                           <input type="text" class="form-control" id="module_name" placeholder="Modules" name="last_name" value="" required="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="percentage">Percentage:</label>
                           <input type="text" class="form-control" id="percentage" placeholder="percentage" name="email" value="" required="">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="phone_number">Email For Notification:</label>
                           <input type="number" id="phone_number" class="form-control" name="phone_number" placeholder="123456789" value="" required="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label" for="password">Disabled Untill For Holidays:</label>
                           <input type="text" name="start" class="form-control range_flatpicker flatpickr-input active" placeholder="Range Date Picker" readonly="readonly">
                        </div>
                     </div>
                  </div>
                  <div class="card-body px-0">    
                                <a href="#" class="btn btn-danger">Cancel</a>  
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
               </form>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection