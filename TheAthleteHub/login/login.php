<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
	$message = "You have logged in.";
    echo "<script>alert('$message');history.back();</script>";
    exit();
}

@include 'config.php';

if(($_SERVER['REQUEST_METHOD'] === 'POST')) { //&& isset($_POST['submit']) && $_POST['submit'] == "Sign In"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $select = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_array($result);
		
		$_SESSION['userId'] = $row['userId'];
        $_SESSION['userEmail'] == $row['email'];
		
        $message = "Login Successfully! Welcome!";
        echo "<script>alert('$message');window.location='/TheAthleteHub/index.php';</script>";
    } elseif (empty($result)){
		$message = 'The account does not exist. Please sign up to create an account.';
		echo "<script>alert('$message');window.location='index.php';</script>";
	}
    else{
		
		$select = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($conn,$select);
		if(mysqli_num_rows($result) === 1){
			$error[] = 'Incorrect Or Password!';
		}
    }
} 

?>
