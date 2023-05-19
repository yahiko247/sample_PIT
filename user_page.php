<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['cname'])){
    header('location:login_page.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<header>
        <div class="logo">PIZZA_USER</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="" class="active">Home</a>
                </li>
                <li>
                    <a href="">ORDER</a>
                </li>
                <li>
                    <a href="">Just for you</a>
                </li>
                <li>
                    <a href="">DISCOVER</a>
                </li>
                <li>
                    <a href="logout_form.php" class="btn">log out</a>
                </li>
            </ul>
        </nav>
    </header>
    <script src="java.js"></script>
</body>
</html>