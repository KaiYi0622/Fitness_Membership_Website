<!DOCTYPE html>
<html>
<head>
	<title>About Us</title> 
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
			line-height: 1.3;
			width: 50%;
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
			url('/TheAthleteHub/images/about1.jpg');
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
			width: 30%;
			height:20%;
			margin-left: 0;
			margin-right: 10%;
			border-radius: 10%;
			margin-top: 10vw;
			
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
		<h1 id="firstTimeH1">About Us<br>About Your Journey</h1>
		<p class="paragraph3">
			Your Journey is unique.<br>
			Your Journey is personal.<br>
			Your Journey is powerful.<br><br>
			At Journey, we strive to bring out your absolute best.<br><br>
			Rising beyond your limits, so you can reach your true potential.<br><br>
			It's more than just a class, it's Your Journey to Atheletic success.<br><br>
		</p><br>
		<a href="/TheAthleteHub/schedule" class="homeHref1">Book Your Class</a>
		</div>
	</div>

	<div class="firstTimeDiv2">
		<div class="imageLeft">
			<img src="/TheAthleteHub/images/about2.jpg" class="imgLeft">
		</div>
		<div class="Right">
			<h1 id="firstTimeH2">Your Guides</h1>
			<p class="paragraph">
				Leading the way, inspiring you at every moment.<br><br>

				Our instructors have been trained to guide you through the Atheletic experience.<br><br>

				Preparing your mind, body and soul. Conditioning you to RISE to levels you never imagined,
				 to reach that PEAK state.<br><br>

				Expect an unbeatable energy, good vibes, and incredible music.	<br><br>
				</p><br>
			<a href="/TheAthleteHub/instructors" class="homeHref2">Meet The Team</a>
		</div>
	</div>
	
	<div class="firstTimeDiv3">
		<div class="imageRight">
			<img src="/TheAthleteHub/images/about3.jpg" class="imgRight">
		</div>
		<div class="Left">
			<h1 id="firstTimeH3">The Experience</h1>
			<p class="paragraph">
				A creative space driven by fitness individuals to develop strength,
				 power, connections and community. <br><br>
				 Not just an ordinary gym, but an environment 
				 for everyone and anyone of all levels to achieve their personal fitness goals alongside 
				 professional trainers invested in your overall well-being.<br><br>
				 Be inspired to free your mind, be empowered to push your limits, be prepared for your future.
							</p><br>
			<a href="/TheAthleteHub/classType" class="homeHref2">View Our Classes</a>
			<a href="/TheAthleteHub/packages" class="homeHref2">View Our Packages</a>


		</div>
	</div>
	
	<div class="firstTimeDiv4">
		<div class="imageLeft">
			<img src="/TheAthleteHub/images/firstTime5.jpg" class="imgLeft">
		</div>
		<div class="Right">
			<h1 id="firstTimeH4">Get Ready to Rise</h1>
			<p class="paragraph">
				Our community is everything to us.<br><br>

				It is the heart and soul of the studio. Your smiles, your energy, 
				your passion; without it, we wouldn't be the studio we are today.<br><br>

				Keep the positive vibes going. Never stop inspiring, pushing, and motivating each other.<br><br>

				Together, we are stronger.<br><br>

				Don't miss a thing, click below to follow us on Instagram.	<br><br>
							</p><br>
			<a href="#" class="homeHref2">Join the Community</a>
		</div>
	</div>
	
	<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>
	


</body>
</html>