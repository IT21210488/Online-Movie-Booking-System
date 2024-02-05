<?php
    session_start();
    include('connection.php');
?>
<?php
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $check_user_query = "SELECT * FROM customer WHERE C_ID='$user_id'";
        $check_user_query_run = mysqli_query($connect,$check_user_query);
        $fetch_user_details = mysqli_fetch_array($check_user_query_run);

        if(mysqli_num_rows($check_user_query_run)>0){
            //
        }else{
            session_destroy();
            header("location:index.php");
        }
    }else{
        session_destroy();
        header("location:index.php");
    }
?>
<?php
    if(isset($_POST['verify_otp'])){
        $user_otp = $_POST['otp_entered'];
        $db_otp = $fetch_user_details['otp'];

        // Check expiry date
        $check_exp_query = "SELECT expires FROM customer WHERE C_ID='$_SESSION[user_id]'";
        $check_exp_query_run = mysqli_query($connect,$check_exp_query);
        $expiry_date = mysqli_fetch_array($check_exp_query_run);

        $exp_date_db = $expiry_date['expires'];

        // Get current time
        date_default_timezone_set('Asia/Kolkata');
        $current_time = date('Y-m-d H:i:s');

        // Verify OTP
        if($current_time < $exp_date_db){
            if($db_otp == $user_otp){
                $rmv_otp_query = "UPDATE customer SET otp=NULL WHERE C_ID='$_SESSION[uid]'";
                $rmv_otp_query_run = mysqli_query($connect,$rmv_otp_query);

                $rmv_exp_query = "UPDATE customer SET expires=NULL WHERE C_ID='$_SESSION[uid]'";
                $rmv_exp_query_run = mysqli_query($connect,$rmv_exp_query);

                $_SESSION['status'] = "Success";

                header("location:cust_resetPassword.php");
            }else{
                echo '<p>The OTP you entered is invalid. Please retry or request new otp</p>';
            }
        }else{
            $rmv_otp_query = "UPDATE customer SET otp=NULL WHERE C_ID='$_SESSION[uid]'";
            $rmv_otp_query_run = mysqli_query($connect,$rmv_otp_query);

            $rmv_exp_query = "UPDATE customer SET expires=NULL WHERE C_ID='$_SESSION[uid]'";
            $rmv_exp_query_run = mysqli_query($connect,$rmv_exp_query);
    
            echo '<script>alert("The OTP is expired. Please request a new OTP")</script>';
        }
    }else{

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>E-Booking.lk - Verify OTP</title>

        <!-- Meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles used -->
        <link href="css/common.css"type="text/css" rel="stylesheet">
        <link href="css/footer.css"type="text/css" rel="stylesheet">
        <link href="css/header.css"type="text/css" rel="stylesheet">
        <link href="css/forgotpassstyles.css"type="text/css" rel="stylesheet">
        
        <script>
            var timeleft = 120;
            var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    clearInterval(downloadTimer);
                    document.getElementById("countdown").innerHTML = "* Your OTP is expired";
                } else {
                    document.getElementById("countdown").innerHTML = "* Your OTP will expire in another "+timeleft +" seconds";
                }
                timeleft -= 1;
            }, 1000);
        </script>
    </head>
    <body>
        <!-- Header -->
        <?php include 'html/header.html';?>

        <!-- Page Content -->
        <div class="content-container">
            <div class="create-new-pass-form add-border">
                <p class="fppage-page-text-one">Enter the OTP here</p>

                <div class="fppage-form-sec">
                    <form method="POST" action=""> 
                        <input type="text" name="otp_entered" class="fppage-email-field" placeholder="Enter the OTP" required><br>
                        <input type="submit" value="Verify OTP" name="verify_otp" class="fppage-submit-btn"><br>
                    </form>
                    <div class="form-other-links-sec">
                        <div class="form-other-links-left">
                            <a href="login.php" class="fppage-other-link-txt">Go back to Login</a>
                        </div>
                        <div class="form-other-links-right">
                            <a href="signup.php" class="fppage-other-link-txt">Create new account</a>
                        </div>
                    </div>
                </div>

                <p class="fppage-page-text-two">The OTP was sent to the email. In case you have not recived or the OTP expired please request another OTP</p>
                <p class="fppage-page-text-two color-red" id="countdown"></p>

            </div>
        </div>
        <script src="js/homepage.js"></script>

        <!-- Footer -->
        <?php include 'html/footer.html';?>
    </body> 
</html>