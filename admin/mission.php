<?php include "header.php";

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Mission</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-mission.php">add mission</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        if (isset($_GET['page_index'])) {
                            $page_index_by_addbar = $_GET['page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limi = 5;
                        $offset = ($page_index_by_addbar - 1) * $record_limi;

                        if ($_SESSION['user_role'] == 1) {
                            $sql_show_post_record = "SELECT *  FROM mission
                        LEFT JOIN user ON mission.mission_author = user.user_id
                        ORDER BY mission.mission_id LIMIT {$offset},{$record_limi}" or die("Query Failed!! --> sql_show_mission_record");
                        } elseif ($_SESSION['user_role'] == 0) {
                            $sql_show_post_record = "SELECT *  FROM mission
                        LEFT JOIN user ON mission.mission_author = user.user_id
                        WHERE mission.mission_author = {$_SESSION['user_id']}
                        ORDER BY mission.mission_id  LIMIT {$offset},{$record_limi}" or die("Query Failed!! --> sql_show_mission_record");

                        } else {

                        }

                        $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
                        if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
                                ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo ($serial_num) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['mission_title']); ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['mission_date']); ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['username']); ?>
                                    </td>


                                    <td class='edit'><a href='update-mission.php?post_id=<?php echo ($row['mission_id']) ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a
                                            href='delete-mission.php?post_id=<?php echo $row['mission_id']; ?>'><i
                                                class='fa fa-trash'></i></a></td>


                                </tr>
                                <?php
                                $serial_num++;
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                $sql_total_post_record = "SELECT * from mission" or die("Query Failed !! --> sql_total_post_record");
                $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
                if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                    $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                    $total_page = ceil($total_post_record / $record_limi);
                    echo ("<ul class='pagination admin-pagination'>");

                    if ($page_index_by_addbar > 1) {
                        echo ("<li><a href='$hostname/admin/mission.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                    }

                    for ($i = 1; $i <= $total_page; $i++) {

                        if ($page_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }

                        echo ("<li class=$active_page><a href='$hostname/admin/mission.php?page_index=$i'>$i</a></li>");
                    }
                    if ($page_index_by_addbar < $total_page) {
                        echo ("<li><a href='$hostname/admin/mission.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>