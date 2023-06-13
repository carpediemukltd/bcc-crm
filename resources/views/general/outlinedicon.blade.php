@extends('layout.appTheme')
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-center">
               <h4 class="card-title mb-0 flex-grow-1">Out Lined
                  <small id="search-length">()</small>
               </h4>
               <div>
                  <input type="search" placeholder="search icon" id="search-value" class="form-control" />
               </div>
            </div>
            <div class="card-body">
               <div class="icon-grid" id="search-output">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection