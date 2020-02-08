<?php include('../php/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PredictorUI</title>
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
                        // Display the returned data in browser
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
    <div class="my-5"></div>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search country..." />
        <div class="result"></div>
    </div>
</body>

</html>