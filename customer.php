<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $clname = mysqli_real_escape_string($conn, $_POST['clname']);
    $c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
    $pass = $_POST['c_passwprd'];
    $cpass = $_POST['cpassword'];
    
    $select = "SELECT * FROM customert WHERE c_email = '$c_email' && c_passwprd = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'passwords do not match!';
        } else {
            $insert = "INSERT INTO customert (cname, clname, c_email, c_passwprd) VALUES ('$cname','$clname','$c_email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            <input type="text" name="cname" required placeholder="Enter your first name">
            <input type="text" name="clname" required placeholder="Enter your last name">
            <input type="email" name="c_email" required placeholder="Enter your email">
            <input type="password" name="c_passwprd" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>
