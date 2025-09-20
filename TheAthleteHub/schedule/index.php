<?php	
	session_start();

	if (!isset($_SESSION['userId']) && !isset($_SESSION['userEmail'])) {
		// User is not logged in, redirect to the login page
		$message = 'Please sign in to continue.';
		echo "<script>alert('$message');window.location='/TheAthleteHub/login';</script>";
		//header('Location: /TheAthleteHub/login');
		//exit();
	}
	
	$userId = $_SESSION['userId'];
	//$userEmail = $_SESSION['userEmail'];	
	
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

	// Retrieve unique instructor names
	$sql = "SELECT DISTINCT instructName FROM schedule ORDER BY instructName ASC";
	$result = $conn->query($sql);

	$instructors = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$instructors[] = $row['instructName'];
		}
	}else {
			echo "invalid";
	}

	// Retrieve unique class types 
	$sql = "SELECT DISTINCT classType FROM schedule ORDER BY classType ASC";
	$result = $conn->query($sql);

	$classes = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$classes[] = $row['classType'];
		}
	}else {
			echo "invalid";
	}

	$conn->close();
	
?>	
<!DOCTYPE html>
<html>
<head>
	<title>The Athlete's Hub</title> 
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
	<link rel = "stylesheet" href="/TheAthleteHub/style/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>	
	<?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>
		
	<h2 class="scheduleHead"><i class="far fa-calendar-alt"></i> SCHEDULE</h2>
	<!-- Display drop down filter list -->
	<!-- By Instructor -->
	<div class="filter">
		<div class="dropdown">
		  <button onclick="instructFunction()" class="dropbtn">By Instructor</button>
		  <div id="instructDropdown" class="dropdown-content">
		  <?php
			echo "<a href='index.php'>- VIEW ALL -</a>";
			for($i = 0; $i < count($instructors); $i++) {
				$instructor = $instructors[$i];
				echo "<a href='/TheAthleteHub/schedule/index.php?instructor=" . $instructor . "'>" . $instructor . "</a>";
			}
		  ?>
		  </div>
		</div>

		<!-- By Class -->
		<div class="dropdown">
		  <button onclick="classFunction()" class="dropbtn">By Class</button>
		  <div id="classDropdown" class="dropdown-content">
		  <?php
			echo "<a href='index.php'>- VIEW ALL -</a>";
			for($i = 0; $i < count($classes); $i++) {
				$class = $classes[$i];
				echo "<a href='/TheAthleteHub/schedule/index.php?class=" . $class . "'>" . $class . "</a>";
			}
		  ?>
		  </div>
		</div>
	</div>

	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function instructFunction() {
		// Close class dropdown menu if it is open
		  var classDropdown = document.getElementById("classDropdown");
		  if (classDropdown.classList.contains('show')) {
			classDropdown.classList.remove('show');
		  }
		  
		  // Toggle instructor dropdown menu
		  document.getElementById("instructDropdown").classList.toggle("show");
		}

		function classFunction() {
		// Close instructor dropdown menu if it is open
		  var instructDropdown = document.getElementById("instructDropdown");
		  if (instructDropdown.classList.contains('show')) {
			instructDropdown.classList.remove('show');
		  }
		  
		  // Toggle class dropdown menu
		  document.getElementById("classDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
	</script>
	
	<?php
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
			if (isset($_GET['instructor'])) {      // Filter by instructor
				$instructor = $_GET['instructor'];
				$sql = "SELECT * FROM schedule WHERE instructName = '$instructor'";
			} elseif (isset($_GET['class'])) {    // Filter by class
				$class = $_GET['class'];
				$sql = "SELECT * FROM schedule WHERE classType = '$class'";
			}
			else	{							  // No filter 	
				$sql = "SELECT * FROM schedule";
			}
		$result = $conn->query($sql);
			
		
		// Retrieve database into array
		$fitnessClasses=[];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				array_push($fitnessClasses,  [	'classId' => $row["scheduleId"],
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
		
		// Retrieve booked item into array
		$sql = "SELECT * FROM bookingDetails";
		$result = $conn->query($sql);
		
		$booked=[];
		$bookedCount = 0;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				if($row["userId"] == $userId) {
					array_push($booked, 	[ 'bookingId' => $row["bookingId"],
											'classId' => $row["scheduleId"],
											'userId' => $row["userId"]
										]
								);
					$bookedCount += 1;
					
				}
			}
		} 
		
		// Close connection
		$conn->close();
		
		// Pass total number of ID into script
		$lengthID = count($fitnessClasses);

		// Determine row of schedule
		function tableRowCount($table) {
			$sunCount = 0;
			$monCount = 0;
			$tuesCount = 0;
			$wedCount = 0;
			$thursCount = 0;
			$friCount = 0;
			$satCount = 0;
			foreach($table as $classes) {
				switch($classes['classDay']) {
					case 'Sunday': 
						$sunCount += 1;
						break;
					case 'Monday': 
						$monCount += 1;
						break;
					case 'Tuesday': 
						$tuesCount += 1;
						break;
					case 'Wednesday': 
						$wedCount += 1;
						break;
					case 'Thursday': 
						$thursCount += 1;
						break;
					case 'Friday': 
						$friCount += 1;
						break;
					case 'Saturday': 
						$satCount += 1;
						break;		
					default: 
						echo "Invalid!";
				}
			}
			$max = max($sunCount, $monCount, $tuesCount, $wedCount, $thursCount, $friCount, $satCount);
				
			return $max;
		}
		
		// Rearrange the class by time
		function compareTime($time1, $time2) {
			$dateTime1 = strtotime($time1['classStartTime']);
			$dateTime2 = strtotime($time2['classStartTime']);
			return $dateTime1 - $dateTime2;
		}
		
		// initialize rearranging array
		function initialzeSchedule($scheduleOld, $scheduleOldIndex) {
			return ['classId' => $scheduleOld[$scheduleOldIndex]['classId'],
					'classType' => $scheduleOld[$scheduleOldIndex]['classType'],
					'instrucName' => $scheduleOld[$scheduleOldIndex]['instrucName'],
					'classStartTime' => $scheduleOld[$scheduleOldIndex]['classStartTime'],
					'classEndTime' => $scheduleOld[$scheduleOldIndex]['classEndTime'],
					'classCost' => $scheduleOld[$scheduleOldIndex]['classCost'],
					];
				
		}
		
		// Check booked schedule
		function checkBooked($bookedCount, $booked, $classByDay) {
			if($bookedCount > 0) {
				for($k=0; $k<$bookedCount; $k++){
					if($booked[$k]['classId']==$classByDay) {
						$bookAvailable = false;
						$k = $bookedCount;
					} else {
						$bookAvailable = true;
					}
				}
			}else {
				$bookAvailable = true;
			}
			
			return $bookAvailable;
		}
		
		// Check disabled css and button
		function checkTableCss($date, $dateToday) {
			if(((int)$date-$dateToday)<0) {
				$css = 'class = "hiddenSchedule"';
			} else {
				$css = "";
			}
			return $css;	
		}
		
		function scheduleBtnCss($date, $dateToday, $classByDay, $timeNow, $bookAvailable) {
			if($bookAvailable==true){
				if(((int)$date-$dateToday)<0) {
					$css = "timeBtnUnavailable";
				} else if($date == $dateToday) {
					if(((int)strtotime($classByDay)-$timeNow) < 0) {
						$css = "timeBtnUnavailable";
					} else {
						$css = "timeBtn";
					}
				} else {
					$css = "timeBtn";
				}
			} else {
				$css = "timeBtnUnavailable";
			}
			return $css;	
		}
		
		function clickable($date, $dateToday, $classByDay, $timeNow, $bookAvailable) {
			if(((int)$date-$dateToday) < 0) {
				$result1 = false;	
			} else if($date == $dateToday) {
				if(((int)strtotime($classByDay)-$timeNow) < 0) {
					$result1 = false;
				} else {
					$result1 = true;
				}			
			}else {
				$result1 = true;
			}
			
			if($result1==false || $bookAvailable==false) {
				$click = "disabled";
				//echo "disabled";
			} else {
				$click = "";
				//echo "able";
			}
			return $click;	
		}
		
		# sort the class according to time
		usort($fitnessClasses, 'compareTime');
		#print_r($fitnessClasses);
		
		# Rearrange the class by day
		$classByDay = [];
		$sunCount = 0; 
		$monCount = 0; 
		$tuesCount = 0;
		$wedCount = 0; 
		$thursCount = 0; 
		$friCount = 0; 
		$satCount = 0; 
		for($i = 0; $i < count($fitnessClasses); $i++) {
			$sunIndex = 0;
			$monIndex = 1;
			$tuesIndex = 2;
			$wedIndex = 3;
			$thursIndex = 4;
			$friIndex = 5;
			$satIndex = 6;
				
			switch($fitnessClasses[$i]['classDay']) {
				case 'Sunday': 
					$classByDay[$sunCount][$sunIndex] = initialzeSchedule($fitnessClasses, $i);
					$sunCount += 1;
					break;
				case 'Monday':
					$classByDay[$monCount][$monIndex] = initialzeSchedule($fitnessClasses, $i);
					$monCount += 1;
					break;			
				case 'Tuesday':
					$classByDay[$tuesCount][$tuesIndex]= initialzeSchedule($fitnessClasses, $i);
					$tuesCount += 1;
					break;
				case 'Wednesday':
					$classByDay[$wedCount][$wedIndex] = initialzeSchedule($fitnessClasses, $i);
					$wedCount += 1;
					break;
				case 'Thursday':
					$classByDay[$thursCount][$thursIndex] = initialzeSchedule($fitnessClasses, $i);
					$thursCount += 1;
					break;
				case 'Friday':
					$classByDay[$friCount][$friIndex] = initialzeSchedule($fitnessClasses, $i);
					$friCount += 1;
					break;
				case 'Saturday':
					$classByDay[$satCount][$satIndex] = initialzeSchedule($fitnessClasses, $i);
					$satCount += 1;	
					break;			
				default:
					echo "Invalid";
			}
		}
		
		// Set the default timezone to the user's timezone
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$dateToday = (int)strtotime("today");
		$timeNow = (int)strtotime(date("H:i:s"));
		
		// Create of the date of the week
		$day = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
		
		$date = [];
		$date[0] = strtotime("last week sunday");
		for($i = 0; $i < count($day); $i++) {
			$date[$i+1] = strtotime("this week " . $day[$i]);
		}

		
		
		// create schedule table 
		// create table header
		$dayList = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
		
		echo '<div = class="scheduleTable">';
		echo '<table>'; 
		echo '<thead>';	
		echo '<tr>';
		for($i = 0; $i<count($dayList); $i++) {
			$css = checkTableCss($date[$i], $dateToday);
			echo '<th ' . $css . '>' . $dayList[$i] . '<br>' . date("d-m",$date[$i]) . '</th>';		
		}	
		echo "</tr>";
		echo "</thead>";

		// create table body
		echo "<tbody>";
		for($i=0; $i<tableRowCount($fitnessClasses); $i++) {
			echo '<tr>';
			for($j=0; $j<7; $j++) {
				$css = checkTableCss($date[$j], $dateToday);
					
				echo '<td ' . $css . '>' ;
				if(isset($classByDay[$i][$j])) {
					$bookAvailable	= checkBooked($bookedCount, $booked, $classByDay[$i][$j]['classId']);
					$scheduleBtnCss = scheduleBtnCss($date[$j], $dateToday, $classByDay[$i][$j]['classStartTime'], $timeNow, $bookAvailable);
					$clickable = clickable($date[$j], $dateToday, $classByDay[$i][$j]['classStartTime'], $timeNow, $bookAvailable);
					echo '<button ' . $clickable
							. ' id="' . $classByDay[$i][$j]['classId']
							. '" class="' . $scheduleBtnCss . '"><b>' . $classByDay[$i][$j]['classType'] . "<br>"
							. $classByDay[$i][$j]['instrucName'] . '</b>' 
							. "<br>--------------<br>" 
							. $classByDay[$i][$j]['classStartTime'] 
							. "<br>to<br>" . $classByDay[$i][$j]['classEndTime'] 
							. '</button>';
					// Modal
					echo '<div id="myModal' . $classByDay[$i][$j]['classId']
							. '" class="modal">';
					// Modal content
					echo '<div class="modal-content">'
							. '<span id="close' . $classByDay[$i][$j]['classId']
							. '" class="close">&times;</span>'
							. '<p class="modalP1"><b>READY TO BOOK?</b></p>'
							. '<p class="modalP2">Class type: ' . $classByDay[$i][$j]['classType']
							. '<br><br>Instructor name: ' . $classByDay[$i][$j]['instrucName']
							. '<br><br>Day: ' . date('l', $date[$j])
							. '<br><br>Date: ' . date('d-m-y', $date[$j])
							. '<br><br>Start time: ' . $classByDay[$i][$j]['classStartTime']
							. '<br><br>End time: ' . $classByDay[$i][$j]['classEndTime']
							. '<br><br>Cost: ' . $classByDay[$i][$j]['classCost'];	
								
					echo '</p><br><button id="bookBtn' . $classByDay[$i][$j]['classId']
							. '" class="scheduleBtn">Book</button></div></div>';		
						
					// Second modal
					echo '<div id="successModal' . $classByDay[$i][$j]['classId']
							. '" class="successModal">';
						
					// Second modal content
					echo '<div class="successModal-content"><p>Booked Successfully!!!</p><br>'
							. '<button id="scheduleOkBtn' . $classByDay[$i][$j]['classId']
							. '" class="scheduleBtn">Ok</button></div></div>';
					}  
					echo '</td>';				
				}
				echo "</tr>";
			}
		echo '</tbody>';
		echo "</table>";
		echo '</div>';



		include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); 
	?>
	<script>
		const lengthID = <?php echo $lengthID; ?>;
		var userId = <?php echo $userId; ?>

		for(var i=0; i<lengthID; i++) {
			// Get the modal
			eval('var modal' + (i+1) + '= document.getElementById("myModal' + (i+1) + '");');
			// Get the button that opens the modal
			eval('var btn' + (i+1) + '= document.getElementById(' + (i+1) + ');');
			// Get the <span> element that closes the modal
			eval('var span' + (i+1) + '= document.getElementById("close' + (i+1) +'");');
			// Get the book button in the modal
			eval('var bookBtn' + (i+1) + '= document.getElementById("bookBtn' + (i+1) + '");');
			// Get the modal of prompting success message
			eval('var successModal' + (i+1) + '= document.getElementById("successModal' + (i+1) + '");');
			// Get the okay button for each success message
			eval('var okBtn' + (i+1) + '= document.getElementById("scheduleOkBtn' + (i+1) + '");');
		}

		for(var i=0; i<lengthID; i++) {	
			// When the user clicks the button, open the modal 
			eval('btn' + (i+1) + '.onclick = function() {modal' + (i+1) + '.style.display = "block";}');
			// When the user clicks on <span> (x), close the modal
			eval('span' + (i+1) + '.onclick = function() {modal' + (i+1) + '.style.display = "none";}');
			// When the user clicks on book button, successfully book
			eval('bookBtn' + (i+1) + '.onclick = function() {successModal' + (i+1) + '.style.display = "block";}'); 
			// When the user clicks on okay button, closs the modal
			eval('okBtn' + (i+1) + '.onclick = function() {successModal' + (i+1) + '.style.display = "none"; modal' + (i+1) + '.style.display = "none";}');
		}			


		for(var i=0; i<lengthID; i++) {
			eval('document.getElementById("bookBtn' + (i+1) + '").addEventListener("click", function(){'		
				+ 'var scheduleId =' + (i+1) + ';'
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

		for(var i=0; i<lengthID; i++) {
			eval('document.getElementById("scheduleOkBtn' + (i+1) + '").addEventListener("click", function(){'
					+ 'location.reload();'
					+ '});'
				);
		}

	</script>	
	
</body>
</html>