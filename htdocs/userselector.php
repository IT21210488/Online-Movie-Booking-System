<!DOCTYPE html>
<html>
<head>
    <title>EBooking.lk - User Select</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 

      
    <!-- Other Styles -->
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link href="css/homepage.css"type="text/css" rel="stylesheet">
    <link href="css/about.css"type="text/css" rel="stylesheet">
    <link href="css/movies.css"type="text/css" rel="stylesheet">
    <link href="css/userselector.css"type="text/css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include 'html/header.html';?>


    <div class="userselector-page-section">
        <div class="userselector-container">
            <ul class="userselector-list">
                    <li><a href="admin_forgotPassword.php">Admin</a></li>
                    <li><a href="cust_forgotPassword.php">Customer</a></li>
            </ul>
        </div>
    </div>

    
    <!-- Footer -->
    <?php include 'html/footer.html';?>
</body>
</html>