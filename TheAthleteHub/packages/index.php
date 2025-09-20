<?php 
	session_start();
	if (!isset($_SESSION['userId'])) {
		// User is not logged in, redirect to the login page
		$message = 'Please sign in to continue.';
		echo "<script>alert('$message');window.location='/TheAthleteHub/login';</script>";
		exit();
	} else {
		$userId = $_SESSION['userId'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>The Athlete's Hub</title> 
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
	<link rel = "stylesheet" href="/TheAthleteHub/style/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<style>
		body { margin:0;}	
		.successModal {padding-left: 0;}
	</style>
</head>
<body>
	<?php 
	
		include('C:/wamp64/www/TheAthleteHub/includes/header.php'); 
				
		// database connection details
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "TheAthleteHub";
			
		// create connection 
		$conn = new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		// Retrieve data from database
		$sql = "SELECT * FROM packages";
		$result = $conn->query($sql);
		
		// Retrieve database into array
		$packages=[];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				array_push($packages,  [	'classId' => $row["scheduleId"],
												'classType' => $row["classType"],
												'instrucName' => $row["instructName"],
												'classStartTime' => $row["classStartTime"],
												'classEndTime' => $row["classEndTime"],
												'classDay' => $row["classDay"],
												'classCost' => $row["classCost"]
											]
							);
			}
		} else {
			echo "invalid";	//delete
		}
		
		$packageCount = count($packages);
		
		
		// Close connection
		$conn->close();
	
		echo '<h2 class="packageH0">OUR PACKAGES</h2>'
				. '<div class="packageBox">'
				. '<div class="packageBoxRow">'
				. '<div class="packageBoxCol">'
				. '<div class="package">'
				. '<div class="packageRow1">'
				. '<h4 class="packageH1"><i class="far fa-box-heart"></i>Beast Unleashed</h4>'
				. '<h6 class="packageH2">Limitless and boundless. Get the most from the widest and latest range of quality fitness equipment and unlimited group classess</h6>'
				. '<p class="packageP">RM 329.00<sup>/package</sup></p>'
				. '<button id="packBtn1" class="packBookBtn">Subscribe Now</button>';
		
		if (!isset($_SESSION['userId'])) {
			// User is not logged in, redirect to the login page
			$message = 'Please sign in to continue.';
			echo "<script>alert('$message');window.location='/TheAthleteHub/login';</script>";
		} else {	
			$userId = $_SESSION['userId'];
		
			// Display modal
			echo '<div id="packModal1" class="successModal">';
			// Display modal content
			echo '<div class="successModal-content"><p>Add to cart successfully!!!</p><br>'
					. '<button id="packOkBtn1" class="scheduleBtn">Ok</button></div></div>';
		}
		
		echo '</div>'
				. '<div class="packageRow2">'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-folder"></i> Package Details</h5>'
				. '<p class="packageP">Group Training Programme up to 3 members</p>'
				. '<p class="packageP">Personalize Training by our instructors Ali</p>'
				. '<p class="packageP">1 hour Calories Burning from 9am</p>'
				. '<p class="packageP">Join us on Monday Blues</p>'
				. '</div>'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-check-square"></i> What Can You Expect</h5>'
				. '<p class="packageP">Acheive Individualize ideal body</p>'
				. '<p class="packageP">Maintain your abs while off seasons</p>'
				. '<p class="packageP">Build Muscle efficiently</p>'
				. '<p class="packageP">Prevent fat rebound</p>'
				. '<p class="packageP">Breaking thru your own plateau</p>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '<div class="packageBoxCol">'
				. '<div class="package">'
				. '<div class="packageRow1">'
				. '<h4 class="packageH1">Move it, Shake it, Lift it！</h4>'
				. '<h6 class="packageH2">Music is your soul? Lets get fit and feel the rhythm of life!</h6>'
				. '<p class="packageP">RM 250.00<sup>/package</sup></p>'
				. '<button id="packBtn2" class="packBookBtn">Subscribe Now</button>';

		if (!isset($_SESSION['userId'])) {
			// User is not logged in, redirect to the login page
			$message = 'Please sign in to continue.';
			echo "<script>alert('$message');window.location='/TheAthleteHub/login';</script>";
		} else {
			$userId = $_SESSION['userId'];
			
			// Display modal
			echo '<div id="packModal2" class="successModal">';
			// Display modal content
			echo '<div class="successModal-content"><p>Add to cart successfully!!!</p><br>'
					. '<button id="packOkBtn2" class="scheduleBtn">Ok</button></div></div>';
		}
		
		echo '</div>'
				. '<div class="packageRow2">'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-folder"></i> Package Details</h5>'
				. '<p class="packageP">Group Training Programme up to 2 members</p>'
				. '<p class="packageP">HIIT Programme in one hour</p>'
				. '<p class="packageP">Enjoy the fusion with Latin and international music rhythms on Monday Blues</p>'
				. '<p class="packageP">Lets meet our instructor Michelle at 7pm</p>'
				. '</div>'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-check-square"></i> What Can You Expect</h5>'
				. '<p class="packageP">Enhance core endurance</p>'
				. '<p class="packageP">Burn calories and fat</p>'
				. '<p class="packageP">Creates a strong support network</p>'
				. '<p class="packageP">Dance with a group of like-minded individuals</p>'
				. '<p class="packageP">Improvements in your overall fitness</p>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '<div class="packageBoxRow">'
				. '<div class="packageBoxCol">'
				. '<div class="package">'
				. '<div class="packageRow1">'
				. '<h4 class="packageH1">Kids Ready Set Go!</h4>'
				. '<h6 class="packageH2">Want to bond with your kids while breaking a sweat? Look no further!</h6>'
				. '<p class="packageP">RM 299.00<sup>/package</sup></p>'
				. '<button id="packBtn3" class="packBookBtn">Subscribe Now</button>';
		
		if (!isset($_SESSION['userId'])) {
			// User is not logged in, redirect to the login page
			$message = 'Please sign in to continue.';
			echo "<script>alert('$message');window.location='/TheAthleteHub/login';</script>";
		} else {
			$userId = $_SESSION['userId'];
				
			// Display modal
			echo '<div id="packModal3" class="successModal">';
			// Display modal content
			echo '<div class="successModal-content"><p>Add to cart successfully!!!</p><br>'
					. '<button id="packOkBtn3" class="scheduleBtn">Ok</button></div></div>';
		}
			
		echo '</div>'
				. '<div class="packageRow2">'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-folder"></i> Package Inclusive</h5>'
				. '<p class="packageP">Family bundle for up to 3 members</p>'
				. '<p class="packageP">Membership covers access for two adults and a child</p>'
				. '<p class="packageP">Kids club available for 12 years old and below</p>'
				. '<p class="packageP">Access our multi-club with your kids in 1 hour</p>'
				. '<p class="packageP">Come join us on every Saturday at 3pm</p>'
				. '</div>'
				. '<div class="packageCol">'
				. '<h5 class="packageH2"><i class="far fa-check-square"></i> What Can You Expect</h5>'
				. '<p class="packageP">Quality time with your loved ones</p>'
				. '<p class="packageP">Make it a regular part of your family routine</p>'
				. '<p class="packageP">Encouragement builds confidence and self-esteem in children</p>'
				. '<p class="packageP">Models positive health behaviors for your children</p>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '<div class="packageBoxCol">'
				. '</div>'
				. '</div>'
				. '</div>';
	
	include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); 
	
	?>
	
	<script>
		var packageCount = <?php echo $packageCount ?>;
		var userId = <?php echo $userId; ?>
		
		for(var i=0; i<packageCount; i++) {
			// Get the modal
			eval('var packModal' + (i+1) + '= document.getElementById("packModal' + (i+1) + '");');
			// Get the button that opens the modal
			eval('var packBtn' + (i+1) + '= document.getElementById("packBtn' + (i+1) + '");');
			// Get the okay button for each success message
			eval('var packOkBtn' + (i+1) + '= document.getElementById("packOkBtn' + (i+1) + '");');
		}
		
		for(var i=0; i<packageCount; i++) {	
			// When the user clicks the button, open the modal
			eval('packBtn' + (i+1) + '.onclick = function() {packModal' + (i+1) + '.style.display = "block";}');
			// When the user clicks on okay button, close the modal
			eval('packOkBtn' + (i+1) + '.onclick = function() {packModal' + (i+1) + '.style.display = "none";}');
		}

		for(var i=0; i<packageCount; i++) {
			eval('document.getElementById("packBtn' + (i+1) + '").addEventListener("click", function(){'		
				+ 'var scheduleId =' + (i+20) + ';'
				+ 'var xhr = new XMLHttpRequest();'
				+ 'xhr.open("POST", "/TheAthleteHub/schedule/sendToCart.php", true);'
				+ 'xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");'
				//Dunno for what but can see success or not
				+ 'xhr.onreadystatechange = function() {'
				+	'if (xhr.readyState === 4 && xhr.status === 200) {'
						// handle the response from the server
				+		'console.log(xhr.responseText);'
				+	'}'
				+ '};'
				+ 'xhr.send("scheduleId=" + scheduleId + "&userId=" + userId);'
				+ '});'
			);
		}		

	</script>
</body>
</html>	