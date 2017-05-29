<?php
//require 'connect.php';
require 'headerd.php';
?>
<div class="page-header">
<h1>Cisco Hospital Management System</h1>
</div>

<div class="container" >
<div class="jumbotron opa">
    <p style="font-weight:bold">
    <h2>Welcome !</h2>
    We <strong>Cisco Health Care </strong>Welcome You To One Of The Finest Hospitals of The Country. <br>Stay Healthy.Stay Happy<br>
    <strong>Assuring.Advanced.Accessible</strong></p>
</div>
<div class = "col-lg-8 col-lg-offset-3">
       <div class="row">
            <div class="col-lg-3">
                <a href = "addpatients.php" class ="btn btn-success btn-block">Add a patient</a>
            </div>
            <div class="col-lg-3">
                <a href = "allpatients.php" class = "btn btn-success btn-block">View all Patients</a>
            </div>
       </div>
    <br>
        <div class="row">
            <div class="col-lg-3">
                <a href = "doctors.php"  class = "btn btn-success btn-block">Dcctors available</a>
            </div>
        <div class="col-lg-3">
                <a href = "labs.php" class = "btn btn-success btn-block">Labs available</a>
        </div>
        </div>
    </div>

<nav class="navbar navbar-inverse bottom">
    <div class="container-fluid">
    
     <ul class="nav navbar-nav navbar-right">
    
      <li style="color:red"><a href="createemp.php" >Employee Id create</a>
       <li><a href="logout.php" >Logout</a>
    </ul>
</div>
</nav>

<?php require 'footer.php'; ?>
