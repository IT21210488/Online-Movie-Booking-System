<?php
    session_start();
    include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>EBooking.lk - Movies</title>

    <!-- External Sources -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 

      
    <!-- Other Styles -->
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link href="css/homepage.css"type="text/css" rel="stylesheet">
    <link href="css/about.css"type="text/css" rel="stylesheet">
    <link href="css/movies.css"type="text/css" rel="stylesheet">
    


</head>
<body>
    <!-- Footer -->
    <?php include 'html/header.html';?>

    <!-- body -->
    <div class="movie-page-section">
        <!--Now Showing-->
        <div class="movie-page-ns-section">
            <div class="heading-ns">Now Showing</div>
            <div class="movies-container-ns">  
                <?php
                $ns_mv_list_query = "SELECT * FROM movie WHERE MS_ID=1";
                $ns_mv_list_query_run = mysqli_query($connect,$ns_mv_list_query);
                $ns_movie_count=mysqli_num_rows($ns_mv_list_query_run);
                
                while ($ns_row = mysqli_fetch_array($ns_mv_list_query_run)) { ?>
                    <div class="box">
                        <div class="box-img">
                            <a href="moviedesc.php?mid=<?php echo $ns_row['M_ID'] ?>">
                                <img src="/images/<?php echo $ns_row['image_name'] ?>" alt="">
                            </a>
                        </div>
                        <div class="text-ns"><?php echo $ns_row['MovieName'] ?></div>
                        <div class="text-ns-1">Now Screening</div> 
                    </div>
                <?php } ?>
            </div>
        </div>

        <!--Comming Soon-->
        <div class="movie-page-cs-section">
            <h2 class="heading-cs">Coming Soon</h2>
            <div class="movies-container-cs">

                <?php
                $cs_mv_list_query = "SELECT * FROM movie WHERE MS_ID=2";
                $cs_mv_list_query_run = mysqli_query($connect,$cs_mv_list_query);
                $cs_movie_count=mysqli_num_rows($cs_mv_list_query_run);

                while ($cs_row = mysqli_fetch_array($cs_mv_list_query_run)) { ?>
                    <div class="box">
                        <div class="box-img">
                            <a href="moviedesc.php?mid=<?php echo $cs_row['M_ID'] ?>">
                                <img src="/images/<?php echo $cs_row['image_name'] ?>" alt="">
                            </a>
                        </div>
                        <div class="text-cs"><?php echo $cs_row['MovieName'] ?></div>
                        <div class="text-cs-1">In cinemas on 6th june</div> 
                    </div>
                <?php } ?>
        </div>
    </div>
</div>
<script src="js/homepage.js"></script>
<!-- Footer -->
<?php include 'html/footer.html';?>
</body>
</html>