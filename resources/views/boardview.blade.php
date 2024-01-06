@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1> <a href="{{ url()->previous() }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a> Board View</h1>
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
                        <label for="" style="width:150px">Date In<span style="color: red">*</span></label>
                        <input type="text" class="input-sm form-control" id="daterange" name="daterange"
                            autocomplete="off" />
                            &nbsp;
                            &nbsp;
                        <button type="button" name="filter" id="filter" class="btn btn-primary m2">Search</button>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Stage Pipelines</h4>
                </div>
                <div>
               <a class="btn btn-primary px-3 me-1" href="{{ route('dealslisting')}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view">
                        <svg class="svg-inline--fa fa-list fs--2" width="12px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z"></path>
                        </svg>
                     </a>
                     <a class="btn btn-primary px-3 me-1" href="{{ route('boardview')}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Board view" aria-describedby="tooltip352331">
                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="">
                           <path d="M0 0.5C0 0.223857 0.223858 0 0.5 0H1.83333C2.10948 0 2.33333 0.223858 2.33333 0.5V1.83333C2.33333 2.10948 2.10948 2.33333 1.83333 2.33333H0.5C0.223857 2.33333 0 2.10948 0 1.83333V0.5Z" fill="currentColor"></path>
                           <path d="M3.33333 0.5C3.33333 0.223857 3.55719 0 3.83333 0H5.16667C5.44281 0 5.66667 0.223858 5.66667 0.5V1.83333C5.66667 2.10948 5.44281 2.33333 5.16667 2.33333H3.83333C3.55719 2.33333 3.33333 2.10948 3.33333 1.83333V0.5Z" fill="currentColor"></path>
                           <path d="M6.66667 0.5C6.66667 0.223857 6.89052 0 7.16667 0H8.5C8.77614 0 9 0.223858 9 0.5V1.83333C9 2.10948 8.77614 2.33333 8.5 2.33333H7.16667C6.89052 2.33333 6.66667 2.10948 6.66667 1.83333V0.5Z" fill="currentColor"></path>
                           <path d="M0 3.83333C0 3.55719 0.223858 3.33333 0.5 3.33333H1.83333C2.10948 3.33333 2.33333 3.55719 2.33333 3.83333V5.16667C2.33333 5.44281 2.10948 5.66667 1.83333 5.66667H0.5C0.223857 5.66667 0 5.44281 0 5.16667V3.83333Z" fill="currentColor"></path>
                           <path d="M3.33333 3.83333C3.33333 3.55719 3.55719 3.33333 3.83333 3.33333H5.16667C5.44281 3.33333 5.66667 3.55719 5.66667 3.83333V5.16667C5.66667 5.44281 5.44281 5.66667 5.16667 5.66667H3.83333C3.55719 5.66667 3.33333 5.44281 3.33333 5.16667V3.83333Z" fill="currentColor"></path>
                           <path d="M6.66667 3.83333C6.66667 3.55719 6.89052 3.33333 7.16667 3.33333H8.5C8.77614 3.33333 9 3.55719 9 3.83333V5.16667C9 5.44281 8.77614 5.66667 8.5 5.66667H7.16667C6.89052 5.66667 6.66667 5.44281 6.66667 5.16667V3.83333Z" fill="currentColor"></path>
                           <path d="M0 7.16667C0 6.89052 0.223858 6.66667 0.5 6.66667H1.83333C2.10948 6.66667 2.33333 6.89052 2.33333 7.16667V8.5C2.33333 8.77614 2.10948 9 1.83333 9H0.5C0.223857 9 0 8.77614 0 8.5V7.16667Z" fill="currentColor"></path>
                           <path d="M3.33333 7.16667C3.33333 6.89052 3.55719 6.66667 3.83333 6.66667H5.16667C5.44281 6.66667 5.66667 6.89052 5.66667 7.16667V8.5C5.66667 8.77614 5.44281 9 5.16667 9H3.83333C3.55719 9 3.33333 8.77614 3.33333 8.5V7.16667Z" fill="currentColor"></path>
                           <path d="M6.66667 7.16667C6.66667 6.89052 6.89052 6.66667 7.16667 6.66667H8.5C8.77614 6.66667 9 6.89052 9 7.16667V8.5C9 8.77614 8.77614 9 8.5 9H7.16667C6.89052 9 6.66667 8.77614 6.66667 8.5V7.16667Z" fill="currentColor"></path>
                        </svg>
                     </a>
               </div>
            </div>
            <div class="card-body px-0">
                <div class="borad_view_holder">
                    <div class="row row-cols-1 mb-4 row-cols-md-6 g-4">
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-6 g-4">
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
                                </div>
                            </div>
                            <h3>0. Application Incomplete</h3>
                        </div>
                        <div class="col">
                            <div class="mb-0 card">
                                <div class="card-body">
                                    
                                    <p class="card-text"><b>Name:</b> Anna Sthesia</p>
                                    <p class="card-text"><b>Phone:</b> (760) 756 7568</p>
                                    <a href="#"><b>Email:</b> annasthesia@gmail.com</a>
                                    <p class="card-text"><b>Company:</b> Acme Corporation	</p>
                                    <p class="card-text"><b>Country:</b> USA	</p>
                                    <p class="card-text"><b>Date:</b>	2019/12/01	</p>
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