<?php

abstract class AbstractController {

    protected function render( string $template , array $data = [] ) {

        extract( $data );

        require_once( "vue/header.php" );

        require_once( "vue/$template.php" );

        require_once( "vue/footer.php" );

    }

}

?>