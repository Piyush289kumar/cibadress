<?php
include("config.php");
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='$hostname/admin'</script>";
}

include("config.php");

$post_id_by_addbar = $_GET['post_id'];

    include('admin/phpmailer_smtp/smtp/PHPMailerAutoload.php');

    $end_user_email = "piyushraikwar289@gmail.com";
    $subject = "Product Enquery Notification";
    $body = "Your <b>ADMIN Ciba Garment</b> Account was just used to <b>SIGN IN</b> by following information : <br><br><br><br>" .
        "Date :- " . date("d M, Y h:i:sa") . "<br> IP Address :- " . getenv("REMOTE_ADDR");


    // Take Product Record
    $sql_show_category = "SELECT * FROM post WHERE post_id = '{$post_id_by_addbar}'";
    $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! -> sql_show_category");
    if (mysqli_num_rows($result_sql_show_category) > 0) {
        while ($row = mysqli_fetch_assoc($result_sql_show_category)) {

            // Take User Record

            // Take Product Record
            $userIdSession = $_SESSION['user_id'];
    $sql_fetch_userRecord = "SELECT * FROM user WHERE user_id = '{$userIdSession}'";
    $result_sql_fetch_userRecord = mysqli_query($conn, $sql_fetch_userRecord) or die("Query Failed!! -> sql_fetch_userRecord");
    if (mysqli_num_rows($result_sql_fetch_userRecord) > 0) {
        while ($row2 = mysqli_fetch_assoc($result_sql_fetch_userRecord)) {


            if ($row2['email'] != NULL) {
                $end_user_email = $row2['email'];
                $subject = "Product Enquery Notification";
                $body = "<b>Product Enquery Notification</b><br>" .
                        "<b>Date :- " . date('d M, Y h:i:sa') . "</b><br>".
                        "<b>Product Details ============ </b><br>" .
                        "<b>Product Code : </b>" . $row['pro_code'] . "<br>" .
                        "<b>Product Name : </b>" . $row['title'] . "<br>" .
                        "<b>Product Price : </b>" . $row['pro_price'] . "<br>" .
                        "<b>User Details ============ </b><br>" .
                        "<b>Full Name : </b>" . $row2['first_name'] ." ". $row2['last_name'] . " <br>" .
                        "<b>User Name : </b>" . $row2['username'] . "<br>" .
                        "<b>Mobile : </b>" . $row2['phone'] . "<br>" .
                        "<b>Email : </b>" . $row2['email'] . "<br>" .
                    "<b>Ciba Garment</b> Team Connect you as soon as possible" . "</b>" ;
                
                    
            }else{
                $end_user_email = "navednsr3@gmail.com";
                $subject = "Product Enquery Notification";
                $body = "<b>Product Enquery Notification</b><br>" .
                        "<b>Date :- " . date('d M, Y h:i:sa') . "</b><br>".
                        "<b>Product Details ============ </b><br>" .
                        "<b>Product Code : </b>" . $row['pro_code'] . "<br>" .
                        "<b>Product Name : </b>" . $row['title'] . "<br>" .
                        "<b>Product Price : </b>" . $row['pro_price'] . "<br>" .
                        "<b>User Details ============ </b><br>" .
                        "<b>Full Name : </b>" . $row2['first_name'] ." ". $row2['last_name'] . " <br>" .
                        "<b>User Name : </b>" . $row2['username'] . "<br>" .
                        "<b>Mobile : </b>" . $row2['phone'] . "<br>" .
                        "<b>Email : </b>None<br>" .
                    "<b>Ciba Garment</b> Team Connect you as soon as possible" . "</b>" ;
            }

            }
        }

        }
    }
    echo smtp_mailer($end_user_email, $subject, $body);
    function smtp_mailer($to, $subject, $msg)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; 
        $mail->Username = "emailbot4all@gmail.com";
        $mail->Password = "siomkbvpakcldsoa";
        $mail->SetFrom("emailbot4all@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->AddBCC("navednsr3@gmail.com");
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );
        if (!$mail->Send()) {
            
            echo "<div style='background:red; color:#fff; font-size:24px;'>Please cheack Your Internet Connection !!</div>";
        } else {
            
            // return "<scrsipt>window.location.href='index.php'</script>";
        }
    }
 
?>

<?php include("header.php"); ?>

    <section class="section-m1 section-p1" style='text-align:center;'>
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="admin-heading">Product Enquery</h3>
                    </div>
                    <div class="col-12">

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">


                            <!-- <a href="admin/enquery.php?id=<php echo ($row["post_id"]) ?>" class='cart' style='width:110px;'>Enquery</a> -->
                            <input type="button" name="submit" class="cart" value="Enquery Send Successfully" style='
	background-color: #088178;
	color: #fff;
    text-align:center;
	border: 0;
	padding: 14px 28px;
	border-radius: 24px;
	font-size: 15px;
	font-weight: 700;
	cursor: pointer;margin: 15px 0;
' /><br>
    <br>

<a href="index.php" class="cart" style='
	background-color: #222;
	color: #fff;
    text-align:center;
	border: 0;
	padding: 14px 28px;
	border-radius: 24px;
	font-size: 15px;
	font-weight: 700;
	cursor: pointer;margin: 15px 0;
'>Continue Shopping</a>

                            <!-- <input type="submit" name="second" class="btn btn-primary" value="Back" /> -->
                        </form>
                        <!-- Form End -->



                    </div>
                </div>
            </div>
        </div>

    </section>



    <!-- Footer Section Start -->
    <hr>
    <?php include('footer.php');?>