<?php
include('../php/header.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['login_user'];

if (!isset($username)) {
    header("location: ../php/403.html");
}

$sql = "SELECT * FROM diagnosis WHERE diagnosis.user_id = $user_id  ORDER by diagnosis.id DESC LIMIT 20";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo $row['Glucose']."\n";
        }
        mysqli_free_result($result);
    }
} else {
    echo "";
}





$sql = "SELECT id FROM users where username=\"$username\";";
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

$sql = "SELECT count(*) as positive FROM diagnosis where user_id=$user_id and PredictedOutcome=1";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $positive = $row['positive'];
        }
        mysqli_free_result($result);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

$sql = "SELECT count(*) as positive FROM diagnosis where user_id=$user_id";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $total = $row['positive'];
        }
        mysqli_free_result($result);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// Close connection
mysqli_close($db);
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
</head>

<body>
    <div class="my-5"></div>
    <div class="container">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h1 style="font-size:5em;font-weight:bolder;" class="card-title">
                    <?php
                    $risk = round((($positive / $total) * 100), 2);
                    if ($risk > 80) {
                        echo "<div class='text-danger'> $risk </div>";
                    } else {
                        echo "<div class='text-success'> $risk</div>";
                    }
                    ?>
                </h1>
                <div class="card-text">Percent of predicted risk, compared to previous patients.</div>
            </div>
        </div>
    </div>

    <div class="sm-4">
        <div class="container">
            <div class="card-deck">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Glucose</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button type="button" class="btn btn-light-blue btn-md">Read more</button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Insulin</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button type="button" class="btn btn-light-blue btn-md">Read more</button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Body Mass Index</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button type="button" class="btn btn-light-blue btn-md">Read more</button>
                    </div>
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