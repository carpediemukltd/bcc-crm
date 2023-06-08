<?php $__currentLoopData = $rs_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="hover-actions-trigger btn-reveal-trigger position-static">
   <td class="email align-middle white-space-nowrap fw-semi-bold text-1000 ps-4 border-end"><?=$rec_field->title;?></td>
   <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000"><?=$rec_field->type;?></td>
   <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
      <div class="font-sans-serif btn-reveal-trigger position-static">
         <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
            <svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>
            </svg>
         </button>
         <div class="dropdown-menu dropdown-menu-end py-2">
            <a class="dropdown-item" href="<?php echo e(route('user.customfields.edit', $rec_field->id)); ?>">View</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="<?php echo e(route('user.customfields.delete', $rec_field->id)); ?>">Remove</a>
         </div>
      </div>
   </td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr>
    <td colspan="6" align="center">
      <?php echo $rs_fields->links('admin.customfields.custom_pagination'); ?>

    </td>
</tr><?php /**PATH C:\xampp\htdocs\old_crm\resources\views/admin/customfields/fields_pagination.blade.php ENDPATH**/ ?>