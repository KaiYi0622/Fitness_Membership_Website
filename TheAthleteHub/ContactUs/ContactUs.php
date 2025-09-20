<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
    <meta name = "viewport" content = "width=device-width,initial-scale = 1.0" />
    <title>Contact Us</title>
    <link rel = "stylesheet" href = "/TheAthleteHub/style/style.css" >
	<link rel = "icon" type="image/svg" href="/TheAthleteHub/images/heartbeat.svg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style>
	
	*{box-sizing: border-box;}
	body {margin:0;}
	
	.contactBody{
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 100vh;
		background-color: #fff;
		background-size: cover;
		background-position: center;
	}
	
	.container{
		width: 100%;
		height: 100vh;
		display: grid;
		place-items:center;
	}
	
	.form-wrapper {
		border: 2px solid #323c94; 
		border-radius: 20px;
		box-shadow: 0 0 30px rgba(0,0,0,.5);		
		margin-top: 4%;
		padding: 2%;
	}

	.form-heading{
		font-size: 2.5rem;
		color: #1b1e96;
		font-family: serif;
		font-weight: bold;
		margin-bottom: 0.8rem;
		margin-top: 0;
		transition:all 0.3s;
	}

	.contact-form{
		display: flex;
		flex-direction: column;
	}

	.contact-form-input{
		width: 40rem;
		height: 3rem;
		padding: 0.5rem;
		margin: 0.5rem 0;
		background-color: transparent; 
		border: none;
		border-bottom: 0.1rem solid #1b1e96;
		font-size: 1.1rem;
		font-weight: 300;
		font-family: serif;
		color: #000;
		letter-spacing: .05rem;
		outline:none;
	}

	.contact-form-input:focus {
		color: #000; 
		border-bottom: .1rem solid #cc50aa;
	}

	.contact-form-input::placeholder {
		color: #abaaad; 
	}

	.contact-form-textarea{
		height: 8rem;
		resize: none;
	}

	.form-submit-btn{
		width: 400px;
		height: 45px;
		cursor: pointer;
		background-color:white;
		color: rgb(26, 26, 255);
		font-family: Serif, Garamond;
		font-size: 22px;
		font-weight: bold;
		letter-spacing: 0.5px;
			
		text-align:center;
		text-decoration: none;
		
		margin: auto;	
		margin-top: 30px;
		padding: 10px 40px;
		border: 1px solid rgb(26, 26, 255);
		border-radius: 20px;
	}

	.form-submit-btn:hover{
		background-color: rgb(26, 26, 2555);
		color: white;
		transition: .3s;
	}

	.form-submit-btn:active {
		opacity: 0.8;
	}
	
	</style>
</head>
<body>
    <?php include('C:/wamp64/www/TheAthleteHub/includes/header.php'); ?>
	
	<div class="contactBody">
    <div class = "container">
        <div class = "form-wrapper">
            <h2 class="form-heading">Contact Us</h2>
            <form class="contact-form" action="https://formsubmit.co/ca76cf07a79993a617121bea6d6eaabe" method="POST">
                <input type="text" name = "name" autocomplete = "off" placeholder = "Name" class ="contact-form-input" />
                <input type="email" name = "email" autocomplete = "off" placeholder = "Email" class ="contact-form-input" />
                <input type="text"  name = "phone"autocomplete = "off" placeholder = "Phone No" class ="contact-form-input" />
                <input type="text"  name = "subject"autocomplete = "off" placeholder = "Subject" class ="contact-form-input" />

                <textarea class = "contact-form-input 
                contact-form-textarea" placeholder="Message" name = "message"></textarea>
                <button type="submit" class ="form-submit-btn" value = "Send request">Send
                <input type="hidden" name="_next" value="http://localhost/New%20Folder/Login/home.php">

            </form>
        </div>
    </div>
	</div>
    <script src = "script.js"></script>
	
	<?php include('C:/wamp64/www/TheAthleteHub/includes/footer.php'); ?>
</body>

</html>