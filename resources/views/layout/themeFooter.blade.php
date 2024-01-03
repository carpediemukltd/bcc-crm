<!-- Footer Section Start -->
<footer class="footer">
   <div class="footer-body">
      <ul class="left-panel list-inline mb-0 p-0">
         <li class="list-inline-item"><a href="{{ route('about') }}">About</a></li>
         <li class="list-inline-item"><a href="{{ route('contact') }}">Contact</a></li>
         <li class="list-inline-item"><a href="{{ route('help') }}">Help</a></li>
         <li class="list-inline-item"><a href="{{ route('privacy') }}">Privacy Policy</a></li>
         <!-- <li class="list-inline-item"><a href="{{ route('privacy') }}">Terms of Use</a></li> -->
      </ul>
      <div class="right-panel">
         ©2023 <span>BCC, CRM</span>
      </div>
   </div>
</footer>
<!-- Footer Section End -->
</main>


<!-- Wrapper End-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <form action="#" autocomplete="off">
               <h3 class="text-center">Sign In</h3>
               <p class="text-center">Sign in to stay connected</p>
               <div class="form-group">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control mb-0" placeholder="Enter email" autocomplete="off">
               </div>
               <div class="form-group">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control mb-0" placeholder="Enter password" autocomplete="off">
               </div>
               <div class="d-flex justify-content-between">
                  <div class="form-check d-inline-block mt-2 pt-1">
                     <input type="checkbox" class="form-check-input" id="customCheck11">
                     <label class="form-check-label" for="customCheck11">Remember Me</label>
                  </div>
                  <a href="#">Forget password</a>
               </div>
               <div class="text-center pb-3">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sign in</button>
               </div>
               <p class="text-center">Or sign in with other accounts?</p>
               <div class="d-flex justify-content-center">
                  <ul class="list-group list-group-horizontal list-group-flush">
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/fb.svg')}}" alt="fb" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/gm.svg')}}" alt="gm" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/im.svg')}}" alt="im" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/li.svg')}}" alt="li" loading="lazy"></a>
                     </li>
                  </ul>
               </div>
               <p class="text-center">Don't have account?<a href="#"> Click here to sign up.</a></p>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <form action="#">
               <h3 class="text-center">Sign Up</h3>
               <p class="text-center">Create your BCC account</p>
               <div class="d-flex justify-content-between">
                  <div class="form-group me-3">
                     <label class="form-label">First Name</label>
                     <input type="text" class="form-control mb-0" placeholder="Enter First Name" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Last Name</label>
                     <input type="text" class="form-control mb-0" placeholder="Enter Last Name" autocomplete="off">
                  </div>
               </div>
               <div class="d-flex justify-content-between">
                  <div class="form-group me-3">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control mb-0" placeholder="Enter Email" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Phone No.</label>
                     <input type="tel" class="form-control mb-0" placeholder="Enter Phone Number" autocomplete="off">
                  </div>
               </div>
               <div class="d-flex justify-content-between">
                  <div class="form-group me-3">
                     <label class="form-label">Password</label>
                     <input type="password" class="form-control mb-0" placeholder="Enter Password" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Confirm Password</label>
                     <input type="password" class="form-control mb-0" placeholder="Enter Confirm Password" autocomplete="off">
                  </div>
               </div>
               <div class="text-center pb-3">
                  <input type="checkbox" class="form-check-input" id="customCheck112">
                  <label class="form-check-label" for="customCheck112">I agree with the terms of use</label>
               </div>
               <div class="text-center pb-3">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sign in</button>
               </div>
               <p class="text-center">Or sign in with other accounts?</p>
               <div class="d-flex justify-content-center">
                  <ul class="list-group list-group-horizontal list-group-flush">
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/fb.svg')}}" alt="fb" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/gm.svg')}}" alt="gm" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/im.svg')}}" alt="im" loading="lazy"></a>
                     </li>
                     <li class="list-group-item border-0 pb-0">
                        <a href="#"><img src="{{asset('assets/images/brands/li.svg')}}" alt="li" loading="lazy"></a>
                     </li>
                  </ul>
               </div>
               <p class="text-center">Already have an Account<a href="#">Sign in</a></p>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Library Bundle Script -->

<script src="{{asset('assets/js/core/libs.min.js')}}"></script>
<!-- Plugin Scripts -->
<!-- Flatpickr Script -->
<script src="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/flatpickr.js')}}" defer></script>

