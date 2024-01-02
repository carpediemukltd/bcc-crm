@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Round Robin</h1>
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
                     <h4 class="card-title">Owners</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{route('roundrobin')}}" method="POST">
                     @csrf
                     @method('put')
                     @if (count($settings) > 0)
                     <input type="hidden" name="round_robin" value="{{count($settings)}}" />
                     <input type="hidden" name="company_id" value="{{$user->company_id}}" />
                     @foreach($settings as $setting)
                     <div class="row">
                         <!-- <div class="col">
                             <div class="form-group">
                                 
                           </div>
                        </div> -->
                        <div class="col-lg-6">
                           <div class="form-group">
                           <label class="form-label">{{$setting->first_name}} {{$setting->last_name}}</label>
                              <select class="form-select" id="priority[{{$setting->id}}]" name="priority[{{$setting->id}}]">
                                 <option value="low" <?php if($setting->priority == 'low'){echo 'selected';}?>>Low Priority</option>
                                 <option value="high" <?php if($setting->priority == 'high'){echo 'selected';}?>>High Priority</option>
                              </select>
                           </div>
                        </div>
                     </div>
                        @endforeach
                    @endif

                     <div class="row"><div class="col"><br /></div></div>

                     <div class="row">
                        <div class="col">
                           
                           <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                           <button type="submit" class="btn btn-primary">Submit</button>
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