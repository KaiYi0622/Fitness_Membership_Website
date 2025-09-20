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
	
	<h2 class="cartHead"><i class="fa fa-credit-card me-2"></i> PAYMENT DETAILS</h2>
	
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
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				if($row["userId"] == $userId) {
					array_push($cart, 	[ 'bookingId' => $row["bookingId"],
											'classId' => $row["scheduleId"],
											'userId' => $row["userId"]
										]
								);
					array_push($bookingId, $row["bookingId"]);
				}
			}
		} else {
			ob_start();
			echo 'alert("Your cart is empty!")';
			header("Location: /TheAthleteHub/cart/index.php");
			ob_end_flush();
			exit;
		}
		
		$sql = "SELECT name, userId FROM users";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				if($row["userId"] == $userId) {
					$username = $row['name'];
				}
			}
		} else {
			echo "Invalid";
		}
		
		
		$packageArray = [];
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
				echo "invalid";	//delete
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
		
		//close connection
		$conn->close();
		
		//Calculate total
		function getSum($cart, $cartCount) {
			$sum = 0;
			
			for($i=0; $i<$cartCount; $i++) {
				$cost = (int)substr($cart[$i]['classCost'], 3);
				$sum += $cost;
			}
			
			return $sum;
		}
		
		$cartCount = count($cart);
		$bookingCount = count($bookingId);
		$bookingArray = json_encode($bookingId);
		
		//Display payment details
		echo '<div class="payBox">';
		echo '<div class="payDetails">';
		echo '<p class="payP1"><i class="far fa-address-card"></i> PROFILE INFO</p>';
		echo '<p><i class="fas fa-user fa-lg me-2"></i> Name: ' . $username . '<br><br><i class="far fa-id-badge"></i> Id: ' . $userId . '</p>';
		echo '</div>';
		echo '<table><thead><tr><th>No.</th><th>ClassType</th>'
				. '<th>Instructor</th><th >Duration</th><th >Day</th>'
				. '<th>Cost</th></tr><thead>'; 
		echo '<tbody>';
		for($i=0; $i<$cartCount; $i++){
			$bookingId = $cart[$i]['bookingId'];
			echo '<tr ><td>' . ($i+1) 
					. '</td><td>' . $cart[$i]['classType'] 
					. '</td><td >' . $cart[$i]['instructName']
					. '</td><td>' . $cart[$i]['classStartTime'] . '<br>to<br>' . $cart[$i]['classEndTime']
					. '</td><td>' . $cart[$i]['classDay']
					. '</td><td>' . $cart[$i]['classCost']
					. '</td></tr>';
		}
		echo '<tr><td></td><td></td><td></td><td></td><td>TOTAL:</td><td>RM '
				. getSum($cart, $cartCount) . '</td></tr>';
		echo '</tbody></table>';
		
		echo '<button id="payBtn" class="payBtn">Confirm Pay</button>';
		// Pay Modal
		echo '<div id="payModal" class="deleteModal">';
		// Modal content
		echo '<div class="deleteModal-content">'	
				. '<p class="deleteModalP1">Successfully pay!!!</p><br>'
				. '<button id="payOkBtn"' 
				. '" class="scheduleBtn">Ok</button></div></div>';
		
		echo '</div>';
		
		include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); 
	?>
	
	<script>
		var bookingCount = <?php echo $bookingCount ?>;
		var bookingArray = <?php echo $bookingArray; ?>;
		var payBtn = document.getElementById("payBtn");
		var payModal = document.getElementById("payModal");
		var payOkBtn = document.getElementById("payOkBtn");
		
		payBtn.onclick = function() {
			payModal.style.display = "block";
		};
		
		
		payOkBtn.onclick = function() {
			window.location.href = "/TheAthleteHub/schedule/index.php";
		};
		
		
		document.getElementById("payBtn").addEventListener("click", function(){
			for(var i=0; i<bookingCount; i++) {
				var bookingId = bookingArray[i];
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/TheAthleteHub/cart/deleteCart.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				//Dunno for what but can see success or not
				xhr.onreadystatechange = function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						// handle the response from the server
						console.log(xhr.responseText);
					}
				};
				xhr.send("bookingId=" + bookingId);	
			}
		});
	
	</script>
</body>
</html>	