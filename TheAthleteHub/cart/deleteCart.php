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
	
	// Delete
	if (isset($_POST['bookingId'])) {
		$bookingId = $_POST['bookingId'];
		echo "True\n";
		echo  $bookingId . "deleted";
		$sql = "DELETE FROM bookingDetails WHERE bookingId = $bookingId";		//save customer id
			
		if($conn->query($sql) === TRUE) {
			echo "Deleted successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else {
		echo "false";
	}
	
	// Close the database connection
	$conn->close();
?>