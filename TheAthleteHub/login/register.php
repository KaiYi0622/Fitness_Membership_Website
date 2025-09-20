<?php
if(isset($_POST['submit']) && $_POST['submit']== "Sign Up"){
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($username)){
    if(!empty($email)){
        if(!empty($password)){
            $conn = new mysqli("localhost","root","","TheAthleteHub");

            if(mysqli_connect_error()){
                die('Connect Error ('.mysqli.connect_errno().')'/mysqli_connect_error());
            }
            else{
                $SELECT = "SELECT email from users WHERE email = ? Limit 1";
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    // Email already exists, display an error message or perform necessary actions
                    $message = "Email already exists. Please choose a different email.";
                    echo "<script>alert('$message');window.location='index.php';</script>";
                } else{
					
                $sql = "INSERT INTO users (name,email,password) values('$username','$email','$password')";
                if($conn ->query($sql)){
                    $message = "Signed Up Successfully!";
                    echo "<script>alert('$message');window.location='index.php';</script>";

                }
                else{
                    echo "Error: ".$sql."<br>".$conn->error;
                }
            }
            }
        }
    }
    }
} echo "<script>alert('no insert users');</script>";
?>
