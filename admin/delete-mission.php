<?php
include("config.php");
$post_id_by_addbar = $_GET['post_id'];

$sql_delete_post = "DELETE FROM mission WHERE mission_id = {$post_id_by_addbar}";
if (mysqli_multi_query($conn,$sql_delete_post)) {
    echo "<script>window.location.href='$hostname/admin/mission.php'</script>";
    header("Location:{$hostname}/admin/mission.php");
} else {
    echo ("<div class='alert alert-danger'>Can't Delete Mission!!</div>");
}
mysqli_close($conn);

?>