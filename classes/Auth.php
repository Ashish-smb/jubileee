<?php

class Auth {
    
    private $db;

    public function __construct( $db ) {
        $this->db = $db;
    }
    public function is_login() {
        if( isset( $_SESSION['user'] ) ) {
            return true;
        } else {
            return false;
        }
    }

    public function no_login( $location = "login.php" ) {
        if( !$this->is_login() ) {
            echo "<script> window.location = '" . $location . "'; </script>";
            exit(404);
        }
    }

    public function login( $data ) {
        if( $this->db->has( 'users', $data)) {
            $user = $this->db->get( 'users', "*", $data);

            // login the user
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        $_SESSION['user'] = null;
        unset( $_SESSION['user'] );
        session_destroy();
        return true;
    }

}
$auth = new Auth( $db );