<?php
    include_once("../inc/header.php");

    // $course_id = $_GET['id'];

    if( !isset( $_GET['id'] ) || empty( $_GET['id'] ) ) {
        echo "<h1>Unauthorized Access!</h1>";
        die();
    } else {
        $db->delete( 'courses', ['id' => $course_id] );
        $url->redirect('courses.php');
    }

?>