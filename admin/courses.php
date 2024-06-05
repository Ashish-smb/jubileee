<?php
    include_once("../inc/header.php");
    $courses = $db->select("courses", '*' , [ 'user_id' => $_SESSION['user']['id'] ] );
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include( __DIR__ . "/sidebar.php" ); ?>
            </div>
            <div class="col-md-9">
                <h1>Courses</h1>
                <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <!-- <th>Duration</th> -->
                        <th>Course Image</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $courses as $course ): ?>
                    <tr>
                    <th><?=$course['id' ];?></th>
                    <td><?=$course['title'];?></td>
                    <td><?=$course['category'];?></td>
                    <!-- <td><?=$course['duration'];?></td> -->
                    <td>
                        <img class="rounded" src="<?= $url->home("uploads/" . $course['course_image'] ); ?>" alt="" style="height:30px;">
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $course['id']; ?>" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i></i>
                        </a>
                        <a href="delete.php?id=<?= $course['id']; ?>" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("../inc/footer.php")?>
    

