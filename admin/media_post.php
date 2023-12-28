<?php include "header.php";

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Media Post</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add_media_post.php">add Media post</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Insert</th>
                        <th>Media Delete</th>
                        <th>Title</th>
                        <!-- <th>Order</th> -->
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

                        
                            $sql_show_post_record = "SELECT *  FROM media
                        ORDER BY media.date DESC LIMIT {$offset},{$record_limi}" or die("Query Failed!! --> sql_show_media_record");
                        
                        $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
                        if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
                                ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo ($serial_num) ?>
                                    </td>

                                      <td style="text-align:center;"><a href='add-media.php?post_id=<?php echo ($row['media_id']) ?>'><i class="fa-solid fa-circle-plus" style="font-size:20px;"></i></a></td>

                                    <td style="text-align:center;"><a href='delete-media.php?post_id=<?php echo ($row['media_id']) ?>'><i class="fa-solid fa-file-excel" style="font-size:18px; color:#000;"></i></a></td>

                                    <td>
                                        <?php echo ($row['name']); ?>
                                    </td>
                                    <!-- <td>
                                        <php echo ($row['date']); ?>
                                    </td> -->


                                    <td class='edit'><a href='update-media-post.php?post_id=<?php echo ($row['media_id']) ?>'><i
                                                class='fa fa-edit'></i></a></td></a></td>

                                    
                                    <td class='delete'><a
                                            href='delete-media-post.php?post_id=<?php echo $row['media_id']; ?>'><i
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
                $sql_total_post_record = "SELECT * from media" or die("Query Failed !! --> sql_total_post_record");
                $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
                if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                    $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                    $total_page = ceil($total_post_record / $record_limi);
                    echo ("<ul class='pagination admin-pagination'>");

                    if ($page_index_by_addbar > 1) {
                        echo ("<li><a href='$hostname/admin/media_post.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                    }

                    for ($i = 1; $i <= $total_page; $i++) {

                        if ($page_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }

                        echo ("<li class=$active_page><a href='$hostname/admin/media_post.php?page_index=$i'>$i</a></li>");
                    }
                    if ($page_index_by_addbar < $total_page) {
                        echo ("<li><a href='$hostname/admin/media_post.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>