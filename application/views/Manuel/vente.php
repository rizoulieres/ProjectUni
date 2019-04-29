<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Vendre un manuel</h1>
</div>

<form class="card bg-light">

	<div class="form-row card-body">
		<div class="col-12 mb-3"><input class="form-control form-control-lg" type="text" placeholder="Titre de l'annonce"></div>
		<div class="col-12 mb-3"><hr></div>
		<div class="col-12 mb-3">Type d'annonce :</div>
		<div class="col-12 mb-3">
			<!-- Default inline 1-->
			<div class="custom-control custom-radio custom-control-inline">
				<input checked onclick="show1()" type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
				<label class="custom-control-label" for="defaultInline1">Vente</label>
			</div>

			<!-- Default inline 2-->
			<div class="custom-control custom-radio custom-control-inline">
				<input onclick="show2()" type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
				<label class="custom-control-label" for="defaultInline2">Prêt</label>
			</div>

		</div>

		<div class="col-6 mb-3">
			<label for="theme">Thème</label>
			<select class="form-control" id="theme">
				<?php foreach ($mat as $id => $value) { ?>
					<option value="<?php echo $value->id_matiere ?>"><?php echo $value->libelle ?></option>
				<?php  } ?>
			</select>
		</div>
		<div class="col-6 mb-3" >
			<div id="dateRetour" style="display: none">
				<label for="pret">Durée du prêt</label>
				<select class="form-control" id="pret">
						<option value="1">1 semaine</option>
						<option value="2">2 semaines</option>
						<option value="3">3 semaines</option>
				</select>
			</div>
		</div>

		<div class="col-4 mb-3">
			<label for="annee">Année d'édition</label>
			<input type="text" class="form-control" id="annee" placeholder="2012">
		</div>
		<div class="col-4 mb-3">
			<label for="auteur">Auteur</label>
			<input type="text" class="form-control" id="auteur" placeholder="Jean">
		</div>
		<div class="col-4 mb-3">
			<label for="editeur">Editeur</label>
			<input type="text" class="form-control" id="editeur" placeholder="Dupond">
		</div>

		<div class="col-12 mb-3">
			<div class="form-group">
				<label for="desc">Description</label>
				<textarea class="form-control" id="desc" rows="7"></textarea>
			</div>
		</div>

		<div class="col-12 mb-2">
			Prix
		</div>

		<div class="col-6 mb-3">
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="20" name="prix">
				<div class="input-group-append">
					<span class="input-group-text">€</span>
				</div>
			</div>
		</div>

		<div class="col-6 mb-3">
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="photo" name="photo">
					<label class="custom-file-label" for="photo">Choisir une photo du manuel</label>
				</div>
			</div>
		</div>
		<div class="col-12 mb-3">
			<button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
				<span class="text" id="btnValid">Mettre en vente</span>
			</button>
		</div>
	</div>
</form>

<br>
