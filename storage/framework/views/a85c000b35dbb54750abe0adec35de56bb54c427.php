<?php
   $login = "no";
   $title = "Contact List";
   ?>

<?php $__env->startSection('content'); ?>
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<div class="content">
   <!-- <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Page 1</a></li>
         <li class="breadcrumb-item"><a href="#">Page 2</a></li>
         <li class="breadcrumb-item active">Default</li>
      </ol>
   </nav> -->
   <div class="pb-1">
      <h2 class="mb-4">Contact Listing</h2>
      <div id="dealsTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;phone&quot;,&quot;contact&quot;,&quot;company&quot;,&quot;date&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
            <?php
               /*
            ?>
         <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
               <div class="d-md-flex justify-content-between">
                  <div>
                     <button class="btn btn-primary me-4">
                        <svg class="svg-inline--fa fa-plus me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                        </svg>
                        Create Lead
                     </button>
                     <button class="btn btn-link text-900 px-0"  data-bs-toggle="modal" data-bs-target="#export_modal" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        <svg class="svg-inline--fa fa-file-export fs--1 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-export" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"></path>
                        </svg>
                        Export 
                     </button>
                  </div>
               </div>
            </div>
            <div class="col-auto">
               <div class="d-flex">
                  <div class="search-box me-2">
                     <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search">
                        <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                        </svg>
                        <!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                     </form>
                  </div>
                  <div class="flatpickr-input-container me-2">
                     <input class="form-control ps-6 datetimepicker flatpickr-input" id="datepicker" type="text" data-options="{&quot;dateFormat&quot;:&quot;M j, Y&quot;,&quot;disableMobile&quot;:true,&quot;defaultDate&quot;:&quot;Mar 1, 2022&quot;}" readonly="readonly">
                     <svg class="svg-inline--fa fa-calendar" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"></path></svg>
                  </div>
                  <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="modal" data-bs-target="#filterModal" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                     <svg class="svg-inline--fa fa-filter text-primary" data-fa-transform="down-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.6875em;">
                        <g transform="translate(256 256)">
                           <g transform="translate(0, 96)  scale(1, 1)  rotate(0 0 0)">
                              <path fill="currentColor" d="M3.853 54.87C10.47 40.9 24.54 32 40 32H472C487.5 32 501.5 40.9 508.1 54.87C514.8 68.84 512.7 85.37 502.1 97.33L320 320.9V448C320 460.1 313.2 471.2 302.3 476.6C291.5 482 278.5 480.9 268.8 473.6L204.8 425.6C196.7 419.6 192 410.1 192 400V320.9L9.042 97.33C-.745 85.37-2.765 68.84 3.854 54.87L3.853 54.87z" transform="translate(-256 -256)"></path>
                           </g>
                        </g>
                     </svg>
                     <!-- <span class="fa-solid fa-filter text-primary" data-fa-transform="down-3"></span> Font Awesome fontawesome.com -->
                  </button>
                  <div class="modal fade" id="filterModal" tabindex="-1">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border">
                           <form id="addEventForm" autocomplete="off">
                              <div class="modal-header border-200 p-4">
                                 <h5 class="modal-title text-1000 fs-2 lh-sm">Filter</h5>
                                 <button class="btn p-1 text-900" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    <svg class="svg-inline--fa fa-xmark fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-times fs--1"> 				</span> Font Awesome fontawesome.com -->
                                 </button>
                              </div>
                              <div class="modal-body pt-4 pb-2 px-4">
                                 <div class="mb-3">
                                    <label class="fw-bold mb-2 text-1000" for="leadStatus">Lead Status</label>
                                    <select class="form-select" id="leadStatus">
                                       <option value="newLead" selected="selected">New Lead</option>
                                       <option value="coldLead">Cold Lead </option>
                                       <option value="wonLead">Won Lead</option>
                                       <option value="canceled">Canceled</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="fw-bold mb-2 text-1000" for="createDate">Create Date</label>
                                    <select class="form-select" id="createDate">
                                       <option value="today" selected="selected">Today</option>
                                       <option value="last7Days">Last 7 Days</option>
                                       <option value="last30Days">Last 30 Days</option>
                                       <option value="chooseATimePeriod">Choose a time period</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="fw-bold mb-2 text-1000" for="designation">Designation</label>
                                    <select class="form-select" id="designation">
                                       <option value="VPAccounting" selected="selected">VP Accounting</option>
                                       <option value="ceo">CEO</option>
                                       <option value="creativeDirector">Creative Director</option>
                                       <option value="accountant">Accountant</option>
                                       <option value="executiveManager">Executive Manager</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3">
                                 <button class="btn btn-sm btn-phoenix-primary px-4 fs--2 my-0" type="submit">
                                    <svg class="svg-inline--fa fa-arrows-rotate me-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrows-rotate" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M464 16c-17.67 0-32 14.31-32 32v74.09C392.1 66.52 327.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.89 5.5 34.88-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c50.5 0 96.26 24.55 124.4 64H336c-17.67 0-32 14.31-32 32s14.33 32 32 32h128c17.67 0 32-14.31 32-32V48C496 30.31 481.7 16 464 16zM441.8 289.6c-16.92-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-50.5 0-96.25-24.55-124.4-64H176c17.67 0 32-14.31 32-32s-14.33-32-32-32h-128c-17.67 0-32 14.31-32 32v144c0 17.69 14.33 32 32 32s32-14.31 32-32v-74.09C119.9 445.5 184.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-arrows-rotate me-2 fs--2"></span> Font Awesome fontawesome.com -->Reset
                                 </button>
                                 <button class="btn btn-sm btn-primary px-9 fs--2 my-0" type="submit">Done</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
            */
         ?>

         <div class="row g-3 justify-content-between mb-4">
            <!-- <div class="col-md-1">
               <button class="btn btn-link text-900 px-0"  data-bs-toggle="modal" data-bs-target="#export_modal" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                  <svg class="svg-inline--fa fa-file-export fs--1 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-export" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"></path>
                  </svg>
                  Export 
               </button>
            </div> -->
            <div class="col-md-6">
               <div class="form-group">
                  <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                     <i class="fa fa-calendar"></i>&nbsp;
                     <span></span> <i class="fa fa-caret-down"></i>
                  </div>
               </div>
               <input type="hidden" id="start_date" value="">
               <input type="hidden" id="end_date" value="">
            </div>

            <div class="col-md-3">
               <div class="form-group">
                  <select name="status" id="status" class="form-control custom-select">
                     <option value="">Filter</option>
                     <option value="active">Active</option>
                     <option value="inactive">Inactive</option>
                     <option value="deleted">Deleted</option>
                     <option value="banned">Banned</option>
                  </select>
               </div>
            </div>
            
            <div class="col-md-3">
               <div class="form-group">
                  <input type="text" name="serach" id="serach" placeholder="Serach.." class="form-control" />
               </div>
            </div>
         </div>

         <!-- <div class="row g-3 justify-content-between mb-4">
            <div class="col-md-12">
               <button class="btn btn-link text-900 px-0"  data-bs-toggle="modal" data-bs-target="#export_modal" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                  <svg class="svg-inline--fa fa-file-export fs--1 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-export" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg="">
                     <path fill="currentColor" d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"></path>
                  </svg>
                  Export 
               </button>
            </div>
         </div>   -->

         <div class="px-4 mx-lg-n6 px-lg-6">
            <div class="table-responsive scrollbar mx-n1 px-1 border-top">
               <table class="table fs--1 mb-0 leads-table">
                  <thead>
                     <tr>
                        <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                           <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;deal-tables-body&quot;}"></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle text-uppercase" scope="col" data-sort="name" style="width:25%;">Name</th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email" style="width:15%;">
                           <div class="d-inline-flex flex-center">
                              <div class="d-flex align-items-center px-1 py-1 bg-success-100 rounded me-2">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail text-success-600 dark__text-success-300">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                 </svg>
                              </div>
                              <span>Email</span>
                           </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="phone" style="width:15%; min-width: 180px;">
                           <div class="d-inline-flex flex-center">
                              <div class="d-flex align-items-center px-1 py-1 bg-primary-100 rounded me-2">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone text-primary-600 dark__text-primary-300">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                 </svg>
                              </div>
                              <span>Phone</span>
                           </div>
                        </th>
                        <!-- <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="contact" style="width:15%;">
                           <div class="d-inline-flex flex-center">
                              <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user text-info-600 dark__text-info-300">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                 </svg>
                              </div>
                              <span>Contact name</span>
                           </div>
                        </th> -->
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="company" style="width:15%;">
                           <div class="d-inline-flex flex-center">
                              <div class="d-flex align-items-center px-1 py-1 bg-warning-100 rounded me-2">
                                 <svg xmlns="" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid text-warning-600 dark__text-warning-300">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                 </svg>
                              </div>
                              <span>Status</span>
                           </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase" scope="col" data-sort="date" style="width:15%;">Create date</th>
                        <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                     </tr>
                  </thead>
                  
                  <tbody class="list" id="deal-tables-body">
                     <?php echo $__env->make('admin.contact.contact_pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </tbody>
               </table>
               <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="get_data_with_date();">Click Me</button>
               <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            </div>
         </div>
      </div>
   </div>
   <!-- export contact list modal start -->

   <div class="modal fade" id="export_modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border">
            <form id="addEventForm" autocomplete="off">
               <div class="modal-header border-200 p-4">
                  <h5 class="modal-title text-1000 fs-2 lh-sm">Export Contact List</h5>
                  <button class="btn p-1 text-900" type="button" data-bs-dismiss="modal" aria-label="Close">
                     <svg class="svg-inline--fa fa-xmark fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="" viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                     </svg>
                     <!-- <span class="fas fa-times fs--1"> 				</span> Font Awesome fontawesome.com -->
                  </button>
               </div>
               <div class="modal-body pt-4 pb-2 px-4">
                  <div class="mb-3">
                     <label class="fw-bold mb-2 text-1000" for="leadStatus">Lead Status</label>
                     <select class="form-select" id="leadStatus">
                        <option value="newLead" selected="selected">New Lead</option>
                        <option value="coldLead">Cold Lead </option>
                        <option value="wonLead">Won Lead</option>
                        <option value="canceled">Canceled</option>
                     </select>
                  </div>
                  <div class="mb-3">
                     <label class="fw-bold mb-2 text-1000" for="createDate">Create Date</label>
                     <select class="form-select" id="createDate">
                        <option value="today" selected="selected">Today</option>
                        <option value="last7Days">Last 7 Days</option>
                        <option value="last30Days">Last 30 Days</option>
                        <option value="chooseATimePeriod">Choose a time period</option>
                     </select>
                  </div>
                  <div class="mb-3">
                     <label class="fw-bold mb-2 text-1000" for="designation">Designation</label>
                     <select class="form-select" id="designation">
                        <option value="VPAccounting" selected="selected">VP Accounting</option>
                        <option value="ceo">CEO</option>
                        <option value="creativeDirector">Creative Director</option>
                        <option value="accountant">Accountant</option>
                        <option value="executiveManager">Executive Manager</option>
                     </select>
                  </div>
               </div>
               <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3">
                  <button class="btn btn-sm btn-phoenix-primary px-4 fs--2 my-0" type="submit">
                     <svg class="svg-inline--fa fa-arrows-rotate me-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrows-rotate" role="img" xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M464 16c-17.67 0-32 14.31-32 32v74.09C392.1 66.52 327.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.89 5.5 34.88-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c50.5 0 96.26 24.55 124.4 64H336c-17.67 0-32 14.31-32 32s14.33 32 32 32h128c17.67 0 32-14.31 32-32V48C496 30.31 481.7 16 464 16zM441.8 289.6c-16.92-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-50.5 0-96.25-24.55-124.4-64H176c17.67 0 32-14.31 32-32s-14.33-32-32-32h-128c-17.67 0-32 14.31-32 32v144c0 17.69 14.33 32 32 32s32-14.31 32-32v-74.09C119.9 445.5 184.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z"></path>
                     </svg>
                     <!-- <span class="fas fa-arrows-rotate me-2 fs--2"></span> Font Awesome fontawesome.com -->Reset
                  </button>
                  <button class="btn btn-sm btn-primary px-9 fs--2 my-0" type="submit">Done</button>
               </div>
            </form>
         </div>
      </div>
   </div>

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
   function get_data_with_date(){
      var ENDPOINT = "<?php echo e(url('user/contactlisting')); ?>";

      var status = $('#status').val();
      var seach_term = $('#serach').val();
      var page = $('#hidden_page').val();

      var start_date = $('#start_date').val();
      var end_date   = $('#end_date').val();

      $('table').addClass('loading');
      $.ajax({ 
         url: ENDPOINT+ "/?page="+page+"&status="+status+"&seach_term="+seach_term+"&start_date="+start_date+"&end_date="+end_date,
         success:function(data){
            $('tbody').html('');
            $('tbody').html(data);

            $('table').removeClass('loading');
         }
      });
   } // get_data_with_date
</script>

<script>
   var ENDPOINT = "<?php echo e(url('user/contactlisting')); ?>";
   $(document).ready(function(){
      const fetch_data = (page, status, seach_term) => {
         var start_date = $('#start_date').val();
         var end_date   = $('#end_date').val();

         $('table').addClass('loading');
         if(status === undefined){
               status = "";
         }
         if(seach_term === undefined){
               seach_term = "";
         }
         $.ajax({ 
               url: ENDPOINT+ "/?page="+page+"&status="+status+"&seach_term="+seach_term+"&start_date="+start_date+"&end_date="+end_date,
               success:function(data){
                  $('tbody').html('');
                  $('tbody').html(data);

                  $('table').removeClass('loading');
               }
         });
      }

      $('body').on('keyup', '#serach', function(){
         var status = $('#status').val();
         var seach_term = $('#serach').val();
         var page = $('#hidden_page').val();
         fetch_data(page, status, seach_term);
      });

      $('body').on('change', '#status', function(){
         var status = $('#status').val();
         var seach_term = $('#serach').val();
         var page = $('#hidden_page').val();
         fetch_data(page, status, seach_term);
      });

      $('body').on('click', '.pager a', function(event){
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         $('#hidden_page').val(page);
         var serach = $('#serach').val();
         var seach_term = $('#status').val();
         fetch_data(page,status, seach_term);
      });
   });
</script>

<script>
   $(document).ready(function(){
      var start = moment().subtract(1, 'days');
      var end = moment();
      function cb(start, end) {
         $('#start_date').val(start.format('YYYY-MM-DD')+' 00:00:00');
         $('#end_date').val(end.format('YYYY-MM-DD')+' 11:59:59');
         // $('#coming_date').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         document.getElementById("click_me").click();
      }
      $('#reportrange').daterangepicker({
         startDate: start,
         endDate: end,
         ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(6, 'month'), moment()]
         }
      }, cb);
      // cb(start, end);
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crm\resources\views/admin/contact/contactlisting.blade.php ENDPATH**/ ?>