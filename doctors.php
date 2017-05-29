<?php
require 'header.php';
//require 'connect.php';
if(isset($_SESSION['name'])){
$query = "select * from doctors inner join disease on(doctors.DISID = disease.DISID)";
$d1 = mysqli_query($dbc , $query) or die('inssan');
echo '<table class="table table-bordered">';
echo '<caption> </caption>';
echo '<tr><th>Doctor Name</th><th>Age</th><th>Gender</th><th>Speciality</th><th style="color:green">All patients addmitted to him/her</th>';
while ($r1 = mysqli_fetch_array($d1)){
          if($r1['DOCNAME']!='X'){
                        echo '<tr><td>'.$r1['DOCNAME'].'</td>';
                        echo '<td>'.$r1['AGE'].'</td>';
                        echo '<td>'.$r1['SEX'].'</td>';
                        echo '<td>'.$r1['DISNAME'].'</td>';
                        if(isset($_GET['id'])){
                            if($_GET['id']==$r1['DOCID']){
                                echo '<td>';
                                $q = 'select PID,PNAME from patients where DOCID ='.$_GET['id'];
                                $q = mysqli_query($dbc , $q) or die('sf');
                                echo '<div class="list-group">';
                                if(mysqli_num_rows($q)==0){
                                    echo '<li class="list-group-item">No patients assigned yet';    
                                }
                                while($qq = mysqli_fetch_array($q)){
                                    echo '<a href = "editpatients.php?id='.$qq['PID'].'" class="list-group-item">'.$qq['PNAME'].'</a>'; 
                                    }
                                echo '</div>';
                                echo '</td></tr>';
                            }
                            else
                                echo '<td><a href ="doctors.php?id='.$r1['DOCID'].'">Click to see <span class="glyphicon glyphicon-triangle-bottom"></td></tr>'; 
                        }
                        else
                            echo '<td><a href ="doctors.php?id='.$r1['DOCID'].'">Click to see <span class="glyphicon glyphicon-triangle-bottom" ></td></tr>'; 
                
                    }
           }

echo '</table>';
}
else{
    echo '<div class="error">Employee must first log in first !</div>';
    chnagelogintextcolor();
}
require 'footer.php';
?>