<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Liste des manuels disponibles</h1>
</div>

<div class="row">

<?php $color = "";
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
						<div class="col-12 mb-4 text-center" ><a class="col-12 btn btn-warning text-white" data-toggle="modal" data-target="#exampleModal<?php echo $value->id_support ?>" href="">Détails</a></div>
						<div class="col-12 mb-4 text-center"><a href="<?php echo site_url('Manuel/reserver/'.$value->id_support) ?>" class="col-12 btn btn-danger text-white">Réserver</a></div>
						<div class="col-12 align-center text-center"><b><?php echo $value->prix ?> € </b></div>
					</div>
				</div>
			</div>


<!-- ----------------------modal----------------------------- -->
		<div class="modal fade" id="exampleModal<?php echo $value->id_support ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-light bg-primary">
		        <h5 class="modal-title  " id="exampleModalLabel">Détails du support</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <?php 
		        	echo "<p>Titre : ".$value->titre."</p><br>";
		        	echo "<p>Auteur: ".$value->auteur."</p><br>";
		        	echo "<p>Editeur: ".$value->editeur."</p><br>";
		        	echo "<p>Année de parution: ".$value->annee_edition."</p><br>";
		        	echo "<p>Description :".$value->description."</p><br>";
		        	//echo img_manuel($value->image);
		        ?>
		      </div >
		      <div class="modal-footer bg-light">
		      	Copyright © UnivShop 2019
		      </div>
		    </div>
		  </div>
		</div>


		</div>
	</div>
<?php  } ?>

</div>

<br>
