<?php
    if( is_post() ) {

        if( !check_post('firstname') || !check_post('lastname') ||  !check_post('username') ||  !check_post('password') ) {
            echo "Error: All fields are madatory!";
        } else {

            $data = [
                'firstname' => post('firstname'),
                'lastname' => post('lastname'),
                'username' => post('username'),
                'password' => md5($_POST['password'])
            ];

            $db->insert( 'users', $data );

            $session->set_flash( 'success', 'User has been created successfully!' );

            $url->redirect('register.php');
        }
    }
?>

<?php
    // echo $_SESSION['user']['id'];
    if( is_post() ) {

        if( !check_post('title') || !check_post('duration') || !check_post('content') ) {
            echo "Error: All Fields are Mandatory";
        } else {

            $data = [
                // 'user_id' => $_SESSION['user']['id'],
                'user_id' => $session->session_user('id'),
                'title' => post('title'),
                'duration' => post('duration'),
                // 'course_image' => $_FILES['course_image']['name']
                'content' => post('content'),
                'course_image' => file_data( 'course_image', 'name' )
            ];

            // move_uploaded_file( $_FILES['course_image']['tmp_name'], $url->home_dir( "uploads/") . $_FILES['course_image']['name'] );
            file_upload( 'course_image' );

            // move_uploaded_file()
            
            $db->insert('courses', $data);
            
            $session->set_flash( 'success', 'Course has been successfully added!' );

            $url->redirect('new-course.php');
        }
    }
    // echo "<pre>";
    // print_r( $_SERVER );
    // echo "</pre>";
?>