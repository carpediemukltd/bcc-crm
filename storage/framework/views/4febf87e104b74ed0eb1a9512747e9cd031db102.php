<?php $__currentLoopData = $rs_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="hover-actions-trigger btn-reveal-trigger position-static">
   <td class="fs--1 align-middle">
      <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;customer&quot;:{&quot;avatar&quot;:&quot;/team/32.webp&quot;,&quot;name&quot;:&quot;Anthoney Michael&quot;,&quot;designation&quot;:&quot;VP Accounting&quot;,&quot;status&quot;:{&quot;label&quot;:&quot;new lead&quot;,&quot;type&quot;:&quot;badge-phoenix-primary&quot;}},&quot;email&quot;:&quot;anth125@gmail.com&quot;,&quot;phone&quot;:&quot;+1-202-555-0126&quot;,&quot;contact&quot;:&quot;Ally Aagaard&quot;,&quot;company&quot;:&quot;Google.inc&quot;,&quot;date&quot;:&quot;Jan 01, 12:56 PM&quot;}"></div>
   </td>
   <td class="name align-middle white-space-nowrap">
      <div class="d-flex align-items-center">
         <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="<?php echo e(asset('assets/theme/images/35.png')); ?>" alt=""></div>
         <div>
            <a class="fs-0 fw-bold" href="#"><?=$rec_user->first_name.' '.$rec_user->last_name;?></a>
            <!-- <div class="d-flex align-items-center">
               <p class="mb-0 text-1000 fw-semi-bold fs--1 me-2">VP Accounting</p>
               <span class="badge badge-phoenix badge-phoenix-primary">new lead</span>
            </div> -->
         </div>
      </div>
   </td>
   <td class="email align-middle white-space-nowrap fw-semi-bold text-1000 ps-4 border-end"><?=$rec_user->email;?></td>
   <td class="phone align-middle white-space-nowrap fw-semi-bold text-1000 ps-4 border-end"><?=$rec_user->phone_number;?></td>
   
   <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000"><?=ucfirst($rec_user->status);?></td>
   <td class="date align-middle white-space-nowrap text-600 ps-4 text-700"><?=date('M d, h:i A', strtotime($rec_user->created_at));?></td>
   <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
      <!-- <div class="font-sans-serif btn-reveal-trigger position-static">
         <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
            <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
            </svg>
            
         </button>
         <div class="dropdown-menu dropdown-menu-end py-2">
            <a class="dropdown-item" href="#">View</a><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#export_modal" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent" href="#">Export</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="#">Remove</a>
         </div>
      </div> -->
   </td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr>
    <td colspan="6" align="center">
      <?php echo $rs_users->links('admin.contact.custom_pagination'); ?>

    </td>
</tr><?php /**PATH C:\xampp\htdocs\crm\resources\views/admin/contact/contact_pagination.blade.php ENDPATH**/ ?>