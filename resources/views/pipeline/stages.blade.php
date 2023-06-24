@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Stages</h1>
                     <p>Experience a simple yet powerful way to build Dashboard</p>
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
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Stages Card</h4>
               </div>
            </div>
            <div class="card-body row justify-content-between align-items-end mb-4 g-3">
               <div class="col">
                  <ul class="nav nav-links mx-n2">
                     <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page" href="#">All<span class="text-700 fw-semi-bold">(32)</span></a></li>
                     <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Ongoing<span class="text-700 fw-semi-bold">(14)</span></a></li>
                     <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Cancelled<span class="text-700 fw-semi-bold">(2)</span></a></li>
                     <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Finished<span class="text-700 fw-semi-bold">(14)</span></a></li>
                     <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Postponed<span class="text-700 fw-semi-bold">(2)</span></a></li>
                  </ul>
               </div>
               <div class="col">
                  <div class="d-flex align-items-center">
                     <div class="search-box me-3" style="width:100%">
                        <form class="d-flex align-items-center position-relative" data-bs-toggle="search" data-bs-display="static">
                           <input class="form-control search-input search" type="search" placeholder="Search projects" aria-label="Search">
                           <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                           </svg>
                        </form>
                     </div>
                     <a class="btn btn-phoenix-primary px-3 me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view">
                        <svg class="svg-inline--fa fa-list fs--2" width="12px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z"></path>
                        </svg>
                     </a>
                     <a class="btn btn-phoenix-primary px-3 me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Board view">
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
                     <a class="btn btn-phoenix-primary px-3 border-0 text-900" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Card view">
                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="">
                           <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H3.5C3.77614 0 4 0.223858 4 0.5V3.5C4 3.77614 3.77614 4 3.5 4H0.5C0.223858 4 0 3.77614 0 3.5V0.5Z" fill="currentColor"></path>
                           <path d="M0 5.5C0 5.22386 0.223858 5 0.5 5H3.5C3.77614 5 4 5.22386 4 5.5V8.5C4 8.77614 3.77614 9 3.5 9H0.5C0.223858 9 0 8.77614 0 8.5V5.5Z" fill="currentColor"></path>
                           <path d="M5 0.5C5 0.223858 5.22386 0 5.5 0H8.5C8.77614 0 9 0.223858 9 0.5V3.5C9 3.77614 8.77614 4 8.5 4H5.5C5.22386 4 5 3.77614 5 3.5V0.5Z" fill="currentColor"></path>
                           <path d="M5 5.5C5 5.22386 5.22386 5 5.5 5H8.5C8.77614 5 9 5.22386 9 5.5V8.5C9 8.77614 8.77614 9 8.5 9H5.5C5.22386 9 5 8.77614 5 8.5V5.5Z" fill="currentColor"></path>
                        </svg>
                     </a>
                  </div>
               </div>
            </div>
            
            <div class="scrolable_view_card justify-content-center vh-100">
               <div class="horizantol_scroll_section">
                  <div class="d-flex">
                     <!-- To do tasks -->
                     <div class="custom_col" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div class="todo_list">
                           <div class="desc_view d-flex align-items-center">
                              <span>Todo List</span>
                              <span class="task_count_number">0</span>
                           </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                           <!-- card -->
                           <div id="todotarget1" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-primary border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-primary mb-4 d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                           <!-- card -->
                           <div id="todotarget2" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-primary border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-primary d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                           <!-- card -->
                           <div id="todotarget3" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-primary border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-primary d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- To do tasks -->
                     <div class="custom_col" id="progress" ondrop="drop(event)"
                        ondragover="allowDrop(event)">
                           <div class="inprogress_list">
                              <div class="desc_view d-flex align-items-center">
                                 <span>In Progress</span>
                                 <span class="task_count_number">0</span>
                              </div>
                           </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                           <!-- card -->
                           <div id="inprogresstarget1" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-warning border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-warning d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                           <!-- card -->
                           <div id="inprogresstarget2" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-warning border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-warning d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- tasks completed -->
                     <div class="custom_col" id="completed" ondrop="drop(event)"
                        ondragover="allowDrop(event)">
                        <div class="complete_list">
                           <div class="desc_view d-flex align-items-center">
                              <span>Complete</span>
                              <span class="task_count_number">0</span>
                           </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                           <!-- card -->
                           <div id="completedtarget1" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-success border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-success d-inline p-1 fw-semibold small text-white project-name">
                                    Project Name
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- manager review -->
                     <div class="custom_col" id="managerreview" ondrop="drop(event)"
                        ondragover="allowDrop(event)">
                        <div class="complete_list">
                           <div class="desc_view d-flex align-items-center">
                              <span>Manager Review</span>
                              <span class="task_count_number">0</span>
                           </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                           <!-- card -->
                           <div id="reviewtarget1" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-success border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-success d-inline p-1 fw-semibold small text-white project-name">
                                    Manager Review
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- client review -->
                     <div class="custom_col" id="clientreview" ondrop="drop(event)"
                        ondragover="allowDrop(event)">
                        <div class="complete_list">
                           <div class="desc_view d-flex align-items-center">
                              <span>Client Review</span>
                              <span class="task_count_number">0</span>
                           </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                           <!-- card -->
                           <div id="reviewclienttarget1" ondragstart="dragStart(event)" draggable="true"
                              class="card rounded-0 w-100 mb-3 border-0 border-start border-success border-3 shadow-sm">
                              <div class="card-body px-3 py-3">
                                 <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                                 <div class="bg-success d-inline p-1 fw-semibold small text-white project-name">
                                    Review Client
                                 </div>
                                 <div class="d-flex mt-4 align-items-center mb-2">
                                    <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                    </svg>
                                    <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
    $(".custom_col .card").sortable();
</script> -->
<script>
   function dragStart(event) {
       event.dataTransfer.setData("Text", event.target.id);
   }
   function allowDrop(event) {
       event.preventDefault();
   }
   function drop(event) {
       if (event.target.id != "") {
           event.preventDefault();
           const data = event.dataTransfer.getData("Text");
           event.target.appendChild(document.getElementById(data));
           // todo list
           if (event.target.id == "todo") {
               document.getElementById(data).classList.remove("border-warning", "border-success");
               document.getElementById(data).classList.add("border-primary");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.remove("bg-warning", "bg-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.add("bg-primary")
           }
           // progress list
           if (event.target.id == "progress") {
               document.getElementById(data).classList.remove("border-primary", "border-success");
               document.getElementById(data).classList.add("border-warning");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.remove("bg-primary", "bg-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.add("bg-warning")
           }
           // completed list
           if (event.target.id == "completed") {
               document.getElementById(data).classList.remove("border-warning", "border-success");
               document.getElementById(data).classList.add("border-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.remove("bg-warning", "bg-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.add("bg-success")
           }
           // manager review list
           if (event.target.id == "managerreview") {
               document.getElementById(data).classList.remove("border-warning", "border-success");
               document.getElementById(data).classList.add("border-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.remove("bg-warning", "bg-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.add("bg-success")
           }
           // client review list
           if (event.target.id == "clientreview") {
               document.getElementById(data).classList.remove("border-warning", "border-success");
               document.getElementById(data).classList.add("border-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.remove("bg-warning", "bg-success");
               document.getElementById(data).getElementsByClassName("project-name")[0].classList.add("bg-success")
           }
       }
   }
</script>
@endsection