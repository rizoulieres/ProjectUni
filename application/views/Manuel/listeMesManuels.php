<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Liste des manuels disponibles</h1>
</div>

<div class="row">

<?php
foreach ($liste as $id => $value) {
	if($value->id_type == 1){
		$color ="success";
	}else{
		$color ="warning";
	}?>
	<div class="<?php echo "col-4 card mb-3 border-left-".$color." bg-gray-300" ?>">

		<div class="card-body col-12">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 text-center text-dark"><?php echo $value->titre ?></div>

				<div class="col-12 text-center "><hr></div>

				<img class="col-6 mb-3" height="150" width="150" src="<?php echo img_manuel($value->image) ?>">
				<div class="col-6 mb-3">
					<div class="row justify-content-center">
						<div class="col-12 mb-4 text-center"><a href="" class="col-12 btn btn-warning text-white">Modifier</a></div>
						<div class="col-12 mb-4 text-center"><a href="" class="col-12 btn btn-danger text-white">Supprimer</a></div>
						<div class="col-12 align-center text-center"><b><?php echo $value->prix ?> € </b></div>
					</div>
				</div>
			</div>



		</div>
	</div>
<?php  } ?>

</div>

<br>
