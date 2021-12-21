<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?= route_to('login') ?>" method="post" class="login100-form validate-form"><?= csrf_field() ?>
					<span class="login100-form-title p-b-34">
						<?= lang('Auth.loginTitle') ?>
					</span>
					<?= view('Myth\Auth\Views\_message_block') ?>

						<?php if ($config->validFields === ['email']) : ?>
							<div class="wrap-input100 rs-wrap-input100 validate-input m-b-20">
								<input type="email" class="input100 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
								<span class="focus-input100"></span>
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php else : ?>
							<div class="wrap-input100 rs-wrap-input100 validate-input m-b-20">
								<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
								<span class="focus-input100"></span>
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php endif; ?>
							<div class="wrap-input100 rs-wrap-input100 validate-input m-b-20">
								<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
								<span class="focus-input100"></span>
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							<?= lang('Auth.loginAction') ?>
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239">
						<?php if ($config->allowRemembering) : ?>
							<div class="form-check txt1">
								<label class="form-check-label">
									<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
									<?= lang('Auth.rememberMe') ?>
								</label>
							</div>
						<?php endif; ?>
					</div>
					<div class="w-full text-center">
						<?php if ($config->allowRegistration) : ?>
							<p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
						<?php endif; ?>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
</div>
<div id="dropDownSelect1"></div>

<?= $this->endSection(''); ?>