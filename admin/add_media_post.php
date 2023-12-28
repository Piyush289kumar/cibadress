<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {

    // session_start();
    if (isset($_FILES['fileToUpload'])) {
        if ($_FILES['fileToUpload']["size"] > 10485760) {
            echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
        }
        $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if (isset($info['mime'])) {
            if ($info['mime'] == "image/jpeg") {
                $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/png") {
                $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/webp") {
                $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
            } else {
                echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
            }
            if (isset($img)) {
                $output_img = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']["name"]) . ".webp";
                imagewebp($img, "upload/" . $output_img, 15);
                $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
                $post_date = '0';
                
                            $sql_getDate = "SELECT *  FROM media
                        ORDER BY media.date" or die("Query Failed!! --> sql_show_media_record");
                        
                        $result_sql_getDate = mysqli_query($conn, $sql_getDate);
                        if (mysqli_num_rows($result_sql_getDate) > 0) {
                            while ($row = mysqli_fetch_assoc($result_sql_getDate)) {
                                $post_date = $row['date'] + 10;
                            }
                        }
                        

                $sql_insert_post = "INSERT INTO media (name, img, date)
                        VALUES ('{$post_title}','{$output_img}', '{$post_date}')";

                if (mysqli_query($conn, $sql_insert_post)) {
                    echo "<script>window.location.href='$hostname/admin/media_post.php'</script>";
                } else {
                    echo "<div class='alert alert-danger'>Media Post is Not Submit</div>";
                }

            }
        }
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Media Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Media Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>