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
                              <label class="form-label" for="amount">$ Amount:</label>
                              <input type="number" class="form-control" id="amount" value="{{$rs_deal->amount}}" placeholder="$ 0" name="amount" required>
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
                              <label class="form-label" for="depositing_institution">Depositing Institution:</label>
                              <input type="text" class="form-control" id="depositing_institution" value="{{$rs_deal->depositing_institution}}" placeholder="Depositing Institution" name="depositing_institution" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="state">State:</label>
                              <input type="text" class="form-control" id="state" value="{{$rs_deal->state}}" placeholder="State" name="state" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="submitted_bank">Submitted Bank:</label>
                              <input type="text" class="form-control" id="submitted_bank" value="{{$rs_deal->submitted_bank}}" placeholder="Submitted Bank" name="submitted_bank" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="sub_type">Sub Type:</label>
                              <input type="text" class="form-control" id="sub_type" value="{{$rs_deal->sub_type}}" placeholder="Sub Type" name="sub_type" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="pipeline_id">Pipeline:</label>
                              <select class="form-select" id="pipeline_id" name="pipeline_id" onchange="changePiepeline(this);" required>
                                 <option selected="true" value="" disabled="disabled">Select</option>
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
                              <select class="form-select" id="stage_id" name="stage_id" required>
                                 @if(isset($rs_stages))
                                    @foreach($rs_stages as $stage)
                                       <option value="{{$stage->id}}" <?php if($stage->id == $rs_deal->stage_id){echo 'selected';}?>>{{ucfirst($stage->title)}}</option>
                                    @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
                     </div>

                     @if (count($custom_fields)>0)   
                     <div class="row">
                     <input type="hidden" id="custom_fields_count" name="custom_fields_count" value="{{count($custom_fields)}}">
                     @foreach($custom_fields as $field)
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label" for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
                           <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" name="custom_fields[{{$field->id}}]" value="{{$field->data}}" placeholder="{{$field->title}}">
                        </div>
                     </div>
                     @endforeach
                  </div>
                     @endif
                     <div class="row"><div class="col"><br /></div></div>

                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Update</button>
                           <a href="{{ route('user.deals', [$current_user_id,'listing']) }}" class="btn btn-danger">Cancel</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function(){
      var pipeline_id  = $('#pipeline_id').find(":selected").val();
      var stage_id     = "{{$rs_deal->stage_id}}";
      var pipeline_url = "{{ url('pipelineStages') }}/"+pipeline_id+"/"+stage_id;
      $.ajax({ 
         url: pipeline_url,
         success:function(data){
            $('#stage_id').html(data);
         }
      });
   });

   function changePiepeline(selected){
      var pipeline_id  = $(selected).find(":selected").val();
      var stage_id     = "{{$rs_deal->stage_id}}";
      var pipeline_url = "{{ url('pipelineStages') }}/"+pipeline_id+"/"+stage_id;
      $.ajax({ 
         url: pipeline_url,
         success:function(data){
            $('#stage_id').html(data);
         }
      });
   }
</script>

@endsection