<!-- Slider-tab Script -->
<script src="{{asset('assets/js/plugins/slider-tabs.js')}}"></script>
<!-- Select2 Script -->
<script src="{{asset('assets/js/plugins/select2.js')}}" defer></script>
<!-- Lodash Utility -->
<script src="{{asset('assets/vendor/lodash/lodash.min.js')}}"></script>
<!-- Utilities Functions -->
<script src="{{asset('assets/js/iqonic-script/utility.min.js')}}"></script>
<!-- Settings Script -->
<script src="{{asset('assets/js/iqonic-script/setting.min.js')}}"></script>
<!-- Settings Init Script -->
<script src="{{asset('assets/js/setting-init.js')}}"></script>
<!-- External Library Bundle Script -->
<script src="{{asset('assets/js/core/external.min.js')}}"></script>
<!-- Widgetchart Script -->
<script src="{{asset('assets/js/charts/widgetcharts.js?v=3.0.0')}}" defer></script>
<!-- Dashboard Script -->
<script src="{{asset('assets/js/charts/dashboard.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/charts/alternate-dashboard.js?v=3.0.0')}}" defer></script>
<!-- Hopeui Script -->
<script src="{{asset('assets/js/hope-ui.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/hope-uipro.js?v=3.0.0')}}" defer></script>
<script src="{{asset('assets/js/sidebar.js?v=3.0.0')}}" defer></script>

<script src="{{asset('assets/vendor/sortable/Sortable.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/kanban.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput-jquery.min.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
   setTimeout(function() {
      var myBox = document.getElementById("alert-box-close");
      if (myBox != null) {
         document.getElementById("alert-box-close").click();
      }
   }, 5000);
   $(".notification_view .clear-bell-icon").click(function() {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: '/clear-bell-badge',
         method: 'PUT',
         headers: {
            'X-CSRF-TOKEN': csrfToken
         },
         data: {},
         success: function(response) {
            $(".custom-notification-badge").remove();
         },
         error: function(xhr, status, error) {}
      });
   });
   $(".mark-as-read").click(function() {
      var id = $(this).data('id');
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: '/notification-mark-read?type=delete',
         method: 'PUT',
         headers: {
            'X-CSRF-TOKEN': csrfToken
         },
         data: {
            id: id
         },
         success: function(response) {
            $("#notification_listing-" + id).remove();
         },
         error: function(xhr, status, error) {}
      });
   });
   $('table').on('change', '.setting-email-enabled', function() {
      var checkbox = $(this);
      var settingId = checkbox.data('id'); // Get the data-id attribute
      var status;
      if (checkbox.prop('checked')) {
         status = 'enabled';
      } else {
         status = 'disabled';
      }
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: '/update-notification-setting',
         method: 'PUT',
         headers: {
            'X-CSRF-TOKEN': csrfToken
         },
         data: {
            id: settingId,
            status: status
         },
         success: function(response) {},
         error: function(xhr, status, error) {}
      });
   });
   $('#options-dropdown-deals').on('change', function() {
      const selectedOptions = $(this).val();
      const settingId = $(this).data('id');
      updateSelectedOptions(settingId, selectedOptions.join(','));
   });

   function updateSelectedOptions(settingId, selectedOptions) {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         url: '/update-stage-settings-options',
         method: 'POST',
         headers: {
            'X-CSRF-TOKEN': csrfToken
         },
         data: {
            settingId: settingId,
            selectedOptions: selectedOptions
         },
         success: function(response) {},
         error: function(error) {}
      });
   }
   $('.notification-list, .notification-list-header').on('click', function() {
      const settingId = $(this).data('id');
      const settingUrl = $(this).data('url');
      const settingStatus = $(this).data('status');
      const type = $(this).data('type');
      if (settingStatus == '0' || settingStatus == 0) {
         var csrfToken = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: '/notification-mark-read?type=read',
            method: 'PUT',
            headers: {
               'X-CSRF-TOKEN': csrfToken
            },
            data: {
               id: settingId,
            },
            success: function(response) {
               if (type == 'header') {
                  $("#notification_listing-" + id).removeClass('notification_listing_color_unread');
               }

            },
            error: function(error) {}
         });
      }
      //redirect to setting url
      window.location.href = window.location.origin + settingUrl;
   });

   $(document).ready(function() {
      // Initialize the plugin with the user's country code.
      var phoneNumberInput = $('#phone-number');
      var selectedCountryCodeInput = $('#selected-country-code'); // Hidden input field

      // Remove non-digit characters as the user types.
      phoneNumberInput.on('input', function() {
         var sanitizedValue = phoneNumberInput.val().replace(/\D/g, ''); // Remove non-digit characters
         phoneNumberInput.val(sanitizedValue); // Add the plus sign back
      });

      phoneNumberInput.intlTelInput({
         separateDialCode: true,
         initialCountry: 'us', // Set the initial country to United States
         onlyCountries: ['us'], // Allow only United States
      });

      // Add an event listener to update the hidden input with the selected country code.
      phoneNumberInput.on('countrychange', function(e) {
         var selectedCountryData = phoneNumberInput.intlTelInput('getSelectedCountryData');
         var selectedCountryCode = '+' + selectedCountryData.dialCode;
         selectedCountryCodeInput.val(selectedCountryCode);
      });
      phoneNumberInput.trigger('countrychange');
      // Hide the country dropdown using JavaScript
      var style = document.createElement('style');
      style.type = 'text/css';
      style.innerHTML = '.iti__country-list { display: none !important; }';
      document.head.appendChild(style);

   });
