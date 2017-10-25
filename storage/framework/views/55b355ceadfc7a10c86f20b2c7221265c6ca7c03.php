<?php $__env->startSection('title'); ?>
	Log In
<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
	<div id="login_form">
		<form method="POST" action="login">
		<?php echo e(csrf_field()); ?>

			<div class="field">
				<p class="control has-icons-left">
					<input name="username" class="input" type="text" placeholder="Username">
					<span class="icon is-small is-left">
						<i class="fa fa-user"></i>
					</span>
					<!-- <span class="icon is-small is-right">
						<i class="fa fa-check"></i>
					</span> -->
				</p>
			</div>
			<div class="field">
				<p class="control has-icons-left">
					<input name="password" class="input" type="password" placeholder="Password">
					<span class="icon is-small is-left">
						<i class="fa fa-lock"></i>
					</span>
				</p>
			</div>
			<div class="field">
				<p class="control">
					<button type="submit" class="button is-primary is-pulled-right"><i class="fa fa-sign-in"></i> Login</button>
				</p>
			</div>
		</form>
	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>