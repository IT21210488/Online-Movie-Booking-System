 
<?php 

if (isset($_POST['submit'])) 
{

   $firstname = $_POST['FirstName'];
   $lastName  = $_POST['LastName'];
   $userName  = $_POST['UserName'];
   $email     = $_POST['Email'];
   $mobile    = $_POST['Mobile'];
   $gender    = $_POST['Gender'];
   $NIC       = $_POST['NIC'];
   $dOB       = $_POST['DOB'];
   $address   = $_POST['Address'];
   $Password  = $_POST['Password'];
   $cPassword = $_POST['Password2'];



   if ($_POST['Password'] === $_POST['Password2']) 
   {
      $sql = "SELECT * FROM customer Where UserName = '{$userName}'";
      $result = mysqli_query($connect,$sql);

       if (!$result->num_rows > 0) 
       {
         $sql = "INSERT INTO customer (FirstName,LastName,UserName,Email,TelNo,GENDER,NIC,DOB,Address,Password) VALUES('$firstname','$lastName','$userName','$email','$mobile','$gender','$NIC','$dOB','$address','$Password')";

       }

         $error = array();
         $result = mysqli_query($connect, $sql);

          if ($result) 
          {
             header("Location: login.php");
          }

         
   
   }

   else 

   {
       $error [] ="Password Not Matched.";

   }
   
    
}

?>