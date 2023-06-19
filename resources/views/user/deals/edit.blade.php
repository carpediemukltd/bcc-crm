@extends('layout.appTheme')
@section('content')

<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Edit Deal</h1>
                     <p>Edit deal.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div>
      <div class="all_type_alert_boxes">
         @if (session('success'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulations!</strong> {{ session('success') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif

         @if (session('error'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> {{ session('error') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif
      </div>

      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="<?= url('contact/'.$current_user_id.'/deals/edit/'.$rs_deal->id);?>" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="title">Title:</label>
                              <input type="text" class="form-control" id="title" placeholder="Title" value="{{$rs_deal->title}}" name="title" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="deal_owner">Deal Owner:</label>
                              <input type="text" class="form-control" id="deal_owner" value="{{$rs_deal->deal_owner}}" placeholder="Deal Owner" name="deal_owner" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="amount">Amount:</label>
                              <input type="number" class="form-control" id="amount" value="{{$rs_deal->amount}}" placeholder="Amount" name="amount" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="lead_source">Lead Source:</label>
                              <select class="form-select" id="lead_source" name="lead_source">
                                 <option value="contact" <?php if($rs_deal->lead_source == 'contact'){echo 'selected';}?>>Contact</option>
                                 <option value="lead" <?php if($rs_deal->lead_source == 'lead'){echo 'selected';}?>>Lead</option>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="pipeline_id">Pipeline:</label>
                              <select class="form-select" id="pipeline_id" name="pipeline_id">
                                 @if(isset($rs_pipelines))
                                    @foreach($rs_pipelines as $rec_pipeline)
                                       <option value="{{$rec_pipeline->id}}" <?php if($rec_pipeline->id == $rs_deal->pipeline_id){echo 'selected';}?>>{{ucfirst($rec_pipeline->title)}}</option>
                                    @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="stage_id">Stage:</label>
                              <select class="form-select" id="stage_id" name="stage_id">
                                 @if(isset($rs_stages))
                                    @foreach($rs_stages as $rec_stages)
                                       <option value="{{$rec_stages->id}}" <?php if($rec_stages->id == $rs_deal->stage_id){echo 'selected';}?>>{{ucfirst($rec_stages->title)}}</option>
                                    @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="row"><div class="col"><br /></div></div>

                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Update</button>
                           <a href="{{ route('user.deals', $current_user_id) }}" class="btn btn-danger">Cancel</a>
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