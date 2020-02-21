<?php
session_start();
include('../php/config.php');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo $_POST['user_id'];

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$Pregnancies = isset($_POST['pregnancies']) ? $_POST['pregnancies'] : '';
$Glucose = isset($_POST['glucose']) ? $_POST['glucose'] : '';
$BloodPressure = isset($_POST['bloodpressure']) ? $_POST['bloodpressure'] : '';
$SkinThickness = isset($_POST['skinthickness']) ? $_POST['skinthickness'] : '';
$Insulin = isset($_POST['insulin']) ? $_POST['insulin'] : '';
$BMI = isset($_POST['bmi']) ? $_POST['bmi'] : '';
$DiabetesPedigreeFunction = isset($_POST['dpf']) ? $_POST['dpf'] : '';
$Age = isset($_POST['age']) ? $_POST['age'] : '';

$user_id = intval($user_id);
$Pregnancies = intval($Pregnancies);
$Glucose = intval($Glucose);
$BloodPressure = intval($BloodPressure);
$SkinThickness = intval($SkinThickness);
$Insulin = intval($Insulin);
$BMI = intval($BMI);
$DiabetesPedigreeFunction = intval($DiabetesPedigreeFunction);
$Age = intval($Age);

$sql = "INSERT INTO diagnosis (user_id,Pregnancies,Glucose,BloodPressure,SkinThickness,Insulin,BMI,DiabetesPedigreeFunction,Age) VALUES ($user_id, $Pregnancies, '$Glucose', '$BloodPressure', '$SkinThickness', '$Insulin', '$BMI', '$DiabetesPedigreeFunction', '$Age')";
if (mysqli_query($db, $sql)) {
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
mysqli_close($db);
