<!DOCTYPE html>
<html>
<head>
	<title>Instructors</title> 
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
	<link rel = "stylesheet" href="/TheAthleteHub/style/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body {margin: 0;}
	*{box-sizing: border-box;}
	
	.instructBody {
		border: solid 1px transparent;
		max-width: 100%;
		width: 100%;
		height: 250vh;
		background-color: #d0e2f5; 
		background-position: center;
		background-size: cover;	
		position: relative;
	}

	.classTypes img {
		border: solid 2px black;
		margin: 40px;
		border-radius: 10px;
		width: 20%;
	}

	 .classTypes img:hover {
		cursor: pointer;
		transform: scale(1.05);
		transition: 0.3s all ease-in-out;
		opacity: 0.9;
	}

	#p {
		font-size: 2.5vh;
		text-align: center;
		font-weight: bold;
	}
		
	</style>
</head>
<body>

<?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>
<div class="instructBody">
	<h1 class="classTypeHead">Your Guides</h1>
	<p id="p">Leading the way, inspiring you on every step of your journey.</p>

	<div class="classTypes">
		<img src="/TheAthleteHub/images/instructor1.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor2.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor3.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor4.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor5.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor6.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor7.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor8.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor9.jpg" class="imgLeft">
		<img src="/TheAthleteHub/images/instructor10.jpg" class="imgLeft">
	</div>
</div>

<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>

</body>
</html>
