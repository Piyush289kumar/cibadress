<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {


    $media_id_by_bar = $_GET['post_id'];
    $extension = array('jpeg', 'jpg', 'png', 'gif','webp');

    foreach ($_FILES['image']['tmp_name'] as $key => $value) {
        $filename = $_FILES['image']['name'][$key];
        $filename_tmp = $_FILES['image']['tmp_name'][$key];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $finalimg = '';
        if (in_array($ext, $extension)) {
            if (!file_exists('upload/media/' . $filename)) {
                move_uploaded_file($filename_tmp, 'upload/media/' . $filename);
                $finalimg = $filename;
            } else {
                $filename = str_replace('.', '-', basename($filename, $ext));
                $newfilename = $filename . time() . "." . $ext;
                move_uploaded_file($filename_tmp, 'upload/media/' . $newfilename);
                $finalimg = $newfilename;
            }
            //insert
            $createtime = date("d-m-Y h:i:s");
            $insertqry = "INSERT INTO media_item (media_post_id, media_img, time) VALUES ('{$media_id_by_bar}','{$finalimg}', '{$createtime}')";


            mysqli_query($conn, $insertqry);
            if (mysqli_query($conn, $insertqry)) {
                echo "<script>window.location.href='$hostname/admin/media_post.php'</script>";
            } else {
                echo "<div class='alert alert-danger'>Media Not Submit</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Please choose only JPG, PNG, JPEG Formate!!</div>";
        }
    }

}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add Media</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <!-- <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="title" class="form-control" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Media image</label>
                        <input type="file" name="image[]" multiple required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>