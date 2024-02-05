<?php require_once 'connection.php'?>
<?php require_once 'register-form.php'?>

<!DOCTYPE html>

<html>
<head>
    <title>EBooking.lk-Register</title>

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
    <link rel="stylesheet" type="text/css" href="css/register.css">
    

</head>
<body class="Body">
    <header><?php include 'html/header.html';?></header>
    <div class="home-page-body-section">
        <!-- Add content here -->
    
<center><h2>Register Here</h2></center>
<form action="register.php" method="post">

  
    FirstName:<br>
  <input type="text" name="FirstName" placeholder="Enter your FirstName" maxlength="15" required><br>

    LastName:<br>
    <input type="text" name="LastName" placeholder="Enter your LastName" maxlength="15" required><br>

    UserName:<br>
    <input type="text" name="UserName" placeholder="Enter your UserName" maxlength="15" required><br>

    Email:<br>
    <input type="email" name="Email" placeholder="Enter your Email" pattern="[a-z0-9_^*^^%@*+-*/]" maxlength="30"required ><br>

    Mobile Number:<br>
    <input type="phone" name="Mobile" placeholder="Enter your Mobile Number" pattern="[0-9]{10}" maxlength="10" required><br>
  
    Gender:<br>
     <input class="Gender" type="Radio"name="Gender" value =Male checked>Male
     <input class="Gender" type="Radio"name="Gender" value =Female >Female<br>
    

    NIC No:<br>
    <input type="text" name="NIC" placeholder="Enter your NIC No" maxlength="12" required><br>

    DOB:<br>
    <input  type="date" name="DOB" required><br>

    Address:<br>
    <textarea name="Address" rows="5"cols = "33" placeholder="Enter your Address" maxlength="40" required></textarea><br>

    Password:<br>
    <input type="Password" name="Password" placeholder="*********************" maxlength="12" required ><br>

    Confirm Password:<br>
    <input type="Password" name="Password2" placeholder="*********************" maxlength="12" required><Br><br> <?php 

   if(!empty($error)){
     
     echo '<p class = "show">Password are not matched</p>';
   }

    ?>

    <center>
    <input class="submit" type="submit" name="submit" placeholder="submit">
    </center><br>
    <p>Already Have an acoount? <u><a href="login.php">Login</a></u></p>


</form>
    </div>
    <script src="js/homepage.js"></script>
<footer><?php include 'html/footer.html';?></footer>

</body>
</html>
<?php mysqli_close($connect); ?>

