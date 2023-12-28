<?php include "header.php";
include("config.php");

    if (isset($_POST['sumbit'])) {
    $pro_year = mysqli_escape_string($conn,$_POST['pro_year']);

        $sql_update_category = "UPDATE pro_year SET pro_year = '{$pro_year}' WHERE pro_year_id =  1";
    if (mysqli_query($conn, $sql_update_category)) {
        echo "<script>window.location.href='$hostname/admin/program.php'</script>";
        
            
     
    }
    }
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading">Update Year</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">                                      
                  <form action="<?php $_SERVER['PHP_SELF']?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                                    <select required class="form-control" name="pro_year"  >
                                        <option class="hidden" selected><- वर्ष का चयन करें -></option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>                  
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
