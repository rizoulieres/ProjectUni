<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Mes annonces de cours</h1>
</div>

<div class="row">

<?php foreach ($liste as $value) { ?>
	<div class="col-4 mb-2">
		<div class="card">
			<div class="card-header col-12 text-xl-center"><?php echo $value->titre ?> <span class="badge badge-pill badge-primary"> <?php echo $value->libelle ?></span></div>
			<div class="card-body">
				<div>
					<a class="btn btn-outline-warning col-12 mb-2" href="<?php echo site_url('Cours/modifier/'.$value->id_cours) ?>" role="button">Modifier</a>
					<a class="btn btn-outline-danger col-12" href="<?php echo site_url('Cours/supp/'.$value->id_cours) ?>" role="button">Supprimer</a>
				</div>
				<div>
					<div class="col-12"><hr></div>
					<span class="badge badge-success col-12"><?php echo $value->prix ?> € /h</span>
				</div>
			</div>
			<div class="card-footer">
				<?php if($value->lundi) { ?><span class="badge badge-pill badge-primary">Lundi</span> <?php } ?>
				<?php if($value->mardi) { ?><span class="badge badge-pill badge-secondary">Mardi</span> <?php } ?>
				<?php if($value->mercredi) { ?><span class="badge badge-pill badge-success">Mercredi</span> <?php } ?>
				<?php if($value->jeudi) { ?><span class="badge badge-pill badge-danger">Jeudi</span> <?php } ?>
				<?php if($value->vendredi) { ?><span class="badge badge-pill badge-warning">Vendredi</span> <?php } ?>
				<?php if($value->samedi) { ?><span class="badge badge-pill badge-info">Samedi</span> <?php } ?>
				<?php if($value->dimanche) { ?><span class="badge badge-pill badge-dark">Dimanche</span> <?php } ?>
			</div>
		</div>
	</div>

<?php } ?>

</div>

<br>
