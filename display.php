<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="display.css" />
    <title>Document</title>
</head>

<body>
    <div class="page">
        <?php

        $sql = "select * from `student` where email='$email'";
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
                echo '<h1>Hello ' . $name . ',</h1>
                    <h2>Your details:</h2>
                    <div class="details">
                        <div class="element__wrapper">
                            <h3>Name:</h3>
                            <span>' . $name . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>Email:</h3>
                            <span>' . $email . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>Phone:</h3>
                            <span>' . $phone . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>Date Of Birth:</h3>
                            <span>' . $dob . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>Gender:</h3>
                            <span>' . $gender . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>City/Town:</h3>
                            <span>' . $city . '</span>
                        </div>
                        <div class="element__wrapper">
                            <h3>Old School:</h3>
                            <span>' . $oldschool . '</span>
                        </div>
                    </div>
                    <button class="edit"><a href="update.php">Edit Details</a></button>
                    <button class="logout"><a href="logout.php">Logout</a></button>
                    </div>';
            }
        }


        ?>

</body>

</html>