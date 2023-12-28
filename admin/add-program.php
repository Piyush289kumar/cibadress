<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {
    // file upload Profile start block
    if (isset($_FILES['fileToUpload'])) {
        $file_name = $_FILES['fileToUpload']["name"];
        $file_tmp = $_FILES['fileToUpload']["tmp_name"];
        $file_type = $_FILES['fileToUpload']["type"];
        $file_size = $_FILES['fileToUpload']["size"];
        $file_ext = strtolower(end(explode('.', $file_name)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload Profile end block

    // file upload 1 start block
    if (isset($_FILES['fileToUpload_1'])) {
        $file_name_1 = $_FILES['fileToUpload_1']["name"];
        $file_tmp = $_FILES['fileToUpload_1']["tmp_name"];
        $file_type = $_FILES['fileToUpload_1']["type"];
        $file_size = $_FILES['fileToUpload_1']["size"];
        $file_ext = strtolower(end(explode('.', $file_name_1)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name_1 = date("d_M_Y_h_i_sa") . "_" . basename($file_name_1);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name_1);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload 1 end block

    // file upload 2 start block
    if (isset($_FILES['fileToUpload_2'])) {
        $file_name_1 = $_FILES['fileToUpload_2']["name"];
        $file_tmp = $_FILES['fileToUpload_2']["tmp_name"];
        $file_type = $_FILES['fileToUpload_2']["type"];
        $file_size = $_FILES['fileToUpload_2']["size"];
        $file_ext = strtolower(end(explode('.', $file_name_1)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name_2 = date("d_M_Y_h_i_sa") . "_" . basename($file_name_1);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name_2);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload 2 end block

    // file upload 3 start block
    if (isset($_FILES['fileToUpload_3'])) {
        $file_name_1 = $_FILES['fileToUpload_3']["name"];
        $file_tmp = $_FILES['fileToUpload_3']["tmp_name"];
        $file_type = $_FILES['fileToUpload_3']["type"];
        $file_size = $_FILES['fileToUpload_3']["size"];
        $file_ext = strtolower(end(explode('.', $file_name_1)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name_3 = date("d_M_Y_h_i_sa") . "_" . basename($file_name_1);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name_3);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload 3 end block
    
    // file upload 4 start block
    if (isset($_FILES['fileToUpload_4'])) {
        $file_name_1 = $_FILES['fileToUpload_4']["name"];
        $file_tmp = $_FILES['fileToUpload_4']["tmp_name"];
        $file_type = $_FILES['fileToUpload_4']["type"];
        $file_size = $_FILES['fileToUpload_4']["size"];
        $file_ext = strtolower(end(explode('.', $file_name_1)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name_4 = date("d_M_Y_h_i_sa") . "_" . basename($file_name_1);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name_4);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload 4 end block

    
    // file upload 5 start block
    if (isset($_FILES['fileToUpload_5'])) {
        $file_name_1 = $_FILES['fileToUpload_5']["name"];
        $file_tmp = $_FILES['fileToUpload_5']["tmp_name"];
        $file_type = $_FILES['fileToUpload_5']["type"];
        $file_size = $_FILES['fileToUpload_5']["size"];
        $file_ext = strtolower(end(explode('.', $file_name_1)));
        $allow_extension = array("jpg", "jpeg", "png","webp");
        $file_error = array();
        if (in_array($file_ext, $allow_extension) === false) {
            $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
        if ($file_size > 2097152) {
            $file_error[] = "Image must be 2mb or lower.";
        }
        $save_img_name_5 = date("d_M_Y_h_i_sa") . "_" . basename($file_name_1);
        $img_save_target = "upload/program/";
        if (empty($file_error) == true) {
            move_uploaded_file($file_tmp, $img_save_target . $save_img_name_5);
        } else {
            print_r($file_error);
            die();
        }
    }
    // file upload 5 end block


    // Program Year Variable
    $sql_show_year = "SELECT * FROM pro_year";
    $result_sql_show_year = mysqli_query($conn, $sql_show_year) or die("Query Failed!! --> sql_show_year");
    $program_year_from_table = '0';
    if (mysqli_num_rows($result_sql_show_year) > 0) {
        while ($row_year = mysqli_fetch_assoc($result_sql_show_year)) {
            $program_year_from_table = $row_year['pro_year'];
        }
    }
    echo $program_year_from_table;
    $post_author = $_SESSION['user_id'];
    $pro_year = $program_year_from_table;
    $pro_date = mysqli_real_escape_string($conn, $_POST['date']);
    $pro_name = mysqli_real_escape_string($conn, $_POST['name']);
    $pro_des = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $pro_state = mysqli_real_escape_string($conn, $_POST['state']);
    $pro_vlink = mysqli_real_escape_string($conn, $_POST['vlink']);
    $sql_insert_post = "INSERT INTO program (year, date, img, name, state, author, des, vlink,m_1,m_2,m_3,m_4,m_5)
                        VALUES ('{$pro_year}','{$pro_date}','{$save_img_name}','{$pro_name}','{$pro_state}','{$post_author}','{$pro_des}','{$pro_vlink}','{$save_img_name_1}','{$save_img_name_2}','{$save_img_name_3}','{$save_img_name_4}','{$save_img_name_5}')";
    if (mysqli_query($conn, $sql_insert_post)) {
        echo ("<script>window.location.href='$hostname/admin/program.php'</script>");
        // header("Location:{$hostname}/admin/program.php");
    } else {
        echo "<div class='alert alert-danger'>Program is Not Add</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Program</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="post_title">Program Date</label>
                        <input type="text" name="date" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <select required class="form-control" name="state">
                            <option class="hidden" selected><- अवस्था चुने -></option>
                            <option value="DONE">1. सम्पन्न</option>
                            <option value="NOT">2. अगामी</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Program Name</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Profile</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Video Link</label>
                        <input type="text" name="vlink" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 1</label>
                        <input type="file" name="fileToUpload_1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 2</label>
                        <input type="file" name="fileToUpload_2" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 3</label>
                        <input type="file" name="fileToUpload_3" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 4</label>
                        <input type="file" name="fileToUpload_4" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 5</label>
                        <input type="file" name="fileToUpload_5" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
