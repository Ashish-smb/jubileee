<?php include_once("../inc/header.php")?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include( __DIR__ . "/sidebar.php" ); ?>
            </div>
            <div class="col-md-9">
                <!-- <h1 class="text-danger">Register New User</h1> -->
                <div class="row mt-3">
                    <div class="col-lg-12">
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
                                <form action="<?=$_SERVER['PHP_SELF'];?>" method='post'>
                                    <h2 class="sign-up text-center fs-2 fw-bold text-danger">Register New User</h2>
                                    <!-- <h2 class=" mx-auto text-danger">Sign Up</h2>                                 -->
                                    <hr>
                                    <input type="hidden" name='form-type' value="register">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Your Full Name" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Your Full Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Create Your Username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Create Your Password">
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
        </div>
    </div>
<?php include("../inc/footer.php")?>

