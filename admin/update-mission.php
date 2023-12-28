<?php include "header.php";
include("config.php");

// Secure Code
if ($_SESSION['user_role'] == 0) {
    $post_id_by_addbar = $_GET['post_id'];
    $sql_get_author_for_secrue_code = "SELECT author FROM mission
                           WHERE  mission_id = {$post_id_by_addbar}";
$result_sql_get_author_for_secrue_code = mysqli_query($conn, $sql_get_author_for_secrue_code) or die("Query Failed !! --> sql_show_post_data");
    $row_result_sql_get_author_for_secrue_code = mysqli_fetch_assoc($result_sql_get_author_for_secrue_code);
    if ($_SESSION['user_id'] != $row_result_sql_get_author_for_secrue_code['author']) {
        
        echo "<script>window.location.href='$hostname/admin/'</script>";
    }
}


$post_id_by_addbar = $_GET['post_id'];


// UPDATION CODE

if (isset($_POST['submit'])) {

    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);

    $sql_update_post = "UPDATE mission SET mission_title = '{$post_title}' WHERE mission_id = '{$post_id_by_addbar}'";
   

    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        header("Location:{$hostname}/admin/mission.php");
    } else {
        echo "<div class='alert alert-danger'>Mission is Not Update !!</div>";
    }

}
 ?>
 
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Mission Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <?php
                
                
                $sql_show_post_data = "SELECT mission.mission_id, mission.mission_title, mission.mission_date
                                FROM mission
                                LEFT JOIN user ON mission.mission_author = user.user_id
                                WHERE  mission.mission_id = {$post_id_by_addbar}";
                $result_sql_show_post_data = mysqli_query($conn, $sql_show_post_data) or die("Query Failed !! --> sql_show_post_data");
                if (mysqli_num_rows($result_sql_show_post_data) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_post_data)) {

                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="<?php echo ($row['mission_id']) ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo ($row['mission_title'])?>">
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
