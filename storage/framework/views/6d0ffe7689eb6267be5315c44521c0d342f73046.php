<script>
	toastr.options = {
        "closeButton": true,
        "timeOut": 10000,
        "extendedTimeOut": 5000,
    }
	<?php if($errors->any()): ?>
	    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	     	toastr.error('<?php echo e($error); ?>');
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</script>