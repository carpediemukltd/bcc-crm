@extends('layout.appTheme')
@section('content')

<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Add Contact </h1>
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
                     <h4 class="card-title">Add Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{route('user.add')}}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="first_name">First name:</label>
                              <input type="text" class="form-control" id="first_name" placeholder="First name" name="first_name" value="{{old('first_name')}}" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="last_name">Last name:</label>
                              <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" value="{{old('last_name')}}" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="email">Email address:</label>
                              <input type="email" class="form-control" id="email" placeholder="Email address" name="email" value="{{old('email')}}" required>
                              @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="hidden" name="phone_country_code" id="selected-country-code" value="+1">
                              <label class="form-label" for="phone_number">Phone number:</label>
                              <div class="phone-input">
                                 <input name="phone_number" type="tel" id="phone-number" placeholder="Enter your phone number" class="form-control" required>
                              </div>
                              @if ($errors->has('phone_number'))
                                 <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                      <div class="row">
                          <div class="col documents_view_holder">
                              <label class="form-label" for="email" style="color: #000;">Document Types:</label>
                              <div class="form-group">
                                  <div class="row">
                                  @foreach($document_groups as $group)
                                      <div class="col-md-3">
                                          <label class="checkbox-inline">
                                              <div class="check-doc-field">
                                                  <input type="checkbox" class="document_group_checkbox" name="{{$group->name}}" value="{{$group->id}}">
                                              </div>
                                              <p><b>{{$group->name}}</b></p>
                                          </label>
                                      </div>
                                  @endforeach
                                  @foreach($documents as $document)
                                      <div class="col-md-4">
                                          <label class="checkbox-inline">
                                             <div class="check-doc-field">
                                              <input type="checkbox" name="document_types[]" data-group-id="{{$document->DocumentGroup->id}}" value="{{$document->id}}">
                                             </div>
                                             <p>{{$document->title}}</p>
                                          </label>
                                      </div>
                                  @endforeach
                                  @if ($errors->has('document_types'))
                                      <span class="text-danger">{{ $errors->first('document_types') }}</span>
                                  @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- custom fields start -->
                     <div class="accordion custom-accordion mb-3" id="CustomAccordionExample">
                        <div class="accordion-item">
                           <h5 class="accordion-header" id="custom-headingOne">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom-collapseOne" aria-expanded="true" aria-controls="custom-collapseOne" fdprocessedid="4wodn">
                              Add Custom Fields
                              </button>
                           </h5>
                           <div id="custom-collapseOne" class="accordion-collapse collapse" aria-labelledby="custom-headingOne" data-bs-parent="#CustomAccordionExample">
                              <div class="accordion-body">
                                 <input type="hidden" class="form-control" id="role" name="role" value="user">
                                 <input type="hidden" class="form-control" id="password" name="password" value="BCCUSA.com">
                                 <input type="hidden" id="custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">
                                 @if (count($custom_fields)>0)
                                 <div class="row">
                                    @foreach($custom_fields as $field)
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label class="form-label" for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
                                          <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]">
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- custom fields end -->
                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  function toggleRoles(){
   var roles = $('#role :selected').val();
   console.log(roles);
   if(roles=='user'){
      $('#owner').attr('required','required');
      console.log('added');
      $('#owners_list').show();
   }else {
      $('#owner').removeAttr('required');
      $('#owners_list').hide();
      console.log('removed');
   }
  }

  $('.document_group_checkbox').click(function(){
      var group_id = $(this).val();
      $("[data-group-id='" + group_id + "']").prop('checked',$(this).prop('checked'))
  })
   </script>

@endsection
