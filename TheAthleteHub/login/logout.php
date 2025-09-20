<?php
session_start();
session_unset();
session_destroy();

echo "<script>alert('You have logged out.');window.location='/TheAthleteHub/index.php';</script>";
exit();
?>