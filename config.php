<?php
$conn = mysqli_connect('localhost', 'root', '', 'pit_case_study');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
