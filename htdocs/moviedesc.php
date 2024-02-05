<?php
    session_start();
    include('connection.php');
?>
<?php
if(isset($_GET['mid'])){

    $movie_id = $_GET['mid']; 
    $get_movie_query = "SELECT * FROM movie WHERE M_ID='$movie_id'";
    $get_movie_query_run = mysqli_query($connect,$get_movie_query);
    $mv_details = mysqli_fetch_array($get_movie_query_run);
    
    $get_cast_query = "SELECT * FROM casting WHERE M_ID='$movie_id'";
    $get_cast_query_run = mysqli_query($connect,$get_cast_query);


 }else{
    header("location:index.php");
}?>

<!DOCTYPE html>
<html>
<head>
    <title>EBooking.lk - Movie Details</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 

      
    <!-- Other Styles -->
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link href="css/homepage.css"type="text/css" rel="stylesheet">
    <link href="css/about.css"type="text/css" rel="stylesheet">
    <link href="css/movies.css"type="text/css" rel="stylesheet">
    <link href="css/moviedesc.css"type="text/css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include 'html/header.html';?>

        <div class="movie-page-section">                       
                <div class="banner">                    
                        <img src="/images/<?php echo $mv_details['banner_name'] ?>" alt="">
                    </div>
                    <div class="main-class">
                        <h1 class="movie-name"><?php echo $mv_details['MovieName'] ?></h1>
                        <div class="sub-class">                            
                            <div class="sub-left">
                                <h1 class="story-line">story line</h1><br>
                                    <?php echo $mv_details['StoryLine'] ?>                                
                                    <div class="book-now">
                                    <a href="cart.php?mid=<?php echo $movie_id; ?>">Book Now</a>
                                        
                                    </div>
                            </div>
                            <div class="sub-right">
                            <h1 class="team">Team</h1><br>
                            <table class="team-table">                               
                                <tr>
                                    <th>Directed By</th>
                                    <td>
                                        <?php echo $mv_details['Director'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Produced By</th>
                                        <td>
                                            <?php echo $mv_details['Producer'] ?>
                                        </td>
                                </tr>                                
                                <tr>
                                    <th>Written By</th>
                                        <td>
                                            <?php echo $mv_details['Writer'] ?>
                                        </td>
                                </tr>                                    
                                <tr>
                                    <th>Music By</th>
                                        <td>
                                            <?php echo $mv_details['Music'] ?>
                                        </td>                                    
                                </tr>
                            </table><br>          
                        
    


                    
                    <h1 class="cast">cast</h1>
                    <table class="cast-table">
                    <?php
                    while ($cast_details = mysqli_fetch_array($get_cast_query_run)) {?>                        
                        
                        <tr>
                            
                            <td><?php echo $cast_details['Actor'] ?></td>
                            <td><?php echo $cast_details['Character_played'] ?></td>
                            
                        </tr>
                        
                    <?php } ?>

                    </table>
                            </div>

</div>
<script src="js/homepage.js"></script>
    
    <!-- Footer -->
    <?php include 'html/footer.html';?>
</body>
</html>