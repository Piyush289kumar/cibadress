<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {
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

                                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                                $username = mysqli_real_escape_string($conn, $_POST['user']);
                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                                $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
                                $role = mysqli_real_escape_string($conn, $_POST['role']);

                                $sql_user_cheack = "SELECT username FROM user WHERE username = '{$username}'";
                                $result_user_cheack = mysqli_query($conn, $sql_user_cheack) or die("Query Die ( sql_user_cheack )!!");
                                if (mysqli_num_rows($result_user_cheack) > 0) {
                                    echo ("<p style='font:red;text-align:center'>User already Exsits !!</p>");
                                } else {
                                    $sql_insert_user = "INSERT INTO user (first_name, last_name,username,email,phone,password,role,img)
                    values('{$fname}','{$lname}','{$username}','{$email}','{$phone}','{$pass}','{$role}','{$output_img}')";

                                    if (mysqli_query($conn, $sql_insert_user)) {
                                        echo "<script>window.location.href='$hostname/admin/users.php'</script>";

                                    }

                                }
                            }
                        }
                    }


                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="phone" name="phone" class="form-control" placeholder="Mobile Number" maxlength="10" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>