<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];


    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from student where email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == $password) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: display.php");
        } else {
            $showError = "Invalid Credentials";
            echo '<script>alert("Invalid Credentials")</script>';
        }

    } else {
        echo '<script>alert("Invalid Credentials")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <div class="register">
        <span class="formTitle">Login</span>
        <form method="post">
            <div class="element__wrapper">
                <span>Enter Your Email ( it will be used for login purpose ): </span>
                <input type="text" name="email" placeholder="Name" />
            </div>
            <div class="element__wrapper">
                <span>Create Password: </span>
                <input type="text" name="password" placeholder="password:" />
            </div>
            <a href="register.php">new user?</a>
            <button name="submit" type="submit">Submit</button>
        </form>
    </div>
</body>

</html>