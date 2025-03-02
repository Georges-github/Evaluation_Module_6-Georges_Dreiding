<?php

session_start();

$page = "";

// http://192.123.123.123/index.php?page=home
if ( $_GET[ "page" ]  ??  ! empty( $_GET[ "page" ] ) ) {
    $page = $_GET[ "page" ];
} else {
    $page = "/";
}

$routes = [
    "/"                => [ "etudiants" , "FrontController" ] ,
    "etudiants"        => [ "etudiants" , "FrontController" ] ,
    "etudiant"         => [ "etudiant" , "FrontController" ] ,
    "supprimer"        => [ "supprimer" , "FrontController" ] ,
    "nouveau"          => [ "nouveau" , "FrontController" ] ,
    "modifier"          => [ "modifier" , "FrontController" ]
];

require_once( "model/BDD.php" );

require_once( "controller/AbstractController.php" );
require_once( "controller/FrontController.php" );
require_once( "controller/ErreurController.php" );

if ( array_key_exists( $page , $routes ) ) {

    $methode = $routes[ $page ][ 0 ];

    $classe = $routes[ $page ][ 1 ];

    $p = new $classe();

    // $params = isset( $_GET[ "id" ] ) ? $_GET[ "id" ] : null;
    // call_user_func( [ $p , $methode ] , $params );

    call_user_func( [ $p , $methode ] );

} else {

    $p = new ErreurController();

    $p->erreur( 404 , "La page demandée n'existe pas." );

}
