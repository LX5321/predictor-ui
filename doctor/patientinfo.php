<?php
session_start();
include('../php/config.php');
$patient_id = $_GET['id'];
$doctor_id = $_SESSION['user_id'];


$sql = "SELECT count(*) FROM relation WHERE user_id=$patient_id  and doctor_id=$doctor_id";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
           $count = $row["count(*)"];
        }
        mysqli_free_result($result);
    }
} else {
    echo "";
}

if($count == 0){
// if no relation bet doc and pat
    print("no access");
}
?>