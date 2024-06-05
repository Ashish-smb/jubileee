<?php

function post( $field_name, $default = null ) {
    if( isset( $_POST[ $field_name ] ) ) {
        return $_POST[ $field_name ];
    }
    return $default;
}

function is_post() {
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        return true;
    }
    return false;
}

function get( $field_name, $default = null ) {
    if( isset( $_GET[ $field_name ] ) ) {
        return $_GET[ $field_name ];
    }
    return $default;
}

function is_get() {
    if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        return true;
    }
    return false;
}

function check_post( $field_name ) {
    if( isset( $_POST[ $field_name ] ) && $_POST[ $field_name ] != "" )
        return true;
    return false;
}

function file_data( $field, $property = null ) {
    if( !isset( $_FILES[ $field ] ) )
        return null;

    if( $property == null )
        return $_FILES[ $field ];
    
        return $_FILES[ $field ][ $property ];

}

function file_upload( $field, $path = null ) {
    
    $file_data = file_data( $field );

    if( $path == null ) {
        $path = 'uploads/' . $file_data['name'];
    }
    
    move_uploaded_file( $file_data['tmp_name'], $path );
    
    return true;

}

// /////////////////////////////////////////////////////////////////////////////////////////

