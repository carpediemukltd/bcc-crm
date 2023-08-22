@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Edit Contact</h1>
                     <p>You can edit this contact.</p>
                  </div>
                  <div class="form-check form-switch form-check-inline">
                     <input class="form-check-input" type="checkbox" id="switch1">
                     <label class="pl-2 form-check-label" for="switch1">Add Custom Field</label>
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
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{route('customfield.edit', $rs_field->id)}}" method="POST">
                     @method('PUT')
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="title">Title:</label>
                              <input type="text" class="form-control" id="title" placeholder="Title" value="{{$rs_field->title}}" name="title" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="type">Type:</label>
                              <select class="form-select" id="type" name="type">
                                 @foreach($fields_type as $rec_field)
                                    <option value="{{$rec_field}}" <?php if($rec_field == $rs_field->type){echo 'selected';}?>>{{$rec_field}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="row"><div class="col"><br /></div></div>

                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Update</button>
                           <a href="{{ route('customfield.list') }}" class="btn btn-danger">Cancel</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection