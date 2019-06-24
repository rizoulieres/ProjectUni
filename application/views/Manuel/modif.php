<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Modifier un manuel</h1>
</div>

<form enctype="multipart/form-data" class="card bg-light" method="post">
<input type="hidden" id="type" value="<?php echo $info->id_type; ?>">
	<div class="form-row card-body">
		<div class="col-12 mb-3"><input class="form-control form-control-lg" type="text" placeholder="Titre de l'annonce" value="<?php echo $info->titre ?>" name="titre" required></div>
		<div class="col-12 mb-3"><hr></div>
		<div class="col-12 mb-3">Type d'annonce :</div>
		<div class="col-12 mb-3">
			<!-- Default inline 1-->
			<div class="custom-control custom-radio custom-control-inline">
				<input value="1" <?php echo (($info->id_type==1) ? "checked" : ""); ?> onclick="show1()" type="radio" class="custom-control-input" id="radio1" name="type">
				<label class="custom-control-label" for="radio1">Vente</label>
			</div>

			<!-- Default inline 2-->
			<div class="custom-control custom-radio custom-control-inline">
				<input value="2" onclick="show2()"  <?php echo (($info->id_type==2) ? "checked" : ""); ?> type="radio" class="custom-control-input" id="radio2" name="type">
				<label class="custom-control-label" for="radio2">Prêt</label>
			</div>

		</div>

		<div class="col-6 mb-3">
			<label for="theme">Thème</label>
			<select class="form-control" id="theme" name="theme">
				<?php foreach ($mat as $id => $value) { ?>
					<option <?php echo (($info->id_matiere==$value->id_matiere) ? "selected" : ""); ?> value="<?php echo $value->id_matiere ?>"><?php echo $value->libelle ?></option>
				<?php  } ?>
			</select>
		</div>
		<div class="col-6 mb-3" >
			<div id="dateRetour" style="display: none">
				<label for="pret">Durée du prêt</label>
				<select class="form-control" id="pret" name="dureePret">
						<option value="1">1 semaine</option>
						<option value="2">2 semaines</option>
				</select>
			</div>
		</div>

		<div class="col-4 mb-3">
			<label for="annee">Année d'édition</label>
			<input type="text" class="form-control" id="annee" placeholder="2012" value="<?php echo $info->annee_edition ?>" name="anneeEdit">
		</div>
		<div class="col-4 mb-3">
			<label for="auteur">Auteur</label>
			<input type="text" class="form-control" id="auteur" placeholder="Jean" value="<?php echo $info->auteur ?>" name="auteur">
		</div>
		<div class="col-4 mb-3">
			<label for="editeur">Editeur</label>
			<input type="text" class="form-control" id="editeur" placeholder="Dupond" value="<?php echo $info->editeur ?>" name="editeur">
		</div>

		<div class="col-12 mb-3">
			<div class="form-group">
				<label for="desc">Description</label>
				<textarea class="form-control" id="desc" name="description" rows="7" value="" required><?php echo $info->description ?></textarea>
			</div>
		</div>

		<div class="col-12 mb-2">
			Prix
		</div>

		<div class="col-6 mb-3">
			<div id="prix" class="input-group mb-3">
				<input type="text" class="form-control" placeholder="20" value="<?php echo $info->prix ?>" name="prix" required>
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
		<div class="col-6 mb-3">
			Photo actuelle :<img height="200" width="200" src="<?php echo img_manuel($info->image) ?>">
		</div>
		<div class="col-6 mb-3">
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
