
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Vous notez <?php echo $user->prenom." ".$user->nom?> en qualité de <?php echo $metier ?> </h1>
</div>

<form method="post" class="card">

	<div class="col-12">Entrez une note entre 0 et 5 : <input name="note" class="form-control" required type="number" min="0" max="5"></div>
	<div class="col-12"><hr></div>
	<div class="col-12 mb-3">
		<div class="form-group">
			<label for="desc">Description</label>
			<textarea class="form-control" id="desc" name="description" rows="7"  required></textarea>
		</div>
	</div>

	<div class="col-12 mb-3">
		<button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
			<span class="text">Notez le !</span>
		</button>
	</div>

</form>

<hr>



