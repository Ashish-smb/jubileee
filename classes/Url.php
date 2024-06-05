<?php

class Url {
    public function home_dir( $path = null ) {
        if( $path == null ) {
            return __DIR__ . "/../";
        } else {
            return __DIR__ . "/../" . $path;
        }
    }
    public function home( $path = null ) {
        if( $path == null ) {
            return "http://localhost:1234/";
        } else {
            return "http://localhost:1234/" . $path;
        }
    }
    public function admin( $path = null ) {
        if( $path == null ) {
            return "http://localhost:1234/admin/";
        } else {
            return "http://localhost:1234/admin/" . $path;
        }
    }
    public function inc( $path = null ) {
        if( $path == null ) {
            return "http://localhost:1234/inc/";
        } else {
            return "http://localhost:1234/inc/" . $path;
        }
    }
    public function icomoon( $path = null ) {
        if( $path == null ) {
            return "http://localhost:1234/icomoon/";
        } else {
            return "http://localhost:1234/icomoon/" . $path;
        }
    }
    public function images( $path = null ) {
        if( $path == null ) {
            return "http://localhost:1234/images/";
        } else {
            return "http://localhost:1234/images/" . $path;
        }
    }

    public function redirect( $location ) {
        echo "<script> window.location = '" . $location . "'; </script>";
        exit(404);
    }

    public function pr( $data ) {
        echo "<pre>";
        print_r( $data );
        echo "</pre>";
    }
}

$url = new Url();