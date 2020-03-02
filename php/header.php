<?php
session_start();
include('../php/config.php');
$username = $_SESSION['login_user'];
if (!isset($username)) {
    header("location: ../php/403.html");
}
?>
<html>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="index.php">PredictorUI</a>
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item avatar">
            <!-- <a class="nav-link p-0" href="../logout.php"> -->
            <a class="nav-link p-0"  data-toggle="modal" data-target="#basicExampleModal">
                <img src="avatar-5.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="30">
            </a>
        </li>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hello There!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $username;?> is signed into the system.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="../logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
      </div>
    </div>
  </div>
</div>
</html>