
<?php //require 'connect.php';
require 'header.php';
if(isset($_SESSION['name'])){
        ?>
        <div class="container">
        <div class="col-lg-5 col-lg-offset-3">
        <?php

        if (isset($_POST['submit'])) {
            // Grab the profile data from the POST
            $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
            $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
            $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
            $age = mysqli_real_escape_string($dbc, trim($_POST['age']));
            $phone = mysqli_real_escape_string($dbc, trim($_POST['phone']));
            if(strlen($phone)<10 or strlen($phone)>10){
                echo '<div class="page-header"><h3 style="color:red">Phone Number not valid !</h3></div>';
            }else{
            $name = $first_name.' '.$last_name;
            $error=0;

            if(!empty($name) && !empty($gender) && !empty($age) && !empty($phone)){

                $query  = "insert into patients values (0 ,'$name' , $age , '$gender' , 25,0,26,1, '$phone')"; 
                echo $query;
                mysqli_query($dbc , $query) or die('bitch');
                echo "<h2 style='color:green'>Added succesfully</h2>";
                $q = 'select PID from patients order by PID desc limit 1';
                $r = mysqli_query($dbc , $q) or die('limit');
                $r = mysqli_fetch_array($r);
                $id = $r['PID'];
                echo '<a href= "editpatients.php?id='.$id.'" class="btn btn-success btn-block">Go to patient Profile</a>';
                echo '<hr>';
                }
            else{
                echo "<h2 style='color:red'>Empty fiels ! All fileds necessery </h2>";
                echo '<hr>';
            }
         }
        }

        ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="firstname" >First name:</label>
        <input type="text" id="firstname" class="form-control" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />

        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" class="form-control" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />

        <label for="gender" >Gender:</label>
        <select id="gender" name="gender" class="from-control">
                <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
                <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
        </select><br/>

        <label for="age">Age : </label>
        <input type="text" id="age" name="age" class="form-control" value="<?php if (!empty($age)) echo $age; ?>" ></br>

        <label for="phone">Phone number : </label>
        <input type="text" id="phone" name="phone" class="form-control" value="<?php if (!empty($phone)) echo $phone; ?>" ></br>
        <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
        </form>
        </div>
        </div>
        <?php
        }
else{
    echo '<div class="error">Employee must first log in first !</div>';
    chnagelogintextcolor();
}