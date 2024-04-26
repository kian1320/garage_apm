<?php include('header.php');?>
<div class="main-content" id="panel">
  <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background:#1E2022;">
    <div class="container-fluid" style="background:#1E2022;">
    	<h1 style="font-weight:bold;color:#F0F5F9;">SKILLED GARAGE</h1>
      <ul class="navbar-nav align-items-center  ml-md-3">

      	<li><a class="nav-link" href="../main/home.php" role="button"><i class="fas fa-home" data-placement="bottom" title="Home"></i></a>
        </li>

        <li><a class="nav-link" href="../customers/customers_vehicle.php" role="button"><i class="fas fa-motorcycle" data-placement="bottom" title="Vehicles"></i></a>
        </li>
        <li><a class="nav-link" href="../customers/records_show.php" role="button"><i class="fas fa-tools" data-placement="bottom" title="Customers"></i></a>
        </li>



        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Account
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
    <a class="dropdown-item" href="../others/username_update.php">Update Username</a>
    <a class="dropdown-item" href="../others/password_update.php">Update Password</a>
    <a class="dropdown-item" href="?logout_button=0">Logout</a>

  </div>
</div>

        

      </ul>
    </div>
  </nav>
</div>
<?php
if(isset($_SESSION['reply'])){
  echo $_SESSION['reply'];
  $_SESSION['reply']= "";
  unset($_SESSION['reply']);
}
?>