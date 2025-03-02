<?php

require_once( "model/BDD.php" );

class FrontController extends AbstractController {

    public function etudiants() {
        $data = [
            "titre" => "Etudiants" ,
            "etudiants" => BDD::getInstance()->query( "SELECT * FROM etudiants" )
        ];

        $this->render( "page_etudiants" , $data );
    }

    public function etudiant() {

        $erreurs = [];
        $etudiant = [];

        if ( array_key_exists( "id" , $_GET ) ) {

            $id = $_GET[ "id" ] ?? "";

            $etudiant = BDD::getInstance()->query( "SELECT * FROM etudiants WHERE id = :id ", [ "id" => $id ] ); 

            if ( empty( $etudiant ) ) {

                $erreurs[] = "Aucun étudiant ne correspond à l'id indiqué.";

            }

        }
        
        $data = [
            "titre" => "Etudiant",
            "etudiant" => ( count( $erreurs ) === 0 ? $etudiant : [] ) ,
            "erreurs" => $erreurs 
        ];

        $this->render( "page_etudiant" , $data ) ; 

    }

    public function supprimer() {

        $erreurs = [];
        $etudiant = [];

        if ( array_key_exists( "id" , $_GET ) ) {

            $id = $_GET[ "id" ] ?? "";

            $etudiant = BDD::getInstance()->query( "SELECT * FROM etudiants WHERE id = :id ", [ "id" => $id ] ); 

            if ( empty( $etudiant ) ) {

                $data = [
                    "titre" => "Supprimer" ,
                    "contenu" => [
                        "num" => 404 ,
                        "message" => "Aucun étudiant ne correspond à l'id indiqué."
                    ]
                ];

                $this->render( "page_erreur" , $data );
                die();
            }

        }

        $data = [
            "titre" => "Supprimer",
            "etudiant" => $etudiant ,
            "erreurs" => $erreurs
        ];

        if ( count( $erreurs ) === 0 ) {
            BDD::getInstance()->query( "DELETE FROM etudiants WHERE id = :id" , [ "id" => $id ] );
        }

        $this->render( "page_supprimer" , $data );

    }

    public function nouveau() {

        $id = "";
        $prenom = "";
        $nom = "";
        $email = "";
        $cv = "";
        $dt_naissance = "";
        $role = "";

        $erreurs = [];

        if ( ! empty( $_POST ) ) {

            $prenom = isset( $_POST[ "prenom" ] ) ? $_POST[ "prenom" ] : $prenom;
            $nom = isset( $_POST[ "nom" ] ) ? $_POST[ "nom" ] : $nom;
            $email = isset( $_POST[ "email" ] ) ? $_POST[ "email" ] : $email;
            $cv = isset( $_POST[ "cv" ] ) ? $_POST[ "cv" ] : $cv;
            $dt_naissance = isset( $_POST[ "dt_naissance" ] ) ? $_POST[ "dt_naissance" ] : $dt_naissance;
            $role = isset( $_POST[ "role" ] ) ? $_POST[ "role" ] : $role;

            if ( empty( $prenom )  ) {
                $erreurs[] = "Vous devez spécifier un prénom.";
            }

            if ( empty( $nom )  ) {
                $erreurs[] = "Vous devez spécifier un nom.";
            }

            if ( ! filter_var( $email , FILTER_VALIDATE_EMAIL ) ) {
                $erreurs[] = "L'adresse courriel n'est pas conforme.";
            }
    
            if ( preg_match( '/^\d{4}-\d{2}-\d{2}$/' , $dt_naissance ) ) {
                list( $year , $month , $day ) = explode( '-' , $dt_naissance );
                if ( ! checkdate( $month , $day , $year ) ) {
                    $erreurs[] = "Date de naissance invalide.";
                }
            } else {
                $erreurs[] = "Format de date de naissance invalide.";
            }

            $etudiant = BDD::getInstance()->query( "SELECT * FROM etudiants WHERE email = :email" , [ "email" => $email ] );
            if ( ! empty( $etudiant ) ) {
                $erreurs[] = "Cette adresse courriel est déjà utilisée.";
            }   

            $roles = [ "etudiant" , "admin" ];
            if ( ! in_array( $role , $roles ) ) {
                $erreurs[] = "Sélectionnez un rôle";
            }
        }

        if ( count( $erreurs ) === 0  &&  ! empty( $_POST ) ) {

            $id = BDD::getInstance()->query( "INSERT INTO etudiants( prenom , nom , email , cv , dt_naissance , isAdmin ) VALUES ( :prenom , :nom , :email , :cv , :dt_naissance , :role )" , [
                "prenom" => $prenom ,
                "nom" => $nom ,
                "email" => $email ,
                "cv" => $cv ,
                "dt_naissance" => $dt_naissance ,
                "role" => ( $role === "admin" ? 1 : 0 )
            ] );

            header( "Location: " . $URL_SITE . "index.php?page=etudiants" );
            die();
        }

        $data = [
            "titre" => "Ajout" ,
            "data_form" => [
                "id" => $id ,
                "prenom" => $prenom ,
                "nom" => $nom ,
                "email" => $email,
                "cv" => $cv,
                "dt_naissance" => $dt_naissance ,
                "role" => $role
            ] ,
            "erreurs" => $erreurs
        ];

        $this->render( "etudiant_form" , $data );

    }

