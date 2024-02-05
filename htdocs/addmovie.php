<?php ;

$DataBaseName = 'Ebookinglk'; // Data Base Name

session_start();
$movie_name = "";
$movie_type = "";
$runtime = "";
$expiration_date = "";
$actor = "";
$producer = ""; 
$writer = ""; 
$music = ""; 
$story_line = ""; 
$director = ""; 
$errors = array();



	// Get Form Data Deatils

	$db = mysqli_connect('localhost','root','',$DataBaseName); // ++++++++++++++++++ Connect Database +++++++++++++++
	if(isset($_POST['add_movie'])){
  	$movie_name = ($_POST['movie_name']);
  	$runtime = ($_POST['runtime']);
  	$expiration_date = $_POST['expiration_date'];
	$producer = ($_POST['producer']);
	$writer = ($_POST['writer']);
	$music = ($_POST['music']);
	$story_line = ($_POST['story_line']);
	$director = ($_POST['director']);
	$Staff_ID = ''; // +++++++++++++++++ S_ID Value Put Area +++++++++++++
	$actor_count=$_COOKIE['actorCount'];

	
		


		// Check Empty Form Data  	


  	if(empty($movie_name)){
		array_push($errors,"Movie Name is required");
  	}
  	
	if(empty($runtime)){
		array_push($errors,"Runtime is required");
	}
	if(empty($expiration_date)){
		array_push($errors,"Expiration Date is required");
	}
	if(empty($producer)){
		array_push($errors,"Producer Charctor is required");
	}
	if(empty($writer)){
		array_push($errors,"Writer Charctor is required");
	}
	if(empty($music)){
		array_push($errors,"Music Charctor is required");
	}
	if(empty($story_line)){
		array_push($errors,"Story Line is required");
	}
	if(empty($director)){
		array_push($errors,"Director is required");
	}
	
  	if (count($errors) == 0) {
		

		$successful = "Successful !!!";

		// Movie Type Table Handaling

		if(isset($_POST['new_movie_type'])){
			$movie_type=($_POST['new_movie_type']);
			$In_Movie_Type = "INSERT INTO movietype(TypeName) VALUES ('$movie_type')";
			if(mysqli_query($db,$In_Movie_Type)){
				$AddedMovieType ="New Movie Type Added";
			}
		}else{
			$movie_type = $_POST['movie_type'];
			$AddedMovieType ="Movie Type Ok";
		}
		$MovieTypeGet = "SELECT MT_ID FROM movietype WHERE TypeName='$movie_type'";
		$TypeData=mysqli_query($db,$MovieTypeGet);
		$row2 = mysqli_fetch_array($TypeData);
			$TypeValue = $row2[0];

		
		
		// Insert data for Database
			
			$In_Movie_Data = "INSERT INTO movie(MovieName, MT_ID, RunTime, ExpirationDate,Producer,Writer,Music,StoryLine, Director,S_ID)VALUES('$movie_name','$TypeValue','$runtime','$expiration_date','$producer','$writer','$music','$story_line','$director','$Staff_ID')";
			if(mysqli_query($db,$In_Movie_Data)){
				$MovieTableData = "SELECT M_ID FROM movie WHERE MovieName='$movie_name'";
				$GetMovieTableID=mysqli_query($db,$MovieTableData);
				while($row3 = mysqli_fetch_array($GetMovieTableID)){
					$GetMovieTableData = $row3[0];
				}
				for($lop=1;$lop<$actor_count;$lop++){
					$Actor=($_POST["actor$lop"]);
					$playing_charactor=($_POST["PlayingCharactor$lop"]);
					$In_Casting_Data = "INSERT INTO casting (Actor, PlayingCharactor, M_ID) VALUES('$Actor','$playing_charactor','$GetMovieTableData')";
					mysqli_query($db,$In_Casting_Data);

				}
				$_SESSION['MovieTypeReady'] = $AddedMovieType;
				$_SESSION['successful'] = $successful;
				header('location: uploaded.php');

			}else{
				array_push($errors,'Some one is Wrong Retry');
			}
		
  }
}
	?>
<html>
<head>
	<title>EBooking.lk - Add Movie</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<script src="jquery.js"></script>

	<script type="text/javascript">
		var i=1;
		$(function(){
			$('.ck').click(function(){
				$('.divtext').append("<input type='text' class='cl"+i+"' name='actor"+i+"'/><input type='text' class='cl"+i+"' name='PlayingCharactor"+i+"'/></br>");
				i=i+1;

				document.cookie="actorCount="+i;


			})
			
		})
		
		$(function(){
			$('.ty').click(function(){
				$('.divty').append("<input type='text' name='new_movie_type' value=<?php echo $movie_type ?>></br>");
			})
		})
			

		
	</script>
	
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


	<!-- Upload Section -->

	<a href="home.php">Home Movie</a>
	<a href="addmovie.php">Add Movie</a>
	<a href="editmovie.php">Edite Movie</a>
	<a href="delete.php">Delete Movie</a>


		<!-- Show Data In Web Browser -->
		
		<div class="upload-name">
			<h2>Add Movie</h2>
		</div>
		<?php include('errors.php') ?>
		<div class="items">
			<form method="post" action="addmovie.php" enctype="multipart/form-data">
			<div class="input-group">
				<label>Movie Name</label>
				<input type="text" name="movie_name" value="<?php echo $movie_name; ?>">
			</div>
			<?php $dataBase = mysqli_connect('localhost','root','',$DataBaseName);
			$resultSet = $dataBase->query("SELECT TypeName FROM movietype"); ?>
			<div class="input-group">
				<label>Movie Type</label>
				<select name="movie_type">
				<?php 
				while($rows = $resultSet->fetch_assoc())
				{
					$m_types = $rows['TypeName'];
					echo "<option value='$m_types'>$m_types</option>";
				}
				?>
				<input type="button" value="Add New Tyoe" class="ty"/>
				<div class="divty"></div>

				</select>
				
			</div>

			<div class="input-group">
				<label>Runtime</label>
				<input type="text" name="runtime" value="<?php echo $runtime; ?>">
			</div>
			<div class="input-group">
				<label>Expiration Date</label>
				<input type="date" name="expiration_date" value="<?php echo $expiration_date; ?>">
			</div>
			<div class="input-group">
				<label>Actor and his playing Charactor</label>
				<input type="button" value="Add" class="ck"/>
				<div class="divtext"></div>
				
			</div>
			<div class="input-group">
				<label>Producer</label>
				<input type="text" name="producer" value="<?php echo $producer; ?>">
			</div>
			<div class="input-group">
				<label>Writer</label>
				<input type="text" name="writer" value="<?php echo $writer; ?>">
			</div>
			<div class="input-group">
				<label>Music</label>
				<input type="text" name="music" value="<?php echo $music; ?>">
			</div>
			<div class="input-group">
				<label>Story Line</label>
				<input type="text" name="story_line" value="<?php echo $story_line; ?>">
			</div>
			<div class="input-group">
				<label>Dirctor</label>
				<input type="text" name="director" value="<?php echo $director; ?>">
			</div>


			<div class="input-group">
				<button type="submit" name="add_movie">Add Movie</button>
				
			</div>
			</form>
		</div>
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