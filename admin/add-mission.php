<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_date = date("d M, Y");
    $post_author = $_SESSION['user_id'];
    $sql_insert_post = "INSERT INTO mission (mission_title,mission_date,mission_author)
                        VALUES ('{$post_title}','{$post_date}','{$post_author}')";
    if (mysqli_query($conn, $sql_insert_post)) {
        echo "<script>window.location.href='$hostname/admin/mission.php'</script>";
        
    } else {
        echo "<div class='alert alert-danger'>Mission Not Submit</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Mission</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>