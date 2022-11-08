<?php 
    $con = new mysqli('localhost','root','','registration');

    if (!$con) {
        die(mysqli_error($con));
    }
?>