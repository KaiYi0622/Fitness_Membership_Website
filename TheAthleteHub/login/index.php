<?php
session_start();

if (isset($_SESSION['userId'])) {
    // User is logged in, redirect to the home page
    echo "<script>alert('You have logged in.');history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale=1.0">
    <title>Login | The Athlete's Hub</title>
    <link rel = "stylesheet" href = "/TheAthleteHub/style/style.css">
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style>
		*{box-sizing: border-box;}
		body {margin: 0;}
	</style>
</head>


<body>
    <?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>
    <div class="signInBody">
    <div class = "logreg-box">
        <div class = "form-box login">
            
            <h2 class="login-heading">Sign In</h2>
            <form class="contact-form" method = "POST" action = "login.php">
                <div class = "input-box">
                    <span class = "icon"><i class='bx bxs-envelope'></i></box-icon></span>
                    <input type="text" name = "email" autocomplete = "off" placeholder = "Email" class ="login-input" required />
                </div>
                <div class = "input-box">
                    <span class = "icon"><i class='bx bxs-lock'></i></box-icon></span>
                    <input type="password" name = "password" autocomplete = "off" placeholder = "Password" class ="login-input" required />
                </div>
                <div class = "remember-forgot">
                    <label><input type = "checkbox"> Remember me </label>
                    <a href = "#" class = "linker">Forgot password?</a>
                </div>
                <input type="submit" name="submit" class ="form-submit-btn" value = "Sign In" />
                <div class = "login-register">
                    <p>Don't have an account? <a href = "#" class = "register-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    
        <div class = "form-box register">
            
            <h2 class="login-heading">Sign Up</h2>
            <form class="contact-form" method ="POST" action = "register.php">
                <div class = "input-box">
                    <span class = "icon"><i class='bx bx-user-circle'></i></box-icon></span>
                    <input type="text" name = "name" required autocomplete = "off" placeholder = "Name" class ="signup-input" />
                </div>
                <div class = "input-box">
                    <span class = "icon"><i class='bx bxs-envelope'></i></box-icon></span>
                    <input type="text" required  name = "email" autocomplete = "off" placeholder = "Email" class ="signup-input"  />
                </div>
                <div class = "input-box">
                    <span class = "icon"><i class='bx bxs-lock'></i></box-icon></span>
                    <input type="password" name = "password" required autocomplete = "off" placeholder = "Password" class ="signup-input" />
                </div>
                <div class = "remember-forgot">
                    <label><input type = "checkbox"> I agree to the terms & conditions </label>
                </div>
                <input type="submit" name="submit" class ="form-submit-btn" value = "Sign Up">
                <div class = "login-register">
                    <p>Already have an account? <a href = "#" class = "login-link">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
    <div>
	
	<script>
		const logregBox = document.querySelector('.logreg-box');
		const loginLink = document.querySelector('.login-link');
		const registerLink = document.querySelector('.register-link');

		registerLink.addEventListener('click', () => {
			logregBox.classList.add('active');
		})

		loginLink.addEventListener('click', () => {
			logregBox.classList.remove('active');
		})
	</script>
	
	<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>
</body>
</html>