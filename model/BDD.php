<?php

class BDD {

    private static $instance = null;

    private $connexion = null;

    private function __construct() {

        $dsn = "mysql:host=localhost;dbname=module6_GDG;charset=utf8mb4";
        $login = "root";
        $password = "root";

        $this->connexion = new PDO( $dsn , $login , $password );

    }

    public static function getInstance() {

        if ( self::$instance === null ) {

            self::$instance = new BDD();

        }

        return self::$instance;
    }

    public function query( string $sql , array $params = [] ) {

        $stmt = $this->connexion->prepare( $sql );
        $stmt->execute( $params );

        if ( str_starts_with( $sql , "INSERT INTO" ) ) {

            return $this->connexion->lastInsertId();

        } else if ( str_starts_with( $sql , "UPDATE" ) ) {

            return $stmt->rowCount();

        }

        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
    
}

?>