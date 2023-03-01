<!-- bcc footer start -->
<footer class="bcc-footer footer-section background-dark-to-light-footer">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3">
            <div class="bcc-footer-widgets">
               <img src="{{asset('uploads/images/footer-logo.png')}}">
               <p class="mb-0"><br>BCC is a Business Consulting Firm started by Business owners to help Business owners. While our broad spectrum of experience is meaningfull, our empathy knowning what clients are going through provides comfort and trust to the process of scanning Capital for their businesses.</p>
            </div>
         </div>
         <div class="col-lg-3 get-in-touch">
            <div class="bcc-footer-widgets get-touch">
               <h4>Get in Touch</h4>
               <p><i class="fas fa-map-marker"></i> 3237 Rt 112 Suite 9 Medford, NY 11763</p>
               <p><i class="fas fa-phone-alt"></i> (888) 997-4199</p>
               <p><i class="far fa-envelope"></i> <a href="#">info@bccusa.com</a></p>
               <p><i class="fas fa-globe-europe"></i> <a href="#"> beforeyouborrow.com</a></p>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="bcc-footer-widgets">
               <h4>Menu</h4>
               <div class="row">
                  <div class="col-lg-6">
                     <p><i class="fas fa-check"></i> <a href=""> Our Approach</a></p>
                     <p><i class="fas fa-check"></i> <a href="#"> Our Approach</a></p>
                     <p><i class="fas fa-check"></i> <a href=""> Resources</a></p>
                     <p><i class="fas fa-check"></i> <a href=""> Privacy Policy</a></p>
                  </div>
                  <div class="col-lg-6">
                     <p><i class="fas fa-check"></i> <a href="#"> Solutions</a></p>
                     <p><i class="fas fa-check"></i> <a href="#"> Our Company</a></p>
                     <p><i class="fas fa-check"></i> <a href="#"> Contact</a></p>
                     <p><i class="fas fa-check"></i> <a href="#"> Terms of Use</a></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="bcc-footer-widgets">
               <h4>Subscription</h4>
               <p>Get latest updates and offers</p>
               <input type="email" name="email" class="form-control" placeholder="Email"><br>
               <button class="btn btn-primary subscribe-email-input btn-block">SUBSCRIBE NOW > </button>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- bcc footer end -->
<script src="{{asset('carousel-16/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('carousel-16/js/main.js')}}"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });
  // $(".selected-radio").click(function(){
  //   $(".hide-on-selected").hide();
  // });
  
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHPUufTlBkF5NfBT3uhS9K4BbW2N-mkb4&libraries=places"></script>

