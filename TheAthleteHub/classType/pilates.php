<!DOCTYPE html>
<html>
<head>
	<title>Pilates | The Athlete's Hub</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
	<link rel = "stylesheet" href="/TheAthleteHub/style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	* { box-sizing: border-box;}
	
	body {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: serif; /*'Poppins', sans-serif;*/
	}
	
	.sectionDesc {
		background-color: white;
		padding: 120px;
		border-bottom: solid 2px black;
		/* border-top: solid 5px black; */
	}
	
	.sectionImg {
		border-bottom: solid 5px black;
		background-color: black; /*#ccdee8;*/
		margin-top: 0px;
	}
	
	.classTitile {
		margin-top: -80px;
		text-align: center;
		font-family: Garamond, serif;
		font-size: 7vh;
		font-weight: 1000;
	}
	
	article {
		margin: auto;
		width: 65%;
		padding: 15px;
		text-align: center;
		line-height: 1.8;
		font-size: 2.5vh;
	}
	
	img {
		display: block;
		vertical-align: middle;
		margin-left: auto;
		margin-right: auto;
		margin-top:30px;		
	}
	
	.center {
		margin-top: 30px;
		margin-bottom: -20px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.homeHref1 {
		font-family: sans-serif;
		font-size: 18px;
	}
	
	.mySlides {display: none;}
	
	/* Slideshow container */
	.slideshow-container {
		/* max-width: 1000px; */
		position: relative;
		margin: auto;
		padding: 40px;
	}

	/* Next & previous buttons */
	.prev, .next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -20px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
		background-color: black;
	}
	
	/* Position the "next button" to the right */
	.next {
		right: 280px;
		border-radius: 10px; /*3px 0 0 3px;*/
	}
	
	/* Position the "next button" to the right */
	.prev {
		left: 280px;
		border-radius: 10px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover, .next:hover {
		bbackground-color: rgba(255, 255, 255, 0.2);  /* #b0acac; #9ea5a8;*/
		transform: scale(1.5);
		transition: .3s;
		color: rgba(255, 255, 255, 0.2); 
	}
	
	/* The dots/bullets/indicators */
	.dot {
		cursor: pointer;
		height: 15px;
		width: 15px;
		margin: 0 3px 20px 3px;
		mmargin-top: 0;
		margin-bottom: 20px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
	}

	.active, .dot:hover {
		background-color: #717171;
	}

	/* Fading animation */
	.fade {
		animation-name: fade;
		animation-duration: 1.5s;
	}

	@keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
		.prev, .next,.text {font-size: 11px}
	}	
	
	

	</style>
</head>
<body>
<?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>

<div class="sectionImg">
	<div class="slideshow-container">

		<div class="mySlides fade">
			<img src="/TheAthleteHub/images/pilates1.jpg" style="width:800px;height:450px;">
		</div>

		<div class="mySlides fade">
			<img src="/TheAthleteHub/images/pilates2.jpg" style="width:800px;height:450px;">
		</div>

		<div class="mySlides fade">
			<img src="/TheAthleteHub/images/pilates3.jpeg" style="width:800px;height:450px;">
		</div>

		<a class="prev" onclick="plusSlides(-1)">❮</a>
		<a class="next" onclick="plusSlides(1)">❯</a>

	</div>
	<br>

	<div class="dots" style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span> 
	</div>

	<script>
	let slideIndex = 1;
	var timer = null;
	showSlides(slideIndex);

	function plusSlides(n) {
	  clearTimeout(timer);
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		clearTimeout(timer);
		showSlides(slideIndex = n);
	} 

	function showSlides(n) {
	  let i;
	  let slides = document.getElementsByClassName("mySlides");
	  let dots = document.getElementsByClassName("dot");
	  
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	  }
	  
	  slideIndex++;
	  if (slideIndex > slides.length) {slideIndex = 1} 
	  for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace("active", "");
	  }    
	  
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
		
	  timer = setTimeout(showSlides, 3000); // Change image every 2 seconds
	}
	</script>
	
</div>


<div class="sectionDesc">

	<h1 class="classTitile">PILATES</h1>
	<article>
	Sculpt, tone, and define your body with our 60-minute group Reformer Pilates classes.<br><br>

	Our certified instructors will guide you through a total body workout utilizing the latest
	Reformer Pilates equipment, to get you focused on getting your body moving and 
	looking like it should.
	</article><br>
	<div class="center"><a href="/TheAthleteHub/schedule" class="homeHref1">BOOK A SLOT</a></div>

</div>

<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>

</body>
</html>