</script>
<script>

   document.getElementById('search-header').addEventListener('input', function() {
      // Get the value entered into the search input
      var searchValue = this.value;
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var activeFilter = document.querySelector('.active-filter');
      $(".search-results-for").html(searchValue);
       // Hide the content-inner div and show the search-container
      $(".content-inner").hide();
      $("#search-container").show();
      $("#search-container .content-inner").show();
      


      // Initialize an empty data object
      var requestData = {
         q: searchValue // Include the search value
      };

      if (activeFilter) {
         // If an active filter exists, add its id to the data object
         requestData.filter = activeFilter.id;
      }
      $(".contacts-html").html('');
      $(".companies-html").html('');
      $(".deals-html").html('');
      $(".pipelines-html").html('');
      $(".stages-html").html('');

      // Perform an AJAX post call with the searchValue using jQuery
      if (searchValue) {
         $.ajax({
            url: '/search',
            type: 'POST',
            data: requestData,
            headers: {
               'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
               $(".contacts-html").html('');
               $(".companies-html").html('');
               $(".deals-html").html('');
               $(".pipelines-html").html('');
               $(".stages-html").html('');
               
               $(".contacts-html").append(response.contacts);
               $(".deals-html").append(response.deals);
               $(".pipelines-html").append(response.pipelines);
               $(".companies-html").append(response.companies);
               $(".stages-html").append(response.stages);
            },
            error: function() {
               // Handle errors here
               console.error('AJAX request failed');
            }
         });
      }else{
         $("#search-container").hide();
         $(".content-inner").show();
      }
   });

   // Event listener for each tag
   $("#contacts, #deals, #stages, #companies, #pipelines").click(function() {
       // Hide the content-inner div and show the search-container
      $(".content-inner").hide();
      $("#search-container").show();
      $("#search-container .content-inner").show();
      var selectedFilter = $(this).attr("id");
      var searchValue = $("#search-header").val();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $('.filter-tag').removeClass('active-filter');
      $(this).addClass('active-filter');
      $(".contacts-row").hide();
      $(".companies-row").hide();
      $(".deals-row").hide();
      $(".stages-row").hide();
      $(".pipelines-row").hide();
      $("." + selectedFilter + '-row').show();
      $(".search-results-for").html(searchValue);

      if(!searchValue){
         $("#search-container").hide();
         $(".content-inner").show();
      }

      // Make the AJAX request with the selected tag
      $.ajax({
         url: '/search',
         type: 'POST',
         data: {
            q: searchValue, // Include the search value
            filter: selectedFilter // Include the selected tag
         },
         headers: {
            'X-CSRF-TOKEN': csrfToken
         },
         success: function(response) {
            $(".contacts-html").html('');
            $(".companies-html").html('');
            $(".deals-html").html('');
            $(".pipelines-html").html('');
            $(".stages-html").html('');

            $(".contacts-html").append(response.contacts);
            $(".deals-html").append(response.deals);
            $(".pipelines-html").append(response.pipelines);
            $(".companies-html").append(response.companies);
            $(".stages-html").append(response.stages);
         },
         error: function() {
            // Handle errors here
            console.error('AJAX request failed');
         }
      });
   });
   $(".remove-search").click(function(){
      $("#search-container").hide();
      $(".content-inner").show();
      $("#search-header").val('');

   });
   
</script>

@yield('script')

</body>

</html>