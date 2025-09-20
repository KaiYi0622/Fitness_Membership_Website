<!DOCTYPE html>
<html>
<head>
	<title>First Time</title> 
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
	<link rel = "stylesheet" href="/TheAthleteHub/style/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}
		
		.paragraph3 {
			line-height: 1.7;
			width: 30%;
		}

		.paragraph {
			width: 75%;
			text-shadow: none;
			font-weight: normal;
		}
		
		.Left {
			padding-top: 8%;
			padding-left: 16%;
		}

		.Right {
			padding-top: 5%;
			padding-left: 50%;
			margin-right: 10px;
		}

		.firstTimeDiv1 {
			max-width: 100%;
			width: 100%;
			height: 100vh;
			background-image: linear-gradient(rgba(0,0,0,0.1),transparent), 
			url('/TheAthleteHub/images/firstTime2.jpg');
			background-position: center;
			background-size: cover;
			position: relative;
		}

		#firstTimeH1 {
			margin-top: 2%;
			ttext-align: center;
			font-size: 3.5vw;
			lline-height: 160px;
			color: transparent;
			-webkit-text-stroke: 2px #fff;
			background-position: 0 0;
			animation: back 20s linear infinite;
		}

		.imgLeft {
			float:left;
			width:30%;
			height:20%;
			margin-left: 10%;
			border-radius: 10%;
			margin-top: 10vw;
			
			border:2px solid #fff;
			-moz-box-shadow: 10px 10px 5px #ccc;
			-webkit-box-shadow: 10px 10px 5px #ccc;
			box-shadow: 10px 10px 5px #ccc;
			-moz-border-radius:25px;
			-webkit-border-radius:25px;
		}

		.imgRight {
			float:right;
			width: 25%;
			height:15%;
			margin-left: 0;
			margin-right: 15%;
			border-radius: 10%;
			margin-top: 5vw;
			
			border:2px solid #fff;
			-moz-box-shadow: 10px 10px 5px #ccc;
			-webkit-box-shadow: 10px 10px 5px #ccc;
			box-shadow: 10px 10px 5px #ccc;
			-moz-border-radius:25px;
			-webkit-border-radius:25px;
		}
			
		.firstTimeDiv2 {
			max-width: 100%;
			width: 100%;
			height: 100vh;
			/* background-image: linear-gradient(rgba(0,0,0,0.5),transparent), 
			url("../images/gym2.jpg");
			background-position: center;
			background-size: cover; 
			padding: 5px 0px; */
			position: relative;
			margin-bottom: -3%;
		}
			
		#firstTimeH2, #firstTimeH3 {
			margin-top: 0%;
			font-size: 3vw;

			background-position: 0 0;
			animation: back 20s linear infinite;
		}

		.firstTimeDiv3 {
			padding-top: 1px;
			max-width: 100%;
			width: 100%;
			height: 100vh;
			background-color: #edebeb;
			position: relative;
			padding-bottom: -10%;
		}
			
		.firstTimeDiv3 p{
			width: 35%;
			line-height: 1.5;
		}
		
		.firstTimeDiv4 {
			padding-bottom: 7%;
		}
	</style>
</head>

<body>
	<?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>
	
	<div class="firstTimeDiv1">
		<div class="Left">
		<h1 id="firstTimeH1">FIRST TIME?</h1>
		<p class="paragraph3">
			First time at The Athlete's Hub?<br>
			We've got you covered. Keep scrolling to find out everything 
			you need to know before coming to your class!<br>
			Haven't booked in for a class yet?<br>

			Click the button below to check out our schedule
		</p><br>
		<a href="/TheAthleteHub/schedule" class="homeHref1">View Schedule</a>
		</div>
	</div>

	<div class="firstTimeDiv2">
		<div class="imageLeft">
			<img src="/TheAthleteHub/images/firstTime3.jpg" class="imgLeft">
		</div>
		<div class="Right">
			<h1 id="firstTimeH2">Check In</h1>
			<p class="paragraph">
				First things first, checking in.<br><br>
				Simply tell our Guides your first name or your chosen class.<br>
				They'll then give you the full run down of the entire studio and answer any questions you may have.<br><br>

				After you check in, our Guides will show you where you'll be in the class.<br><br>

				Want to change classes? Our Guide's will let you know if there are any slots available 
				and will be more than happy to swap you in!		
				</p><br>
			<a href="/TheAthleteHub/login" class="homeHref2">Sign In</a>
			<a href="/TheAthleteHub/cart" class="homeHref2">Check Your Classes</a>
		</div>
	</div>
	
	<div class="firstTimeDiv3">
		<div class="imageRight">
			<img src="/TheAthleteHub/images/firstTime4.jpg" class="imgRight">
		</div>
		<div class="Left">
			<h1 id="firstTimeH3">Wait For It..</h1>
			<p class="paragraph">
				Once you're checked in, have a seat anywhere around the studio.<br><br>

				In the mean time, your Instructor will be warming up and preparing the room for you.<br><br>

				Wait for the Hub Room doors to open, your instructor will invite you in to get ready for your class!	
			</p><br>
		</div>
	</div>
	
	<div class="firstTimeDiv4">
		<div class="imageLeft">
			<img src="/TheAthleteHub/images/firstTime5.jpg" class="imgLeft">
		</div>
		<div class="Right">
			<h1 id="firstTimeH4">Get Ready to Rise</h1>
			<p class="paragraph">
				Once the Hub Room doors open, head to the room your class is located and look for your instructor.<br>
				The classes are labelled so it should be super easy to find!<br><br>
				If you are lost, put your hand up and our instructor or Guides on duty will help you out.<br><br>
				Once you've found your class, feel free to do a short individual warm up whilst the rest of the class gets ready.<br>
				And you're ready to work out! You're all set to get going and rise with us.<br><br>
				Click the button below to find out more about our classes - we've got classes no matter your fitness level.
			</p><br>
			<a href="/TheAthleteHub/classType" class="homeHref1">View Class Types</a>
		</div>
	</div>
	
	<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>
	


</body>
</html>