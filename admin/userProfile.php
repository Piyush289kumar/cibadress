<?php include "header.php";


if ($_SESSION['user_role'] == 1) {
    header("Location:{$hostname}/admin/post.php");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">Profile</h1>
            </div>
            <div class="col-md-2">
                <!-- <a class="add-new" href="add-user.php"> Details</a> -->
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <!-- <th>S.No.</th> -->
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Update</th>
                    </thead>
                    <tbody>
                        <!-- PHP CODE -->
                        <?php
                        include("config.php");
                        if (isset($_GET['page_num_index'])) {
                            $page_num_index_by_addbar = $_GET['page_num_index'];
                        } else {
                            $page_num_index_by_addbar = 1;
                        }

                        $userId = $_SESSION['user_id'];
                        $record_limit = 5;
                        $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                        $sql_show_user = "SELECT * FROM user WHERE user_id = {$userId}";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {

                                ?>
                                <tr>
                                    <!-- <td class='id'>
                                        <php echo ($serial_num); ?>
                                    </td> -->
                                    <td style="text-align:center;">
                                        <img src="upload\<?php echo ($row['img']) ?>" alt="Error" style="height: 65px; border-radius:50%;">
                                        
                                    </td>
                                    <td>
                                        <?php echo ($row['first_name'] . " " . $row['last_name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['username']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['phone']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['email']) ?>
                                    </td>
                                    
                                    <td class='edit'><a href='update-user.php?id=<?php echo ($row["user_id"]) ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    
                                </tr>

                                <?php $serial_num++;
                            }
                        } ?>
                        <!-- PHP CODE -->

                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>