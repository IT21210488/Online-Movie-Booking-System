<?php
if(isset($_GET['edit'])){
	$EditMovieID = $_GET['edit'];
}
$DataBaseName = 'Ebookinglk'; // Data Base Name;

$db = mysqli_connect('localhost','root','',$DataBaseName);

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

if(isset($_POST['ID'])){
	$EditMovieID = ($_POST['ID']);
}

$GetMovieData_E = "SELECT * FROM movie WHERE M_ID = '$EditMovieID'";
$GetMovieDeatails = mysqli_query($db,$GetMovieData_E); // get of all movie databse deatails
$MovieDetailsArray = mysqli_fetch_array($GetMovieDeatails);

if(isset($_POST['movie_name'])){
	$movie_name=($_POST['movie_name']);
	$Update_Movie_Nme = "UPDATE movie SET MovieName='$movie_name' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_Movie_Nme);
}

if(isset($_POST['new_movie_type'])){
	$movie_type=($_POST['new_movie_type']);
	$In_Movie_Type = "INSERT INTO movietype(TypeName) VALUES ('$movie_type')";
	mysqli_query($db,$In_Movie_Type);
	$MovieTypeGet = "SELECT MT_ID FROM movietype WHERE TypeName='$movie_type'";
	$TypeData=mysqli_query($db,$MovieTypeGet);
	$row2 = mysqli_fetch_array($TypeData);
	$TypeValue = $row2[0];

	$Update_Movie_type = "UPDATE movie SET MT_ID='$TypeValue' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_Movie_type);
	
}


if(isset($_POST['movie_type'])){
	$movie_type = $_POST['movie_type'];
	$MovieTypeGet = "SELECT MT_ID FROM movietype WHERE TypeName='$movie_type'";
	$TypeData=mysqli_query($db,$MovieTypeGet);
	$row2 = mysqli_fetch_array($TypeData);
	$TypeValue = $row2[0];

	$Update_Movie_type = "UPDATE movie SET MT_ID='$TypeValue' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_Movie_type);
}


if(isset($_POST['runtime'])){
	$movie_runtime=($_POST['runtime']);
	$Update_runtime = "UPDATE movie SET RunTime='$movie_runtime' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_runtime);
}

if(isset($_POST['expiration_date'])){
	$movie_expiration_date=($_POST['expiration_date']);
	$Update_expiration_date = "UPDATE movie SET ExpirationDate='$movie_expiration_date' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_expiration_date);
}	


if(isset($_POST['expiration_date'])){
	$movie_expiration_date=($_POST['expiration_date']);
	$Update_expiration_date = "UPDATE movie SET Producer='$movie_expiration_date' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_expiration_date);
}
if(isset($_POST['actor1'])){
	$actor_count=$_COOKIE['actorCount']; 
	$Cl_casting="DELETE FROM casting WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Cl_casting);
	for($lop=1;$lop<$actor_count;$lop++){
		$Actor=($_POST["actor$lop"]);
		$playing_charactor=($_POST["PlayingCharactor$lop"]);
		$In_Casting_Data = "INSERT INTO casting (Actor, PlayingCharactor, M_ID) VALUES('$Actor','$playing_charactor','$EditMovieID')";
					mysqli_query($db,$In_Casting_Data);
}

}

if(isset($_POST['producer'])){
	$movie_producer=($_POST['producer']);
	$Update_movie_producer = "UPDATE movie SET Producer='$movie_producer' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_movie_producer);
}

if(isset($_POST['writer'])){
	$movie_writer=($_POST['writer']);
	$Update_movie_writer = "UPDATE movie SET Writer='$movie_writer' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_movie_writer);
}

if(isset($_POST['music'])){
	$movie_music=($_POST['music']);
	$Update_movie_music = "UPDATE movie SET Music='$movie_music' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_movie_music);
}

if(isset($_POST['story_line'])){
	$movie_story_line=($_POST['story_line']);
	$Update_movie_story_line = "UPDATE movie SET StoryLine='$movie_story_line' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_movie_story_line);
}

if(isset($_POST['director'])){
	$movie_director=($_POST['director']);
	$Update_movie_director = "UPDATE movie SET Director='$movie_director' WHERE M_ID='$EditMovieID'";
	mysqli_query($db,$Update_movie_director);
}	

?>
<html>
<head>
	<title>EBooking.lk - Edit Movie</title>
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


	<!-- Edit -->

	<a href="home.php">Home Movie</a>
	<a href="addmovie.php">Add Movie</a>
	<a href="editmovie.php">Edite Movie</a>
	<a href="delete.php">Delete Movie</a>


		<div class="upload-name">
			<h2>Edit <?php echo $MovieDetailsArray[1]?> Movie</h2>
		</div>
		<div class="items">
			<form method="post" action="edit.php" enctype="multipart/form-data">
			<div class="input-group">
				<label>Movie Name</label>
				
				<input type="text" name="movie_name" value="<?php echo $MovieDetailsArray[1]; ?>">
			
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
				<input type="button" value="Add New Type" class="ty"/>
				<div class="divty"></div>
				<current>
				<?php $GetMovieTypesWord="SELECT TypeName FROM movietype WHERE MT_ID='$MovieDetailsArray[2]'";
	      					$GetMovieTypeDB= mysqli_query($db,$GetMovieTypesWord);
	      					$MovieValue = mysqli_fetch_array($GetMovieTypeDB);
								echo $MovieValue[0];  ?> </h6></p>
				</current>
				</select>
				
			</div>

			<div class="input-group">
				<label>Runtime</label>
				<input type="text" name="runtime" value="<?php echo $MovieDetailsArray[3]; ?>">
				
			</div>
			<div class="input-group">
				<label>Expiration Date</label>
				<input type="date" name="expiration_date" value="<?php echo $MovieDetailsArray[4]; ?>">
				
			</div>
			<div class="input-group">
				<label>Actor and his playing Charactor</label>
				<input type="button" value="Add" class="ck"/>
				<div class="divtext"></div>
				<current><?php $GetMovieActorsWord="SELECT Actor,PlayingCharactor FROM casting WHERE M_ID='$MovieDetailsArray[0]'";
	      					$GetMovieActorDB= mysqli_query($db,$GetMovieActorsWord);
	      					while($MovieValue = mysqli_fetch_array($GetMovieActorDB)): ?>
	      						Actor:- <?php echo $MovieValue[0]; ?> Pl.Charactor :- <?php echo $MovieValue[1]; ?><br>
	      					<?php endwhile ?>
				</current>
			</div>
			<div class="input-group">
				<label>Producer</label>
				<input type="text" name="producer" value="<?php echo $MovieDetailsArray[5]; ?>">
				
			</div>
			<div class="input-group">
				<label>Writer</label>
				<input type="text" name="writer" value="<?php echo $MovieDetailsArray[6]; ?>">
				
			</div>
			<div class="input-group">
				<label>Music</label>
				<input type="text" name="music" value="<?php echo $MovieDetailsArray[7]; ?>">
				
			</div>
			<div class="input-group">
				<label>Story Line</label>
				<input type="text" name="story_line" value="<?php echo $MovieDetailsArray[8]; ?>">
				
			</div>
			<div class="input-group">
				<label>Dirctor</label>
				<input type="text" name="director" value="<?php echo $MovieDetailsArray[9]; ?>">
				
			</div>


			<div class="input-group">
				<input type="hidden" name="ID" value='<?php echo $EditMovieID ?>'>
				<button type="submit" name="add_movie">Edit</button>
				
				
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