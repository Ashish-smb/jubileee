<?php 
    include_once("../inc/header.php");
    $auth->no_login( $url->home('login.php'));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['repeat_new_password'])) {

            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $repeat_new_password = $_POST['repeat_new_password'];
            
            if (!empty($old_password) && !empty($new_password) && !empty($repeat_new_password)) {

                if (md5($old_password) === $_SESSION['user']['password']) {

                    if ($new_password === $repeat_new_password) {

                        $user_id = $_SESSION['user']['id'];
                
                        $data = [
                            'password' => md5($new_password)
                        ];

                        $db->update('users', $data, ['id' => $user_id]);

                        $session->set_flash('success', 'User Password has been updated successfully!');

                        $url->redirect('profile.php');

                    } else {
                        echo "New password and repeated new password do not match.";
                    }
                } else {
                    echo "Old password is incorrect";
                }
            } else {
                echo "Please fill in all the fields";
            }
        } else {
            echo "Please fill in all the fields";
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include( __DIR__ . "/sidebar.php" ); ?>
        </div>
        <div class="col-md-9">
            <h1>Change Password</h1>
            <?php
                if( $session->check_flash( 'success' ) ) {
                    echo "<div class='alert bg-success text-white'>
                            <p>" . $session->get_flash( 'success' ) . "</p>
                        </div>
                    ";
                }
            ?>
            <div class="card" style="width:35%;">
                <div class="card-body shadow-lg">
                    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="text"  class="form-control" name="old_password" id="old_password" placeholder="Enter your old password" >        
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password"  class="form-control" name="new_password" id="new_password" placeholder="Enter your new password" >        
                    </div>
                    <div class="mb-3">
                        <label for="repeat_new_password" class="form-label">Re-Enter New Password</label>
                        <input type="password"  class="form-control" name="repeat_new_password" id="repeat_new_password" placeholder="Enter your repeat password" >        
                    </div>
                    <button class="btn btn-primary rounded-2" type="submit">
                    Change Password
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/footer.php")?>

