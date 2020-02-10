<?php
session_start();
include('../php/config.php');
$username = $_SESSION['login_user'];
if (!isset($username)) {
    header("location: ../php/403.html");
}
?>
<html>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="index.php">PredictorUI</a>
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item avatar">
            <a class="nav-link p-0" href="#">
                <img src="avatar-5.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="45">
            </a>
        </li>
    </ul>
</nav>

</html>