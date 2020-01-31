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
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="index.php">PredictorUI</a>
    </nav>
    <div class="my-5"></div>
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
                    <h4 class="card-title">Insulin</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="button" class="btn btn-light-blue btn-md">Read more</button>
                </div>
            </div>
            <div class="card mb-4">
                <div class="view overlay">
                    <div>
                        <canvas id="lineChart3"></canvas>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Body Mass Index</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="button" class="btn btn-light-blue btn-md">Read more</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script>
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: [<?php print_r($List); ?>],
                datasets: [{
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

        var ctxL2 = document.getElementById("lineChart2").getContext('2d');
        var myLineChart2 = new Chart(ctxL2, {
            type: 'line',
            data: {
                labels: [<?php print_r($List2); ?>],
                datasets: [{
                    data: [<?php print_r($List2); ?>],
                    backgroundColor: [
                        'rgba(255, 0, 127, .2)'
                    ],
                    borderColor: [
                        'rgba(255, 0, 127, .7)',
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

        var ctxL3 = document.getElementById("lineChart3").getContext('2d');
        var myLineChart3 = new Chart(ctxL3, {
            type: 'line',
            data: {
                labels: [<?php print_r($List3); ?>],
                datasets: [{
                    data: [<?php print_r($List3); ?>],
                    backgroundColor: [
                        'rgba(240, 163, 10, .2)'
                    ],
                    borderColor: [
                        'rgba(240, 163, 10, .7)',
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
