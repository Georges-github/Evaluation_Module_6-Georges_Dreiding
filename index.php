<?php

session_start();

// define( "URL_SITE" , "http://192.168.33.10/Evaluation_Module_6/" );
define( "URL_SITE" , "http://localhost/Evaluation_Module_6/" );

$page = "";

// http://192.123.123.123/index.php?page=home
$page = ( isset($_GET[ "page" ] ) && $_GET["page"] !== '' ) ? $_GET[ "page" ] : "/";

$routes = [
    "/"                 => [ "etudiants" , "FrontController" ] ,
    "etudiants"         => [ "etudiants" , "FrontController" ] ,
    "etudiant"          => [ "etudiant"  , "FrontController" ] ,
    "supprimer"         => [ "supprimer" , "FrontController" ] ,
    "nouveau"           => [ "nouveau"   , "FrontController" ] ,
    "modifier"          => [ "modifier"  , "FrontController" ]
];

require_once( "model/BDD.php" );

require_once( "controller/AbstractController.php" );

require_once( "controller/FrontController.php" );

require_once( "controller/ErreurController.php" );

if ( array_key_exists( $page , $routes ) ) {

    $methode = $routes[ $page ][ 0 ];

    $classe = $routes[ $page ][ 1 ];

    $c = new $classe();

    // $params = isset( $_GET[ "id" ] ) ? $_GET[ "id" ] : null;
    // call_user_func( [ $c , $methode ] , $params );

    call_user_func( [ $c , $methode ] );

} else {

    $c = new ErreurController();

    $c->erreur( 404 , "La page demandée n'existe pas." );

}
