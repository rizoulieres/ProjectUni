<div class="limiter">
	<div class="container-login100" style="background-image: url(<?php echo img_url('bg-01.jpg')?>);">
		<div class="wrap-login100 p-l-75 p-r-75 p-t-85 p-b-74">
			<form class="login100-form validate-form"  method="post">
					<span class="login100-form-title p-b-49">
						S'inscrire
					</span>

				<?php if(isset($checkUsername)) { ?>
				<div class="alert alert-warning" role="alert">
					<i class="fas fa-exclamation-circle"></i> <?php echo $checkUsername ?>
				</div>
				<?php } ?>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username requis">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Votre identifiant">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Nom requis">
					<span class="label-input100">Nom</span>
					<input class="input100" type="text" name="nom" placeholder="Dupond">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Prénom requis">
					<span class="label-input100">Prénom</span>
					<input class="input100" type="text" name="prenom" placeholder="Jean">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Mail requis">
					<span class="label-input100">Mail personel ou universitaire</span>
					<input class="input100" type="email" name="email" placeholder="jean.dupond@nomdedomaine.com">
					<span class="focus-input100" data-symbol="&#xf15a;"></span>
				</div>

				<div class="validate-input m-b-23">
					<span class="label-input100">Université</span>
					<select name="univ" class="form-control">
						<?php foreach ($univ as $id => $value) { ?>
							<option value="<?php echo $value->id_univ ?>"><?php echo $value->libelle ?></option>
						<?php  } ?>

					</select>

				</div>

				<div class="wrap-input100 validate-input" data-validate="Mot de passe requis">
					<span class="label-input100">Mot de passe</span>
					<input class="input100" type="password" name="pass" placeholder="***************">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<br>
				<br>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
							S'inscrire
						</button>
					</div>
				</div>

				<div class="flex-col-c p-t-100">
						<span class="txt1 p-b-17">
							Si tu as déjà un compte
						</span>

					<a href="<?php echo site_url('welcome/connexion') ?>" class="txt2">
						Connecte toi !
					</a>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
