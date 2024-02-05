<?php
    session_start();
    include('connection.php');
?>
<?php 
    if(isset($_POST['request_otp'])){
        $user_email = $_POST['reset_email'];
        $rand_otp = rand(100000,999999);

        date_default_timezone_set('Asia/Kolkata');
        $expiry_date = date('Y-m-d H:i:s', (time() + 120));

        // Query to get user availability
        $check_for_user_query = "SELECT * FROM staffmember WHERE Email='$user_email'";
        $check_for_user_query_run = mysqli_query($connect,$check_for_user_query);
        $fetch_user = mysqli_fetch_array($check_for_user_query_run);

        if(mysqli_num_rows($check_for_user_query_run)>0){
            $_SESSION['staff_id'] = $fetch_user['S_ID'];
            $record_otp_query = "UPDATE staffmember SET otp='$rand_otp' WHERE S_ID='$_SESSION[staff_id]'";
            $record_otp_query_run = mysqli_query($connect,$record_otp_query);

            $record_expiry_date_query = "UPDATE staffmember SET expires='$expiry_date' WHERE S_ID='$_SESSION[staff_id]'";
            $record_expiry_date_query_run = mysqli_query($connect,$record_expiry_date_query);

            // Send email 
            $email_recipient = $fetch_user['Email'];
            $email_subject = "Reset password - E-Booking.lk";
            $email_body = "Your OTP is ".$rand_otp;
            $email_body .= "\r\n PLease use the OTP provided to reset your password. The OTP will expire shortly";
            $email_headers =  'MIME-Version: 1.0' . "\r\n"; 
            $email_headers .= 'From: E-Booking.lk <dinindudk1997@gmail.com>' . "\r\n";
            $email_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            
            if (mail($email_recipient, $email_subject, $email_body, $email_headers)) {
                header("location:admin_verifyPasswordOtp.php");
            } else {
                echo "Failed to send the email";
            }
        }else{
            session_destroy();
            echo "Sorry ! We cannot find any user related to this email address provided";
        }
    }else{

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>E-Booking.lk - Forgot Password</title>

        <!-- Meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link href="css/common.css"type="text/css" rel="stylesheet">
        <link href="css/footer.css"type="text/css" rel="stylesheet">
        <link href="css/header.css"type="text/css" rel="stylesheet">
        <link href="css/forgotpassstyles.css"type="text/css" rel="stylesheet">
    </head>
    <body>
        <!-- Header -->
        <?php include 'html/header.html';?>

        <!-- Page Content -->
        <div class="content-container">
            <div class="forgot-pass-page-content">
                <p class="fppage-page-text-one">Forgot your password ? Dont worry, We are here to help you reset your password</p>

                <div class="fppage-form-sec">
                    <form method="POST" action="?submit=true"> 
                        <input type="text" name="reset_email" class="fppage-email-field" placeholder="Enter your email ID" required><br>
                        <input type="submit" value="Submit" name="request_otp" class="fppage-submit-btn"><br>
                    </form>
                    <div class="form-other-links-sec">
                        <div class="form-other-links-left">
                            <a href="login.php" class="fppage-other-link-txt">Go back to Login</a>
                        </div>
                        <div class="form-other-links-right">
                            <a href="register.php" class="fppage-other-link-txt">Create new account</a>
                        </div>
                    </div>
                </div>

                <p class="fppage-page-text-two">An OTP will be sent to the email address. Please check your mails once requested</p>

            </div>
        </div>
        <script src="js/homepage.js"></script>

        <!-- Footer -->
        <?php include 'html/footer.html';?>
    </body> 
</html>