    public function modifier() {

        $erreurs = [];
        $etudiant = [];
        
        $id = null;

        if ( array_key_exists( "id" , $_GET ) ) {
            $id = $_GET[ "id" ];
        }

        $etudiant = BDD::getInstance()->query( "SELECT * FROM etudiants WHERE id = :id" , [ "id" => $id ] );
    
        if ( empty( $etudiant ) ) {
            $data = [
                "titre" => "Modifier" ,
                "contenu" => [
                    "num" => 404 ,
                    "message" => "L'étudiant que vous souhaitez modifier n'est pas dans la base de données."
                ]
            ];
    
            $this->render( "page_erreur" , $data );
            die();
        }

        $prenom = $etudiant[ 0 ][ "prenom" ];
        $nom = $etudiant[ 0 ][ "nom" ];
        $email = $etudiant[ 0 ][ "email" ];
        $cv = $etudiant[ 0 ][ "cv" ];
        $dt_naissance = $etudiant[ 0 ][ "dt_naissance" ];
        $role = ( $etudiant[ 0 ][ "isAdmin" ] === 1 ? "admin" : "etudiant" );

        if ( ! empty( $_POST ) ) {

            $prenom = isset( $_POST[ "prenom" ] ) ? $_POST[ "prenom" ] : $prenom;
            $nom = isset( $_POST[ "nom" ] ) ? $_POST[ "nom" ] : $nom;
            $email = isset( $_POST[ "email" ] ) ? $_POST[ "email" ] : $email;
            $cv = isset( $_POST[ "cv" ] ) ? $_POST[ "cv" ] : $cv;
            $dt_naissance = isset( $_POST[ "dt_naissance" ] ) ? $_POST[ "dt_naissance" ] : $dt_naissance;
            $role = isset( $_POST[ "role" ] ) ? $_POST[ "role" ] : $role;

            if ( empty( $prenom )  ) {
                $erreurs[] = "Vous devez spécifier un prénom.";
            }

            if ( empty( $nom )  ) {
                $erreurs[] = "Vous devez spécifier un nom.";
            }

            if ( ! filter_var( $email , FILTER_VALIDATE_EMAIL ) ) {
                $erreurs[] = "L'adresse courriel n'est pas conforme.";
            }
    
            if ( preg_match( '/^\d{4}-\d{2}-\d{2}$/' , $dt_naissance ) ) {
                list( $year , $month , $day ) = explode( '-' , $dt_naissance );
                if ( ! checkdate( $month , $day , $year ) ) {
                    $erreurs[] = "Date de naissance invalide.";
                }
            } else {
                $erreurs[] = "Format de date de naissance invalide.";
            }

            $etudiant = BDD::getInstance()->query( "SELECT * FROM etudiants WHERE email = :email AND id != :id" , [ "email" => $email , "id" => $id ] );
            if ( ! empty( $etudiant ) ) {
                $erreurs[] = "Cette adresse courriel est déjà utilisée.";
            }   

            $roles = [ "etudiant" , "admin" ];
            if ( ! in_array( $role , $roles ) ) {
                $erreurs[] = "Sélectionnez un rôle";
            }
        }

        if ( count( $erreurs ) === 0  &&  ! empty( $_POST ) ) {

            $ret = BDD::getInstance()->query( "UPDATE etudiants SET prenom = :prenom , nom = :nom , email = :email , cv = :cv , dt_naissance = :dt_naissance , isAdmin = :isAdmin , dt_mise_a_jour = :dt_mise_a_jour WHERE id= :id" , [
                "id" => $id ,
                "prenom" => $prenom ,
                "nom" => $nom ,
                "email" => $email ,
                "cv" => $cv ,
                "dt_naissance" => $dt_naissance ,
                "dt_mise_a_jour" => ( new DateTime() )->format('Y-m-d H:i:s') ,
                "isAdmin" => ( $role === "admin" ? 1 : 0 )
            ] );

            if ( $ret === 1  ||  $ret === 0 ) {
                header( "Location: " . $URL_SITE . "index.php?page=etudiants" );
                die();    
            } else {
                $erreurs[] = "Problème de mise à jour de la BD.";
            }


        }

        $data = [
            "titre" => "Modifier" ,
            "data_form" => [
                "id" => $id ,
                "prenom" => $prenom ,
                "nom" => $nom ,
                "email" => $email ,
                "cv" => $cv ,
                "dt_naissance" => $dt_naissance ,
                "role" => $role
            ] ,
            "erreurs" => $erreurs
        ];

        $this->render( "etudiant_form" , $data );

    }

}

?>