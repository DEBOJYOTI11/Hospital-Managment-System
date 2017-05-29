<?php
#require 'connect.php';
require 'header.php';
if(isset($_SESSION['name'])){
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
if(isset($_GET['id'])){
    $q = 'delete from patients where PID='.$_GET['id'];
    mysqli_query($dbc , $q) or die('delete');
    ?>
    <div class="page-header">
        <h3 style="color:green">Record Deleted Succesfully</h3>
    </div>
<?php } ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" >
    <div clas="col-lg-5">
    <div class = "form-group">
    <input type="text" name="se" class = "form-control" placeholder="Enter patient Name">
    </div>
    </div>
    <input type="submit" value="Search" name="submit" class="btn btn-default">
</form>
<?php

if(isset($_POST['submit'])){
    echo '<table class = "table table-bordered">';
    echo '<caption>Search results :</caption>';
    $q = 'select * from patients where PNAME like  \'%'.$_POST['se'].'%\'';
    $r = mysqli_query($dbc,$q) or die('sda');
    $c =0;
    while ($row = mysqli_fetch_array($r)){
        $i = $row['PID'];
    ?>
    <tr>
        <td style="width:10px"><a href="allpatients.php?id=<?php echo $row['PID']; ?>"><span class="glyphicon glyphicon-remove" style="color:red"></span></a>&nbsp;&nbsp;</td><td><a href = 'editpatients.php?id=<?php echo $i; ?>' class="btn btn-default btn-block"><?php echo $row['PNAME']; ?></a></td>
        <td><?php echo $row['AGE']; ?></td>
        <td><?php echo $row['SEX']; ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
    <?php    
        $c=$c+1;;
    }
    if($c==0){
        ?>
        <div class="error" styele="color:red">
            No search results found !
        </div>
        <?php
    }
    echo '</table>';
}
else{
$query ='select * from patients';
$d = mysqli_query($dbc , $query);

echo '<table class = "table table-bordered">';
echo '<caption>All PATIENTS</caption>';
while($row = mysqli_fetch_array($d)){
    $i = $row['PID'];
    ?>
    <tr>
        <td style="width:10px"><a href="allpatients.php?id=<?php echo $row['PID']; ?>"><span class="glyphicon glyphicon-remove" style="color:red"></span></a>&nbsp;&nbsp;</td><td><a href = 'editpatients.php?id=<?php echo $i; ?>' class="btn btn-default btn-block"><?php echo $row['PNAME']; ?></a></td>
        <td><?php echo $row['AGE']; ?></td>
        <td><?php echo $row['SEX']; ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
    <?php
    }
    echo '</table>';
}
}
else{
    echo '<div class="error">Employee must first log in first !</div>';
    chnagelogintextcolor();
}
require 'footer.php';
?> 