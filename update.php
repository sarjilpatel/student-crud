<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
$sessionEmail = $_SESSION['email'];

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
        <span class="formTitle">Update Details</span>
        <?php

        $sql = "select * from `student` where email='$sessionEmail'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $name = $row['name'];
                $phone = $row['phone'];
                $email = $row['email'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $city = $row['city'];
                $oldschool = $row['oldschool'];
                echo '<form method="post">
                    <div class="element__wrapper">
                        <span>Enter Your name: </span>
                        <input type="text" value=' . $name . ' name="name" placeholder="Name" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your phone: </span>
                        <input type="text" value=' . $phone . '  name="phone" placeholder="Phone" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your Email ( it will be used for login purpose ): </span>
                        <input type="text" value=' . $email . '  name="email" placeholder="Name" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your Date of birth: </span>
                        <input type="date" value=' . $dob . '  name="dob" placeholder="Date of birth" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your gender: </span>
                        <input type="text" value=' . $gender . '  name="gender" placeholder="Gender" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your Old School/college name: </span>
                        <input type="text" value=' . $oldschool . '  name="oldschool" placeholder="Old college:" />
                    </div>
                    <div class="element__wrapper">
                        <span>Enter Your City/Town name: </span>
                        <input type="text" value=' . $city . '  name="city" placeholder="City/town:" />
                    </div>
                    <button name="submit" type="submit">Submit</button>
                </form>';

            }
        }

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $oldschool = $_POST['oldschool'];
            $city = $_POST['city'];

            $existSql = "SELECT * FROM `student` WHERE email = '$email'";
            $sessionUser = "SELECT * FROM `student` WHERE email = '$sessionEmail'";
            $result = mysqli_query($con, $existSql);
            $result2 = mysqli_query($con, $sessionUser);
            $checkUser = mysqli_fetch_assoc($result);
            $noRows = mysqli_num_rows($result);
            $sessionUserRow = mysqli_fetch_assoc($result2);
            if ($noRows > 0 && $checkUser['ID'] != $sessionUserRow['ID']) {
                echo '<script>alert("Email Already Exists")</script>';
            } else {
                $sql = "UPDATE student SET name='$name', phone='$phone', email='$email', dob='$dob', gender='$gender', oldschool='$oldschool', city='$city' where email='$sessionEmail'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $_SESSION['email'] = $email;
                    header('location: display.php');
                } else {
                    die(mysqli_error($con));
                }
            }

        }
        ?>
    </div>
</body>

</html>