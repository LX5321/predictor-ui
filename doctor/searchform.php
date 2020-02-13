<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Search | Predictor</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/mdb.min.css" rel="stylesheet" />
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("searchpatient.php", {
                        term: inputVal
                    }).done(function(data) {
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
</head>

<body>
    <html>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="index.php">PredictorUI</a>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item avatar">
                <a class="nav-link p-0" href="../logout.php">
                    <img src="avatar-5.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="45">
                </a>
            </li>
        </ul>
    </nav>
    <div class="my-5"></div>
    <div class="container sm-4">
        
            <div class="search-box">
                <input class="form-control mb-4" type="text" autocomplete="off" placeholder="Search Patient.." />
                <div class="mb-4"></div>
                <div class="result"></div>
            </div>
        </div>
    </div>
</body>

</html>