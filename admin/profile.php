<?php include_once("../inc/header.php")?>
<?php $auth->no_login( $url->home('login.php')); ?>
<?php
    if( $_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form_type'] == 'user_profile' ) {
        if( $_POST['firstname'] == "" || $_POST['lastname'] == "" ) {
            echo "Error!";
        } else {

            // get the current login user's id
            $user_id = $_SESSION['user']['id'];
            
            // collect the user data from $_POST
            $data = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname']
            ];

            // update the user data
            $db->update( 'users', $data, ['id' => $user_id] );
            
            // Login again to set new data in session
            $auth->login( $data );

            // set the flash data to display message
            $session->set_flash( 'success', 'User has been updated successfully!' );

            // redirect the profile page so not to submit data again
            $url->redirect('profile.php');
        }

    }
?>
<?php
   if( $_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form_type'] == 'user_image') {

    $data = [
        'user_id' => $_SESSION['user']['id'],
        'user_image' => $_FILES['user_image']['name']
    ];

    move_uploaded_file( $_FILES['user_image']['tmp_name'], $url->home_dir( "uploads/") . $_FILES['user_image']['name'] );
   
    if( $db->has('user_details', ['user_id' => $_SESSION['user']['id'] ] ) ) {
        // update query
        $db->update('user_details', $data, [ 'user_id' => $_SESSION['user']['id'] ] );
    } else {
        // insert query
        $db->insert('user_details', $data);
    }
    
    $session->set_flash( 'success', 'User Image has been updated successfully!' );

    $url->redirect('profile.php');
}
// get the user image
$user_info = $db->get("user_details", '*', [ 'user_id' => 18 ] );

?>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include( __DIR__ . "/sidebar.php" ); ?>
            </div>
            <div class="col-md-10">
                <?php
                if( $session->check_flash( 'success' ) ) {
                    echo "<div class='alert bg-success text-white'>
                            <p>" . $session->get_flash( 'success' ) . "</p>
                        </div>
                    ";
                }
                ?>
                <h1>User Profile</h1>
                <div class="user_image">
                    <div data-bs-toggle="modal" data-bs-target="#myModal"> 
                        <img src="../uploads/<?= $user_info['user_image']; ?> " alt="select image" style="height: 250px;">
                    </div>
                </div>
                <div>
                    <form action="profile.php" method="post">
                        <input type="hidden" name="form_type" value="user_profile">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name here." value="<?= $_SESSION['user']['firstname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your last name here." value="<?= $_SESSION['user']['lastname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <p>
                                <?= $_SESSION['user']['username']; ?>
                            </p>
                        </div>
                        <button class="btn btn-primary rounded-2" type="submit">
                            Edit User Profile
                        </button>
                        <a href="update_password.php" class="btn btn-primary rounded-2">
                            Change Password</a>
                    </form> 
                </div>
            </div>
        </div>
    </div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="user_image">
                <input type="file" name="user_image">
                <button class="btn btn-primary rounded-0" type="submit">Upload Image</button>
            </form>
      </div>
    </div>
  </div>
</div>
<?php include("../inc/footer.php")?>

