<?php
  // User name and password for authentication
  $username = 'admin';
  $password = 'admin';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Cisco hospitals Admintration"');
    exit('<h2>Cisco Hospitals</h2>Sorry, you must enter a valid user name and password to access this page.');
  }
require 'header.php';

if(isset($_POST['s'])){
    
      $n= mysqli_real_escape_string($dbc, trim($_POST['n']));
      $p= mysqli_real_escape_string($dbc, trim($_POST['p']));
      $query = "insert into users values('$n','".sha1($p)."',0)";
    #echo $query;
    mysqli_query($dbc , $query) or die('dscds');
    echo '<h2 class="page-header">Username and Password are Set.</h2>';        
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="container">
    <div class="row">
     <div class="col-lg-2">
        <label>Employee Name : </label>
     </div>
     <div class="col-lg-4">
        <input type="text" name="n" class="form-control" required>
     </div>  
   </div><hr>
    
    <div class="row">
     <div class="col-lg-2">
        <label>Employee Password : </label>
     </div>
     <div class="col-lg-4">
        <input type="password" name="p" class="form-control" required>
     </div>  
    </div><br>
    <div class="col-lg-6">
        <input  type="submit" name="s" class="btn btn-primary btn-block" vlue="save">
    </div></form>
</div>

