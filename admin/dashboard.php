<?php include_once("../inc/header.php")?>
<?php $auth->no_login( $url->home('login.php')); ?>

    <div class="container ">
        <div class="row">
            <div class="col-md-3">
                <?php include( __DIR__ . "/sidebar.php" ); ?>
            </div>
            <div class="col-md-9">
                <h1>Dashboard</h1>
                <p>
                    Welcome <?= $_SESSION['user']['firstname']; ?>
                </p>
            </div>
        </div>
    </div>
<?php include("../inc/footer.php")?>

