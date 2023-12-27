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
                  <form id="edit_contact" action="{{route('user.edit', $user->id)}}" method="POST" autocomplete="false">
                     @method('PUT')
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="first_name">First name:</label>
                              <input type="text" class="form-control" id="first_name" placeholder="First name" value="{{$user->first_name}}" name="first_name" required>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="last_name">Last name:</label>
                              <input type="text" class="form-control" id="last_name" placeholder="Last name" value="{{$user->last_name}}" name="last_name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="email">Email address:</label>
                              <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="hidden" name="phone_country_code" id="selected-country-code" >
                              <label class="form-label" for="phone_number">Phone number:</label>
                              <div class="phone-input">
                                 <input name="phone_number" type="tel" id="phone-number" placeholder="Enter your phone number" class="form-control" required>
                              </div>
                               <span class="text-danger" id="phone_number_error">{{$errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                            </div>
                        </div>
                     </div>
                      @if($user->role != 'admin')
                          <div class="row">
                              <div class="col documents_view_holder">
                                  <label class="form-label" for="email" style="color: #000;"> Document Types:</label>
                                  <div class="form-group">
                                      <div class="row">
                                          @php
                                              $already_selected_documents = []
                                          @endphp
                                          @foreach($selected_documents as $selected_document)
                                              @php
                                                  $already_selected_documents[] = $selected_document->id;
                                              @endphp
                                          @endforeach
                                          @foreach($document_groups as $group)
                                              <div class="col-md-2">
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
                                                          @php
                                                              $group_ids = [];
                                                              foreach($document->DocumentGroup as $group_id){
                                                                  $group_ids[] = $group_id->id;
                                                              }
                                                              $serializedGroupIds = json_encode($group_ids);
                                                          @endphp
                                                          <input type="checkbox" name="document_types[]" class="document_group_checkbox_option" data-group-id="{{$serializedGroupIds}}" value="{{$document->id}}" {{in_array($document->id, $already_selected_documents) ? 'checked' : ''}}>
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
                      @endif
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="password">Password:</label>
                              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="status">Status:</label>
                              <select class="form-select" id="status" name="status">
                                 @foreach($all_status as $rec_status)
                                    <option value="{{$rec_status}}" <?php if($rec_status == $user->status){echo 'selected';}?>>{{ucfirst($rec_status)}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <!-- custom fields start -->
                     <div class="accordion custom-accordion mb-3" id="CustomAccordionExample">
                        <div class="accordion-item">
                           <h5 class="accordion-header" id="custom-headingOne">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom-collapseOne" aria-expanded="true" aria-controls="custom-collapseOne" fdprocessedid="4wodn">
                              Edit Custom Fields
                              </button>
                           </h5>
                           <div id="custom-collapseOne" class="accordion-collapse collapse" aria-labelledby="custom-headingOne" data-bs-parent="#CustomAccordionExample">
                              <div class="accordion-body">
                              @if (count($custom_fields)>0)
                                 <input type="hidden" id="custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">

                                 <div class="row">
                                 @foreach($custom_fields as $field)
                                    <div class="col-6">
                                       <div class="form-group">
                                          <label class="form-label">{{$field->title}}</label>
                                          <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" name="custom_fields[{{$field->id}}]" value="{{$field->data}}" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]">
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
                           <button type="submit" class="btn btn-primary">Update</button>
                           <a href="{{ route('user.list') }}" class="btn btn-danger">Cancel</a>
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
    $('.document_group_checkbox').click(function(){
        var group_id = parseInt($(this).val());
        if($(this).prop('checked')){
            $(".document_group_checkbox_option").each(function() {
                var optionGroupIds = JSON.parse($(this).attr('data-group-id'));
                if (optionGroupIds.includes(group_id)) {
                    // Check the checkbox
                    $(this).prop('checked', true);
                }
            });
        }else{
            $(".document_group_checkbox_option").each(function() {
                var optionGroupIds = JSON.parse($(this).attr('data-group-id'));
                if (optionGroupIds.includes(group_id)) {
                    // Check the checkbox
                    $(this).prop('checked', false);
                }
            });
        }

    })

    $(document).ready(function(){
        $('#edit_contact').submit(function (e) {
            // Get the input value
            var phoneNumber = $("#phone").intlTelInput("getNumber");

            // Check if the phone number is valid
            if (!$("#phone-number").intlTelInput("isValidNumber")) {
                // Valid phone number, proceed with your form submission or other actions
                $('#phone_number_error').html('Invalid number')
                $("#phone-number").focus();
                e.preventDefault();
            } else {
                $('#phone_number_error').html('')
            }
        });
    })
</script>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#phone-number').val('{{$user->phone_number}}')
        })
    </script>
@endpush
