<?php

class Utility {
    public function post( $field_name ) {
        return $_POST[ $field_name ];
    }
}

$u = new Utility;