<main class="container">

    <h1><?php echo( ( str_contains( $titre , "Ajout" ) ? "Ajouter" : "Modifier" ) . " étudiant" ); ?></h1>

    <section class="row">
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="prenom" class="fw-bold">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $data_form["prenom"] ?>">
                </div>
                <div class="mb-3">
                    <label for="nom" class="fw-bold">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $data_form["nom"] ?>">
                </div>
                <div class="mb-3">
                    <label for="dt_naissance" class="me-2 fw-bold">Date de naissance</label>
                    <input type="date" name="dt_naissance" id="dt_naissance" value="<?php echo $data_form["dt_naissance"] ?>">
                </div>
                <div class="mb-3">
                    <label for="cv" class="fw-bold">C.V.</label>
                    <textarea name="cv" id="cv" class="form-control"><?php echo $data_form["cv"] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="fw-bold">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $data_form["email"] ?>">
                </div>
                <div class="mb-3 fw-bold">
                    <label for="role">role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="">Veuillez sélectionner un role</option>
                        <option value="etudiant" <?php echo $data_form["role"] == "etudiant" ? "selected" : "" ?>>étudiant</option>
                        <option value="admin" <?php echo $data_form["role"] == "admin" ? "selected" : "" ?>>admin</option>
                    </select>
                </div>
                <div class="d-flex justify-content-start mt-4">
                    <input type="submit" class="btn btn-info btn-sm">
                    <a href="<?php echo( URL_SITE ); ?>index.php?page=etudiants" class="btn btn-info btn-sm ms-3">Retour à liste des étudiants</a>                </div>
            </form>
            <?php foreach($erreurs as $erreur) : ?>
                <div class="alert bg-warning mt-3"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>

</main>