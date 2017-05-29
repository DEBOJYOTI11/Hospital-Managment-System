<?php
require 'header.php';
//require 'connect.php';
if(isset($_SESSION['name'])){
$query  = "select * from labtest inner join lab on (labtest.LABNO = lab.LABNO )";
$d1 = mysqli_query($dbc , $query) or die('inssan');
echo '<table class="table table-bordered">';
echo '<caption> </caption>';
echo '<tr><th>TEST NAME </th><th>Cost<br>(in Ruppes)</th><th>Time Required<br>(Hours)</th><th>Lab Name</th><th>Lab Location</th><th style="color:green">All tests alloted in the lab</th>';
while ($r1 = mysqli_fetch_array($d1)){
          if($r1['TESTNAME']!='X'){
                        echo '<tr><td>'.$r1['TESTNAME'].'</td>';
                        echo '<td>'.$r1['COST'].'</td>';
                        echo '<td>'.$r1['TIMEREG'].'</td>';
                        echo '<td>'.$r1['LABNAME'].'</td>';
                        echo '<td>'.$r1['LABDESTINATION'].'</td>';
                        if(isset($_GET['id'])){
                           if($_GET['id']==$r1['TESTID']){
                                echo '<td>';
                                $q = 'select * from assigntest inner join patients on (patients.PID = assigntest.PID) where  assigntest.LABTESTID='.$_GET['id'];
                                $q = mysqli_query($dbc , $q) or die('sf');
                                echo '<div class="list-group exapn">';
                                if(mysqli_num_rows($q)==0){
                                    echo '<li class="list-group-item">No labs alloted yet';    
                                }
                                while($qq = mysqli_fetch_array($q)){
                                    echo '<a href = "editpatients.php?id='.$qq['PID'].'" class="list-group-item">Assigned to : '.$qq['PNAME'].'</a>'; 
                                    echo '<li class="list-group-item" >Schedule Time : '.$qq['SCHEDULETIME'].'</li>';
                                    echo '<li class="list-group-item" >Schedule date : '.$qq['SCHEDULEDATE'].'</li>';
                                    if($qq['RESULT']=='XX')
                                         echo '<li class="list-group-item" >Result not available</li><hr>';
                                    else
                                         echo '<li class="list-group-item" >Result : '.$qq['RESULT'].'</li><hr>';
                                    }
                                echo '</div>';
                                echo '</td></tr>';
                            }
                            else
                                echo '<td><a href ="labs.php?id='.$r1['TESTID'].'">Click to see <span class="glyphicon glyphicon-triangle-bottom"></td></tr>'; 
                        }
                        else
                            echo '<td><a href ="labs.php?id='.$r1['TESTID'].'">Click to see <span class="glyphicon glyphicon-triangle-bottom" ></td></tr>'; 
                
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