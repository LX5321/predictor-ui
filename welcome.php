<!DOCTYPE html>
<html lang="en">
<?php
$Array = array(0, 1);
$List = implode(', ', $Array);
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PredictorUI</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="welcome.php">PredictorUI</a>
    </nav>
    <!-- Navbar -->
    <div class="my-2"></div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb secondary-color">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Library</a></li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>

    </div>

    <div class="container">
        <!-- Card deck -->
        <div class="card-deck">

            <!-- Card -->
            <div class="card mb-4">

                <!--Card image-->
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!--Card content-->
                <div class="card-body">
                    <h4 class="card-title">Glucose</h4>
                </div>

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

                <!--Card image-->
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!--Card content-->
                <div class="card-body">

                    <!--Title-->
                    <h4 class="card-title">Insulin</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-light-blue btn-md">Read more</button>

                </div>

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

                <!--Card image-->
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!--Card content-->
                <div class="card-body">

                    <!--Title-->
                    <h4 class="card-title">Body Mass Index</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-light-blue btn-md">Read more</button>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: [<?php print_r($List); ?>],
                datasets: [{
                    label: "My Second dataset",
                    data: [<?php print_r($List); ?>],
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)'
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
    </script>
</body>

</html>