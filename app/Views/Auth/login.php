<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card o-hidden border-0 shadow-lg my-5 mx-0">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-md-7">
							<img src="img/bg-book.jpg" style="height: 100%; width: 100%; object-fit: fill" alt="">
						</div>
						<div class="col-md-5">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
								</div>
								<?= view('Myth\Auth\Views\_message_block') ?>
								<form class="user" action="<?= route_to('login') ?>" method="post">
									<?= csrf_field() ?>

									<?php if ($config->validFields === ['email']) : ?>
										<div class="form-group">
											<input type="email" name="login" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
											<?= session('errors.login') ?>
										</div>
									<?php else : ?>
										<div class="form-group">
											<input type="text" name="login" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?= lang('Auth.emailOrUsername') ?>">
											<?= session('errors.login') ?>
										</div>
									<?php endif; ?>

									<div class="form-group">
										<input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
										<?= session('errors.password') ?>
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox small">
											<label class="custom-control-label" for="customCheck">
												<input type="checkbox" name="remember" class="custom-control-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
												<?= lang('Auth.rememberMe') ?>
											</label>
										</div>
									</div>
									<button class="btn btn-primary btn-user btn-block" type="submit">
										<?= lang('Auth.loginAction') ?>
									</button>
								</form>
								<hr>
								<!-- <div class="text-center">
									<a class="small" href="forgot-password.html">Forgot Password?</a>
								</div> -->
								<div class="text-center">
									<?php if ($config->allowRegistration) : ?>
										<p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>