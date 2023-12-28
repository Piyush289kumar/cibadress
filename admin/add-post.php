<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {
    // session_start();
    // file upload Image start block
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
    $pro_code = mysqli_real_escape_string($conn, $_POST['pro_code']);
    $pro_pirce = mysqli_real_escape_string($conn, $_POST['pro_price']);
    $post_cate = mysqli_real_escape_string($conn, $_POST['category']);
    $post_date = date("d M, Y");
    $post_author = $_SESSION['user_id'];


    $sql_insert_post = "INSERT INTO post (title,pro_code,pro_price,category,post_date,post_img)
                        VALUES ('{$post_title}','{$pro_code}','{$pro_pirce}','{$post_cate}','{$post_date}','{$output_img}')";
    
    if (mysqli_query($conn, $sql_insert_post)) {
        echo "<script>window.location.href='$hostname/admin/post.php'</script>";
    } else {
        echo "<div class='alert alert-danger'>Post Not Submit</div>";
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
                <h1 class="admin-heading">Add New Product</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="pro_code">Product Code</label>
                        <input type="text" name="pro_code" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Product Name</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_price">Product Price</label>
                        <input type="text" name="pro_price" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Category</label>
                        <select name="category" class="form-control">
                            <option disabled selected> Select Category</option>
                            <option value="First Block">First Block</option>
                            <option value="Second Block">Second Block</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Picture</label>
                        <input type="file" name="fileToUpload">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>