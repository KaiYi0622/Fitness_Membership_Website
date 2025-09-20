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
		
	// Create
	if (isset($_POST['scheduleId']) && isset($_POST['userId'])) {
		$scheduleId = $_POST['scheduleId'];
		$userId = $_POST['userId'];
		$sql = "INSERT INTO bookingDetails (scheduleID, userId) VALUES ($scheduleId, $userId)";		
			
		if($conn->query($sql) === TRUE) {
			echo $scheduleId . "successfully booked";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else {
		echo "False";
	}
?>