<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
    $title = "Hospital Management System";
  echo '<title>'.$title.'</title>';
?>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
    body{
        /*font-weight: bold;*/
        font-size: 13px;
        background-image:url("bg2.jpg");
        background-size: cover;
    }
    .f{width:100px;}
    .opa{
        opacity: 0.5;
        
        }
    #dd{
        font-weight: bold;
    }
    
    #x{
        padding-top: 5px;
    }
    th{
        color:brown;
    }
    .expan{width:300px;}
    .error{
        padding-top:50px;
        font-size: 20px;
        color:brown;
    }
     .bottom{
        float:bottom;
        opacity:0.2;
        width:80%;
        height:20px;
    }
    </style>
</head>
<body>
<div class="container">
    
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
  
    
    <a href="index.php" class="navbar-brand">Cisco Hospitals <span class="glyphicon glyphicon-home"></span> </a>  
        </div>
        <ul class="nav navbar-nav">
            
            <li class="active"><a href="allpatients.php">All Patients</a></li>
            <li><a href="about.php"> About Us</a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
                        <div id="x">
                      <form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <input type="text" name="name" placeholder="Employee Id" class="form-control" id="i1" required>&nbsp;
                    
                    <input type="password" name="password" placeholder="Employee Password" class="form-control" id="i2" required>
	                  <input type="submit" name="sub" value="Login" class="btn btn-success">
                      </form>
                        </div>
        </ul>
</div>
</nav>
<?php  
    require('connect.php');
    require('session.php');
    require('login.php');
    
function chnagelogintextcolor(){
    ?>
    <script>
    document.getElementById("i1").style.border = "1px solid red";
    document.getElementById("i2").style.border = "1px solid red";
    </script>
    
    <?php
}
?>