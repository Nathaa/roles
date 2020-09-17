<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">

		<div class="container h-100">

			<div class="row justify-content-md-center h-100">

				<div class="card-wrapper">


					<div class="card fat">
                        <div class="brand">
                            <img src="../img/logo.jpg"  alt="logo">
                        </div>
					<div class="card-body">

							<form method="POST" action="<?php echo e(route('login')); ?>">
								<?php echo e(csrf_field()); ?>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Correo Electronico:')); ?></label>

                                    <div class="col-md-8">
										<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

										<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
									<?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Contraseña:')); ?></label>

                                    <div class="col-md-8">
										<input id="password" type="password" class="form-control" name="password" required>

										<?php if($errors->has('password')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('password')); ?></strong>
											</span>
										<?php endif; ?>
                                    </div>
                                </div>


								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Recuerdame</label>
									</div>
                                </div>
                                
                                <div class="form-group m-8">
                                    <div class="col-md-10 col-md-offset-8">
                                        <button type="submit" class="btn btn-primary">
                                            Inicio de Sesion
                                        </button>
                                    </div>
                                </div>



                                <div class="mt-4 text-left">
                                     <a class="nav-link" href="<?php echo e(route('register')); ?>">¿No estas registrado?</a>
                                     <?php if(Route::has('password.request')): ?>
                            
                                <?php endif; ?>

                                </div>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/auth/login.blade.php ENDPATH**/ ?>