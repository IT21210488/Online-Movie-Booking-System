<?php
    session_start();
    include('connection.php');
?>
<?php
    if(isset($_GET['mid'])){
        $movieId = $_GET['mid'];
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link href="css/cart.css"type="text/css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include 'html/header.html'; ?><br>

    <!-- Body Content -->
    <div class="movies">
        <h1 class="heading">Now Showing</h1>
        <div class="box-container">
            <?php 
                $query = 'SELECT * FROM bookingd ORDER by movieName ASC';
                $result = mysqli_query($connect,$query);
                if ($result):
                    if(mysqli_num_rows($result)>0):
                        while($bookingd = mysqli_fetch_assoc($result)):
                            ?>

                            <form method="post" class="box" action="">
                            <div class="Mname"><?php echo $bookingd ['movieName']; ?></div>
                            <div class="Theater"><?php echo $bookingd ['theatreName']; ?></div>
                            <div class="price">Rs.<?php echo $bookingd['price'];?>.00</div>

                            <input type="number" placeholder="Seats" min="1" name="seats_reserved">
                            <input type="date">
                            <input type="time">
                            
                            <input type="submit" value="add to cart" name="add_to_cart"  class="btn">
                            </form>
                            <?php
                        endwhile;
                    endif;
                endif;
            ?>
        </div>
    </div>

            <div class="shopping-cart">
                <h1 class="heading">Shopping Cart</h1>

                <table>
                    <thead>
                     <th>Movie Name</th>
                     <th>Theater Name</th>
                     <th>Price</th>
                     <th>Seats</th>
                     <th>total ptice</th>  
                     <th>action</th>  
                    </thead>

                    <tbody>
                    <?php
                        $grand_total = 0;
                        // $connect = mysqli_connect('localhost','root','','shop_db') or die(mysqli_error($mysqli));;
                        $query = "SELECT MovieName, TheatreName, Price
                        FROM bookingd ";

                        $result = mysqli_query($connect,$query);
                        if ($result):
                        if(mysqli_num_rows($result)>0):
                            while($booking = mysqli_fetch_assoc($result)):
                    ?>
                        <tr>
                        <td><? echo $booking['MovieName']; ?></td>
                        <td><? echo $booking['TheatreName']; ?></td>
                        <td><? echo $booking['Price']; ?></td>
                        <td>
                        <form action="" method="post">
                                <input type="number" min="1" name="seats" value="<?php echo $booking['MovieName']; ?>"> 
                                <input type="submit" name="update_cart" value="update" class="option-btn">
                        </form>
                            </td>
                            <td>Rs.<?php echo $sub_total = number_format(1 * $booking['Price']); ?>.00</td>
                            <td> 
                        </tr>
                    <?php
                                 endwhile;
                              endif;
                         endif;
                    ?>
                </tbody>
                </table>
                
                <form name="sub-btn" method="POST" action="payment.php">
                <input type="submit"/>
                </form>  
            </div>
            <script src="js/homepage.js"></script>
        <footer><?php include 'html/footer.html'; ?></footer>
    </body>
</html>