<div class="row ms-3">
    <div class="col-12">

        <a href="index.php?page=nouveau" class="btn btn-info btn-sm mb-3 mt-3">Ajouter un étudiant</a>

        <table class="table caption-top table-striped">
            <thead>
                <th class="text-center border-start">#id</th>
                <th class="text-center border-start">Prénom</th>
                <th class="text-center border-start">Nom</th>
                <th class="text-center border-start">Date de naissance</th>
                <th class="text-center border-start">Adresse courriel</th>
                <th class="text-center border-start">CV</th>
                <th class="text-center border-start">Rôle</th>
                <th class="text-center border-start">Date de mise à jour</th>
                <th class="text-center border-start border-end">Actions</th>
            </thead>
            <tbody>
                <?php foreach( $etudiants as $e ) : ?>
                <tr>
                        <td class="border-start"><?php echo( $e[ "id" ] ); ?></td>
                        <td class="border-start"><?php echo( $e[ "prenom" ] ); ?></td>
                        <td class="border-start"><?php echo( $e[ "nom" ] ); ?></td>
                        <td class="border-start"><?php echo( ( new DateTime( $e[ "dt_naissance" ] ) )->format( "d/m/Y" ) ); ?></td>
                        <td class="border-start"><?php echo( $e[ "email" ] ); ?></td>
                        <td class="border-start"><?php echo( substr( $e[ "cv" ] , 0 , 10 ) . "..." ); ?></td>
                        <td class="border-start"><?php echo( $e[ "isAdmin" ] === 1 ? "Admin" : "Etudiant" ); ?></td>
                        <td class="border-start"><?php echo( ( new DateTime( $e[ "dt_mise_a_jour" ] ) )->format( "d/m/y à h:m:s" ) ); ?></td>
                        <td class="text-center border-start border-end">
                            <a href="index.php?page=etudiant&id=<?php echo( $e[ 'id' ] ); ?>" class="btn btn-info btn-sm">Visualiser</a>
                            <a href="index.php?page=modifier&id=<?php echo( $e[ 'id' ] ); ?>" class="btn btn-info btn-sm">Modifier</a>
                            <a href="index.php?page=supprimer&id=<?php echo( $e[ 'id' ] ); ?>" class="btn btn-info btn-sm">Supprimer</a>
                        </td>
                </tr> 
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>