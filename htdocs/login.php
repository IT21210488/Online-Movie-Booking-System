<?php session_start(); ?>
<?php require_once 'connection.php'?>
<?php require_once 'login-process.php'?>

<!DOCTYPE html>

<html>
<head>
    <title>Ebooking.lk-Login</title>

    <!-- External Sources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 

    <!-- Other Styles -->
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="js/showpass.js"></script>
    

</head>
<body >
<header><?php include 'html/header.html';?></header><br>
<div class="home-page-body-section">
        
    
      <img src="images/icons/userlogo.png" class="img">
      <div class="Align">
            <center class="center" >Login</center><br><br>
            <form action="login.php" method="post">
           
                <?php if(isset($errors) && !empty($errors))  
                {
                 echo '<p id="erro">Invalid username / Password</p>';
                } 
                 ?>

               <p>User Name</p>
               <input type="text" name="username" placeholder="Enter your Username" required>

               <p>Password</p>
               <input type="Password" name="Password" id = "Password" placeholder="************"required><br><br>

               <label>Show password</label>
               <input class="checkbox" type="checkbox"  onclick="ShowMe()"><br>

               <input id="submitlogin"  type="submit" name="submit" value="GET STARTED"><br><br><br>

               <a href="register.php"><u style="font-size: 12px;">Create Account</u></a>
               <a href= "cust_forgotPassword.php"> <u><p class="forgot-ps">Forgot Password</p></u></a>
       
           </form>
       
      </div>
 </div>
 <script src="js/homepage.js"></script>
    <footer><?php include 'html/footer.html';?></footer>
    
</body>
</html>
<?php mysqli_close($connect);