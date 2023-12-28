<?php include "header.php";
include("config.php");
$category_index_by_addbar = $_GET['category_index'];
if (isset($_POST['sumbit'])) {
    $member_name = mysqli_real_escape_string($conn, $_POST['name']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $jila = mysqli_real_escape_string($conn, $_POST['jila']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $business = mysqli_real_escape_string($conn, $_POST['business']);
    $caste = mysqli_real_escape_string($conn, $_POST['caste']);
    $blood = mysqli_real_escape_string($conn, $_POST['blood']);
    $relation = mysqli_real_escape_string($conn, $_POST['relation']);
    $upi = mysqli_real_escape_string($conn, $_POST['upi']);
    $money = mysqli_real_escape_string($conn, $_POST['money']);
    $post_date = date("d M, Y");
    $sql_update_category = "UPDATE registered_member SET 
        name = '{$member_name}',
        fname = '{$fname}',
        re_add = '{$address}',
        state = '{$state}',
        jila = '{$jila}',
        pin = '{$pincode}',
        dob = '{$dob}',
        contact = '{$phone}',
        whatsapp = '{$whatsapp}',
        email = '{$email}',
        gender = '{$gender}',
        edu = '{$education}',
        bus = '{$business}',
        caste = '{$caste}',
        blood = '{$blood}',
        relation = '{$relation}',
        upi = '{$upi}',
        money = '{$money}'        
        WHERE re_id =  {$category_index_by_addbar}";
    if (mysqli_query($conn, $sql_update_category)) {
        echo "<script>window.location.href='$hostname/admin/registered_member.php'</script>";
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
                $sql_show_category = "SELECT * FROM registered_member WHERE re_id = {$category_index_by_addbar}";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        // 
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="re_id" class="form-control" value="<?php echo $row['re_id'] ?>"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['name'] ?>" placeholder="नाम :"
                                    name="name" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['fname'] ?>"
                                    placeholder="पिता/पति :" name="fname" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['re_add'] ?>"
                                    placeholder="वर्तमान पता :" name="address" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="state" required>
                                    <option class="hidden" selected disabled>प्रदेश :</option>
                                    <option selected>
                                        <?php echo $row['state'] ?>
                                    </option>
                                    <option value="मध्यप्रदेश">1. मध्यप्रदेश</option>
                                    <option value="उत्तरप्रदेश">2. उत्तरप्रदेश</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['jila'] ?>" placeholder="जिला :"
                                    name="jila" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['pin'] ?>" placeholder="पिनकोड :"
                                    name="pincode" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" value="<?php echo $row['dob'] ?>"
                                    placeholder="जन्म तिथि" name="dob" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                                    value="<?php echo $row['contact'] ?>" placeholder="दूरभाष/मोबा. :" autocomplete="off"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="whatsapp" class="form-control"
                                    value="<?php echo $row['whatsapp'] ?>" placeholder="व्हाट्सएप नंबर :" autocomplete="off"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" value="<?php echo $row['email'] ?>"
                                    placeholder="ई-मेल :" name="email" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <div class="maxl" name="gender" autocomplete="off" required style="margin-left:5%;">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="पुरूष" checked>
                                        <span> पुरूष </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="महिला">
                                        <span>महिला </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['edu'] ?>"
                                    placeholder="शैक्षणिक योग्यता :" name="education" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['bus'] ?>"
                                    placeholder="व्यवसाय :" name="business" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="caste" autocomplete="off" required>
                                    <option class="hidden" selected disabled>जाति वर्ग :</option>
                                    <option selected>
                                        <?php echo $row['caste'] ?>
                                    </option>
                                    <option value="सामान्य">1. सामान्य</option>
                                    <option value="ओ.बी.सी.">2. ओ.बी.सी.</option>
                                    <option value="अनुसूचित जाति">3. अनुसूचित जाति</option>
                                    <option value="अनुसूचित जनजाति">4. अनुसूचित जनजाति</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="blood" autocomplete="off" required>
                                    <option class="hidden" selected disabled>रक्त समूह :</option>
                                    <option selected>
                                        <?php echo $row['blood'] ?>
                                    </option>
                                    <option value="A+">1. A+</option>
                                    <option value="B+">2. B+</option>
                                    <option value="O+">3. O+</option>
                                    <option value="AB+">4. AB+</option>
                                    <option value="AB-">5. AB-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['relation'] ?>"
                                    placeholder="सम्बद्व अन्य संस्थायें :" name="relation" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['upi'] ?>" placeholder="UPI ID"
                                    name="upi" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['money'] ?>"
                                    placeholder="जमा राशि" name="money" autocomplete="off" required />
                            </div>
                            <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>