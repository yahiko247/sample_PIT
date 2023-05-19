<?php
@include 'config.php';

session_start();
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['submit'])) {
    $c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
    $c_passwprd = $_POST['c_passwprd'];

    $select = "SELECT * FROM customert WHERE c_email = '$c_email' AND c_passwprd = '$c_passwprd' ";
    $result = mysqli_query($conn, $select);

    if ($result) { // Check if the query executed successfully
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['cname'] = $row['cname'];
            header('location:user_page.php');
        } else {
            $error[] = 'Incorrect email or password!';
        }
    } else {
        $error[] = 'Query execution error: ' . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            <input type="email" name="c_email" required placeholder="enter your email">
            <input type="password" name="c_passwprd" required placeholder="enter your password">
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>don't have an account? <a href="customer.php">register now</a></p>
        </form>
    </div>
</body>
</html>
