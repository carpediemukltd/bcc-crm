@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Board View</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
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
    
   <div class="row">
      <div class="col-lg-12">
        <div class="card ">
            <div class="filter_view_holder d-flex justify-content-between align-items-center flex-wrap mb-4">
                <div class="d-flex flex-column">
                    <h3>Quick Insights</h3>
                    <p class="text-primary mb-0">Users Count</p>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="">Date In<span style="color: red">*</span></label>
                        <input type="text" class="input-sm form-control" id="daterange" name="daterange"
                            autocomplete="off" />
                        <button type="button" name="filter" id="filter" class="btn btn-primary m2">Search</button>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Stage Pipelines</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="borad_view_holder">
                    <div class="row row-cols-1 mb-4 row-cols-md-6 g-4">
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-6 g-4">
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text">0</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection