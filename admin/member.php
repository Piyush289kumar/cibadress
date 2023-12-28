<?php include "header.php";


if ($_SESSION['user_role'] == 0) {
    header("Location:{$hostname}/admin/");
}
 ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Member</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-member.php">ADD MEMBER</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Member Name</th>
                        <th>Member Post</th>
                        <th>Contact</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        if (isset( $_GET['category_page_index'])) {
                            $page_index_by_addbar = $_GET['category_page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limit = 5;
                        $offset = ($page_index_by_addbar - 1) * $record_limit;
                        
                        $sql_show_category = "SELECT * FROM member LIMIT {$offset},{$record_limit}";
                        $result_sql_show_category = mysqli_query($conn,$sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category)>0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                
                          
                        ?>
                        <tr>
                            <td class='id'><?php echo ($serial_num); ?></td>
                            <td><?php echo($row['name']) ?></td>
                            <td><?php echo($row['post']) ?></td>
                            <td><?php echo($row['contact']) ?></td>
                            <td class='edit'><a href='update-member.php?category_index=<?php echo($row['member_id']) ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-member.php?category_index=<?php echo($row['member_id']) ?>'><i class='fa fa-trash'></i></a></td>
                        </tr>

                        <?php    $serial_num++; }
                        }?>
                    </tbody>
                </table>

                <?php
                $sql_show_category_by_page = "SELECT * FROM member";
                $result_sql_show_category_by_page = mysqli_query($conn, $sql_show_category_by_page) or die("Query Failed!! --> sql_show_category_by_page");
                if (mysqli_num_rows($result_sql_show_category_by_page)>0) {
                    $total_category_record = mysqli_num_rows($result_sql_show_category_by_page);
                    $total_page = ceil($total_category_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");
                    
                    if ( $page_index_by_addbar > 1 ) {
                        echo ("<li><a href='member.php?category_page_index=".($page_index_by_addbar - 1)."'>Prev</a></li>");
                    }

                    for ($i=1; $i <= $total_page; $i++) {
                        if ($page_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }
                        
                        echo ("<li class=$active_page><a href='member.php?category_page_index=$i'>$i</a></li>");
                    }
                    if ( $page_index_by_addbar < $total_page ) {
                        echo ("<li><a href='member.php?category_page_index=".($page_index_by_addbar + 1)."'>Next</a></li>");
                    }
                    
                    echo ("</ul>");
                }
                ?>
                
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
