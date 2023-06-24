@extends('layout.appTheme')
@section('content')
<style>
   /* h3.stages{border: 1px solid #eeeeee; padding: 10px; border-radius: 4px; background: #fbfbfb;} */
   table.stage td {width:100%; height: 100%;}
   table.stage tr:hover{cursor:pointer;}
</style>

<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Edit Pipeline</h1>
                     <p>Edit pipeline and stages.</p>
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
               <!-- <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"></h4>
                  </div>
               </div> -->
               <div class="card-body">
                  <form action="{{ route('pipeline', ['action' => 'edit', 'id' => $rs_pipeline->id]) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     
                     <div class="row">
                        <div class="col">
                           <h3 class="mb-0">Stages</h3>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <div class="d-flex justify-content-between align-items-center">
                                 <label class="form-label mb-0" for="title" style="width: 16%;">Edit Form:</label>
                                 <input type="text" class="form-control" id="title" placeholder="Name" value="{{$rs_pipeline->title}}" name="title" required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col table-responsive">
                           <table class="table table-bordered table-hover stage">
                              <thead>
                                 <tr>
                                    <th style="width:100%;">Name</th>
                                    <th>Delete</th>
                                 </tr>
                              </thead>
                              <tbody id="control-group">
                                 @if(isset($rs_stages))
                                    @foreach($rs_stages as $index => $rec_stage)
                                       <tr>
                                          <td>
                                             <input type="text" placeholder="Name" name="stages[{{$index}}][title]" class="form-control" value="{{$rec_stage->title}}" required>
                                             <input type="hidden" name="stages[{{$index}}][stage_id]" class="form-control" value="{{$rec_stage->id}}">
                                             <span style="float:right; color: red;" class="custom-error" id="custom_error_{{$rec_stage->id}}"></span>
                                          </td>
                                          <td>
                                             <button type="button" onclick="delete_row(this);" data-custom-error-id="#custom_error_{{$rec_stage->id}}" data-stage-id="{{$rec_stage->id}}" class="btn btn-danger btn-sm btn-danger" style="float:right;">
                                                <span class="btn-inner">
                                                   <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                      <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                   </svg>
                                                </span>   
                                             </button>   
                                          </td>
                                       </tr>
                                    @endforeach
                                 @endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                     
                     
                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Update</button>
                           <a href="{{ route('pipeline', ['action' => 'list']) }}" class="btn btn-danger">Cancel</a>
                        </div>
                        <div class="col text-right">
                           <button type="button" class="btn text-right btn-success btn-sm btn-info addClickrBtn">
                              <span class="btn-inner">
                                 <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                              </span>   
                              Add Row 
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
    $('tbody').sortable();
</script>
<script>
   function delete_row(selected){
      var stage_id   = $(selected).attr("data-stage-id");
      var error_id   = $(selected).attr("data-custom-error-id");
      var delete_url = "{{ url('pipeline/delete_stage') }}/"+stage_id;
      $('.custom-error').html('');
      $.ajax({ 
         url: delete_url,
         dataType: "json",
         success:function(data){
           if(data.status == 1){
            $(error_id).html(data.error);
           }else if(data.status == 2){
               $(selected).closest("tr").remove();
           }
         }
      });
   } // delete_row

   $('.addClickrBtn').click(function(){
      c = $('#control-group tr').length;
      c = c+1; 
      var tr='<tr><td><input type="text" placeholder="Name" name="stages['+c+']" class="form-control" value="Todo List" required></td><td><button type="button" class="btn btn-danger btn-sm btn-danger delete_row_btn" style="float:right;"><span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span></button></td></tr>';
      $('#control-group').append(tr);

      $('.delete_row_btn').click(function(){
         $(this).closest("tr").remove();
      });
   });
   $('.delete_row_btn').click(function(){
      $(this).closest("tr").remove();
   });
</script>


@endsection