<?php
include("php/config.php");
session_start();

function check_doctor($db, $username, $password){
    $sql = "SELECT id FROM doctors WHERE username = '$username' and passcode = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        $_SESSION['user_id'] = $row['id'];
        header("location: doctor/index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
        echo($error);
    }
}


function check_patient($db, $username, $password){
    $sql = "SELECT id FROM users WHERE username = '$username' and passcode = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        $_SESSION['user_id'] = $row['id'];
        header("location: patient/index.php");
    } else {
        check_doctor($db, $username, $password);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    check_patient($db, $myusername, $mypassword);
}
