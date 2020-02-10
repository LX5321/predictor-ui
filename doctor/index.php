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
    echo "";
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PredictorUI</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/mdb.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

</head>

<body>
    <div class="my-5"></div>
    <div class="container sm-4">
        <div class="card-deck">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-center font-weight-bold">
                        <h1 style="font-size:5em;font-weight:bolder;" class="card-title"><?php echo ($patients); ?></h1>
                    </div>
                    <p class="card-text">Patients registered with you.</p>
                    <button type="button" class="btn btn-blue btn-md btn-block">Add Patient</button>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Observations</h4>
                    <p class="card-text">Add new diagnosis for each patient here.</p>
                    <button type="button" class="btn btn-blue btn-md btn-block">Add Observations</button>
                </div>
            </div>
            <div class="card mb-4">

                <div class="card-body">
                    <h4 class="card-title">Security</h4>
                    <p class="card-text">Change Password</p>
                    <button type="button" class="btn btn-danger btn-md btn-block">Read more</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>
</html>