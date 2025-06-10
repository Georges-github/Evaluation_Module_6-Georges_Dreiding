<main class="container">

    <br>

    <h1>Etudiant : <?php echo( $etudiant[ 0 ][ "prenom" ] ); ?> <?php echo( $etudiant[ 0 ][ "nom" ] ); ?></h1>

    <?php foreach ( $erreurs as $erreur ) : ?>
        <div class="alert bg-warning mt-3"><?php echo( $erreur );?></div>
    <?php endforeach ?>

    <hr>

    <h5>Identifiant dans la base de données</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "id" ] ); ?></p>

    <h5>Prénom</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "prenom" ] ); ?></p>

    <h5>Nom</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "nom" ] ); ?></p>

    <h5>Date de naissance</h5>
    <p class="fst-italic"><?php echo( ( new DateTime( $etudiant[ 0 ][ "dt_naissance" ] ) )->format( "d/m/Y" ) ); ?></p>

    <h5>C.V.</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "cv" ] ); ?></p>

    <h5>Adresse courriel</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "email" ] ); ?></p>

    <h5>Rôle</h5>
    <p class="fst-italic"><?php echo( $etudiant[ 0 ][ "isAdmin" ] === 1 ? "Admin" : "Etudiant" ); ?></p>

    <h5>Date et heure de mise à jour de ces informations</h5>
    <p class="fst-italic"><?php echo( ( new DateTime( $etudiant[ 0 ][ "dt_mise_a_jour" ] ) )->format( "d/m/y à h:m:s" ) ); ?></p>

    <hr>

    <a href="<?php echo( URL_SITE ); ?>index.php?page=etudiants" class="btn btn-info btn-sm">Retour à liste des étudiants</a>

    <br><br><br>

</main>