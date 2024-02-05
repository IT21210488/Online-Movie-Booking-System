<?php 

//check for form submission
if(isset($_POST['submit']))
{

       $errors = array();
       //check if username and password entered

   if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1 )

     {
          $errors[] = 'username is missing or invalid';

     }

   if (!isset($_POST['Password']) || strlen(trim($_POST['Password'])) < 1 )

     {
          $errors[] = 'Password is missing or invalid';

     }

      // check if there are any errors in the froms

     if (empty($errors))
     {

         //save usernames and password into varibales
         $username = mysqli_real_escape_string($connect,$_POST['username']);
         $password = mysqli_real_escape_string($connect,$_POST['Password']);

         //prepare database query
         $query = "SELECT  * FROM customer Where  Username   = '{$username}' AND Password = '{$password}' LIMIT 1";
         $query2 = "SELECT * FROM staffmember Where username = '{$username}' AND Password = '{$password}' LIMIT 1";
         

         $result_set = mysqli_query($connect,$query); //customer query set
         $result_set_2 = mysqli_query($connect,$query2); //Admin query set

          //User check
          if ($result_set)
          {
            //Query succesful

                 if(mysqli_num_rows($result_set) == 1)//is found a user ?
                {
                     //valid user found

                    $user = mysqli_fetch_assoc($result_set);
                    $_SESSION['userid'] = $user['C_ID'];
                    $_SESSION['firstnanme'] = $user['FirstName'];

                  //redirect to userhome page
                  header('Location:index.php');

                }

                
                else

                {

                $errors[] = 'invalid user / password';

                }

        }

        //Admin check
     //    if ($result_set_2)
     //    {
     //        //Query succesful

     //             if(mysqli_num_rows($result_set_2) == 1)//is found a user ?
     //            {
     //                 //valid user found

     //                $admin = mysqli_fetch_assoc($result_set_2);
     //                $_SESSION['userid'] = $admin['S_ID'];
     //                $_SESSION['firstnanme'] = $admin['FirstName'];

     //                //redirect to Adminhome page
     //                header('Location:admin.php');

     //            }

                
     //            else

     //            {

     //            $errors[] = 'invalid user / password';

     //            }

     //    }

         

  }

}

?>