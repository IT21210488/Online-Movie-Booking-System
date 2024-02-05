<?php session_start(); ?>


<?php require_once 'connection.php'?>
<?php 

//check for form submission
if(isset($_POST['log']))
{

       $errors = array();
       //check if username and password entered

   if (!isset($_POST['Uname']) || strlen(trim($_POST['Uname'])) < 1 )

     {
          $errors[] = 'username is missing or invalid';

     }

   if (!isset($_POST['Pass']) || strlen(trim($_POST['Pass'])) < 1 )

     {
          $errors[] = 'Password is missing or invalid';

     }

      // check if there are any errors in the froms

     if (empty($errors))
     {

         //save usernames and password into Uname
         $username = mysqli_real_escape_string($connect,$_POST['Uname']);
         $password = mysqli_real_escape_string($connect,$_POST['Pass']);

         //prepare database query
         $query = "SELECT * FROM staffmember Where Username = '{$username}' AND Password = '{$password}' LIMIT 1";

         $result_set = mysqli_query($connect,$query);

          if ($result_set)
          {
            //Query succesful

                 if(mysqli_num_rows($result_set ) == 1)//is found a user ?
                {
                     //valid user found

                    $admin = mysqli_fetch_assoc($result_set);
                    $_SESSION['userid'] = $admin['S_ID'];
                    $_SESSION['firstnanme'] = $admin['FirstName'];

                    //redirect to userhome page
                    header('Location:home.php');

                }

                
                else
                {
                $errors[] = 'invalid user / password';

                }

        }

         

  }

}

?>



<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Admin</title>    
    <link rel="stylesheet" type="text/css" href="css/admin-css.css"> 
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
</head>    
<body class="body"> 
<header><?php include 'html/header.html';?><br></header>   
     
    <img class="imgadmin" src="images/admin.png">
    <div class="login">
    <form id="login" method="post" action="adminlogin.php">  
    <h2>ADMIN</h2><br>   
        
         <?php if(isset($errors) && !empty($errors))  
         {
            echo '<p id="erro">Invalid username / Password</p>';
         } 
        ?>
        <label class="label"><b>User Name     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username">    
        <br><br>    
        <label class="label"><b>Password     
        </b>    
        </label>    
        <input type="Password" name="Pass" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="log" id="log" value="Log In">       
        <br/><br/><a href="admin_forgotPassword.php" style="color: #ffffff;">Forgot Password ?</a>
    </form>     
</div>
<script src="js/homepage.js"></script>  

 <footer><?php include 'html/footer.html';?></footer>

</body>    
</html>     