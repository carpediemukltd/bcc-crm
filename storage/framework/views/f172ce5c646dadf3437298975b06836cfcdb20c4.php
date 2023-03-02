<?php
   $login = "no";
   $title = "Stages View";
   ?>

<?php $__env->startSection('content'); ?>
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="content">
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Page 1</a></li>
         <li class="breadcrumb-item"><a href="#">Page 2</a></li>
         <li class="breadcrumb-item active">Default</li>
      </ol>
   </nav>
   <div class="row gx-6 gy-3 mb-4 align-items-center">
      <div class="col-auto">
         <h2 class="mb-0">Satges<span class="fw-normal text-700 ms-3">(32)</span></h2>
      </div>
      <div class="col-auto">
         <a class="btn btn-primary px-2" href="#">
            <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
            </svg>
            Add new Stage
         </a>
      </div>
   </div>
   <div class="row justify-content-between align-items-end mb-4 g-3">
      <div class="col-12 col-sm-auto">
         <ul class="nav nav-links mx-n2">
            <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page" href="#">All<span class="text-700 fw-semi-bold">(32)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Ongoing<span class="text-700 fw-semi-bold">(14)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Cancelled<span class="text-700 fw-semi-bold">(2)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Finished<span class="text-700 fw-semi-bold">(14)</span></a></li>
            <li class="nav-item"><a class="nav-link px-2 py-1" href="#">Postponed<span class="text-700 fw-semi-bold">(2)</span></a></li>
         </ul>
      </div>
      <div class="col-12 col-sm-auto">
         <div class="d-flex align-items-center">
            <div class="search-box me-3">
               <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                  <input class="form-control search-input search" type="search" placeholder="Search projects" aria-label="Search">
                  <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                  </svg>
               </form>
            </div>
            <a class="btn btn-phoenix-primary px-3 me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view">
               <svg class="svg-inline--fa fa-list fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
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
   <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3 mb-9">
      <!-- box title start row -->
      <div class="col">
         <div class="todo_list">
            <div class="desc_view d-flex">
               <span>Todo List</span>
               <span class="task_count_number">0</span>
            </div>
         </div>
      </div>
      <div class="col">
         <div class="inprogress_list">
            <div class="desc_view d-flex">
               <span>In Progress</span>
               <span class="task_count_number">0</span>
            </div>
         </div>
      </div>
      <div class="col">
         <div class="complete_list">
            <div class="desc_view d-flex">
               <span>Complete</span>
               <span class="task_count_number">0</span>
            </div>
         </div>
      </div>
      <!-- box title end row -->
      <div class="col box" id="box-1">
         <div class="card drop-item hover-actions-trigger" draggable="true">
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
               <!-- <div class="d-flex align-items-center mb-4">
                  <svg class="svg-inline--fa fa-credit-card me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="credit-card" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M512 32C547.3 32 576 60.65 576 96V128H0V96C0 60.65 28.65 32 64 32H512zM576 416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V224H576V416zM112 352C103.2 352 96 359.2 96 368C96 376.8 103.2 384 112 384H176C184.8 384 192 376.8 192 368C192 359.2 184.8 352 176 352H112zM240 384H368C376.8 384 384 376.8 384 368C384 359.2 376.8 352 368 352H240C231.2 352 224 359.2 224 368C224 376.8 231.2 384 240 384z"></path>
                  </svg>
                  
                  <p class="fw-bold mb-0 lh-1">Budget : <span class="ms-1 text-1100">8,742$</span></p>
               </div>
               
               <div class="d-flex align-items-center mt-4">
                  <p class="mb-0 fw-bold fs--1">Started :<span class="fw-semi-bold text-600 ms-1">	17th Nov. 2020</span></p>
               </div>
               <div class="d-flex align-items-center mt-2">
                  <p class="mb-0 fw-bold fs--1">Deadline : <span class="fw-semi-bold text-600 ms-1">	21st May 2028</span></p>
               </div> -->
              
            </div>
         </div>
      </div>
      <div class="col box" id="box-2">
      <div class="card drop-item hover-actions-trigger" draggable="true">
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
               <!-- <div class="d-flex align-items-center mb-4">
                  <svg class="svg-inline--fa fa-credit-card me-2 text-700 fs--1 fw-extra-bold" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="credit-card" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M512 32C547.3 32 576 60.65 576 96V128H0V96C0 60.65 28.65 32 64 32H512zM576 416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V224H576V416zM112 352C103.2 352 96 359.2 96 368C96 376.8 103.2 384 112 384H176C184.8 384 192 376.8 192 368C192 359.2 184.8 352 176 352H112zM240 384H368C376.8 384 384 376.8 384 368C384 359.2 376.8 352 368 352H240C231.2 352 224 359.2 224 368C224 376.8 231.2 384 240 384z"></path>
                  </svg>
                  
                  <p class="fw-bold mb-0 lh-1">Budget : <span class="ms-1 text-1100">8,742$</span></p>
               </div>
               
               <div class="d-flex align-items-center mt-4">
                  <p class="mb-0 fw-bold fs--1">Started :<span class="fw-semi-bold text-600 ms-1">	17th Nov. 2020</span></p>
               </div>
               <div class="d-flex align-items-center mt-2">
                  <p class="mb-0 fw-bold fs--1">Deadline : <span class="fw-semi-bold text-600 ms-1">	21st May 2028</span></p>
               </div> -->
              
            </div>
         </div>
      </div>
      <div class="col box" id="box-3">
         
      </div>
   </div>
   <div class="modal fade" id="projectsCardViewModal" tabindex="-1" aria-labelledby="projectsCardViewModal" aria-hidden="true">
      <div class="modal-dialog modal-md">
         <div class="modal-content overflow-hidden">
            <div class="modal-header position-relative p-0">
               <input class="d-none" id="projectCoverInput" type="file">
               <label class="position-absolute top-0 start-0" for="projectCoverInput">
                  <span class="d-inline-block bg-white rounded-2 py-2 px-3 fs--1 fw-bolder mt-3 ms-3 cursor-pointer dark__text-white" style="--phoenix-bg-opacity: .64;">
                     <svg class="svg-inline--fa fa-image me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"></path>
                     </svg>
                     Change
                  </span>
               </label>
               <button class="btn btn-circle position-absolute end-0 top-0 mt-3 me-3 bg-white" style="--phoenix-bg-opacity: .64;" data-bs-dismiss="modal">
                  <svg class="svg-inline--fa fa-xmark text-900 dark__text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                  </svg>
                  
               </button>
               <img class="w-100" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="" style="max-height: 200px;min-height: 150px;">
            </div>
            <div class="modal-body p-5 px-md-6">
               <div class="row g-5">
                  <div class="col-12 col-md-9">
                     <div class="mb-4">
                        <h3 class="fw-bolder lh-sm">It was popularised in the 1960s with the release of Letraset</h3>
                        <p class="text-1000 fw-semi-bold mb-0">In list<a class="ms-1 fw-bold" href="#">Review </a></p>
                     </div>
                     
                     <h6 class="text-800 mb-2">Due date</h6>
                     <div class="flatpickr-input-container flatpickr-input-sm w-50 mb-3"><input class="form-control form-control-sm ps-6 datetimepicker flatpickr-input" id="datepicker" type="text" data-options="{&quot;dateFormat&quot;:&quot;M j, Y&quot;,&quot;disableMobile&quot;:true,&quot;defaultDate&quot;:&quot;Mar 1, 2022&quot;}" readonly="readonly"><span class="uil uil-calendar-alt flatpickr-icon text-700"></span></div>
                     <div class="mb-3">
                        <h6 class="text-800 mb-2">Assignees</h6>
                        <div class="d-flex">
                           <div class="dropdown">
                              <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                 <div class="avatar avatar-m  me-1">
                                    <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                 </div>
                              </a>
                              <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden" style="width: 320px;">
                                 <div class="position-relative">
                                    <div class="bg-holder z-index--1" style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="p-3">
                                       <div class="text-end">
                                          <button class="btn p-0 me-2">
                                             <svg class="svg-inline--fa fa-user-plus text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                                             </svg>
                                             
                                          </button>
                                          <button class="btn p-0">
                                             <svg class="svg-inline--fa fa-ellipsis text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                             </svg>
                                             
                                          </button>
                                       </div>
                                       <div class="text-center">
                                          <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2"><img class="rounded-circle border border-white" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                          <h6 class="text-white">Tyrion Lannister</h6>
                                          <p class="text-600 fw-semi-bold fs--2 mb-2">@tyrion222</p>
                                          <div class="d-flex flex-center mb-3">
                                             <h6 class="text-white mb-0">224 <span class="fw-normal text-300">connections</span></h6>
                                             <svg class="svg-inline--fa fa-circle text-700 mx-1" data-fa-transform="shrink-10 up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.375em;">
                                                <g transform="translate(256 256)">
                                                   <g transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                      <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                                   </g>
                                                </g>
                                             </svg>
                                             
                                             <h6 class="text-white mb-0">23 <span class="fw-normal text-300">mutual</span></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="bg-white">
                                    <div class="p-3 border-bottom">
                                       <div class="d-flex justify-content-between">
                                          <div class="d-flex">
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-message" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="message" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg">
                                                <svg class="svg-inline--fa fa-video" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M384 112v288c0 26.51-21.49 48-48 48h-288c-26.51 0-48-21.49-48-48v-288c0-26.51 21.49-48 48-48h288C362.5 64 384 85.49 384 112zM576 127.5v256.9c0 25.5-29.17 40.39-50.39 25.79L416 334.7V177.3l109.6-75.56C546.9 87.13 576 102.1 576 127.5z"></path>
                                                </svg>
                                                
                                             </button>
                                          </div>
                                          <button class="btn btn-phoenix-primary">
                                             <svg class="svg-inline--fa fa-envelope me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                                             </svg>
                                             Send Email
                                          </button>
                                       </div>
                                    </div>
                                    <ul class="nav d-flex flex-column py-3 border-bottom">
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard me-2 text-900 d-inline-block">
                                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                             </svg>
                                             <span class="text-1000 flex-1">Assigned Projects</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart me-2 text-900">
                                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                             </svg>
                                             <span class="text-1000 flex-1">View activiy</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="p-3 d-flex justify-content-between"><a class="btn btn-link p-0 text-decoration-none" href="#">Details </a><a class="btn btn-link p-0 text-decoration-none text-danger" href="#">Unassign </a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="dropdown">
                              <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                 <div class="avatar avatar-m  me-1">
                                    <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                 </div>
                              </a>
                              <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden" style="width: 320px;">
                                 <div class="position-relative">
                                    <div class="bg-holder z-index--1" style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="p-3">
                                       <div class="text-end">
                                          <button class="btn p-0 me-2">
                                             <svg class="svg-inline--fa fa-user-plus text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                                             </svg>
                                             
                                          </button>
                                          <button class="btn p-0">
                                             <svg class="svg-inline--fa fa-ellipsis text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                             </svg>
                                             
                                          </button>
                                       </div>
                                       <div class="text-center">
                                          <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2"><img class="rounded-circle border border-white" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                          <h6 class="text-white">Tyrion Lannister</h6>
                                          <p class="text-600 fw-semi-bold fs--2 mb-2">@tyrion222</p>
                                          <div class="d-flex flex-center mb-3">
                                             <h6 class="text-white mb-0">224 <span class="fw-normal text-300">connections</span></h6>
                                             <svg class="svg-inline--fa fa-circle text-700 mx-1" data-fa-transform="shrink-10 up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.375em;">
                                                <g transform="translate(256 256)">
                                                   <g transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                      <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                                   </g>
                                                </g>
                                             </svg>
                                             
                                             <h6 class="text-white mb-0">23 <span class="fw-normal text-300">mutual</span></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="bg-white">
                                    <div class="p-3 border-bottom">
                                       <div class="d-flex justify-content-between">
                                          <div class="d-flex">
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-message" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="message" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg">
                                                <svg class="svg-inline--fa fa-video" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M384 112v288c0 26.51-21.49 48-48 48h-288c-26.51 0-48-21.49-48-48v-288c0-26.51 21.49-48 48-48h288C362.5 64 384 85.49 384 112zM576 127.5v256.9c0 25.5-29.17 40.39-50.39 25.79L416 334.7V177.3l109.6-75.56C546.9 87.13 576 102.1 576 127.5z"></path>
                                                </svg>
                                                
                                             </button>
                                          </div>
                                          <button class="btn btn-phoenix-primary">
                                             <svg class="svg-inline--fa fa-envelope me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                                             </svg>
                                             Send Email
                                          </button>
                                       </div>
                                    </div>
                                    <ul class="nav d-flex flex-column py-3 border-bottom">
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard me-2 text-900 d-inline-block">
                                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                             </svg>
                                             <span class="text-1000 flex-1">Assigned Projects</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart me-2 text-900">
                                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                             </svg>
                                             <span class="text-1000 flex-1">View activiy</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="p-3 d-flex justify-content-between"><a class="btn btn-link p-0 text-decoration-none" href="#">Details </a><a class="btn btn-link p-0 text-decoration-none text-danger" href="#">Unassign </a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="dropdown">
                              <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                 <div class="avatar avatar-m  me-1">
                                    <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                 </div>
                              </a>
                              <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden" style="width: 320px;">
                                 <div class="position-relative">
                                    <div class="bg-holder z-index--1" style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="p-3">
                                       <div class="text-end">
                                          <button class="btn p-0 me-2">
                                             <svg class="svg-inline--fa fa-user-plus text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                                             </svg>
                                             
                                          </button>
                                          <button class="btn p-0">
                                             <svg class="svg-inline--fa fa-ellipsis text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                             </svg>
                                             
                                          </button>
                                       </div>
                                       <div class="text-center">
                                          <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2"><img class="rounded-circle border border-white" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                          <h6 class="text-white">Tyrion Lannister</h6>
                                          <p class="text-600 fw-semi-bold fs--2 mb-2">@tyrion222</p>
                                          <div class="d-flex flex-center mb-3">
                                             <h6 class="text-white mb-0">224 <span class="fw-normal text-300">connections</span></h6>
                                             <svg class="svg-inline--fa fa-circle text-700 mx-1" data-fa-transform="shrink-10 up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.375em;">
                                                <g transform="translate(256 256)">
                                                   <g transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                      <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                                   </g>
                                                </g>
                                             </svg>
                                             
                                             <h6 class="text-white mb-0">23 <span class="fw-normal text-300">mutual</span></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="bg-white">
                                    <div class="p-3 border-bottom">
                                       <div class="d-flex justify-content-between">
                                          <div class="d-flex">
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-message" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="message" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg">
                                                <svg class="svg-inline--fa fa-video" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M384 112v288c0 26.51-21.49 48-48 48h-288c-26.51 0-48-21.49-48-48v-288c0-26.51 21.49-48 48-48h288C362.5 64 384 85.49 384 112zM576 127.5v256.9c0 25.5-29.17 40.39-50.39 25.79L416 334.7V177.3l109.6-75.56C546.9 87.13 576 102.1 576 127.5z"></path>
                                                </svg>
                                                
                                             </button>
                                          </div>
                                          <button class="btn btn-phoenix-primary">
                                             <svg class="svg-inline--fa fa-envelope me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                                             </svg>
                                             Send Email
                                          </button>
                                       </div>
                                    </div>
                                    <ul class="nav d-flex flex-column py-3 border-bottom">
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard me-2 text-900 d-inline-block">
                                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                             </svg>
                                             <span class="text-1000 flex-1">Assigned Projects</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart me-2 text-900">
                                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                             </svg>
                                             <span class="text-1000 flex-1">View activiy</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="p-3 d-flex justify-content-between"><a class="btn btn-link p-0 text-decoration-none" href="#">Details </a><a class="btn btn-link p-0 text-decoration-none text-danger" href="#">Unassign </a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="dropdown">
                              <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                 <div class="avatar avatar-m  me-1">
                                    <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                                 </div>
                              </a>
                              <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden" style="width: 320px;">
                                 <div class="position-relative">
                                    <div class="bg-holder z-index--1" style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="p-3">
                                       <div class="text-end">
                                          <button class="btn p-0 me-2">
                                             <svg class="svg-inline--fa fa-user-plus text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                                             </svg>
                                             
                                          </button>
                                          <button class="btn p-0">
                                             <svg class="svg-inline--fa fa-ellipsis text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                             </svg>
                                             
                                          </button>
                                       </div>
                                       <div class="text-center">
                                          <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2"><img class="rounded-circle border border-white" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
                                          <h6 class="text-white">Tyrion Lannister</h6>
                                          <p class="text-600 fw-semi-bold fs--2 mb-2">@tyrion222</p>
                                          <div class="d-flex flex-center mb-3">
                                             <h6 class="text-white mb-0">224 <span class="fw-normal text-300">connections</span></h6>
                                             <svg class="svg-inline--fa fa-circle text-700 mx-1" data-fa-transform="shrink-10 up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.375em;">
                                                <g transform="translate(256 256)">
                                                   <g transform="translate(0, -64)  scale(0.375, 0.375)  rotate(0 0 0)">
                                                      <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                                   </g>
                                                </g>
                                             </svg>
                                             
                                             <h6 class="text-white mb-0">23 <span class="fw-normal text-300">mutual</span></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="bg-white">
                                    <div class="p-3 border-bottom">
                                       <div class="d-flex justify-content-between">
                                          <div class="d-flex">
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg me-2">
                                                <svg class="svg-inline--fa fa-message" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="message" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z"></path>
                                                </svg>
                                                
                                             </button>
                                             <button class="btn btn-phoenix-secondary btn-icon btn-icon-lg">
                                                <svg class="svg-inline--fa fa-video" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M384 112v288c0 26.51-21.49 48-48 48h-288c-26.51 0-48-21.49-48-48v-288c0-26.51 21.49-48 48-48h288C362.5 64 384 85.49 384 112zM576 127.5v256.9c0 25.5-29.17 40.39-50.39 25.79L416 334.7V177.3l109.6-75.56C546.9 87.13 576 102.1 576 127.5z"></path>
                                                </svg>
                                                
                                             </button>
                                          </div>
                                          <button class="btn btn-phoenix-primary">
                                             <svg class="svg-inline--fa fa-envelope me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                                             </svg>
                                             Send Email
                                          </button>
                                       </div>
                                    </div>
                                    <ul class="nav d-flex flex-column py-3 border-bottom">
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard me-2 text-900 d-inline-block">
                                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                             </svg>
                                             <span class="text-1000 flex-1">Assigned Projects</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link px-3 d-flex flex-between-center" href="#">
                                             <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart me-2 text-900">
                                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                             </svg>
                                             <span class="text-1000 flex-1">View activiy</span>
                                             <svg class="svg-inline--fa fa-chevron-right fs--3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                             </svg>
                                             
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="p-3 d-flex justify-content-between"><a class="btn btn-link p-0 text-decoration-none" href="#">Details </a><a class="btn btn-link p-0 text-decoration-none text-danger" href="#">Unassign </a></div>
                                 </div>
                              </div>
                           </div>
                           <button class="btn btn-sm btn-phoenix-secondary btn-circle">
                              <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                              </svg>
                              
                           </button>
                        </div>
                     </div>
                     <div class="mb-5">
                        <h6 class="text-800 mb-2">Labels</h6>
                        <div class="d-flex align-items-center">
                           <span class="badge badge-phoenix badge-phoenix-info fs--2 me-2">INFO</span><span class="badge badge-phoenix badge-phoenix-warning fs--2 me-2">URGENT</span><span class="badge badge-phoenix badge-phoenix-success fs--2 me-2">DONE</span>
                           <a class="text-900 fw-bolder fs--1 lh-1 text-decoration-none" href="#">
                              <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                              </svg>
                              Add another
                           </a>
                        </div>
                     </div>
                     <div class="mb-6">
                        <div class="d-flex align-items-center mb-3">
                           <h4 class="me-3">Description</h4>
                           <button class="btn btn-link p-0">
                              <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path>
                              </svg>
                              
                           </button>
                        </div>
                        <p class="text-1000">The female circus horse-rider is a recurring subject in Chagall’s work. In 1926 the art dealer Ambroise Vollard invited Chagall to make a project based on the circus. They visited Paris’s historic Cirque d’Hiver Bouglione together; Vollard lent Chagall his private box seats. Chagall completed 19 gouaches...<a class="fw-semi-bold" href="#">see more </a></p>
                     </div>
                     <div class="bg-100 rounded-2 p-4 mb-3">
                        <div class="row justify-contnet-between border-bottom g-0 gy-2 pb-3">
                           <div class="col-12 col-sm">
                              <p class="fs--1 text-800 mb-2"><a class="fw-semi-bold" href="#">Anthony Van Dyck </a>uploaded a file </p>
                              <img class="rounded-2 mb-2" src="./Phoenix2_files/42.png" alt="" width="220">
                              <p class="text-1000 fw-semi-bold fs--1 mb-0">Fruit blast</p>
                           </div>
                           <div class="col-12 col-sm-auto">
                              <p class="text-800 fw-semi-bold fs--2 mb-0">Oct 3 at 4:38 pm</p>
                           </div>
                        </div>
                        <div class="row justify-contnet-between border-bottom g-0 gy-1 py-3 align-items-center">
                           <div class="col-12 col-sm">
                              <p class="fs--1 text-800 mb-0"><span class="text-1000 fw-semi-bold me-1">You</span>created this task</p>
                           </div>
                           <div class="col-12 col-sm-auto">
                              <p class="text-800 fw-semi-bold fs--2 mb-0">Oct 4 at 12:18 pm</p>
                           </div>
                        </div>
                        <div class="row justify-contnet-between border-bottom g-0 gy-1 py-3 align-items-center">
                           <div class="col-12 col-sm">
                              <p class="fs--1 text-800 mb-1"><a class="fw-semi-bold" href="#">Kazimir Malevich </a>added a subtask</p>
                              <div class="d-flex">
                                 <p class="mb-0 fs--1 fw-semi-bold text-1000">
                                    <svg class="svg-inline--fa fa-circle text-primary" data-fa-transform="shrink-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                       <g transform="translate(256 256)">
                                          <g transform="translate(0, 0)  scale(0.5, 0.5)  rotate(0 0 0)">
                                             <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                          </g>
                                       </g>
                                    </svg>
                                    Doing
                                 </p>
                                 <span class="text-800 fs--1 mx-2">to</span>
                                 <p class="mb-0 fs--1 fw-semi-bold text-1000">
                                    <svg class="svg-inline--fa fa-circle text-primary" data-fa-transform="shrink-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                       <g transform="translate(256 256)">
                                          <g transform="translate(0, 0)  scale(0.5, 0.5)  rotate(0 0 0)">
                                             <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z" transform="translate(-256 -256)"></path>
                                          </g>
                                       </g>
                                    </svg>
                                    Review
                                 </p>
                              </div>
                           </div>
                           <div class="col-12 col-sm-auto">
                              <p class="text-800 fw-semi-bold fs--2 mb-0">Oct 5 at 9:59 am</p>
                           </div>
                        </div>
                        <div class="row justify-contnet-between gx-2 align-items-center pt-3">
                           <div class="col col-auto">
                              <div class="avatar avatar-m status-online ">
                                 <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                              </div>
                           </div>
                           <div class="col col-auto flex-1">
                              <p class="fs--1 text-800 mb-0"><a class="fw-semi-bold" href="#">Peter Paul Rubens </a>commented</p>
                           </div>
                           <div class="col-12 col-sm-auto order-1 order-sm-0">
                              <p class="text-800 fw-semi-bold fs--2 mb-0">Oct 5 at 9:59 am</p>
                           </div>
                           <div class="col-12 col-sm-11 offset-sm-1">
                              <p class="text-900 fs--1 mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                           </div>
                        </div>
                     </div>
                     <textarea class="form-control form-control mb-3" rows="3" placeholder="Add comment"></textarea>
                     <div class="d-flex flex-between-center pb-3 border-bottom mb-6">
                        <div class="d-flex">
                           <button class="btn btn-sm px-2 py-0">
                              <svg class="svg-inline--fa fa-image text-600 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"></path>
                              </svg>
                              
                           </button>
                           <button class="btn btn-sm px-2 py-0">
                              <svg class="svg-inline--fa fa-calendar-days text-600 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM64 304C64 312.8 71.16 320 80 320H112C120.8 320 128 312.8 128 304V272C128 263.2 120.8 256 112 256H80C71.16 256 64 263.2 64 272V304zM192 304C192 312.8 199.2 320 208 320H240C248.8 320 256 312.8 256 304V272C256 263.2 248.8 256 240 256H208C199.2 256 192 263.2 192 272V304zM336 256C327.2 256 320 263.2 320 272V304C320 312.8 327.2 320 336 320H368C376.8 320 384 312.8 384 304V272C384 263.2 376.8 256 368 256H336zM64 432C64 440.8 71.16 448 80 448H112C120.8 448 128 440.8 128 432V400C128 391.2 120.8 384 112 384H80C71.16 384 64 391.2 64 400V432zM208 384C199.2 384 192 391.2 192 400V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V400C256 391.2 248.8 384 240 384H208zM320 432C320 440.8 327.2 448 336 448H368C376.8 448 384 440.8 384 432V400C384 391.2 376.8 384 368 384H336C327.2 384 320 391.2 320 400V432z"></path>
                              </svg>
                              
                           </button>
                           <button class="btn btn-sm px-2 py-0">
                              <svg class="svg-inline--fa fa-location-dot text-600 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"></path>
                              </svg>
                              
                           </button>
                           <button class="btn btn-sm px-2 py-0">
                              <svg class="svg-inline--fa fa-tag text-600 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M48 32H197.5C214.5 32 230.7 38.74 242.7 50.75L418.7 226.7C443.7 251.7 443.7 292.3 418.7 317.3L285.3 450.7C260.3 475.7 219.7 475.7 194.7 450.7L18.75 274.7C6.743 262.7 0 246.5 0 229.5V80C0 53.49 21.49 32 48 32L48 32zM112 176C129.7 176 144 161.7 144 144C144 126.3 129.7 112 112 112C94.33 112 80 126.3 80 144C80 161.7 94.33 176 112 176z"></path>
                              </svg>
                              
                           </button>
                        </div>
                        <button class="btn btn-sm btn-primary px-6">Comment</button>
                     </div>
                     <div class="mb-6">
                        <div class="mb-7">
                           <h4 class="mb-4">To do list <span class="text-700 fw-normal fs-2">(23)</span></h4>
                           <div class="row align-items-center g-0 justify-content-between mb-3">
                              <div class="col-12 col-sm-auto">
                                 <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                       <input class="form-control search-input search" type="search" placeholder="Search tasks" aria-label="Search">
                                       <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                          <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                                       </svg>
                                       
                                    </form>
                                 </div>
                              </div>
                              <div class="col-auto d-flex">
                                 <p class="mb-0 ms-sm-3 fs--1 text-700 fw-bold">
                                    <svg class="svg-inline--fa fa-filter me-1 fw-extra-bold fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M3.853 54.87C10.47 40.9 24.54 32 40 32H472C487.5 32 501.5 40.9 508.1 54.87C514.8 68.84 512.7 85.37 502.1 97.33L320 320.9V448C320 460.1 313.2 471.2 302.3 476.6C291.5 482 278.5 480.9 268.8 473.6L204.8 425.6C196.7 419.6 192 410.1 192 400V320.9L9.042 97.33C-.745 85.37-2.765 68.84 3.854 54.87L3.853 54.87z"></path>
                                    </svg>
                                    23 tasks
                                 </p>
                                 <button class="btn btn-link p-0 ms-3 fs--1 text-primary fw-bold text-decoration-none">
                                    <svg class="svg-inline--fa fa-sort me-1 fw-extra-bold fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path>
                                    </svg>
                                    Sorting
                                 </button>
                              </div>
                           </div>
                           <div class="mb-3">
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-1">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                          <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-0">Designing the dungeon</label>
                                          <div class="badge badge-phoenix fs--2 ms-auto badge-phoenix-primary"><span class="fw-bold badge-label">DRAFT</span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          2
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-2">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                          <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-1"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-1">Hiring a motion graphic designer</label>
                                          <div class="badge badge-phoenix fs--2 ms-auto badge-phoenix-warning"><span class="fw-bold badge-label">URGENT</span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          2
                                       </button>
                                       <button class="btn p-0 text-warning fs--2 me-2">
                                          <svg class="svg-inline--fa fa-list-check me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-check" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M152.1 38.16C161.9 47.03 162.7 62.2 153.8 72.06L81.84 152.1C77.43 156.9 71.21 159.8 64.63 159.1C58.05 160.2 51.69 157.6 47.03 152.1L7.029 112.1C-2.343 103.6-2.343 88.4 7.029 79.03C16.4 69.66 31.6 69.66 40.97 79.03L63.08 101.1L118.2 39.94C127 30.09 142.2 29.29 152.1 38.16V38.16zM152.1 198.2C161.9 207 162.7 222.2 153.8 232.1L81.84 312.1C77.43 316.9 71.21 319.8 64.63 319.1C58.05 320.2 51.69 317.6 47.03 312.1L7.029 272.1C-2.343 263.6-2.343 248.4 7.029 239C16.4 229.7 31.6 229.7 40.97 239L63.08 261.1L118.2 199.9C127 190.1 142.2 189.3 152.1 198.2V198.2zM224 96C224 78.33 238.3 64 256 64H480C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H256C238.3 128 224 113.7 224 96V96zM224 256C224 238.3 238.3 224 256 224H480C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H256C238.3 288 224 273.7 224 256zM160 416C160 398.3 174.3 384 192 384H480C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416zM0 416C0 389.5 21.49 368 48 368C74.51 368 96 389.5 96 416C96 442.5 74.51 464 48 464C21.49 464 0 442.5 0 416z"></path>
                                          </svg>
                                          3
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-3">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                          <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-2"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-2">Daily Meetings Purpose, participants</label>
                                          <div class="badge badge-phoenix fs--2 ms-auto badge-phoenix-info"><span class="fw-bold badge-label">ON PROCESS</span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          4
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Dec, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">05:00 AM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-4">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1"><input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-3"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-3">Finalizing the geometric shapes</label></div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          3
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-5">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1"><input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-4"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-4">Daily meeting with team members</label></div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">1 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-6">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1"><input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-5"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-5">Daily Standup Meetings</label></div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">13 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">10:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-7">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                          <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-6"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-6">Procrastinate for a month</label>
                                          <div class="badge badge-phoenix fs--2 ms-auto badge-phoenix-info"><span class="fw-bold badge-label">ON PROCESS</span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          3
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-8">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                          <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-7"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-7">warming up</label>
                                          <div class="badge badge-phoenix fs--2 ms-auto badge-phoenix-info"><span class="fw-bold badge-label">CLOSE</span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          3
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">12:00 PM</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top border-bottom">
                                 <div class="col-12">
                                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-9">
                                       <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1"><input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-8"><label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-8">Make ready for release</label></div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="d-flex ms-4 lh-1 align-items-center">
                                       <button class="btn p-0 text-700 fs--2 me-2">
                                          <svg class="svg-inline--fa fa-paperclip me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                                          </svg>
                                          2
                                       </button>
                                       <p class="text-700 fs--2 mb-md-0 me-2 mb-0">2o Nov, 2021</p>
                                       <p class="text-700 fs--2 fw-bold mb-md-0 mb-0">1:00 AM</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class="fw-bold fs--1 mt-4 text-decoration-none" href="#">
                              <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                              </svg>
                              Add new task
                           </a>
                        </div>
                     </div>
                     <h4 class="mb-3">Files</h4>
                     <div class="border-top border-300 pt-3 pb-4">
                        <div class="me-n3">
                           <div class="d-flex flex-between-center">
                              <div class="d-flex mb-1">
                                 <svg class="svg-inline--fa fa-image me-2 text-700 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"></path>
                                 </svg>
                                 
                                 <p class="text-1000 mb-0 lh-1">Silly_sight_1.png</p>
                              </div>
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                 <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                 </svg>
                                 
                              </button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a><a class="dropdown-item" href="#">Download</a><a class="dropdown-item" href="#">Report abuse</a></div>
                           </div>
                           <p class="fs--1 text-700 mb-2"><span>768 kb</span><span class="text-400 mx-1">| </span><a href="#">Shantinan Mekalan </a><span class="text-400 mx-1">| </span><span class="text-nowrap">21st Dec, 12:56 PM</span></p>
                           <img class="rounded-2" src="./Phoenix2_files/40.png" alt="">
                        </div>
                     </div>
                     <div class="border-top border-300 py-3">
                        <div class="me-n3">
                           <div class="d-flex flex-between-center">
                              <div class="d-flex mb-1">
                                 <svg class="svg-inline--fa fa-image me-2 text-700 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"></path>
                                 </svg>
                                 
                                 <p class="text-1000 mb-0 lh-1">Silly_sight_1.png</p>
                              </div>
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                 <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                 </svg>
                                 
                              </button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a><a class="dropdown-item" href="#">Download</a><a class="dropdown-item" href="#">Report abuse</a></div>
                           </div>
                           <p class="fs--1 text-700 mb-1"><span>12.8 mb</span><span class="text-400 mx-1">| </span><a href="#">Yves Tanguy </a><span class="text-400 mx-1">| </span><span class="text-nowrap">19th Dec, 08:56 PM</span></p>
                        </div>
                     </div>
                     <div class="border-top border-bottom border-300 py-3 mb-3">
                        <div class="me-n3">
                           <div class="d-flex flex-between-center">
                              <div class="d-flex align-items-center mb-1">
                                 <svg class="svg-inline--fa fa-file-lines me-2 fs--1 text-700" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-lines" role="img" xmlns="" viewBox="0 0 384 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272 416h-160C103.2 416 96 408.8 96 400C96 391.2 103.2 384 112 384h160c8.836 0 16 7.162 16 16C288 408.8 280.8 416 272 416zM272 352h-160C103.2 352 96 344.8 96 336C96 327.2 103.2 320 112 320h160c8.836 0 16 7.162 16 16C288 344.8 280.8 352 272 352zM288 272C288 280.8 280.8 288 272 288h-160C103.2 288 96 280.8 96 272C96 263.2 103.2 256 112 256h160C280.8 256 288 263.2 288 272z"></path>
                                 </svg>
                                 
                                 <p class="text-1000 mb-0 lh-1">Project.txt</p>
                              </div>
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                 <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                                 </svg>
                                 
                              </button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a><a class="dropdown-item" href="#">Download</a><a class="dropdown-item" href="#">Report abuse</a></div>
                           </div>
                           <p class="fs--1 text-700 mb-1"><span>123 kb</span><span class="text-400 mx-1">|</span><a href="#">Shantinan Mekalan</a><span class="text-400 mx-1">|</span><span class="text-nowrap">12th Dec, 12:56 PM</span></p>
                        </div>
                     </div>
                     <a class="fw-bold fs--1 text-decoration-none" href="#">
                        <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                        </svg>
                        Add file(s)
                     </a>
                  </div>
                  <div class="col-12 col-md-3">
                     <h5 class="text-800 mb-3">Add to card</h5>
                     <div class="mb-6">
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-user-plus me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="" viewBox="0 0 640 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                           </svg>
                           Assignee
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-tag me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M48 32H197.5C214.5 32 230.7 38.74 242.7 50.75L418.7 226.7C443.7 251.7 443.7 292.3 418.7 317.3L285.3 450.7C260.3 475.7 219.7 475.7 194.7 450.7L18.75 274.7C6.743 262.7 0 246.5 0 229.5V80C0 53.49 21.49 32 48 32L48 32zM112 176C129.7 176 144 161.7 144 144C144 126.3 129.7 112 112 112C94.33 112 80 126.3 80 144C80 161.7 94.33 176 112 176z"></path>
                           </svg>
                           Labels
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-paperclip me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"></path>
                           </svg>
                           Attachments
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-square-check me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square-check" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M384 32C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384zM339.8 211.8C350.7 200.9 350.7 183.1 339.8 172.2C328.9 161.3 311.1 161.3 300.2 172.2L192 280.4L147.8 236.2C136.9 225.3 119.1 225.3 108.2 236.2C97.27 247.1 97.27 264.9 108.2 275.8L172.2 339.8C183.1 350.7 200.9 350.7 211.8 339.8L339.8 211.8z"></path>
                           </svg>
                           Checklist
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-calendar-days me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM64 304C64 312.8 71.16 320 80 320H112C120.8 320 128 312.8 128 304V272C128 263.2 120.8 256 112 256H80C71.16 256 64 263.2 64 272V304zM192 304C192 312.8 199.2 320 208 320H240C248.8 320 256 312.8 256 304V272C256 263.2 248.8 256 240 256H208C199.2 256 192 263.2 192 272V304zM336 256C327.2 256 320 263.2 320 272V304C320 312.8 327.2 320 336 320H368C376.8 320 384 312.8 384 304V272C384 263.2 376.8 256 368 256H336zM64 432C64 440.8 71.16 448 80 448H112C120.8 448 128 440.8 128 432V400C128 391.2 120.8 384 112 384H80C71.16 384 64 391.2 64 400V432zM208 384C199.2 384 192 391.2 192 400V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V400C256 391.2 248.8 384 240 384H208zM320 432C320 440.8 327.2 448 336 448H368C376.8 448 384 440.8 384 432V400C384 391.2 376.8 384 368 384H336C327.2 384 320 391.2 320 400V432z"></path>
                           </svg>
                           Dates
                        </button>
                     </div>
                     <h5 class="text-800 mb-3">Actions</h5>
                     <div class="mb-6">
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-arrow-right me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"></path>
                           </svg>
                           Move
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-copy me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M384 96L384 0h-112c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48H464c26.51 0 48-21.49 48-48V128h-95.1C398.4 128 384 113.6 384 96zM416 0v96h96L416 0zM192 352V128h-144c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h192c26.51 0 48-21.49 48-48L288 416h-32C220.7 416 192 387.3 192 352z"></path>
                           </svg>
                           Copy
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-trash me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path>
                           </svg>
                           Remove
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-box-archive me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box-archive" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M32 432C32 458.5 53.49 480 80 480h352c26.51 0 48-21.49 48-48V160H32V432zM160 236C160 229.4 165.4 224 172 224h168C346.6 224 352 229.4 352 236v8C352 250.6 346.6 256 340 256h-168C165.4 256 160 250.6 160 244V236zM480 32H32C14.31 32 0 46.31 0 64v48C0 120.8 7.188 128 16 128h480C504.8 128 512 120.8 512 112V64C512 46.31 497.7 32 480 32z"></path>
                           </svg>
                           Archive
                        </button>
                        <button class="btn btn-sm btn-soft-secondary rounded-3 mb-2 d-flex align-items-center w-100">
                           <svg class="svg-inline--fa fa-share-nodes me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M448 127.1C448 181 405 223.1 352 223.1C326.1 223.1 302.6 213.8 285.4 197.1L191.3 244.1C191.8 248 191.1 251.1 191.1 256C191.1 260 191.8 263.1 191.3 267.9L285.4 314.9C302.6 298.2 326.1 288 352 288C405 288 448 330.1 448 384C448 437 405 480 352 480C298.1 480 256 437 256 384C256 379.1 256.2 376 256.7 372.1L162.6 325.1C145.4 341.8 121.9 352 96 352C42.98 352 0 309 0 256C0 202.1 42.98 160 96 160C121.9 160 145.4 170.2 162.6 186.9L256.7 139.9C256.2 135.1 256 132 256 128C256 74.98 298.1 32 352 32C405 32 448 74.98 448 128L448 127.1zM95.1 287.1C113.7 287.1 127.1 273.7 127.1 255.1C127.1 238.3 113.7 223.1 95.1 223.1C78.33 223.1 63.1 238.3 63.1 255.1C63.1 273.7 78.33 287.1 95.1 287.1zM352 95.1C334.3 95.1 320 110.3 320 127.1C320 145.7 334.3 159.1 352 159.1C369.7 159.1 384 145.7 384 127.1C384 110.3 369.7 95.1 352 95.1zM352 416C369.7 416 384 401.7 384 384C384 366.3 369.7 352 352 352C334.3 352 320 366.3 320 384C320 401.7 334.3 416 352 416z"></path>
                           </svg>
                           Share
                        </button>
                     </div>
                  </div>
               </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4.29\htdocs\carpediem\bcc_crm\resources\views/admin/stagesview.blade.php ENDPATH**/ ?>