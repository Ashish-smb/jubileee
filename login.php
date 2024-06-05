<?php include("inc/header.php")?>

<?php
    if( $auth->is_login() ) {
        echo "<script> window.location = 'admin/dashboard.php'; </script>";
    }

    if( isset( $_POST['form-type'] ) && $_POST['form-type'] == 'login' ) {
        $username = $_POST['username'];
        $password = md5( $_POST['password'] );

        $data = [
            'username' => $username,
            'password' => $password
        ];

        if( $auth->login( $data ) ) {
            echo "<script> window.location = 'admin/dashboard.php'; </script>";
            exit(404);
        } else {
            echo "<script>alert('User does not Exist');</script>";
        }
    }
?>

    <div class="container" style="transform: translateY(38px);">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card shadow">                  
                    <div class="card-body">
                    <h3 class="d-flex justify-content-center">LOGIN</h3>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="form-type" value="login">
                        <div class="mb-3 fw-bold">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" autofocus required value="admin">
                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required value="admin">
                        </div>
                        <button class="btn btn-success fw-bold" style="background-color:#EC6C5A; border:none;">
                            Log In
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("inc/footer.php")?>

