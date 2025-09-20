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
		
		// Retrieve data from database
		$sql = "SELECT * FROM bookingDetails";
		$result = $conn->query($sql);
			
		// Retrieve database into array
		$cart=[];
		$bookingId = [];
		$cartCount = 0;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				if($row["userId"] == $userId) {
					array_push($cart, 	[ 'bookingId' => $row["bookingId"],
											'classId' => $row["scheduleId"],
											'userId' => $row["userId"]
										]
								);
					$cartCount += 1;
					array_push($bookingId, $row["bookingId"]);
				}
			}
		} 
		
		
		
		//Calculate total
		function getSum($cart, $cartCount) {
			$sum = 0;
			
			for($i=0; $i<$cartCount; $i++) {
				$cost = (int)substr($cart[$i]['classCost'], 3);
				$sum += $cost;
			}
			
			return $sum;
		}
		
		$bookingArray = json_encode($bookingId);
		
		//Heading of the page
		echo '<h2 class="cartHead">MY CLASSES <i class="fa fa-shopping-cart"></i> '
				. $cartCount . '</h2>';
		
		$packageArray = [];
		if($cartCount > 0){
			// Retrieve the details into cart
			for($i=0; $i<count($cart); $i++) {
				$sql = "SELECT * FROM schedule";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_array()) {
						if($cart[$i]['classId'] == $row["scheduleId"]){		
							$cart[$i]['classType'] = $row["classType"];
							$cart[$i]['instructName'] = $row["instructName"];
							$cart[$i]['classStartTime']	= $row["classStartTime"];
							$cart[$i]['classEndTime'] = $row["classEndTime"];
							$cart[$i]['classDay'] =	$row["classDay"];
							$cart[$i]['classCost'] = $row["classCost"];
						}
					}
				} else {
					echo "invalid";
				}
				
				if($cart[$i]['classId']>19) {
					array_push($packageArray, ['bookingId' => $i,
												'classId' => $cart[$i]['classId']
												]
					);
				}
			}
			
			if(count($packageArray)>0){
				for($i=0; $i<count($packageArray);$i++) {
					$sql = "SELECT * FROM packages";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {
							if($packageArray[$i]['classId'] == $row["scheduleId"]){
								$cart[$packageArray[$i]['bookingId']]['classType'] = $row["classType"];
								$cart[$packageArray[$i]['bookingId']]['instructName'] = $row["instructName"];
								$cart[$packageArray[$i]['bookingId']]['classStartTime']	= $row["classStartTime"];
								$cart[$packageArray[$i]['bookingId']]['classEndTime'] = $row["classEndTime"];
								$cart[$packageArray[$i]['bookingId']]['classDay'] =	$row["classDay"];
								$cart[$packageArray[$i]['bookingId']]['classCost'] = $row["classCost"];									
							}
						}
					}
				}
			}
			
			
			echo '<div class="cartBox">';
			// Build cart table
			echo '<table><thead><tr><th>No.</th><th>Class Type</th>
					. <th>Instructor</th><th>Duration</th><th>Day</th>
					. <th>Cost</th><th>Delete</th></tr></thead>'; 
			echo '<tbody>';
			for($i=0; $i<$cartCount; $i++){
				echo '<tr><td>' . ($i+1) 
						. '</td><td>' . $cart[$i]['classType'] 
						. '</td><td >' . $cart[$i]['instructName']
						. '</td><td>' . $cart[$i]['classStartTime'] . '<br>to<br>' . $cart[$i]['classEndTime']
						. '</td><td>' . $cart[$i]['classDay']
						. '</td><td>' . $cart[$i]['classCost']
						. '</td><td><button id="deletetBtn' . ($i+1) . '" class="deleteBtn">'
						. '-</button></td></tr>';
				// Modal
				echo '<div id="deleteModal' . ($i+1) . '" class="deleteModal">';
				// Modal content
				echo '<div class="deleteModal-content">'	
						. '<p class="deleteModalP1">Successfully deleted!!!</p><br>'
						. '<button id="deleteOkBtn' . ($i+1)
						. '" class="scheduleBtn">Ok</button></div></div>';
			}
			echo '<tr><td></td><td></td><td></td><td></td><td>TOTAL:</td><td>RM '
					. getSum($cart, $cartCount) . '<td></tr>';
			echo '</tbody></table>';
			echo '<a href="/TheAthleteHub/cart/pay.php" class="cartPayBtn">Pay Now</a>';
		
			echo '</div>';
		
		} else {
			echo '<div class="cartEmptyDiv"><p>Your cart is empty!!!<br>';
			echo '<a href ="/TheAthleteHub/schedule/index.php" class="returnSchedule">Return to schedule</a></p></div>';
		}
		
		// Close the database connection
		$conn->close();
		
		include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); 
	
	?>
	
	<script>
		const cartCount = <?php echo $cartCount; ?>;
		var bookingArray = <?php echo $bookingArray; ?>;
		
		for(var i=0; i<cartCount; i++) {
			// Get the modal
			eval('var deleteModal' + (i+1) + '= document.getElementById("deleteModal' + (i+1) + '");');
			// Get the button that opens the modal
			eval('var deletetBtn' + (i+1) + '= document.getElementById("deletetBtn' + (i+1) + '");');
			// Get the okay button for each success message
			eval('var deleteOkBtn' + (i+1) + '= document.getElementById("deleteOkBtn' + (i+1) + '");');
		}
		
		for(var i=0; i<cartCount; i++) {	
			// When the user clicks the button, open the modal
			eval('deletetBtn' + (i+1) + '.onclick = function() {deleteModal' + (i+1) + '.style.display = "block";}');
			// When the user clicks on okay button, close the modal
			eval('deleteOkBtn' + (i+1) + '.onclick = function() {deleteModal' + (i+1) + '.style.display = "none";}');
		}
		
		for(var i=0; i<cartCount; i++) {
			eval('var bookingId' + (i+1) + '= bookingArray[' + i + '];');
			eval('document.getElementById("deletetBtn' + (i+1) + '").addEventListener("click", function(){'
					+ 'var xhr = new XMLHttpRequest();'
					+ 'xhr.open("POST", "/TheAthleteHub/cart/deleteCart.php", true);'
					+ 'xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");'
					//Dunno for what but can see success or not
					+ 'xhr.onreadystatechange = function() {'
					+	'if (xhr.readyState === 4 && xhr.status === 200) {'
							// handle the response from the server
					+		'console.log(xhr.responseText);'
					+	'}'
					+ '};'
					+ 'xhr.send("bookingId=" + bookingId' + (i+1) + ');'
					+ '});'
			);
		}
		
		for(var i=0; i<cartCount; i++) {
			eval('document.getElementById("deleteOkBtn' + (i+1) + '").addEventListener("click", function(){'
					+ 'location.reload();'
					+ '});'
			);
		}
	</script>
</body>
</html>