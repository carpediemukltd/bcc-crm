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
                  <div>
                     <a href="" class="btn btn-link btn-soft-light" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-stage">
                     <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Add Stage
                     </a>
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
            <div class="card-body row  row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3 mb-9">
               <!-- box title start row -->
               <div class="col-lg-4">
                  <div class="todo_list">
                     <div class="desc_view d-flex align-items-center">
                        <span>Todo List</span>
                        <span class="task_count_number">0</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="inprogress_list">
                     <div class="desc_view d-flex align-items-center">
                        <span>In Progress</span>
                        <span class="task_count_number">0</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="complete_list">
                     <div class="desc_view d-flex align-items-center">
                        <span>Complete</span>
                        <span class="task_count_number">0</span>
                     </div>
                  </div>
               </div>
               <!-- box title end row -->
               <div class="col-lg-4 box" id="box-1">
                  <div class="card shadow-sm drop-item hover-actions-trigger" draggable="true">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Project Doughnut Dungeon</h4>
                           <div class="hover-actions top-0 end-0 mt-4 me-4">
                              <button class="btn btn-primary btn-icon flex-shrink-0" data-bs-toggle="modal" data-bs-target="#projectsCardViewModal">
                                 <svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <span class="badge badge-phoenix fs--2 mb-4 badge-phoenix-success"><span class="badge-label">completed</span></span>
                        <div class="d-flex align-items-center mb-2">
                           <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                           </svg>
                           <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 box" id="box-2">
                  <div class="card shadow-sm drop-item hover-actions-trigger" draggable="false">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">Saddam Hussain</h4>
                           <div class="hover-actions top-0 end-0 mt-4 me-4">
                              <button class="btn btn-primary btn-icon flex-shrink-0" data-bs-toggle="modal" data-bs-target="#projectsCardViewModal">
                                 <svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <span class="badge badge-phoenix fs--2 mb-4 badge-phoenix-success"><span class="badge-label">completed</span></span>
                        <div class="d-flex align-items-center mb-2">
                           <svg class="svg-inline--fa fa-user me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                           </svg>
                           <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semi-bold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 box" id="box-3">
                  
               </div>
            </div>
            <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
               <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
               </div>
               <div class="offcanvas-body small">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/08.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>Facebook</h6>
                     </div>
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/09.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>Twitter</h6>
                     </div>
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/10.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>Instagram</h6>
                     </div>
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/11.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>Google Plus</h6>
                     </div>
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/13.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>In</h6>
                     </div>
                     <div class="text-center me-3 mb-3">
                        <img src="{{asset('assets/images/brands/12.png')}}" class="img-fluid rounded mb-2" alt="" loading="lazy">
                        <h6>YouTube</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add-stage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <form action="#" autocomplete="off">
               <h3 class="text-center">Add Stage</h3>
               <p class="text-center">Stay connected to create Stages</p>
               <div class="row mt-4">
                  <div class="form-group col-lg-6">
                     <label class="form-label">Email address</label>
                     <input type="email" class="form-control mb-0"  placeholder="Enter email" autocomplete="off">
                  </div>
                  <div class="form-group col-lg-6">
                     <label class="form-label">Pipelines</label>
                     <input type="text" class="form-control mb-0" placeholder="Enter Pipeline" autocomplete="off">
                  </div>
                  <div class="form-group col-lg-12">
                     <label class="form-label">Pipelines</label>
                     <input type="text" class="form-control mb-0" placeholder="Enter Pipeline" autocomplete="off">
                  </div>
                  <div class="form-group col-lg-6">
                     <label class="form-label">Email address</label>
                     <input type="email" class="form-control mb-0"  placeholder="Enter email" autocomplete="off">
                  </div>
                  <div class="form-group col-lg-6">
                     <label class="form-label">Pipelines</label>
                     <input type="text" class="form-control mb-0" placeholder="Enter Pipeline" autocomplete="off">
                  </div>
                  <div class="text-center pt-3 pb-3">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
      const $boxes = document.querySelectorAll(".box");
const $dragItem = document.querySelector(".drop-item");
let dragSrc;

window.addEventListener("DOMContentLoaded", () => {
  $dragItem.ondragstart = function (e) {
    this.style.opacity = "40%";
    dragSrc = this;

    e.dataTransfer.effectAllowed = "move";
    e.dataTransfer.setData("text/plain", this.parentElement.id);
  };

  $dragItem.ondragend = function () {
    this.style.opacity = "100%";
  };

  $boxes.forEach((box) => {
    box.addEventListener("dragenter", function () {
      //this.style.borderStyle = "dashed";
    });

    box.addEventListener("dragleave", function () {
      //this.style.borderStyle = "solid";
    });

    box.addEventListener("dragover", function (e) {
      e.preventDefault();
    });

    box.addEventListener("drop", function (e) {
      e.stopPropagation();
      const itemBoxId = e.dataTransfer.getData("text/plain");

      if (itemBoxId !== this.id) {
        this.appendChild(dragSrc);
       // this.style.borderStyle = "solid";
      }
    });
  });
});

   </script>
@endsection