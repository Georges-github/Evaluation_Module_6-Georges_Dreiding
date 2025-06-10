<main class="container">

    <br>

    <h1>L'étudiant <?php echo( $etudiant[ 0 ][ "prenom" ] ); ?> <?php echo( $etudiant[ 0 ][ "nom" ] ); ?> a été supprimé de la base de données.</h1>

    <?php foreach ( $erreurs as $erreur ) : ?>
        <div class="alert bg-warning mt-3"><?php echo( $erreur );?></div>
    <?php endforeach ?>

    <hr>

    <a href="<?php echo( URL_SITE ); ?>index.php?page=etudiants" class="btn btn-info btn-sm">Retour à liste des étudiants</a>

</main>