<?php 
    if( !isset( $_GET['id'] ) || empty( $_GET['id'] ) ) {
        echo "<h1>Unauthorized Access!</h1>";
        die();
    }
    include_once("../inc/header.php");
    $auth->no_login( $url->home('login.php'));
    $course_id = $_GET['id'];
    $course = $db->get("courses", '*' , ["id" => $course_id] );
    
    if( $_SERVER['REQUEST_METHOD'] == "POST" && isset( $_POST['category'] ) ) {
        if( $_POST['category'] == "" || $_POST['duration'] == "" || $_POST['title'] == "" || $_POST['content'] == "") {
            echo "Error!";
        } else {
            
            $data = [
                'category' => $_POST['category'],
                'duration' => $_POST['duration'],
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ];

            $db->update( 'courses', $data, ['id' => $course_id] );

            $url->redirect('courses.php');
        }
    }

    if( $_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form_type'] == 'course_image') {

        print_r( $_FILES );

        $data = [
            'id' => $_GET['id'],
            'course_image' => $_FILES['course_image']['name']
        ];
    
        move_uploaded_file( $_FILES['course_image']['tmp_name'], $url->home_dir( "uploads/") . $_FILES['course_image']['name'] );
       
        if( $db->has('courses', ['id' => $course_id ] ) ) {

            $db->update('courses', $data, [ 'id' => $course_id ] );
        } else {

            $db->insert('courses', $data);
        }
    
        $url->redirect('courses.php');
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include(__DIR__ . "/sidebar.php"); ?>
            </div>
            <div class="col-md-9 card rounded-4 border-0 shadow-sm p-3">
                <h2>Edit Course Info</h2>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                <form action="edit.php?id=<?= $_GET['id']; ?>" method="post" class="d-flex justify-content-between my-3">
                    <div class="container1" style="width: 42%;"> 
                        <div class="course_image ">
                            <div data-bs-toggle="modal" data-bs-target="#myModal"> 
                            <img src="../uploads/<?= $course['course_image']; ?>" alt="default image" style="height: 250px; width: 100%;" class="img-fluid rounded-3">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $course['id']; ?>">
                        <div class="card-body p-0 ">
                            <div class="d-flex justify-content-between my-3">
                                <?php
                                    $categories = $db->select('categories', '*');
                                ?>
                                <select name="category" id="category"  class="form-control text-black-50 fw-bold text-uppercase m-0">
                                    <?php foreach( $categories as $c ): ?>

                                        <?php if( $c['category_name'] == $course['category'] ): ?>
                                            <option value="<?= $c['category_name'] ?>" selected>
                                                <?= $c['category_name'] ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?= $c['category_name'] ?>">
                                                <?= $c['category_name'] ?>
                                            </option>
                                        <?php endif; ?>

                                        <?php endforeach; ?>
                                </select>   
                                <div class="d-flex align-items-center">
                                    <svg width="20" height="20" class="mx-2">
                                        <use xlink:href="#clock" class="text-black-50"></use>
                                    </svg>
                                    <input class="form-control text-black-50 fw-bold text-uppercase m-0" type="text" name="duration" id="duration" placeholder="Enter course duration" style="width:90%" value="<?= $course['duration'] ?>">
                                </div>
                            </div>
                            <input class="form-control course-title py-2 m-0 mb-3" type="text" name="title" id="title" placeholder="Enter course title" value="<?= $course['title'] ?>">
                            <div class="card-text d-flex">
                                <h6 class="text-muted fw-semibold m-0 me-2" style="transform: translateY(7px);">By:</h6><input class="form-control  text-black-50 fw-bold m-0 me-2 text-uppercase" type="text" value="<?= $_SESSION['user']['firstname']; ?> <?= $_SESSION['user']['lastname']; ?>" readonly>
                            </div>
                        </div>
                        <button class="btn btn-success fw-bold mt-3 rounded-2" type="submit">
                            Edit Course Info
                        </button>
                    </div>
                    <div class="conatiner2 c w-auto " style="transform: translateX(-50px);">
                        <h2>Content</h2>
                        <textarea id="default" name="content"><?= $course['content'] ?></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?= $_SERVER['PHP_SELF'];?>?id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="form_type" value="course_image">
                    <input type="file" name="course_image">
                    <button class="btn btn-primary rounded-0" type="submit">Upload Image</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.0/tinymce.min.js" integrity="sha512-Va3PZJRSZ8TlnqUfjkA5YPR57+oIscCVoNGjYK1JYsOTw8VU7517hHqs90/h/YuUm8KZl9iD+Dt8K6T8uAJCqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
    selector: 'textarea#default'
    });
</script>
<?php include("../inc/footer.php")?>