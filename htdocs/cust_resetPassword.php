<?php
    session_start();
    include('connection.php');
?>
<?php
    if(isset($_SESSION['status']) && ($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        session_destroy();
        header("location:index.php");
    }
?>
<?php
    if(isset($_POST['passwordreset'])){
        $new_pass = $_POST['new_pass'];
        $re_pass = $_POST['re_pass'];
        if($new_pass==$re_pass){
            $conf_pass = $_POST['re_pass'];
            $pass_update_query = "UPDATE customer SET Password='$conf_pass' WHERE C_ID='$user_id'";
            $pass_update_query_run = mysqli_query($connect,$pass_update_query);
            if($pass_update_query_run){
                session_destroy();
                header("location:login.php");
            }else{
                session_destroy();
                header("location:login.php");
            }
        }else{
            echo '<script>alert("The passwords you entered do not match")</script>';
        }
    }else{

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>E-Booking.lk - Set New Password</title>

        <!-- Meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles used -->
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
            <div class="create-new-pass-form add-border">
                <p class="fppage-page-text-one">Create a new password</p>

                <div class="fppage-form-sec">
                    <form method="POST" action="">
                        <input type="password" name="new_pass" class="fppage-email-field" placeholder="Enter new password" required>
                        <input type="password" name="re_pass" class="fppage-email-field" placeholder="Re-enter the new password" required><br>
                        <input type="submit" value="Create Password" name="passwordreset" class="fppage-submit-btn"><br>
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

                <p class="fppage-page-text-two color-red">* When creating a new password, make sure to create a strong password. We strongly suggest you to use a combination of lowercase / uppercase letters, numbers, and special charaters</p>

            </div>
        </div>
        <script src="js/homepage.js"></script>

        <!-- Footer -->
        <?php include 'html/footer.html';?>
    </body> 
</html>