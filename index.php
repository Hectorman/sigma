<?php

    $route = '';

    if ( isset( $_GET['route'] ) ) $route = $_GET['route'];

    include('controllers/SigmaApp.php');

    $app = new SigmaApp;

    switch ($route) {
        case 'nuevo-registro':

            $errors = $app->validate_data();

            if ( $errors ) {

                echo json_encode( $errors );

            } else {

                if ( $app->nuevo_registro() ) {

                    echo 'exito';

                } else {

                    echo 'Error al guardar';

                }

            }

            break;
        
        case 'admin':

            $data['usuarios'] = $app->get_users();

            $app->show_page('admin', $data);

            break;

        default: 

            $json = file_get_contents('http://sigma-studios.s3-us-west-2.amazonaws.com/test/colombia.json');
            $data['ciudades'] = json_decode($json);
            
            $app->show_page('register-page', $data);
    }

    