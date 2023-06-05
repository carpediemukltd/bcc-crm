<?php
$title = "Profile";
?>

<?php $__env->startSection('content'); ?>

<?php
$notificationService = app('App\Services\NotificationService');
$helperService = app('App\Services\HelperService');
$authUser = Auth()->user();
?>

<div class="container">
    <div class="row">
        <div class="md-col-10">
            <h3>My Profile</h3>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-block fadeInUp animated" id="alert_success_session">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div class="es_alert">
            <div class="alert_icon">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <div class="alert_text">
                <h5>Success!</h5>
                <p><?php echo e($message); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-block fadeInUp animated">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div class="es_alert">
            <div class="alert_icon">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            </div>
            <div class="alert_text">
                <h5>Info!</h5>
                <p><?php echo e($message); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger fadeInUp animated">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div class="es_alert">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert_icon">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                </div>
                <div class="alert_text">
                    <h5>Info!</h5>
                    <p><?php echo e($error); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="<?php echo e(route('user.editProfile')); ?>" style="color:000;">Edit Profile</a>
                    |
                    <a href="<?php echo e(route('user.lead')); ?>" style="color:000;">View Lead</a>
                </div>
                <div class="panel-body">
                    <h3>Full name: <?php echo e(auth()->user()->full_name); ?></h3>
                    <h3>Email: <?php echo e(auth()->user()->email); ?></h3>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
<br><br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm\resources\views/profile/index.blade.php ENDPATH**/ ?>