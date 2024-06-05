<?php

class Session {
    public function __construct() {
        // session_start();
    }

    public function set_flash( $name, $value ) {
        $_SESSION[$name] = $value;
    }
    public function get_flash( $name ) {
        if( isset( $_SESSION[ $name ] ) ) {
            $val = $_SESSION[ $name ];
            $_SESSION[ $name ] = null;
            unset( $_SESSION[ $name ] );
            return $val;
        } else {
            return null;
        }
    }

    function check_flash( $name ) {
        if( isset( $_SESSION[ $name ] ) && $_SESSION[ $name ] !== null ) {
            return true;
        }
        return false;
    }

    public function session_user( $field = null ) {
        if( !isset( $_SESSION['user'] ) )
            return null;

        if( $field == null ) {
            return $_SESSION['user'];
        }
        return $_SESSION['user'][$field];
    }
}

$session = new Session();