<?php include "header.php";
include("config.php");
// Secure Code
if ($_SESSION['user_role'] == 0) {
    $post_id_by_addbar = $_GET['post_id'];
    $sql_get_author_for_secrue_code = "SELECT author FROM post
                           WHERE  post_id = {$post_id_by_addbar}";
    $result_sql_get_author_for_secrue_code = mysqli_query($conn, $sql_get_author_for_secrue_code) or die("Query Failed !! --> sql_show_post_data");
    $row_result_sql_get_author_for_secrue_code = mysqli_fetch_assoc($result_sql_get_author_for_secrue_code);
    if ($_SESSION['user_id'] != $row_result_sql_get_author_for_secrue_code['author']) {
        header("Location:{$hostname}/admin/");
    }
}
$post_id_by_addbar = $_GET['post_id'];
// UPDATION CODE
if (isset($_POST['submit'])) {
    // image update block start
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name = $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
                print_r($file_error);
                die();
            }
        }
    }
    // image update block end
    // audio update block start
    if (empty($_FILES['new-audio']['name'])) {
        $save_audio = $_POST['old-audio'];
    } else {
        if (isset($_FILES['new-audio'])) {
            $file_name = $_FILES['new-audio']["name"];
            $file_tmp = $_FILES['new-audio']["tmp_name"];
            $file_type = $_FILES['new-audio']["type"];
            $file_size = $_FILES['new-audio']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("mp3");
            $file_error_audio = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error_audio[] = "This extension file not allowed, Please choose a MP3 file.";
            }
            if ($file_size > 10485760) {
                $file_error_audio[] = "Audio must be 10mb or lower.";
            }
            $save_audio = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $audio_save_target = "upload/audio/";
            if (empty($file_error_audio) == true) {
                move_uploaded_file($file_tmp, $audio_save_target . $save_audio);
            } else {
                print_r($file_error_audio);
                die();
            }
        }
    }
    // audio update block end
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $pro_code = mysqli_real_escape_string($conn, $_POST['pro_code']);
    $pro_price = mysqli_real_escape_string($conn, $_POST['pro_price']);
    $pro_cat = mysqli_real_escape_string($conn, $_POST['category']);

    $sql_update_post = "UPDATE post SET title = '{$post_title}', pro_code = '{$pro_code}', pro_price = '{$pro_price}', category = '{$pro_cat}', post_img = '{$save_img_name}' WHERE post_id = '{$post_id_by_addbar}'";
    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        echo "<script>window.location.href='$hostname/admin/post.php'</script>";
    } else {
        echo "<div class='alert alert-danger'>Post is Not Update !!</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Product</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <?php
                $sql_show_post_data = "SELECT *
                                FROM post
                                LEFT JOIN user ON post.author = user.user_id
                                WHERE  post.post_id = {$post_id_by_addbar}";
                $result_sql_show_post_data = mysqli_query($conn, $sql_show_post_data) or die("Query Failed !! --> sql_show_post_data");
                if (mysqli_num_rows($result_sql_show_post_data) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_post_data)) {
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="post_id" class="form-control" value="<?php echo ($row['post_id']) ?>"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Product Code</label>
                                <input type="text" name="pro_code" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['pro_code']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Product Name</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['title']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Product Price</label>
                                <input type="text" name="pro_price" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['pro_price']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Category</label>
                                <select name="category" class="form-control">
                                    <option disabled selected><?php echo ($row['category']) ?>"</option>
                                    <option value="First Block">First Block</option>
                                    <option value="Second Block">Second Block</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Product Picture</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $row['post_img']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                        </form>
                        <!-- Form End -->
                        <?php
                    }
                } else {
                    echo ("<div class='alert alert-danger'>Result Not Found.</div>");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>