<?php
   $login = "no";
   $title = "customfields";
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
<div class="mb-9">
   <div id="projectSummary" data-list="{&quot;valueNames&quot;:[&quot;projectName&quot;,&quot;assigness&quot;,&quot;start&quot;,&quot;deadline&quot;,&quot;task&quot;,&quot;projectprogress&quot;,&quot;status&quot;,&quot;action&quot;],&quot;page&quot;:6,&quot;pagination&quot;:true}">
      <div class="row mb-4 gx-6 gy-3 align-items-center">
         <div class="col-auto">
            <h2 class="mb-0">Deals Listing<span class="fw-normal text-700 ms-3">(32)</span></h2>
         </div>
         <div class="col-auto">
            <a class="btn btn-primary px-2" href="#">
               <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                  <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
               </svg>
               Add new Deal
            </a>
         </div>
      </div>
      <div class="row g-3 justify-content-between align-items-end mb-4">
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
                     <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                     </svg>
                     
                  </form>
               </div>
               <a class="btn btn-phoenix-primary px-3 me-1 border-0 text-900" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view">
                  <svg class="svg-inline--fa fa-list fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z"></path>
                  </svg>
                  
               </a>
               <a class="btn btn-phoenix-primary px-3 me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Board view">
                  <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
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
               <a class="btn btn-phoenix-primary px-3" href="<?php echo e(route('user.stagesview')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Card view">
                  <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H3.5C3.77614 0 4 0.223858 4 0.5V3.5C4 3.77614 3.77614 4 3.5 4H0.5C0.223858 4 0 3.77614 0 3.5V0.5Z" fill="currentColor"></path>
                     <path d="M0 5.5C0 5.22386 0.223858 5 0.5 5H3.5C3.77614 5 4 5.22386 4 5.5V8.5C4 8.77614 3.77614 9 3.5 9H0.5C0.223858 9 0 8.77614 0 8.5V5.5Z" fill="currentColor"></path>
                     <path d="M5 0.5C5 0.223858 5.22386 0 5.5 0H8.5C8.77614 0 9 0.223858 9 0.5V3.5C9 3.77614 8.77614 4 8.5 4H5.5C5.22386 4 5 3.77614 5 3.5V0.5Z" fill="currentColor"></path>
                     <path d="M5 5.5C5 5.22386 5.22386 5 5.5 5H8.5C8.77614 5 9 5.22386 9 5.5V8.5C9 8.77614 8.77614 9 8.5 9H5.5C5.22386 9 5 8.77614 5 8.5V5.5Z" fill="currentColor"></path>
                  </svg>
               </a>
            </div>
         </div>
      </div>
      <div class="table-responsive scrollbar">
         <table class="table fs--1 mb-0 border-top border-200">
            <thead>
               <tr>
                  <th class="sort white-space-nowrap align-middle ps-0" scope="col" data-sort="projectName" style="width:30%;">Deal NAME</th>
                  <th class="sort align-middle ps-3" scope="col" data-sort="assigness" style="width:10%;">ASSIGNESS</th>
                  <!-- <th class="sort align-middle ps-3" scope="col" data-sort="start" style="width:10%;">START DATE</th>
                  <th class="sort align-middle ps-3" scope="col" data-sort="deadline" style="width:15%;">DEADLINE</th> -->
                  <!-- <th class="sort align-middle ps-3" scope="col" data-sort="task" style="width:12%;">TASK</th> -->
                  <!-- <th class="sort align-middle ps-3" scope="col" data-sort="projectprogress" style="width:5%;">PROGRESS</th> -->
                  <th class="sort align-middle text-end" scope="col" data-sort="statuses" style="width:10%;">Stages</th>
                  <th class="sort align-middle text-end" scope="col" style="width:10%;">Action</th>
               </tr>
            </thead>
            <tbody class="list" id="project-list-table-body">
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">Project Doughnut Dungeon</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <div class="avatar-name rounded-circle "><span>+2</span></div>
                        </div>
                     </div>
                  </td>
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-success">completed</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">Water resistant mosquito killer gun</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                     </div>
                  </td>
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-warning">inactive</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">Execution of Micky the foul mouse</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <div class="avatar-name rounded-circle"><span>R</span></div>
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                     </div>
                  </td>
                  
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-primary">ongoing</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">Harnessing stupidity from Jerry</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                     </div>
                  </td>
                  
                  
                  
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-danger">Critical</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">Making the Butterflies shoot each other dead</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <div class="avatar-name rounded-circle "><span>+3</span></div>
                        </div>
                     </div>
                  </td>
                  
                  
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-primary">ongoing</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="position-static">
                  <td class="align-middle time white-space-nowrap ps-0 projectName py-4"><a class="text-decoration-none fw-bold fs-0" href="#">The chewing gum attack</a></td>
                  <td class="align-middle white-space-nowrap assigness ps-3 py-4">
                     <div class="avatar-group avatar-group-dense">
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                        <div class="avatar avatar-s  rounded-circle">
                           <img class="rounded-circle " src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt="">
                        </div>
                     </div>
                  </td>
                  
                  
                  <td class="align-middle white-space-nowrap text-end statuses"><span class="badge badge-phoenix fs--2 badge-phoenix-secondary">Cancelled</span></td>
                  <td class="align-middle text-end white-space-nowrap pe-0 action">
                     <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                           <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
                           </svg>
                           
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                           <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="d-flex flex-wrap align-items-center justify-content-between py-3 pe-0 fs--1 border-bottom border-200">
         <div class="d-flex">
            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">1 to 6 <span class="text-600"> Items of </span>7</p>
            <a class="fw-semi-bold" href="#!" data-list-view="*">
               View all
               <svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;">
                  <g transform="translate(128 256)">
                     <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                        <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path>
                     </g>
                  </g>
               </svg>
               
            </a>
            <a class="fw-semi-bold d-none" href="#!" data-list-view="less">
               View Less
               <svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;">
                  <g transform="translate(128 256)">
                     <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                        <path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path>
                     </g>
                  </g>
               </svg>
               
            </a>
         </div>
         <div class="d-flex">
            <button class="page-link disabled" data-list-pagination="prev" disabled="">
               <svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path>
               </svg>
               
            </button>
            <ul class="mb-0 pagination">
               <li class="active"><button class="page" type="button" data-i="1" data-page="6">1</button></li>
               <li><button class="page" type="button" data-i="2" data-page="6">2</button></li>
            </ul>
            <button class="page-link pe-0" data-list-pagination="next">
               <svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
               </svg>
               
            </button>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4.29\htdocs\carpediem\bcc_crm\resources\views/admin/dealslisting.blade.php ENDPATH**/ ?>