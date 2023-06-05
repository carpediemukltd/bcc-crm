<?php
   $login = "no";
   $title = "Dashboard";
   ?>

<?php $__env->startSection('content'); ?>
<?php
   $notificationService = app('App\Services\NotificationService');
   $helperService = app('App\Services\HelperService');
   $authUser = Auth()->user();
   ?>


<div class="content">
  <div class="row gy-3 mb-4 justify-content-between">
    <div class="col-xxl-6">
      <h2 class="mb-2 text-1100">BCC CRM Dashboard</h2>
      <h5 class="text-700 fw-semi-bold mb-4">Check your business growth in one place</h5>
      <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex d-sm-block justify-content-between">
                <div class="border-bottom-sm mb-sm-4">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center icon-wrapper-sm shadow-primary-100" style="transform: rotate(-7.45deg);"><svg class="svg-inline--fa fa-phone-flip text-primary fs-1 z-index-1 ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M18.92 351.2l108.5-46.52c12.78-5.531 27.77-1.801 36.45 8.98l44.09 53.82c69.25-34 125.5-90.31 159.5-159.5l-53.81-44.04c-10.75-8.781-14.41-23.69-8.974-36.47l46.51-108.5c6.094-13.91 21.1-21.52 35.79-18.11l100.8 23.25c14.25 3.25 24.22 15.8 24.22 30.46c0 252.3-205.2 457.5-457.5 457.5c-14.67 0-27.18-9.968-30.45-24.22l-23.25-100.8C-2.571 372.4 5.018 357.2 18.92 351.2z"></path></svg><!-- <span class="fa-solid fa-phone-alt text-primary fs-1 z-index-1 ms-2"></span> Font Awesome fontawesome.com --></div>
                    <p class="text-700 fs--1 mb-0 ms-2 mt-3">Outgoing call</p>
                  </div>
                  <p class="text-primary mt-2 fs-2 fw-bold mb-0 mb-sm-4">3 <span class="fs-0 text-900 lh-lg">Leads Today</span></p>
                </div>
                <div class="d-flex flex-column justify-content-center flex-between-end d-sm-block text-end text-sm-start"><span class="badge badge-phoenix badge-phoenix-success fs--2 mb-2">+24.5%</span>
                  <p class="mb-0 fs--1 text-700">Than Yesterday</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex d-sm-block justify-content-between">
                <div class="border-bottom-sm mb-sm-4">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center icon-wrapper-sm shadow-info-100" style="transform: rotate(-7.45deg);"><svg class="svg-inline--fa fa-calendar text-info fs-1 z-index-1 ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"></path></svg><!-- <span class="fa-solid fa-calendar text-info fs-1 z-index-1 ms-2"></span> Font Awesome fontawesome.com --></div>
                    <p class="text-700 fs--1 mb-0 ms-2 mt-3">Outgoing call</p>
                  </div>
                  <p class="text-info mt-2 fs-2 fw-bold mb-0 mb-sm-4">12 <span class="fs-0 text-900 lh-lg">This Week</span></p>
                </div>
                <div class="d-flex flex-column justify-content-center flex-between-end d-sm-block text-end text-sm-start"><span class="badge badge-phoenix badge-phoenix-warning fs--2 mb-2">+24.5%</span>
                  <p class="mb-0 fs--1 text-700">Than last week</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xl-6 col-xxl-4 gy-5 gy-md-3">
          <div class="border-bottom">
            <h5 class="pb-4 border-bottom">Top 5 Lead Sources</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"> <span class="fw-bold">1. </span>None </span><span>(65)</span></div>
              </li>
              <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                <div class="d-flex justify-content-between"><span class="fw-normal mx-1"><span class="fw-bold">2. </span>Online Store</span><span>(74)</span></div>
              </li>
              <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"><span class="fw-bold">3.</span> Advertisement</span><span>(32)</span></div>
              </li>
              <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"><span class="fw-bold">4. </span>Seminar Partner</span><span>(25)</span></div>
              </li>
              <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"> <span class="fw-bold">5. </span>Partner</span><span>(23)</span></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-6 mb-4">
      <h3>Contacts Created</h3>
      <p class="text-700 mb-1">Payment received across all channels</p>
      <div class="echart-contacts-created" style="min-height: 270px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1677177923071"><div style="position: relative; width: 1015px; height: 270px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="1015" height="270" style="position: absolute; left: 0px; top: 0px; width: 1015px; height: 270px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
    </div>
    <div class="col-12 col-xxl-6 mb-3 mb-sm-0">
      <div class="row">
        <div class="col-sm-7 col-md-8 col-xxl-8 mb-md-3 mb-lg-0">
          <h3>New Contacts by Source</h3>
          <p class="text-700">Payment received across all channels</p>
          <div class="row g-0">
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-primary" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-primary" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Organic</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">80</h3>
              </div>
            </div>
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end-md-0 border-end-xl">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-success" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-success" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Paid Search</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">65</h3>
              </div>
            </div>
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-bottom border-end border-end-md border-end-xl-0">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-info" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-info" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Direct</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">40</h3>
              </div>
            </div>
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-end-xl border-bottom border-bottom-xl-0">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-info-300" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-info-300" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Social</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">220</h3>
              </div>
            </div>
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1 border-end">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-danger-200" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-danger-200" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Referrals</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">120</h3>
              </div>
            </div>
            <div class="col-6 col-xl-4">
              <div class="d-flex flex-column flex-center align-items-sm-start flex-md-row justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border-1">
                <div class="d-flex align-items-center mb-1"><svg class="svg-inline--fa fa-square fs--3 me-2 text-warning-300" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 me-2 text-warning-300" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1 text-900">Others</span></div>
                <h3 class="fw-semi-bold ms-xl-3 ms-xxl-0 pe-md-2 pe-xxl-0 mb-0 mb-sm-3">35</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5 col-md-4 col-xxl-4 my-3 my-sm-0">
          <div class="position-relative d-flex flex-center mb-sm-4 mb-xl-0 echart-contact-by-source-container mt-sm-7 mt-lg-4 mt-xl-0">
            <div class="echart-contact-by-source" style="min-height: 245px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1677177923070"><div style="position: relative; width: 317px; height: 245px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="317" height="245" style="position: absolute; left: 0px; top: 0px; width: 317px; height: 245px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
            <div class="position-absolute rounded-circle bg-primary-100 top-50 start-50 translate-middle d-flex flex-center" style="height:100px; width:100px;">
              <h3 class="mb-0 text-primary-600 dark__text-primary-300 fw-bolder" data-label="data-label">560</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-xxl-6 mb-4">
      <div class="mb-3">
        <h3>New Users &amp; Leads</h3>
        <p class="text-700 mb-0">Payment received across all channels</p>
      </div>
      <div class="row g-6">
        <div class="col-md-6 mb-2 mb-sm-0">
          <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users me-2 text-info" style="min-height:24px; width:24px"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <h4 class="text-600 mb-0">New Users :<span class="text-1100"> 42</span></h4>
            <span class="badge badge-phoenix fs--2 badge-phoenix-success d-inline-flex align-items-center ms-2"><span class="badge-label d-inline-block lh-base">+24.5%</span>
            <svg class="svg-inline--fa fa-caret-up ms-1 d-inline-block lh-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.39 265.4l127.1-128C143.6 131.1 151.8 128 160 128s16.38 3.125 22.63 9.375l127.1 128c9.156 9.156 11.9 22.91 6.943 34.88S300.9 320 287.1 320H32.01c-12.94 0-24.62-7.781-29.58-19.75S.2333 274.5 9.39 265.4z"></path></svg></span>
          </div>
          <div class="pb-0 pt-4">
            <div class="echarts-new-users" style="min-height: 110px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="true" _echarts_instance_="ec_1677177923072"><div style="position: relative; width: 488px; height: 110px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="488" height="110" style="position: absolute; left: 0px; top: 0px; width: 488px; height: 110px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap me-2 text-primary" style="height:24px; width:24px"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            <h4 class="text-600 mb-0">New Leads :<span class="text-1100">45</span></h4>
            <span class="badge badge-phoenix fs--2 badge-phoenix-success d-inline-flex align-items-center ms-2">
            <span class="badge-label d-inline-block lh-base">+30.5%</span><svg class="svg-inline--fa fa-caret-up ms-1 d-inline-block lh-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M9.39 265.4l127.1-128C143.6 131.1 151.8 128 160 128s16.38 3.125 22.63 9.375l127.1 128c9.156 9.156 11.9 22.91 6.943 34.88S300.9 320 287.1 320H32.01c-12.94 0-24.62-7.781-29.58-19.75S.2333 274.5 9.39 265.4z"></path></svg></span>
          </div>
          <div class="pb-0 pt-4">
            <div class="echarts-new-leads" style="min-height: 110px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="true" _echarts_instance_="ec_1677177923073"><div style="position: relative; width: 488px; height: 110px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="488" height="110" style="position: absolute; left: 0px; top: 0px; width: 488px; height: 110px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-xxl-6">
      <div class="row align-items-start justify-content-between mb-4 g-3">
        <div class="col-auto">
          <h3>Add Clicks</h3>
          <p class="text-700 lh-sm mb-0">Check effectiveness of your ads</p>
        </div>
        <div class="col-12 col-sm-4">
          <select class="form-select form-select-sm" id="select-gross-revenue-month">
            <option>Mar 1 - 31, 2022</option>
            <option>April 1 - 30, 2022</option>
            <option>May 1 - 31, 2022</option>
          </select>
        </div>
      </div>
      <div class="echart-add-clicks-chart" style="min-height: 385px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="true" _echarts_instance_="ec_1677177923074"><div style="position: relative; width: 1015px; height: 385px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="1015" height="385" style="position: absolute; left: 0px; top: 0px; width: 1015px; height: 385px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
    </div>
    <div class="col-12 col-xxl-6 mb-6 gy-0 gy-xxl-3">
      <div class="row align-items-start justify-content-between mb-4 g-3">
        <div class="col-auto">
          <h3>Deal Forecast<span class="fw-semi-bold">- $90,303</span></h3>
          <p class="text-700 mb-1">Show what you offer here</p>
        </div>
        <div class="col-12 col-sm-4">
          <select class="form-select form-select-sm" id="select-gross-revenue-month">
            <option>Mar 1 - 31, 2022</option>
            <option>April 1 - 30, 2022</option>
            <option>May 1 - 31, 2022</option>
          </select>
        </div>
      </div>
      <div class="w-100">
        <div class="d-flex flex-start">
          <p class="mb-2 text-700 fw-semi-bold fs--1" style="width: 20.72%">$21.0k</p>
          <p class="mb-2 text-700 fw-semi-bold fs--1" style="width: 35.76%">$3.4k</p>
          <p class="mb-2 text-700 fw-semi-bold fs--1" style="width: 25.38%">$15.1k</p>
          <p class="mb-2 text-700 fw-semi-bold fs--1" style="width: 25.14%">$4.6k</p>
        </div>
        <div class="progress mb-3 rounded-3" style="height: 10px;">
          <div class="progress-bar border-end border-white border-2" role="progressbar" style="width: 20.72%" aria-valuenow="20.72" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-primary-300 border-end border-white border-2" role="progressbar" style="width: 35.76%" aria-valuenow="35.76" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-success border-end border-white border-2" role="progressbar" style="width: 25.38%" aria-valuenow="25.38" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-info" role="progressbar" style="width: 25.14%" aria-valuenow="25.14" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <h4 class="mt-4 mb-3">Deal Forecast by Owner </h4>
      <div class="border-top border-bottom-0 border-300" id="dealForecastTable" data-list="{&quot;valueNames&quot;:[&quot;contact&quot;,&quot;appointment&quot;,&quot;qualified&quot;,&quot;closed-won&quot;,&quot;contact-sent&quot;]}">
        <div class="table-responsive scrollbar">
          <table class="table fs--1 mb-0">
            <thead>
              <tr>
                <th class="sort border-end white-space-nowrap align-middle ps-0 text-uppercase text-700" scope="col" data-sort="contact" style="width:15%; min-width:100px">Contact</th>
                <th class="sort border-end align-middle text-end px-3 text-uppercase text-700" scope="col" data-sort="appointment" style="width:15%; min-width:95px">
                  <div class="d-inline-flex flex-center"><svg class="svg-inline--fa fa-square fs--3 text-primary me-2" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 text-primary me-2" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1">Appointment</span></div>
                </th>
                <th class="sort border-end align-middle text-end px-3 text-uppercase text-700" scope="col" data-sort="qualified" style="width:20%; min-width:100px">
                  <div class="d-inline-flex flex-center"><svg class="svg-inline--fa fa-square fs--3 text-primary-300 me-2" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 text-primary-300 me-2" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1">Qualified</span></div>
                </th>
                <th class="sort border-end align-middle text-end px-3 text-uppercase text-700" scope="col" data-sort="closed-won" style="width:20%; min-width:100px">
                  <div class="d-inline-flex flex-center"><svg class="svg-inline--fa fa-square fs--3 text-success me-2" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 text-success me-2" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1">Closed Won</span></div>
                </th>
                <th class="sort align-middle text-end px-3 text-uppercase text-700" scope="col" data-sort="contact-sent" style="width:20%; min-width:100px">
                  <div class="d-inline-flex flex-center"><svg class="svg-inline--fa fa-square fs--3 text-info me-2" data-fa-transform="up-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.375em;"><g transform="translate(224 256)"><g transform="translate(0, -64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fa-solid fa-square fs--3 text-info me-2" data-fa-transform="up-2"></span> Font Awesome fontawesome.com --><span class="mb-0 fs--1">Contact Sent</span></div>
                </th>
              </tr>
            </thead>
            <tbody class="list" id="table-latest-review-body"><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="contact border-end align-middle white-space-nowrap py-2 ps-0 px-3"><a class="fw-semi-bold pointers-events-none text-decoration-none" href="https://prium.github.io/phoenix/v1.9.0/dashboard/crm.html#!">Carrie Anne</a></td>
                <td class="appointment border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">1000</td>
                <td class="qualified border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$1256</td>
                <td class="closed-won border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$1200</td>
                <td class="contact-sent border-end-0 align-middle white-space-nowrap text-end fw-semi-bold text-900 px-3 py-2">$1200</td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="contact border-end align-middle white-space-nowrap py-2 ps-0 px-3"><a class="fw-semi-bold pointers-events-none text-decoration-none" href="https://prium.github.io/phoenix/v1.9.0/dashboard/crm.html#!">Milind Mikuja</a></td>
                <td class="appointment border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">558</td>
                <td class="qualified border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$2531</td>
                <td class="closed-won border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$2200</td>
                <td class="contact-sent border-end-0 align-middle white-space-nowrap text-end fw-semi-bold text-900 px-3 py-2">$2200</td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="contact border-end align-middle white-space-nowrap py-2 ps-0 px-3"><a class="fw-semi-bold pointers-events-none text-decoration-none" href="https://prium.github.io/phoenix/v1.9.0/dashboard/crm.html#!">Stanley Drinkwater</a></td>
                <td class="appointment border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">1100</td>
                <td class="qualified border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$100</td>
                <td class="closed-won border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$100</td>
                <td class="contact-sent border-end-0 align-middle white-space-nowrap text-end fw-semi-bold text-900 px-3 py-2">$100</td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="contact border-end align-middle white-space-nowrap py-2 ps-0 px-3"><a class="fw-semi-bold pointers-events-none text-decoration-none" href="https://prium.github.io/phoenix/v1.9.0/dashboard/crm.html#!">Josef Stravinsky</a></td>
                <td class="appointment border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">856</td>
                <td class="qualified border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$326</td>
                <td class="closed-won border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$265</td>
                <td class="contact-sent border-end-0 align-middle white-space-nowrap text-end fw-semi-bold text-900 px-3 py-2">$265</td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="contact border-end align-middle white-space-nowrap py-2 ps-0 px-3"><a class="fw-semi-bold pointers-events-none text-decoration-none" href="https://prium.github.io/phoenix/v1.9.0/dashboard/crm.html#!">Roy Anderson</a></td>
                <td class="appointment border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">1200</td>
                <td class="qualified border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$1452</td>
                <td class="closed-won border-end align-middle white-space-nowrap text-end fw-semi-bold text-900 py-2 px-3">$865</td>
                <td class="contact-sent border-end-0 align-middle white-space-nowrap text-end fw-semi-bold text-900 px-3 py-2">$865</td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="align-middle border-bottom-0 border-end white-space-nowrap text-end fw-bold text-1100 pt-2 lh-sm pb-0 px-3"> </td>
                <td class="align-middle border-bottom-0 border-end white-space-nowrap text-end fw-bold text-1100 pt-2 lh-sm pb-0 px-3">4,744</td>
                <td class="align-middle border-bottom-0 border-end white-space-nowrap text-end fw-bold text-1100 pt-2 lh-sm pb-0 px-3">$5,665</td>
                <td class="align-middle border-bottom-0 border-end white-space-nowrap text-end fw-bold text-1100 pt-2 lh-sm pb-0 px-3">$4630</td>
                <td class="border-bottom-0 align-middle white-space-nowrap text-end fw-bold text-1100 pt-2 pb-0 px-3">$4630</td>
              </tr></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-lg-n4">
    <div class="row g-3 mb-6 mt-n7">
      <div class="col-xl-5">
        <div class="card h-100">
          <div class="card-body">
            <h3>Lead Conversion</h3>
            <p class="text-700 mb-0">Stages of deals &amp; conversion</p>
            <div class="echart-lead-conversion" style="min-height: 250px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1677177923075"><div style="position: relative; width: 384px; height: 250px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="384" height="250" style="position: absolute; left: 0px; top: 0px; width: 384px; height: 250px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
          </div>
        </div>
      </div>
      <div class="col-xl-7">
        <div class="card h-100">
          <div class="card-body">
            <h3>Revenue Target</h3>
            <p class="text-700">Country-wise target fulfilment</p>
            <div class="echart-revenue-target-conversion" style="min-height: 230px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1677177923076"><div style="position: relative; width: 563px; height: 230px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="563" height="230" style="position: absolute; left: 0px; top: 0px; width: 563px; height: 230px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>