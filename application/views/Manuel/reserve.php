<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liste Manuel réservé</h1>
</div>
<?php $date =  date('Y-m-d', strtotime('-1 days')); ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">titre</th>
        <th scope="col">auteur</th>
        <th scope="col">editeur</th>
        <th scope="col">année de parution</th>
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
               <!-- <a href="<?php echo site_url('Cours/valider/'.$value->id_cours_valide) ?>" class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>-->
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>
