x<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Proposer un nouvel horaire</h1>
</div>

<form enctype="multipart/form-data" class="card bg-light" method="post">

	<div class="form-row card-body">

		<div class="col-12">Jour du cours : <?php echo $info->date ?></div>
		<div class="col-12"><hr></div>
		<div class="col-6">Heure : <input required name="heure" type="time" min="8:00" max="21:00" value="<?php echo $info->heure ?>"></div>
		<div class="col-6"> Nombre d'heure : <input required name="nb" type="number" min="1" max="5" value="<?php echo $info->nb_heure ?>"> </div>

		<div class="col-12"><hr></div>
		<div class="col-6">

		<button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
			<span class="text">Proposer ce nouvel horaire</span>
		</button>
			</div>
	</div>
</form>


<br>
