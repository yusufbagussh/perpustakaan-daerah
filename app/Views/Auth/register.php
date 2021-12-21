<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form action="<?= route_to('register') ?>" class="login100-form validate-form" method="post">
                        <?= csrf_field() ?>
                    <span class="login100-form-title p-b-34">
                        <?=lang('Auth.register')?>
			        </span>
					<?= view('Myth\Auth\_message_block') ?>
					<div class="wrap-input100 rs-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100 <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" type="email" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100 <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" type="text" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 rs-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100 <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 rs-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100 <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" type="password" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							<?=lang('Auth.register')?>
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Already registered?
						</span>
						<a href="<?= route_to('login') ?>" class="txt3">
							<?=lang('Auth.signIn')?>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
<?= $this->endSection(''); ?>