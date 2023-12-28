<?php include("header.php");
include("config.php");
if (isset($_POST['submit'])) {
    $member_name = mysqli_real_escape_string($conn, $_POST['name']);
    $member_post = mysqli_real_escape_string($conn, $_POST['post']);
    $member_num = mysqli_real_escape_string($conn, $_POST['num']);
    $post_date = date("d M, Y");
    $post_author = $_SESSION['user_id'];
    $sql_insert_post = "INSERT INTO member (name,post,contact,date,author)
                        VALUES ('{$member_name}','{$member_post}','{$member_num}','{$post_date}','{$post_author}')";
    if (mysqli_query($conn, $sql_insert_post)) {
        echo "<script>window.location.href='$hostname/admin/member.php'</script>";
        
    } else {
        echo "<div class='alert alert-danger'>Member Not Add</div>";
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Member</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <label for="post_title">Member Name</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Member Post</label>
                        <input type="text" name="post" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="post_title">Contact Number</label>
                        <input type="phone" name="num" maxlength="10" class="form-control" autocomplete="off" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>