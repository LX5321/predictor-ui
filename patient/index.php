<?php
include('../php/header.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['login_user'];

if (!isset($username)) {
    header("location: ../php/403.html");
}

$glucose = [];
$bloodPressure = [];
$skinThickness = [];
$insulin = [];
$bmi = [];
$dpf = [];

$sql = "SELECT * FROM diagnosis WHERE diagnosis.user_id = $user_id  ORDER by diagnosis.id DESC LIMIT 7";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($glucose, $row['Glucose']);
            array_push($bloodPressure, $row['BloodPressure']);
            array_push($skinThickness, $row['SkinThickness']);
            array_push($insulin, $row['Insulin']);
            array_push($bmi, $row['BMI']);
            array_push($dpf, $row['DiabetesPedigreeFunction']);
        }
        mysqli_free_result($result);
    }
} else {
    echo "";
}


$List1 = implode(', ', $glucose);
$List2 = implode(', ', $bloodPressure);
$List3 = implode(', ', $skinThickness);
$List4 = implode(', ', $insulin);
$List5 = implode(', ', $bmi);
$List6 = implode(', ', $dpf);

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


    <div class="container sm-4">
        <div class="card-deck">
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Glucose</h4>
                </div>
            </div>
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart2"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Blood Pressure</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart3"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Skin Thickness</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container sm-4">
        <div class="card-deck">
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart4"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Insulin</h4>
                </div>
            </div>
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart5"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Body Mass Index</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart6"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">DPF</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    </div>
    <?php include('../php/footer.php'); ?>

    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>

    <script>
        setTimeout(() => {

            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List1); ?>],
                    datasets: [{
                        data: [<?php print_r($List1); ?>],
                        backgroundColor: [
                            'rgba(76, 175, 80, .2)'
                        ],
                        borderColor: [
                            'rgba(76, 175, 80, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart2").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List2); ?>],
                    datasets: [{
                        data: [<?php print_r($List2); ?>],
                        backgroundColor: [
                            'rgba(0, 250, 132, .2)'
                        ],
                        borderColor: [
                            'rgba(0, 10, 130, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart3").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List3); ?>],
                    datasets: [{
                        data: [<?php print_r($List3); ?>],
                        backgroundColor: [
                            'rgba(63, 81, 181, 0.2)'
                        ],
                        borderColor: [
                            'rgba(63, 81, 181, 0.7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart4").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List4); ?>],
                    datasets: [{
                        data: [<?php print_r($List4); ?>],
                        backgroundColor: [
                            'rgba(156, 39, 176, .2)'
                        ],
                        borderColor: [
                            'rgba(156, 39, 176, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart5").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List5); ?>],
                    datasets: [{
                        data: [<?php print_r($List5); ?>],
                        backgroundColor: [
                            'rgba(0, 188, 212, .2)'
                        ],
                        borderColor: [
                            'rgba(0, 188, 212, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart6").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List6); ?>],
                    datasets: [{
                        data: [<?php print_r($List6); ?>],
                        backgroundColor: [
                            'rgba(255, 152, 0, .2)'
                        ],
                        borderColor: [
                            'rgba(255, 152, 0, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });
            var ctxL = document.getElementById("lineChart6").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php print_r($List6); ?>],
                    datasets: [{
                        data: [<?php print_r($List6); ?>],
                        backgroundColor: [
                            'rgba(233, 30, 99, .2)'
                        ],
                        borderColor: [
                            'rgba(233, 30, 99, .7)',
                        ],
                        borderWidth: 2
                    }]
                },

                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                }
            });

        }, 2500);
    </script>
</body>

</html>