<script>
  var minPrice = 30000;
  var maxPrice = 350000;

  $('.preference-build_new').hide();
  $('.preference-refinance').hide();
  $('input[type=radio][name=loan_type]').change(function() {

    if (this.value == 'build_new') {
      $('.preference-refinance').hide();
      $('.preference-build_new').show();
      $('.sba_7a_bank_loan').prop('checked', false)
      $('.help_me_decide').prop('checked', 'checked')
      $('.help_me_decide').closest('.type-label').addClass('selected-radio');

      var minPrice = 30000;
      var maxPrice = 350000;
      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 175000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$1942');
      $(".monthly_payment").text('$1942');
      $(".loan_term_input").val('10 Years');
      $(".loan_term").text('10 Years');
      $(".interest_rate_input").val('6.00%');
      $(".interest_rate").text('6.00%');
      $(".apr_with_fees_input").val('6.96%');
      $(".apr_with_fees").text('6.96%');
      $(".from_rate").text('2.75%');
      $(".to_rate").text('3.75%');
    } else {
      $('.preference-build_new').hide();
      $('.preference-refinance').show();
      $('.type-label').removeClass('selected-radio');
      $(this).closest('.type-label').addClass('selected-radio');
      var minPrice = 500000;
      var maxPrice = 5000000;
      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 2500000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$14252');
      $(".monthly_payment").text('$14252');
      $(".loan_term_input").val('25 Years');
      $(".loan_term").text('25 Years');
      $(".interest_rate_input").val('4.75%');
      $(".interest_rate").text('4.75%');
      $(".apr_with_fees_input").val('5.05%');
      $(".apr_with_fees").text('5.05%');
      $(".from_rate").text('1.50%');
      $(".to_rate").text('2.75%');
      $('.help_me_decide').prop('checked', false)

      $('.sba_7a_bank_loan').prop('checked', 'checked')
      $('.sba_7a_bank_loan').closest('.type-label').addClass('selected-radio');
      $('.loan_amount').val(2500000);

    }
  });

  $('input[type=radio][name=loan_type_sub]').change(function() {

    $('.type-label').removeClass('selected-radio');
    $(this).closest('.type-label').addClass('selected-radio');


    if (this.value == 'help_me_decide') {
      var minPrice = 30000;
      var maxPrice = 350000;
      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 175000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$1942');
      $(".monthly_payment").text('$1942');
      $(".loan_term_input").val('10 Years');
      $(".loan_term").text('10 Years');
      $(".interest_rate_input").val('6.00%');
      $(".interest_rate").text('6.00%');
      $(".apr_with_fees_input").val('6.96%');
      $(".apr_with_fees").text('6.96%');
      $(".from_rate").text('2.75%');
      $(".to_rate").text('3.75%');


    }
    if (this.value == 'sba_loan') {
      var minPrice = 30000;
      var maxPrice = 350000;
      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 175000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$1942');
      $(".monthly_payment").text('$1942');
      $(".loan_term_input").val('10 Years');
      $(".loan_term").text('10 Years');
      $(".interest_rate_input").val('6.00%');
      $(".interest_rate").text('6.00%');
      $(".apr_with_fees_input").val('6.96%');
      $(".apr_with_fees").text('6.96%');
      $(".from_rate").text('2.75%');
      $(".to_rate").text('3.75%');
    }

    if (this.value == 'bank_term_loan') {
      minPrice = 30000;
      maxPrice = 500000;

      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 175000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$3,464');
      $(".monthly_payment").text('$3,464');
      $(".loan_term_input").val('5 Years');
      $(".loan_term").text('5 Years');
      $(".interest_rate_input").val('6.99%');
      $(".interest_rate").text('6.99%');
      $(".apr_with_fees_input").val('9.67%');
      $(".apr_with_fees").text('9.67%');
      $(".from_rate").text('6.99%');
      $(".to_rate").text('24.99%');


    }

    if (this.value == 'working_capital') {
      minPrice = 30000;
      maxPrice = 1000000;

      $(function() {
        $("#slider-range-max").slider({
          range: "max",
          min: minPrice,
          max: maxPrice,
          value: 175000,
          step: 1000,
          slide: function(event, ui) {
            $("#amount").val(ui.value);
          }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
      });
      $(".monthly_payment_input").val('$3,464');
      $(".monthly_payment").text('$3,464');
      $(".loan_term_input").val('5 Years');
      $(".loan_term").text('5 Years');
      $(".interest_rate_input").val('6.99%');
      $(".interest_rate").text('6.99%');
      $(".apr_with_fees_input").val('9.67%');
      $(".apr_with_fees").text('9.67%');
      $(".from_rate").text('6.99%');
      $(".to_rate").text('24.99%');


    }
  });


  $(function() {
    $("#slider-range-max").slider({
      range: "max",
      min: minPrice,
      max: maxPrice,
      value: 175000,
      step: 1000,
      slide: function(event, ui) {
        $("#amount").val(ui.value);
      }
    });
    $("#amount").val($("#slider-range-max").slider("value"));
  });

  $("#slider-range-max").slider({
    change: function(event, ui) {
      var amount = ui.value;
      var years = $('.loan_term_input').val();
      years = years.replace('Years', '');
      var months = 12 * years;

      var isCheckedSba = $(".sba_loan").is(":checked");
      if (isCheckedSba == true) {
        if (ui.value < 51000) {
          var interstRate = '7.00';
          $('.interest_rate_input').val(interstRate);
          $('.interest_rate').text('7.00%');
        } else {
          $('.interest_rate_input').val('6.00');
          $('.interest_rate').text('6.00%');
          var interstRate = $('.interest_rate_input').val();
          interstRate = interstRate.replace('%', '');
        }

      } else {
        var interstRate = $('.interest_rate_input').val();
        interstRate = interstRate.replace('%', '');
      }
      let apr = Math.pow(amount / 100, 365.25 / 3650) - 1;
      // console.log(apr, '==apr')


      interstRate = interstRate / 100 / 12;
      var part1 = Math.pow(1 + interstRate, months);
      var part2 = amount * interstRate * part1;
      var part3 = part1 - 1;
      var finalRestult = (100 * (part2 / part3)) / 100;
      finalRestult = parseInt(finalRestult);
      $('.monthly_payment_input').val(finalRestult);
      $('.monthly_payment').text('$' + finalRestult);
      $('.loan_amount').val(ui.value)
    }
  });


  //google maps
  $(document).ready(function() {

    function initialize() {
      autocomplete1();
    }

    function autocomplete1() {
      var formatedPlace = '';
      var input = document.getElementById('pickup_location');
      var autocomplete = new google.maps.places.Autocomplete(input);
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        console.log('place changed');
        var place = autocomplete.getPlace();
        var formatedPlace = place.formatted_address
        input.value = formatedPlace;
        input.dispatchEvent(new Event("input", {
          bubbles: true
        }));

        // document.getElementById('pickup').value = place.geometry.location.lat() + ',' + place.geometry.location.lng();
      });
      input.value = formatedPlace;
      console.log(formatedPlace);
      input.dispatchEvent(new Event("input", {
        bubbles: true
      }));

      //   console.log
    }
    google.maps.event.addDomListener(window, 'load', initialize);


  });
  $("#agree-checkbox").change(function() {
    if (this.checked) {
      $(".continue-prequalify").removeAttr("disabled");
    } else {
      $('.continue-prequalify').prop("disabled", true);
    }
  });
  $(".imgbgchk").change(function() {
    if (this.checked) {
      //$(".imglabel").removeClass("unselected-radio-design");
      $(".hide-on-selected").hide();
    }
  });

  $(".imgbgchk").change(function() {
    if (this.checked) {
      $(".imglabel").removeClass("unselected-radio-design");
      $(".main-selection").hide();
    }
  });
  // 
  $(".have-promo").click(function() {
    $("#promo").toggle();
  });
  $("#referral_source").change(function() {
    if ($(this).val() == 'referral_form_broker' || $(this).val() == 'other') {
      $(".referral_source_specify").show();
    } else {
      $(".referral_source_specify").hide();
    }

  });
  $("body").click(function() {
    $(".pac-container").hide();
  });

  function validate() {
    var mainCheck = $(".imgbgchk").is(':checked');


    if (mainCheck) {
      $(".imglabel").removeClass("unselected-radio-design");
      $(".main-selection").hide();

    } else {
      $("html, body").animate({
        scrollTop: $($('.imgbgchk')).offset().top
      }, 500);
      $(".imglabel").addClass("unselected-radio-design");
      $(".main-selection").show();
      return false;
    }
  }
  $(".describe_your_business").change(function(){
    if($(this).val() == 'Other'){
      $(".describe_your_business_other").show();
    }
  });

    $(".type-bank-loan").hover(function(){
      $(".type-bank-loan-text").css("visibility", "visible");
      }, function(){
        $(".type-bank-loan-text").css("visibility", "hidden");
    });

    $(".type-sba7a-loan").hover(function(){
      $(".type-sba7a-loan-text").css("visibility", "visible");
      }, function(){
        $(".type-sba7a-loan-text").css("visibility", "hidden");
    });
    $(".type-sbaexpress-loan").hover(function(){
      $(".type-sbaexpress-loan-text").css("visibility", "visible");
      }, function(){
        $(".type-sbaexpress-loan-text").css("visibility", "hidden");
    });
    $(".type-abl-loan").hover(function(){
      $(".type-abl-loan-text").css("visibility", "visible");
      }, function(){
        $(".type-abl-loan-text").css("visibility", "hidden");
    });
    $(".type-working-capital-loan").hover(function(){
      $(".type-working-capital-loan-text").css("visibility", "visible");
      }, function(){
        $(".type-working-capital-loan-text").css("visibility", "hidden");
    });

   
    $(document).on('click', '.add-more-owner', function(){
    let elementToAppend =  `
   
    <div class="parent-row">
    <hr>
    <h3>Another Owner</h3>
    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="first_name">Officer/Owner First Name <span class="color-red">*</span></label>
                            <input required type="text" class="form-control" id="first_name" name="first_name[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="last_name">Officer/Owner Last Name <span class="color-red">*</span></label>
                            <input required type="text" class="form-control" id="last_name" name="last_name[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="phone">Mobile Number <span class="color-red">*</span></label>
                            <input required type="tel" class="form-control" id="phone" name="phone[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="email">Email <span class="color-red">*</span></label>
                            <input required type="email" class="form-control" id="email" name="email[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ssn">SSN<span class="color-red">*</span></label>
                            <input required type="text" class="form-control" id="ssn" name="ssn[]">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="address">Home Address<<span class="color-red">*</span></label>
                            <input required type="text" class="form-control" id="address" name="address[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ownership">Ownership% <span class="color-red">*</span></label>
                            <input required type="number" min="0" class="form-control" id="ownership" name="ownership[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fisco">Estimated FISCO Score <span class="color-red">*</span></label>
                            <input required type="number" class="form-control" id="fisco" name="fisco[]">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dob">Date of Birth<span class="color-red">*</span></label>
                            <input required type="date" class="form-control" id="dob" name="dob[]">
                        </div>
                        <div class="form-group col-md-2">
                        <span class="remove-current-owner custom-hoverable-element fas fa-minus-circle"></span>

                            <span class="add-more-owner custom-hoverable-element fas fa-plus-circle"></span>
                        </div>
                    </div>
           
    </div>
    `;

    $(".owners-group").append(elementToAppend);

    });

    //remove-current-owner
    $(document).on('click', '.remove-current-owner', function(){
        $(this).closest('.parent-row').remove();
    });



    //doc
    $(document).on('click', '.add-more-doc', function(){
    let elementToAppend =  `
   
    <div class="parent-row">
    <hr>
    
    <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                              <input required type="text" name="filename[]" class="form-control" placeholder="file name">
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group">
                              <input required type="file" name="loan_doc[]" class="form-control" id="loan_doc_signature" accept="image/*, .pdf,.zip, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                 <span class="color-red">Supported files: images, zip, ppt, pptx, doc, docx, pdf, xls, xlsx </span>
                                                </div>
                           </div>
                           <div class="col-md-2">
                           <span class="remove-current-doc custom-hoverable-element fas fa-minus-circle"></span>

                              <span class="add-more-doc custom-hoverable-element fas fa-plus-circle"></span>
                           </div>
                        </div>
           
    </div>
    `;

      $(".doc-group").append(elementToAppend);
    });


    //personal doc
    $(document).on('click', '.add-more-personal-doc', function(){
    let elementToAppend =  `
   
    <div class="parent-row">
    <hr>
    
    <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                              <input required type="text" name="personal_filename[]" class="form-control" placeholder="file name">
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group">
                              <input required type="file" name="personal_doc[]" class="form-control" accept="image/*, .pdf,.zip, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                 <span class="color-red">Supported files: images, zip, ppt, pptx, doc, docx, pdf, xls, xlsx </span>
                                                </div>
                           </div>
                           <div class="col-md-2">
                           <span class="remove-current-doc custom-hoverable-element fas fa-minus-circle"></span>

                              <span class="add-more-personal-doc custom-hoverable-element fas fa-plus-circle"></span>
                           </div>
                        </div>
           
    </div>
    `;

      $(".personal-doc-group").append(elementToAppend);
    });



    //remove-current-doc
    $(document).on('click', '.remove-current-doc', function(){
        $(this).closest('.parent-row').remove();
    });

</script>



</body>

</html>