<?php
class SigmaApp
{

    public $user_model;
    const SITE_URL = 'http://127.0.0.1/edsa-Sigma';

    public function __construct() {

        include('models/User.php');

        $this->user_model = new User;

    }

    public function show_page( $page, $data ) {

        $data['site_url'] = self::SITE_URL;

        include('templates/header.php');
        include('templates/'. $page .'.php');
        include('templates/footer.php');

    }

    public function validate_data() {

        $errors = array();

        $campos = array('departamento', 'ciudad', 'nombre', 'email');

        foreach( $campos as $campo ) {

            $errors[ $campo ] = array();

            $valor = false;

            if ( isset( $_POST[ $campo ] ) ) $valor = $_POST[ $campo ];

            if ( $valor == '' || !$valor ) array_push( $errors[ $campo ], 'Este campo es requerido');

            if ( strlen( $valor ) > 255 ) array_push( $errors[ $campo ], 'El valor ingresado es muy largo');

            if ( $campo == 'nombre' && $valor != '' && !ctype_alpha( str_replace(' ', '', $valor) ) ) array_push( $errors[ $campo ], 'Este campo no debe contener números');

        }

        if ( $this->user_model->checkUserByEmail() ) array_push( $errors['email'], 'Este correo ya está registrado');

        foreach ( $errors as $campo ) {

            if ( count( $campo ) ) return $errors;

        }

        return false;

    }

    public function nuevo_registro() {
        
        return $this->user_model->insert();

    }

    public function get_users() {

        return $this->user_model->selectRows();

    }
}