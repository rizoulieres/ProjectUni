<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Mes prochains cours</h1>
</div>

<input type="hidden" id="id_eleve" value="<?php echo $id_eleve ?>">

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
			<?php $date =  date('Y-m-d', strtotime('-1 days')); ?>
			<th scope="row"><?php echo $value->id_cours ?></th>
			<td><?php echo $value->libelle ?></td>
			<td><a class="col-12 badge badge-primary" href="<?php echo site_url('Main/note_prof/'.$value->id_prof) ?>" >
					<span class="mr-2 d-none d-lg-inline text-white small"><?php echo $value->prenom." ".$value->nom; ?></span>
					<img class="img-profile rounded-circle" width="30px" height="30px" src="<?php echo ($value->photo == '' ? img_profil('vide.png') : img_profil($value->photo)) ?>">
				</a></td>
			<td><?php echo $value->date ?></td>
			<td><?php echo $value->heure ?></td>
			<?php if((!$value->eleveA) && (!$value->profA) && ($date<=$value->date))  {?>
				<td><a href="<?php echo site_url('Cours/annuler/'.$value->id_cours_valide) ?>" class="btn btn-danger btn-circle"><i class="fas fa-ban"></i></a><a href="mailto:<?php echo $value->mail ?>" class="btn btn-success btn-circle"><i class="fas fa-paper-plane"></i></a></td>
			<?php } ?>
			<?php if(($value->eleveA)) {?>
				<td>Vous avez annulé ce cours <a href="mailto:<?php echo $value->mail ?>" class="btn btn-success btn-circle"><i class="fas fa-paper-plane"></i></a></td>
			<?php } ?>
			<?php if(($value->profA)) {?>
				<td>Le professeur à annulé ce cours</td>
			<?php } ?>
			<?php if(($date>=$value->date)) {?>
				<td>Vous ne pouvez plus annulé <a href="mailto:<?php echo $value->mail ?>" class="btn btn-success btn-circle"><i class="fas fa-paper-plane"></i></a></td>
			<?php } ?>

		</tr>
	<?php } ?>
	</tbody>
</table>

<div id='calendar'></div>


<br>
