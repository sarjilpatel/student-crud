<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $oldschool = $_POST['oldschool'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    $existSql = "SELECT * FROM `student` WHERE email = '$email'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        echo '<script>alert("Email Already Exists")</script>';
    } else {
        $sql = "insert into `student` (`name`, `phone`, `email`, `dob`, `gender`, `oldschool`, `city`, `password`) VALUES ('$name', '$phone', '$email', '$dob', '$gender', '$oldschool', '$city', '$password');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo '<script>alert("Registered please log in")</script>';
        } else {
            die(mysqli_error($con));
        }
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
        <span class="formTitle">Registration</span>
        <form method="post">
            <div class="element__wrapper">
                <span>Enter Your name: </span>
                <input type="text" name="name" placeholder="Name" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your phone: </span>
                <input type="text" name="phone" placeholder="Phone" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your Email ( it will be used for login purpose ): </span>
                <input type="text" name="email" placeholder="Name" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your Date of birth: </span>
                <input type="date" name="dob" placeholder="Date of birth" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your gender: </span>
                <input type="text" name="gender" placeholder="Gender" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your Old School/college name: </span>
                <input type="text" name="oldschool" placeholder="Old college:" />
            </div>
            <div class="element__wrapper">
                <span>Enter Your City/Town name: </span>
                <input type="text" name="city" placeholder="City/town:" />
            </div>
            <div class="element__wrapper">
                <span>Create Password: </span>
                <input type="text" name="password" placeholder="password:" />
            </div>
            <a href="login.php">already have an account?</a>
            <button name="submit" type="submit">Submit</button>
        </form>
    </div>
</body>

</html>