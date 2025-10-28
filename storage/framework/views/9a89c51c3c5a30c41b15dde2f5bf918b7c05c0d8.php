<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MAINS ORBIT :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/plugins/fontawesome-free/css/all.min.css')); ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/adminlte.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/custom.css')); ?>">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Administrative Panel</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form action="<?php echo e(route('admin.authenticate')); ?>" method="post">
						<?php echo csrf_field(); ?>
				  		<div class="input-group mb-3">
							<input type="text" value="<?php echo e(old('email')); ?>" name="email"<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> id="email" class="form-control" placeholder="Email">
							
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
						</div>
						<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<p class="is_invalid text-danger"><?php echo e($message); ?></p>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				  		<div class="input-group mb-3">
							<input type="password" name="password" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> id="password" class="form-control" placeholder="Password">
							
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
						</div>
				  		<div class="input-group mb-3">
							<label class="sr-only control-label" for="message">Captcha</label>
							<img src="<?php echo e(url('/captcha')); ?>" id="captcha-img" alt="Captcha Image">
							<button type="button" class="btn btn-secondary ml-2" onclick="refreshCaptcha()">
								<i class="fas fa-sync"></i> 
							</button>  
							<input type="text" name="captcha" class="form-control" placeholder="Captcha" required>   
							<?php if($errors->has('captcha')): ?>
								<div class="alert alert-danger">
									<?php echo e($errors->first('captcha')); ?>

								</div>
							<?php endif; ?>
							
						</div>
						<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<p class="is_invalid text-danger"><?php echo e($message); ?></p>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				  		<div class="row">
							
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
							</div>
							<!-- /.col -->
				  		</div>
					</form>
		  		
			  	</div>
			</div>
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="<?php echo e(asset('public/assets/admin/plugins/jquery/jquery.min.js')); ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo e(asset('public/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo e(asset('public/assets/admin/js/adminlte.min.js')); ?>"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo e(asset('public/assets/admin/js/demo.js')); ?>"></script>
		<script>
			function refreshCaptcha() {
				document.getElementById('captcha-img').src = "<?php echo e(url('/captcha')); ?>?rand=" + Math.random();
			}
		</script>
	</body>
</html>
<?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/login.blade.php ENDPATH**/ ?>