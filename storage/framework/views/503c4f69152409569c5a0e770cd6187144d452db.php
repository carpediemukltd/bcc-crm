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
   <div class="row gx-6 gy-3 mb-4 align-items-center">
      <div class="col-auto">
         <h2 class="mb-0">Custom Fields
          <span class="fw-normal text-700 ms-3">(32)</span>
        </h2>
      </div>
      <div class="col-auto">
         <a class="btn btn-primary px-2" href="#">
            <svg class="svg-inline--fa fa-plus me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
            </svg>
            Add new Fields
         </a>
      </div>
   </div>
   <form class="row g-3 mb-6">
      <div class="col-sm-6 col-md-8">
        <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Project title"><label for="floatingInputGrid">Project title</label></div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-floating"><select class="form-select" id="floatingSelectTask">
            <option selected="selected">Select task view</option>
            <option value="1">technical</option>
            <option value="2">external</option>
            <option value="3">organizational</option>
          </select><label for="floatingSelectTask">Defult task view</label></div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-floating">
          <select class="form-select" id="floatingSelectPrivacy">
            <option selected="selected">Select privacy</option>
            <option value="1">Data Privacy One</option>
            <option value="2">Data Privacy Two</option>
            <option value="3">Data Privacy Three</option>
          </select>
          <label for="floatingSelectPrivacy">Project privacy</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-floating">
          <select class="form-select" id="floatingSelectTeam">
            <option selected="selected">Select team</option>
            <option value="1">Team One</option>
            <option value="2">Team Two</option>
            <option value="3">Team Three</option>
          </select>
          <label for="floatingSelectTeam">Team </label>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-floating">
          <select class="form-select" id="floatingSelectAssignees">
            <option selected="selected">Select assignees </option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <label for="floatingSelectAssignees">People </label>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-floating">
          <select class="form-select" id="floatingSelectAdmin">
            <option selected="selected">Select admin</option>
            <option value="1">Data Privacy One</option>
            <option value="2">Data Privacy Two</option>
            <option value="3">Data Privacy Three</option>
          </select>
          <label for="floatingSelectAdmin">Project Lead</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="flatpickr-input-container">
          <div class="form-floating"><input class="form-control datetimepicker flatpickr-input" id="floatingInputStartDate" type="text" placeholder="end date" data-options="{&quot;disableMobile&quot;:true}" readonly="readonly"><label class="ps-6" for="floatingInputStartDate">Start date</label><span class="uil uil-calendar-alt flatpickr-icon text-700"></span></div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="flatpickr-input-container">
          <div class="form-floating"><input class="form-control datetimepicker flatpickr-input" id="floatingInputDeadline" type="text" placeholder="deadline" data-options="{&quot;disableMobile&quot;:true}" readonly="readonly"><label class="ps-6" for="floatingInputDeadline">Deadline</label><span class="uil uil-calendar-alt flatpickr-icon text-700"></span></div>
        </div>
      </div>
      <div class="col-12 gy-6">
        <div class="form-floating"><textarea class="form-control" id="floatingProjectOverview" placeholder="Leave a comment here" style="height: 100px"></textarea><label for="floatingProjectOverview">project overview</label></div>
      </div>
      <div class="col-md-6 gy-6">
        <div class="form-floating">
          <select class="form-select" id="floatingSelectClient">
            <option selected="selected">Select client</option>
            <option value="1">Client One</option>
            <option value="2">Client Two</option>
            <option value="3">Client Three</option>
          </select>
          <label for="floatingSelectClient">client</label>
        </div>
      </div>
      <div class="col-md-6 gy-6">
        <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text" placeholder="Budget"><label for="floatingInputBudget">Budget</label></div>
      </div>
      <div class="col-12 gy-6"><div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options="{&quot;removeItemButton&quot;:true,&quot;placeholder&quot;:true}" hidden="" tabindex="-1" data-choice="active"></select><div class="choices__list choices__list--multiple"></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Add tags" placeholder="Add tags" style="min-width: 9ch; width: 1ch;"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" aria-multiselectable="true" role="listbox"><div id="choices--organizerMultiple-item-choice-2" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="2" data-value="Biology" data-select-text="" data-choice-selectable="" aria-selected="true">Biology</div><div id="choices--organizerMultiple-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Brainlessness" data-select-text="" data-choice-selectable="">Brainlessness</div><div id="choices--organizerMultiple-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Jerry" data-select-text="" data-choice-selectable="">Jerry</div><div id="choices--organizerMultiple-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Neurology" data-select-text="" data-choice-selectable="">Neurology</div><div id="choices--organizerMultiple-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Not_the_mouse" data-select-text="" data-choice-selectable="">Not_the_mouse</div><div id="choices--organizerMultiple-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Rick" data-select-text="" data-choice-selectable="">Rick</div><div id="choices--organizerMultiple-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="Stupidity" data-select-text="" data-choice-selectable="">Stupidity</div></div></div></div></div>
      <div class="col-12 gy-6">
        <div class="row g-3 justify-content-end">
          <div class="col-auto"><button class="btn btn-phoenix-primary px-5">Cancel</button></div>
          <div class="col-auto"><button class="btn btn-primary px-5 px-sm-15">Create Fields</button></div>
        </div>
      </div>
    </form>
              
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\bcc-crm\resources\views/admin/customfields.blade.php ENDPATH**/ ?>