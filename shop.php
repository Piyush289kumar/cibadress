<?php include('header.php'); ?>

    <!-- Featured Products Section -->
    <hr>
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <div class="pro-container">

             <!-- PHP CODE -->
             <?php
                        include("config.php");
                        if (isset($_GET['page_index'])) {
                            $page_index_by_addbar = $_GET['page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limi = 12;
                        $offset = ($page_index_by_addbar - 1) * $record_limi;
                        $sql_show_category = "SELECT * FROM post ORDER BY post_id DESC LIMIT {$offset},{$record_limi}";
                        $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category) > 0) {
                            $serial_num = 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                ?>
            <!-- Product Card Start -->
            <div class="pro">
                <img src="<?php echo 'admin/upload/'. $row['post_img']; ?>" alt="product picture" />
                <!-- <img src="img/products/f2.jpg" alt="product picture" /> -->
                <div class="des">
                    <!-- <span>Adidas</span> -->
                    <h5>
                        <?php echo $row['title']; ?>
                    </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₹ <?php echo $row['pro_price']; ?>/-</h4>
                </div>
                <a href="enquery.php?post_id=<?php echo ($row["post_id"]) ?>" class='cart'
                    style='width:110px;'>Enquery</a>
                <!-- <a href="#" class='cart' style='width:110px;'>Enquery</a> -->
            </div>
            <!-- Product Card End -->
            <?php }} ?>


          

        </div>
        <?php
            // pagenation block start
            $sql_total_post_record = "SELECT * from post" or die("Query Failed !! --> sql_total_post_record");
            $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
            if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                $total_page = ceil($total_post_record / $record_limi);
                echo ("<ul class='pagination admin-pagination'>");
                if ($page_index_by_addbar > 1) {
                    echo ("<li><a href='$hostname/shop.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page_index_by_addbar == $i) {
                        $active_page = "active";
                    } else {
                        $active_page = "";
                    }
                    echo ("<li class=$active_page><a href='$hostname/shop.php?page_index=$i'>$i</a></li>");
                }
                if ($page_index_by_addbar < $total_page) {
                    echo ("<li><a href='$hostname/shop.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                }
                echo ("</ul>");
            }
            // pagenation block end
            ?>
    </section>



    <?php include('footer.php'); ?>