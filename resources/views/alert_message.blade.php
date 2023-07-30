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

    @if (Session::has('message'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Info!</strong> {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif
 </div>