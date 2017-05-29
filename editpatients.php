<?php
#require 'connect.php';
require 'header.php';
if(isset($_SESSION['name'])){
        if(!isset($_GET['id']))
                {echo '<h1 class="page-header>Page not found</h1>';continue;}
            $id = $_GET['id'];
        if(isset($_GET['ft']))$ft = $_GET['ft'];
        else $ft = "notinit";

        if(isset($_POST['submita'])){
            $x = $_POST['scd'];
            $y = $_POST['sct'];
            $z = $_POST['ln'];
            $aq = "insert into assigntest values($id,$z, '$x','$y','XX')";
            $res = mysqli_query($dbc , $aq) or die('assign');
            $varforackno = 1;
            $_GET['setidt']-=2000;
            }
        if(isset($_POST['sforresult'])){
            $xx = $_POST['inr'];
            $aqq = "update assigntest set RESULT='$xx' where LABTESTID=".$_POST['inh2']." AND PID=".$_POST['inh1'];
            mysqli_query($dbc , $aqq) or die('dnskncnds');
            }
        $query = "select * from patients where PID = ".$id;
        $qq = mysqli_query($dbc , $query) or die('error');
        while($row = mysqli_fetch_array($qq)){
        ?>

        <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                                <h3>Patient's Information : </h3>
                            <table class="table table-bordered">
                            <tr><td>Name : </td><td><?php echo $row['PNAME']; ?></td></tr>
                            <tr><td>Sex : </td><td><?php if ($row['SEX']=='M') echo 'Male'; ?><?php if ($row['SEX']=='F') echo 'Female'; ?></td></tr>
                            <tr><td>Age : </td><td><?php echo $row['AGE']; ?></td></p>
                            <tr><td>Conatact Number : </td><td><?php echo $row['phone']; ?></td></tr>
                            </table>
                    </div>

                    <div class="row">
                        <div class="list-group" >
                            <a href="editpatients.php?id=<?php echo $id; ?>&ft=doctors" class="list-group-item" style="color:green">Doctors Assigned</a>
                            <a href="editpatients.php?id=<?php echo $id; ?>&ft=labtest" class="list-group-item" style="color:green">Labtest Allocted</a>
                            <a href="editpatients.php?id=<?php echo $id; ?>&ft=disease" class="list-group-item" style="color:green">Diseases Admitted For</a>
                            <a href="editpatients.php?id=<?php echo $id; ?>&ft=Medicine" class="list-group-item" style="color:green">Medicines</a><hr>
                            <a href="allpatients.php?id=<?php echo $id; ?>" class="btn btn-danger" >Delete Record of the Patient</a><hr>
                       </div>
                    </div>
                </div>
                <div class="col-lg-8">
                        <h3>More information</h3>
        <?php

        if(isset($_GET['setidd']) or isset($_GET['setiddd'])){
            if(isset($_GET['setidd']))
                $query = "update patients set DOCID =".$_GET['setidd']." where pid = ".$id;
            if(isset($_GET['setiddd']))
                $query = "update patients set DISEASEID =".$_GET['setiddd']." where pid = ".$id;
            mysqli_query($dbc, $query);
            echo '<div class="page-header"><h3 style="color:green">Record Modified</h3></div>';
            }

        //--------------------------------------------Doctors---------------------------------------------------------------------------------------------------- 

        if($ft == 'doctors'){
                echo '<table class="table table-bordered">';
                $q = 'select DOCID from patients where PID = '.$id;
                $r = mysqli_query($dbc , $q) or die('error in doctor');
                $r1 = mysqli_fetch_array($r);
                if ($r1['DOCID']==25){
                        $query = "select * from doctors inner join disease on(doctors.DISID = disease.DISID)";
                        $d1 = mysqli_query($dbc , $query) or die('inssan');
                        echo '<caption style="color:red">No Doctor assigned to the particular Patient !. Assign Now. </caption>';
                        echo '<tr><th>Doctor Name</th><th>Age</th><th>Gender</th><th>Speciality</th>';
                        while ($r1 = mysqli_fetch_array($d1)){
                            if($r1['DOCNAME']!='X'){
                                echo '<tr><td><a href="editpatients.php?id='.$id.'&ft=doctors&setidd='.$r1['DOCID'].'">'.$r1['DOCNAME'].'</a></td>';
                                echo '<td>'.$r1['AGE'].'</td>';
                                echo '<td>'.$r1['SEX'].'</td>';
                                echo '<td>'.$r1['DISNAME'].'</td></tr>';
                            }
                        }
                    } 
                    else {
                        $q = 'select * from doctors  inner join disease using (DISID) where DOCID = '.$r1['DOCID'];
                        $re = mysqli_query($dbc , $q) or die('Error in join') ;
                        $r = mysqli_fetch_array($re);

                        ?>
                        <th> Doctor Assigned </th>
                        <tr><td>Name  </td>  <td><?php echo $r['DOCNAME'];?></td></tr>
                        <tr><td>Age  </td>   <td><?php echo $r['AGE'];?></td></tr>
                        <tr><td>Sex  </td>    <td><?php echo $r['SEX'];?></td></tr>
                        <tr><td>Speciality : </td>   <td><?php echo $r['DISNAME'];?></td></tr>
                        <tr><td>Severity  </td>   <td><?php echo $r['DIS_SEV'];?></td></tr>
                    <tr><td><a href="editpatients.php?id=<?php echo $id; ?>&ft=doctor&setidd=25" class="btn btn-danger">Change Doctor</a></td></tr>
                        <?php
                        }
            echo '</table>';
        }
        //--------------------------------------------------------------------------------------------------------------------------------------------------------//-------------------------------------------------Labtest------------------------------------------------------------------------------------------------

        if( $ft == 'labtest'){ 
            if(isset($_GET['setidtt'])){
                     $q = 'select assigntest.LABTESTID , SCHEDULETIME,SCHEDULEDATE,RESULT,patients.PID ,PNAME  from assigntest inner join patients on (patients.PID = assigntest.PID) where  patients.PID='.$id;
                     $q = mysqli_query($dbc , $q) or die('sf');
                     echo '<div class="list-group">';
                     if(mysqli_num_rows($q)==0){
                            echo '<li class="list-group-item">No labs alloted yet';    
                            }
                     while($qqq = mysqli_fetch_array($q)){
                            echo '<a href = "editpatients.php?id='.$qqq['PID'].'" class="list-group-item">Assigned to : '.$qqq['PNAME'].'</a>'; 
                            echo '<li class="list-group-item" >Schedule Time : '.$qqq['SCHEDULETIME'].'</li>';
                            echo '<li class="list-group-item" >Schedule date : '.$qqq['SCHEDULEDATE'].'</li>';
                            if($qqq['RESULT']=='XX'){
                                    $tempq = 'select TESTNAME from labtest where TESTID = '.$qqq['LABTESTID'];
                                    $tempq = mysqli_query($dbc , $tempq) or die('sadas');
                                    $tempq = mysqli_fetch_array($tempq);
                                    echo '<li class="list-group-item" style="color:green">'.$tempq['TESTNAME'].'</li>';
                                    ?>
                                    <li class="list-group-item" style="color:red">Result not available</li>
                                    <form  method="post" class="form-inline">';
                                    <input type="hidden" value="<?php echo $qqq['PID']; ?>" name="inh1">
                                    <input type="hidden" value="<?php echo $qqq['LABTESTID']; ?>" name="inh2">
                                    <input type="text" name="inr" placeholder="Enter result of the test" class="form-control" size=120>&nbsp;&nbsp;
                                    <button type="submit" name="sforresult" class="btn btn-success">Save result of the test</button><hr>
                                    </form>
                                  <?php
                            }
                            else
                                    echo '<li class="list-group-item" >Result of the Test : '.$qqq['RESULT'].'</li><hr>';
                            }
                    ?>
                    <hr><a href="editpatients.php?id=<?php echo $id; ?>&ft=labtest" class="btn btn-default btn-block">Allocate More test</a>
                    </div>
                    <?php
            }
            else {
                    echo '<a href="editpatients.php?id='.$id.'&ft=labtest&setidtt=true" class="btn btn-lg btn-default btn-block">Show all tests </a><hr>';
                    echo '<table class="table table-bordered">';
                    echo '<tr><th>Name </th><th>Cost  (in Rupees)</th><th>Time required</th></tr>';
                    $query  = "select * from labtest inner join lab on (labtest.LABNO = lab.LABNO )";
                    $d2 = mysqli_query($dbc , $query);
                    while ($r1 = mysqli_fetch_array($d2)){
                        if($r1['TESTNAME']!='X'){
                                echo '<tr>';
                                echo '<td><a href="editpatients.php?id='.$id.'&ft=labtest&setidt='.$r1['TESTID'].'">'.$r1['TESTNAME'].'</a></td>';
                                echo '<td>'.$r1['COST'].'</td>';
                                echo '<td>'.$r1['TIMEREG'].'</td>';
                                echo '</tr>';
                                //$link = '<a href="editpatients.php?id='.$id.'&ft=labtest&setidt='.$r1['TESTID'].'">'.$r1['TESTNAME'].'</a><br>';
                        }
                        if( isset($_GET['setidt']))
                            if($_GET['setidt']==$r1['TESTID']){
                                echo '<tr><td colspan=2>';
                                $query = "update patients set LABTESTID =".$_GET['setidt']." where pid = ".$id;
                                mysqli_query($dbc, $query);
                                //echo '<div class="page-header"><h3 style="color:green">patient Record Modified</h3></div>';
                        ?>
                                <form  method="post" name="myforms" class="form-inline"> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="scd" id="scd" placeholder="Scheduled Date" class="form-control">&nbsp;&nbsp;
                                <input type="text" name="sct" id="sct" placeholder="Scheduled Time" class="form-control">&nbsp;&nbsp;
                                <input type="hidden" name="ln" id="ln" value="<?php echo $r1['TESTID']; ?>">
                                <input type="submit" name="submita"  value= "Assign-test" class="btn btn-success">
                                </form>
                                </td></tr>

                        <?php
                        }
                        if(isset($varforackno))
                            if($varforackno ==1 and $_GET['setidt']==($r1['TESTID']-2000))
                            {
                            ?>
                            <tr><td colspan=2>
                            <div class="list-group">
                                <li class="list-group-item">Lab test : <?php echo $r1['TESTNAME']; ?></li>
                                <li class="list-group-item">Scheduled in <?php echo $r1['LABNAME']; ?></li>
                                <li class="list-group-item">Date is <?php echo $x; ?></li>
                                <li class="list-group-item">Time is <?php echo $y; ?></li>
                            </div>
                            </td></tr>
                            <?php
                            }
                     }

            echo '</table>';
            }
        }
        //-------------------------------------------------------------------------------------------------------------------------------------------------------//-------------------------------------------------Disease----------------------------------------------------------------------------------------------                                     
        if($ft=='disease'){
            $q = 'select DISEASEID from patients where PID = '.$id;
            $rrr = mysqli_query($dbc , $q) or die('aaaaaaaaaaaa');
            $rrr = mysqli_fetch_array($rrr);
            echo '<table class="table table-bordered">';
            if($rrr['DISEASEID']==26){
                $q = 'select * from disease';
                $r = mysqli_query($dbc, $q);
                echo '<caption style="color:red">The Patient has which disease ? </caption>';
                echo '<tr><th>Disease Name ( or General )</th><th>Severity</th>';
                while($r1 = mysqli_fetch_array($r)){
                    if($r1['DISID']!=26){
                            echo '<tr><td>';
                            echo '<a href= "editpatients.php?id='.$id.'&ft=disease&setiddd='.$r1['DISID'].'">'.$r1['DISNAME'].'</a></td>';
                            echo '<td>'.$r1['DIS_SEV'].'</td></tr>';
                       }
                    }
                echo '</table>';
            }
             else {
                        $q = 'select * from disease where DISID = '.$rrr['DISEASEID'];
                        $re = mysqli_query($dbc , $q) or die('Error in join') ;
                        $r = mysqli_fetch_array($re);
                        ?>
                        <tr><th> The patient is admitted for the following Disease</th></tr>
                        <tr><td>Disease  </td>  <td><?php echo $r['DISNAME'];?></td></tr>
                        <tr><td>Severity </td>   <td><?php echo $r['DIS_SEV'];?></td></tr>
                        <tr><td><a href="editpatients.php?id=<?php echo $id; ?>&ft=disease&setiddd=26" class="btn btn-danger">Change Disease info</a></td></tr>
                        </table>
            <?php

                 $te = 'select * from doctors where DISID='.$r['DISID'];
                 $te = mysqli_query($dbc , $te) or die('in something');
                 echo '<table class="table table-bordered">';
                 echo '<caption>The following Dcoctors are available :</caption>';
                 while($t = mysqli_fetch_array($te)){
                     ?>
                        <tr><th>Name  </th>  <th><?php echo $t['DOCNAME'];?></th></tr>
                        <tr><td>Age  </td>   <td><?php echo $t['AGE'];?></td></tr>
                        <tr><td>Sex  </td>    <td><?php echo $t['SEX'];?></td></tr>

                      <?php
                    }
                 echo '</table>';
                }
            }
        //-------------------------------------------------------------------------------------------------------------------------------------------------------
        echo '</div></div>';}
}
else{
    echo '<div class="error">Employee must first log in first !</div>';
    chnagelogintextcolor();
}
require 'footer.php';
?>