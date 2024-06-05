<?php include_once("../inc/header.php")?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include( __DIR__ . "/sidebar.php" ); ?>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body shadow-lg">
                        <?php
                            if( $session->check_flash( 'success' ) ) {
                                echo "<div class='alert bg-success text-white'>
                                        <p>" . $session->get_flash( 'success' ) . "</p>
                                    </div>
                                ";
                            }
                        ?>
                        <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                        <h2 class="sign-up text-center fs-2 fw-bold text-danger">New Course Register</h2>
                        <input type="hidden" name="form-type" value="new-course">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Course Title" value="Mastering The Art Of Digital Communication">
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" name="duration" id="duration" placeholder="Course Duration" value="1 H 50 M">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" class="form-control" name="content" id="content" placeholder="Enter Course content" value="This is the Demo Title">
                            </div>
                            <div class="mb-3">
                                <label for="course_image" class="form-label">Course Image</label>
                                <input type="file"  name="course_image" id="course_image" placeholder="Course Picture">
                            </div>
                            <button class="btn btn-danger">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php include("../inc/footer.php")?>


