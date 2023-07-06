@extends('layout.appTheme')
@section('content')

@include('general.banner')

<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">Add Company Details</h4>
            </div>
         </div>
         <div class="card-body">
            <form action="" method="POST">
               <input type="hidden" name="_token" value="">                     
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">First Name</label>
                        <input type="text" class="form-control" id="name" placeholder="First Name" name="name" required="">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Last Name</label>
                        <input type="text" class="form-control" id="last" placeholder="Last Name" name="Last Name" required="">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="Email" required="">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required="">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="title">Owner:</label>
                        <input type="text" class="form-control" id="owner" placeholder="Owner" name="owner" required="">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label class="form-label" for="last_name">Type:</label>
                        <select class="form-select" id="type" name="type">
                           <option value="contact">Contact</option>
                           <option value="deals">Deals</option>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="row"><div class="col"><br></div></div>

               <div class="row">
                  <div class="col">
                     
                     <a href="#" class="btn btn-danger">Cancel</a>
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection