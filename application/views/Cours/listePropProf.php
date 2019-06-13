<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Liste des propositions reçu</h1>
</div>

<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Matières</th>
		<th scope="col">Eleve</th>
		<th scope="col">Date</th>
		<th scope="col">Heure</th>
		<th scope="col">Action</th>
	</tr>
	</thead>
	<tbody>


	<?php foreach ($liste as $value) {?>
	<tr>
		<th scope="row"><?php echo $value->id_cours ?></th>
		<td><?php echo $value->id_matiere ?></td>
		<td><?php echo $value->id_eleve ?></td>
		<td><?php echo $value->date ?></td>
		<td><?php echo $value->heure ?></td>
		<td><a href="" class="btn btn-success btn-circle"></a></td>

	</tr>
	<?php } ?>
	</tbody>
</table>

<br>
