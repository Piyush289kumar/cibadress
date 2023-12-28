    <?php
    include("config.php");
    $user_id_getaddbar = $_GET['feed_id'];

    $sql_delete_user = "DELETE FROM feedback WHERE feed_id='{$user_id_getaddbar}'";

    if (mysqli_query($conn, $sql_delete_user)) {
        echo "<script>window.location.href='$hostname/admin/feedback.php'</script>";
    } else {
        echo ("<p style='color:red; margin:10px 0;'>Can't Delete the Feedback.");
    }
    mysqli_close($conn);

    ?>