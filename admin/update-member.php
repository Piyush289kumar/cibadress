<?php include "header.php";
include("config.php");
$category_index_by_addbar = $_GET['category_index'];
    if (isset($_POST['sumbit'])) {
    $member_name = mysqli_escape_string($conn,$_POST['name']);
    $member_post = mysqli_escape_string($conn,$_POST['post']);
    $member_num = mysqli_escape_string($conn,$_POST['num']);
        $sql_update_category = "UPDATE member SET name = '{$member_name}', post = '{$member_post}', contact = '{$member_num}' WHERE member_id =  {$category_index_by_addbar}";
    if (mysqli_query($conn, $sql_update_category)) {
        echo "<script>window.location.href='$hostname/admin/member.php'</script>";
        
            
     
    }
    }
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading">Update Member</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php                                
                $sql_show_category = "SELECT * FROM member WHERE member_id = {$category_index_by_addbar}";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category)>0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                // 
              
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['member_id'] ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Member Name</label>
                          <input type="text" name="name" class="form-control" value="<?php echo($row['name']) ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Member Post</label>
                          <input type="text" name="post" class="form-control" value="<?php echo($row['post']) ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Contact Number</label>
                          <input type="phone" name="num" maxlength="10" class="form-control" value="<?php echo($row['contact']) ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>

                  <?php  }
                }?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
