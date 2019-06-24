<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liste Manuels Empruntés</h1>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">titre</th>
        <th scope="col">auteur</th>
        <th scope="col">editeur</th>
        <th scope="col">année de parution</th>
        <th scope="col">Description</th>
        <th scope="col">Date d'emprunt</th>
        <th scope="col">Date retour</th>
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
            <td><?php echo $value->date_pret ?></td>
            <td><?php echo $value->date_retour ?></td>
             <td>
                <a href="<?php echo site_url('Manuel/retourner/'.$value->id_support) ?>" class="btn btn-danger btn-circle"><i class="fas fa-reply"></i></a>
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>
