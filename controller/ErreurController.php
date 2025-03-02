<?php

class ErreurController extends AbstractController {

    public function erreur( int $n , string $msg ) {

        $data = [
            "titre" => $msg ,
            "corps" => [
                "n" => $n ,
                "message" => $msg ]
        ];

        $this->render( "page_erreur" , $data );

    }

    public function erreur401() {

        $this->erreur( 401 , "Connexion préalable requise." );

    }
}

?>