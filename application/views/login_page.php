<div class="limiter">
	<div class="container-login100" style="background-image: url(<?php echo img_url('bg-01.jpg')?>);">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
						Se connecter
					</span>

				<?php if(isset($login_error)) { ?>
					<div class="alert alert-warning" role="alert">
						<i class="fas fa-exclamation-circle"></i> <?php echo $login_error ?>
					</div>
				<?php } ?>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username requis">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Votre identifiant">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Mot de passe requis">
					<span class="label-input100">Mot de passe</span>
					<input class="input100" type="password" name="pass" placeholder="***************">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<div class="text-right p-t-8 p-b-31">
					<a href="#">
						Mot de passe oublié ?
					</a>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>
				</div>

				<div class="flex-col-c p-t-100">
						<span class="txt1 p-b-17">
							Ou s'inscrire avec une adresse mail
						</span>

					<a href="<?php echo site_url('welcome/inscription') ?>" class="txt2">
						S'inscrire
					</a>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
