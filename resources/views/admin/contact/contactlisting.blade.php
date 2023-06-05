<?php
   $login = "no";
   $title = "Contact List";
   ?>
@extends('admin.layout.app')
@section('content')
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>
<style>
   #reportrange{padding: 0.4rem 1rem !important; border-radius: 8px;}

   .pager {padding-left: 0; margin: 20px 0; text-align: center; list-style: none;}
   .pager li {display: inline;}
   .pager li>a, .pager li>span {display: inline-block; padding: 5px 14px; background-color: #fff; border: 1px solid #ddd; border-radius: 15px;}
   .pager .disabled>a, .pager .disabled>a:focus, .pager .disabled>a:hover, .pager .disabled>span {color: #777; cursor: not-allowed; background-color: #fff;}
   
   table.loading tbody {position: relative;}
   table.loading tbody:after {position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.1); background-image: url(data:image/gif;base64,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);background-position: center; background-repeat: no-repeat; background-size: 50px 50px; content: "";}
</style>
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
                     @include('admin.contact.contact_pagination')
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

  
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
   function get_data_with_date(){
      var ENDPOINT = "{{ url('user/contactlisting') }}";

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
   var ENDPOINT = "{{ url('user/contactlisting') }}";
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

@endsection()