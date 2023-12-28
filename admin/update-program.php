<?php include "header.php";
include("config.php");
$post_id_by_addbar = $_GET['post_id'];
// UPDATION CODE
if (isset($_POST['submit'])) {
    // Profile Update Code
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name = $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
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
    }

    // Media 1 Update Code
    if (empty($_FILES['new-image_1']['name'])) {
        $save_img_name_1 = $_POST['old-image_1'];
    } else {
        if (isset($_FILES['new-image_1'])) {
            $file_name = $_FILES['new-image_1']["name"];
            $file_tmp = $_FILES['new-image_1']["tmp_name"];
            $file_type = $_FILES['new-image_1']["type"];
            $file_size = $_FILES['new-image_1']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_1 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/program/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_1);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

     // Media 2 Update Code
     if (empty($_FILES['new-image_2']['name'])) {
        $save_img_name_2 = $_POST['old-image_2'];
    } else {
        if (isset($_FILES['new-image_2'])) {
            $file_name = $_FILES['new-image_2']["name"];
            $file_tmp = $_FILES['new-image_2']["tmp_name"];
            $file_type = $_FILES['new-image_2']["type"];
            $file_size = $_FILES['new-image_2']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_2 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/program/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_2);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

    // Media 3 Update Code
    if (empty($_FILES['new-image_3']['name'])) {
        $save_img_name_3 = $_POST['old-image_3'];
    } else {
        if (isset($_FILES['new-image_3'])) {
            $file_name = $_FILES['new-image_3']["name"];
            $file_tmp = $_FILES['new-image_3']["tmp_name"];
            $file_type = $_FILES['new-image_3']["type"];
            $file_size = $_FILES['new-image_3']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_3 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/program/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_3);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

      // Media 4 Update Code
      if (empty($_FILES['new-image_4']['name'])) {
        $save_img_name_4 = $_POST['old-image_4'];
    } else {
        if (isset($_FILES['new-image_4'])) {
            $file_name = $_FILES['new-image_4']["name"];
            $file_tmp = $_FILES['new-image_4']["tmp_name"];
            $file_type = $_FILES['new-image_4']["type"];
            $file_size = $_FILES['new-image_4']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_4 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/program/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_4);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

       // Media 5 Update Code
       if (empty($_FILES['new-image_5']['name'])) {
        $save_img_name_5 = $_POST['old-image_5'];
    } else {
        if (isset($_FILES['new-image_5'])) {
            $file_name = $_FILES['new-image_5']["name"];
            $file_tmp = $_FILES['new-image_5']["tmp_name"];
            $file_type = $_FILES['new-image_5']["type"];
            $file_size = $_FILES['new-image_5']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name_5 = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/program/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name_5);
            } else {
                print_r($file_error);
                die();
            }
        }
    }



    $pro_date = mysqli_real_escape_string($conn, $_POST['date']);
    $pro_state = mysqli_real_escape_string($conn, $_POST['state']);
    $pro_name = mysqli_real_escape_string($conn, $_POST['name']);
    $pro_des = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $pro_vlink = mysqli_real_escape_string($conn, $_POST['vlink']);
    

    $sql_update_post = "UPDATE program SET date = '{$pro_date}', state = '{$pro_state}' , name = '{$pro_name}', des = '{$pro_des}', img = '{$save_img_name}', vlink = '{$pro_vlink}', m_1 = '{$save_img_name_1}', m_2 = '{$save_img_name_2}', m_3 = '{$save_img_name_3}', m_4 = '{$save_img_name_4}', m_5 = '{$save_img_name_5}'
                        WHERE pro_id = '{$post_id_by_addbar}'";

    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        echo "<script>window.location.href='$hostname/admin/program.php'</script>";
        
    } else {
        echo "<div class='alert alert-danger'>Program is Not Update !!</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Program</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <?php
                $sql_show_post_data = "SELECT * FROM program
                                WHERE  pro_id = {$post_id_by_addbar}";
                $result_sql_show_post_data = mysqli_query($conn, $sql_show_post_data) or die("Query Failed !! --> sql_show_post_data");
                if (mysqli_num_rows($result_sql_show_post_data) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_post_data)) {
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="pro_id" class="form-control" value="<?php echo ($row['pro_id']) ?>"
                                    placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTile">Program Date</label>
                                <input type="text" name="date" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['date']) ?>">
                            </div>


                            <div class="form-group">
                            <label for="post_title">Program Status</label>
                                    <select required class="form-control" name="state" >
                                        <option value="<?php echo $row['state'] ?>" selected><?php echo $row['state'] ?></option>
                                        <option value="DONE">1. सम्पन्न</option>
                                        <option value="NOT">2. अगामी</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Program Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['name']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="postdesc" class="form-control" rows="5" required><?php echo $row['des'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Program Profile</label>
                                <input type="file" name="new-image">
                                <img src="upload/program/<?php echo $row['img']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image" value="<?php echo $row['img']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTile">Video Link</label>
                                <input type="text" name="vlink" class="form-control" id="exampleInputUsername"
                                    value="<?php echo ($row['vlink']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Photo 1</label>
                                <input type="file" name="new-image_1">
                                <img src="upload/program/<?php echo $row['m_1']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_1" value="<?php echo $row['m_1']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Photo 2</label>
                                <input type="file" name="new-image_2">
                                <img src="upload/program/<?php echo $row['m_2']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_2" value="<?php echo $row['m_2']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Photo 3</label>
                                <input type="file" name="new-image_3">
                                <img src="upload/program/<?php echo $row['m_3']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_3" value="<?php echo $row['m_3']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Photo 4</label>
                                <input type="file" name="new-image_4">
                                <img src="upload/program/<?php echo $row['m_4']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_4" value="<?php echo $row['m_4']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Photo 5</label>
                                <input type="file" name="new-image_5">
                                <img src="upload/program/<?php echo $row['m_5']; ?>" height="150px" style="border-radius:12px;">
                                <input type="hidden" name="old-image_5" value="<?php echo $row['m_5']; ?>">
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