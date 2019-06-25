<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mes manuels réservés</h1>
</div>
<?php $date =  date('Y-m-d', strtotime('-1 days')); ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Editeur</th>
        <th scope="col">Année d'édition</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($liste as $value) {?>
        <tr>
            <th scope="row"><?php echo $value->id_support ?></th>
            <td><?php echo $value->titre ?></td>
            <td><?php echo $value->auteur ?></td>
            <td><?php echo $value->editeur ?>
            <td><?php echo $value->annee_edition ?></td>
            <td><?php echo $value->description ?></td>

           <td>
                <a href="<?php echo site_url('Manuel/annuler/'.$value->id_support) ?>" class="btn btn-danger btn-circle"><i class="fas fa-ban"></i></a>
                <a href="<?php echo site_url('Manuel/valider/'.$value->id_support) ?>" class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>
