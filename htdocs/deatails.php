<?php 
if(isset($_GET['MovieID'])){
	$ShowedMovieID = $_GET['MovieID'];
}
$DataBaseName = 'Ebookinglk'; // Data Base Name;

$db = mysqli_connect('localhost','root','',$DataBaseName);

$GetMovieData_E = "SELECT * FROM movie WHERE M_ID = '$ShowedMovieID'";
$GetMovieDeatails = mysqli_query($db,$GetMovieData_E); // get of all movie databse deatails
$MovieDetailsArray = mysqli_fetch_array($GetMovieDeatails);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EBooking.lk - Movie Deatails</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>
<!-- Header Part -->


	<header class="header-main">
    	<div class="hdr-top">
        	<div class="hdr-left-sec">
            	<img src="../images/logo.png" alt="logo" class="hdr-logo">
        	</div>
        	<div class="hdr-middle-sec">
            	<ul class="hdr-menu-list">
                	<li><a href="#">Home</a></li>
               	 	<li><a href="#">Movie</a></li>
               	 	<li><a href="#">Theater</a></li>
               	 	<li><a href="#">Offers</a></li>
               	 	<li><a href="#">About Us</a></li>
               	 	<li><a href="#">Payment</a></li>
            	</ul>
        	</div>
        	<div class="hdr-right-sec">
            	<a class="hdr-login-link" href="#">login</a>
        	</div>
    	</div>
    	<div class="hdr-bottom">
        	<input class="hdr-search-section" type="text" name="search" placeholder="Search for Movie...">
    	</div>
	</header>


	<a href="home.php">Home Movie</a>
	<a href="addmovie.php">Add Movie</a>
	<a href="editmovie.php">Edite Movie</a>
	<a href="delete.php">Delete Movie</a>


        <div class="upload-name">
			<h2><?php echo $MovieDetailsArray[1]?> Movie</h2>
		</div>
		<div class="Movie-Deatils">
		Movie Name - <?php echo $MovieDetailsArray[1]?><br>

		Movie Type :-
	      			<?php $GetMovieTypesWord="SELECT TypeName FROM movietype WHERE MT_ID='$MovieDetailsArray[2]'";
	      					$GetMovieTypeDB= mysqli_query($db,$GetMovieTypesWord);
	      					$MovieValue = mysqli_fetch_array($GetMovieTypeDB);
								echo $MovieValue[0];  ?><br>
		Run Time :- <?php echo $MovieDetailsArray[3];?><br>

		Expiration date :- <?php echo $MovieDetailsArray[4];?><br>

		producer :- <?php echo $MovieDetailsArray[5];?><br>

		Writer :- <?php echo $MovieDetailsArray[6];?><br>

		Music :- <?php echo $MovieDetailsArray[7];?><br>

		Story Line :- <?php echo $MovieDetailsArray[8];?><br>

		Director :- <?php echo $MovieDetailsArray[9];?><br>



<script src="js/homepage.js"></script>
<footer class="ftr-main">
    <div class="ftr-top">
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">About Us</h3>
            <div class="ftr-top-section-desc">
                Sri Lanka's largest online cinema ticket platform is EBooking.lk. We're partnered with the greatest movie therater to provide our customer with the best cinemetic experience possible. You can view, rate and even make bookings for your favourite movies.
            </div>
            <div class="ftr-top-section-desc">
                Keep and touch with us for the latest updates.
            </div>
        </div>

        <!-- Footer Menu Links Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Menu Links</h3>
            <ul class="ftr-menu-links-ul">
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Home</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Movie</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Theatre</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Offers</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">About Us</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Login</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Payment</a>
                </li>
            </ul>
        </div>


        <!-- Footer Contact Us Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Contact</h3>
            <div class="ftr-contact-details-tbl">
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Phone</div>
                    <div class="ftr-contact-details-row-value">: +94112462872</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Whatsapp</div>
                    <div class="ftr-contact-details-row-value">: +94775844365</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Email</div>
                    <div class="ftr-contact-details-row-value">: myemail@domain.com</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Address</div>
                    <div class="ftr-contact-details-row-value">: No. 100, Sample road, sample street</div>
                </div>
            </div>
        </div>

        <!-- Footer Follow Us Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Follow Us</h3>
            <div class="ftr-top-section-desc">
                You can reach to use via the following social media platforms
            </div>
            <div class="ftr-social-media-icons-sec">
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/facebook.png" alt="facebook" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/instagram.png" alt="instagram" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/linkedin.png" alt="linkedin" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/twitter.png" alt="twitter" class="ftr-social-media-icons">
                    </a>
                </div>
            </div>
        </div>
        <!-- +++++++++++++++++++++ -->

    </div>
    <div class="ftr-bottom">
        Credited by <span> MLB_WE_01.01_10</span> | all rights reserved!
    </div>
</footer>

</body>
</html>