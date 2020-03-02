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
$sql = "SELECT id FROM doctors where username=\"$username\";";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $user_id = $row['id'];
        }
        mysqli_free_result($result);
    }
} else {
    echo "0";
}

$sql = "SELECT count(*) as number_patients FROM relation where doctor_id=$user_id";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $patients = $row['number_patients'];
        }
        mysqli_free_result($result);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

$sql = "SELECT count(*) as pending FROM relation where doctor_id=$user_id";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $patients = $row['pending'];
        }
        mysqli_free_result($result);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>


<body>
    <div class="my-5"></div>
    <div class="container sm-4">
        <div class="card-deck">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-center font-weight-bold">
                        <h1 style="font-size:5em;font-weight:bolder;" class="card-title"><?php echo ($patients); ?></h1>
                    </div>
                    <p class="card-text">Patients registered with you. Search for patients and upload observations for the neural network to generate predictions on!</p>
                    <a href="searchform.php">
                        <button type="button" class="btn btn-blue btn-md btn-block">Find Patient</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('../php/footer.php')?>

    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>