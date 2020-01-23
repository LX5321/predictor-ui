<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>PredictorUI</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet" />
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet" />
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1c2331 !important;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="" target="_blank">
        <strong>PredictorUI</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('img/sample.jpg'); background-repeat: no-repeat; background-size: cover;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row wow fadeIn">
          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">
            <h1 class="display-4 font-weight-bold">
              Lightweight User Interface for the backend.
            </h1>

            <hr class="hr-light" />

            <p>
              <strong>Now for the web.</strong>
            </p>
            <!-- 
              <p class="mb-4 d-none d-md-block">
                <strong>
                  
                </strong>
              </p> -->

            <a target="_blank" class="btn btn-indigo btn-lg">
              See How it Works
            </a>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Card-->
            <div class="card">
              <!--Card content-->
              <div class="card-body">
                <!-- Form -->
                <form name="" action="login.php" method="post">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Welcome Back!</strong>
                  </h3>
                  <hr />

                  <div class="md-form">
                    <input type="text" name="username" id="username" class="form-control" />
                    <label for="form3">Username</label>
                  </div>
                  <div class="md-form">
                    <input type="password" name="password" id="password" class="form-control" />
                    <label for="form2">Password</label>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-indigo">Log In</button>
                    <hr />
                  </div>

                </form>
                <!-- Form -->
              </div>
            </div>
            <!--/.Card-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  
</body>
</html>