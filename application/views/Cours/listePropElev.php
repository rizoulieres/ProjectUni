<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Liste des propositions reçu</h1>
</div>
<?php $date =  date('Y-m-d', strtotime('-1 days')); ?>
<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Matières</th>
		<th scope="col">Professeur</th>
		<th scope="col">Date</th>
		<th scope="col">Heure</th>
		<th scope="col">Action</th>
	</tr>
	</thead>
	<tbody>


	<?php foreach ($liste as $value) {?>
	<tr>
		<th scope="row"><?php echo $value->id_cours ?></th>
		<td><?php echo $value->libelle ?></td>
		<td><a class="col-12 badge badge-primary" href="<?php echo site_url('Main/note_prof/'.$value->id_prof) ?>" >
				<span class="mr-2 d-none d-lg-inline text-white small"><?php echo $value->prenom." ".$value->nom; ?></span>
				<img class="img-profile rounded-circle" width="30px" height="30px" src="<?php echo ($value->photo == '' ? img_profil('vide.png') : img_profil($value->photo)) ?>">
			</a></td>
		<td><?php echo $value->date ?></td>
		<td><?php echo $value->heure ?></td>
		<td>
			<?php if((!$value->eleveA) && ($date<$value->date)) { ?>
			<a href="<?php echo site_url('Cours/annuler/'.$value->id_cours_valide) ?>" class="btn btn-danger btn-circle"><i class="fas fa-ban"></i></a>
			<a href="<?php echo site_url('Cours/modif/'.$value->id_cours_valide) ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
			<a href="<?php echo site_url('Cours/valider/'.$value->id_cours_valide) ?>" class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>
			<?php }else if($value->eleveA) {echo "Vous avez refusé ce cours"; }
			else if(!$date<$value->date) {echo "Vous n'avez pas répondu";} ?>
		</td>

	</tr>
	<?php } ?>
	</tbody>
</table>
<br>
<div class="col-12"><hr></div>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Liste des propositions envoyées</h1>
</div>

<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Matières</th>
		<th scope="col">Professeur</th>
		<th scope="col">Date</th>
		<th scope="col">Heure</th>
		<th scope="col">Etat</th>
	</tr>
	</thead>
	<tbody>


	<?php foreach ($liste2 as $value) {?>
		<tr>
			<th scope="row"><?php echo $value->id_cours ?></th>
			<td><?php echo $value->libelle ?></td>
			<td><a class="col-12 badge badge-primary" href="<?php echo site_url('Main/note_prof/'.$value->id_prof) ?>" >
				<span class="mr-2 d-none d-lg-inline text-white small"><?php echo $value->prenom." ".$value->nom; ?></span>
				<img class="img-profile rounded-circle" width="30px" height="30px" src="<?php echo ($value->photo == '' ? img_profil('vide.png') : img_profil($value->photo)) ?>">
				</a></td>
			<td><?php echo $value->date ?></td>
			<td><?php echo $value->heure ?></td>
			<?php if(!$value->profA) { ?>
				<td>En attente du professeur</td>
			<?php } else echo "<td>Refusé par le professeur</td>"; ?>

		</tr>
	<?php } ?>
	</tbody>
</table>

<br>
