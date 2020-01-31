<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>PredictorUI</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/mdb.min.css" rel="stylesheet" />
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
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="" target="_blank">
        <strong>PredictorUI</strong>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="view full-page-intro" style="background-image: url('img/sample.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row wow fadeIn">
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
          <div class="col-md-6 col-xl-5 mb-4">
            <div class="card">
              <div class="card-body">
                <form name="" action="login.php" method="post">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>