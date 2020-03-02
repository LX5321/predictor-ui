<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home | Predictor</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/mdb.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

</head>
<?php
include('../php/header.php');
$user_id = $_GET['id'];
?>
<div class="mb-2"></div>
<div class="container">
    <form class="p-5" method="POST" action="insertintodb.php">
        <p class="h4 mb-4 text-center">Add New Record</p>
        <div class="row">
            <div class="col-sm text-center">
                <input type="number"  name="user_id" class="form-control mb-4" readonly value="<?php echo $user_id;?>">
            </div>
            <div class="col-sm">
                <input type="number" required name="pregnancies" class="form-control mb-4" placeholder="Pregnancies">
            </div>
            <div class="col-sm">
                <input type="number" required name="glucose" class="form-control mb-4" placeholder="Glucose">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="number" required name="bloodpressure" class="form-control mb-4" placeholder="Blood Pressure">
            </div>
            <div class="col-sm">
                <input type="number" required name="skinthickness" class="form-control mb-4" placeholder="Skin Thickness">
            </div>
            <div class="col-sm">
                <input type="number" required name="insulin" class="form-control mb-4" placeholder="Insulin">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="number" required name="bmi" class="form-control mb-4" placeholder="Body Mass Index">
            </div>
            <div class="col-sm">
                <input type="number" required name="dpf" class="form-control mb-4" placeholder="Diabetes Pedigree Function">
            </div>
            <div class="col-sm">
                <input type="number" required name="age" class="form-control mb-4" placeholder="Age">
            </div>
        </div>

        <button class="btn btn-secondary btn-block my-4" type="submit">Insert</button>
    </form>
</div>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>