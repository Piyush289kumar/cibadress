<?php
include("config.php");
$post_id_by_addbar = $_GET['post_id'];

$sql_select_post_img = "SELECT * FROM media_item WHERE media_post_id = {$post_id_by_addbar}";
$result_sql_select_post_img = mysqli_query($conn, $sql_select_post_img) or die("Query Die !! --> sql_select_post_img");
if (mysqli_num_rows($result_sql_select_post_img)>0) {
    $row = mysqli_fetch_assoc($result_sql_select_post_img);
    unlink("upload/media" . $row['media_img']);
}

$sql_delete_post = "DELETE FROM media_item WHERE media_post_id = {$post_id_by_addbar}";

if (mysqli_multi_query($conn,$sql_delete_post)) {
    echo "<script>window.location.href='$hostname/admin/media_post.php'</script>";
} else {
    echo ("<div class='alert alert-danger'>Can't Delete Media !!</div>");
}
mysqli_close($conn);

?>