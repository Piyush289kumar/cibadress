<?php
include("config.php");
$post_id_by_addbar = $_GET['category_index'];

$sql_delete_post = "DELETE FROM program WHERE pro_id = {$post_id_by_addbar}";
if (mysqli_multi_query($conn,$sql_delete_post)) {
    echo "<script>window.location.href='$hostname/admin/program.php'</script>";
    
} else {
    echo ("<div class='alert alert-danger'>Can't Delete Program!!</div>");
}
mysqli_close($conn);

?>