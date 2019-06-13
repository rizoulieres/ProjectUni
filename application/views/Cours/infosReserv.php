
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Cours de <?php echo $mat ?></h1>
</div>

<form enctype="multipart/form-data" class="card bg-light" method="post">

	<div class="form-row card-body">
		<div class="col-12 mb-3"><input class="form-control form-control-lg" disabled type="text" placeholder="Titre de l'annonce" name="titre" value="<?php echo $info->titre ?>" required></div>
		<div class="col-12 mb-3"><hr></div>

		<div class="col-12 mb-2"><a class="col-12 badge badge-primary" href="<?php echo site_url('Main/note_prof/'.$info->id_user) ?>" >
				<span class="mr-2 d-none d-lg-inline text-white small"><?php echo $info->prenom." ".$info->nom; ?></span>
				<img class="img-profile rounded-circle" width="30px" height="30px" src="<?php echo ($info->photo == '' ? img_profil('vide.png') : img_profil($info->photo)) ?>">
			</a></div>

		<div class="col-6 mb-3">
			<label for="mat">Matière</label>
			<input type="text" disabled value="<?php echo $mat ?>" class="form-control" id="mat" name="mat">

		</div>




		<div class="col-12 mb-3">
			<div class="form-group">
				<label for="desc">Description</label>
				<textarea class="form-control" id="desc" disabled name="description" rows="7"  required><?php echo $info->description ?></textarea>
			</div>
		</div>

		<div class="col-12 mb-2">
			Prix (/h)
		</div>

		<div class="col-12 mb-3">
			<div id="prix" class="input-group mb-3">
				<input type="text" class="form-control" placeholder="15" name="prix" value="<?php echo $info->prix ?>" disabled required>
				<div class="input-group-append">
					<span class="input-group-text">€</span>
				</div>
			</div>
		</div>

		<div class="col-12 mb-3"><hr></div>
		<div class="col-12 mb-3"><h3 class="h4">Proposer votre créneaux</h3></div>
		<div class="col-12 mb-3">Les jours où <b><?php echo $info->prenom." ".$info->nom; ?></b> est disponible</div>
		<p></p>
		<?php if($info->lundi) { ?><span class="badge badge-pill badge-primary mr-4">Lundi</span> <?php } ?>
		<?php if($info->mardi) { ?><span class="badge badge-pill badge-secondary mr-4">Mardi</span><?php } ?>
		<?php if($info->mercredi) { ?><span class="badge badge-pill badge-success mr-4">Mercredi</span><?php } ?>
		<?php if($info->jeudi) { ?><span class="badge badge-pill badge-danger mr-4">Jeudi</span><?php } ?>
		<?php if($info->vendredi) { ?><span class="badge badge-pill badge-warning mr-4">Vendredi</span><?php } ?>
		<?php if($info->samedi) { ?><span class="badge badge-pill badge-info mr-4">Samedi</span><?php } ?>
		<?php if($info->dimanche) { ?><span class="badge badge-pill badge-dark mr-4">Dimanche</span><?php } ?>

		<div class="col-12 mt-4"><p>Date: <input type="date" name="date" required id="datepicker"> et Heure : <input type="time" required name="heure" id="time"></p></div>

		<div class="col-12 mb-3"><hr></div>

		<div class="col-12 mb-3">
			<button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
				<span class="text">Proposer ce crénaux</span>
			</button>
		</div>
	</div>
</form>

<br>

<input type="hidden" id="lundiJs" value="<?php echo $info->lundi; ?>" />
<input type="hidden" id="mardiJs" value="<?php echo $info->mardi; ?>" />
<input type="hidden" id="mercrediJs" value="<?php echo $info->mercredi; ?>" />
<input type="hidden" id="jeudiJs" value="<?php echo $info->jeudi; ?>" />
<input type="hidden" id="vendrediJs" value="<?php echo $info->vendredi; ?>" />
<input type="hidden" id="samediJs" value="<?php echo $info->samedi; ?>" />
<input type="hidden" id="dimancheJs" value="<?php echo $info->dimanche; ?>" />





