<?php
session_start();
include('../php/config.php');
$username = $_SESSION['login_user'];
if (!isset($username)) {
    header("location: ../php/403.html");
}
?>
<html><nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="index.php">PredictorUI</a>
    </nav></html>