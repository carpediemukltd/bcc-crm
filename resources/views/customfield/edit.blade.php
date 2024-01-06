@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1><a href="{{ url()->previous() }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>  Edit Custom Field</h1>
                     <p>You can edit this Custom Field.</p>
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
                              @if ($errors->has('title'))
                                 <span class="text-danger">{{ $errors->first('title') }}</span>
                              @endif
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
                              @if ($errors->has('type'))
                                 <span class="text-danger">{{ $errors->first('type') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-check form-switch form-check-inline">
                              <input class="form-check-input" type="checkbox" id="visible" name="visible" <?php if($rs_field->visible==1){echo 'checked';}?>>
                              <label class="pl-2 form-check-label" for="visible">Visible</label>
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