<?php if(!isset($_SESSION['name'])){
# for loggin in ######
if(isset($_POST['sub'])){

$e='';
$user = mysqli_real_escape_string($dbc , trim($_POST['name']));
$password = mysqli_real_escape_string($dbc , trim($_POST['password']));
    
$query = "select * from users where  name='$user' and password ='".sha1($password)."'";
$data = mysqli_query($dbc , $query);
if(mysqli_num_rows($data)==1){
    echo '<div class="page-header"><h1>Succesfully Logged in<h1></div>';
    
    $acc = mysqli_fetch_array($data);
    
    setcookie('name',$acc['name'],time()+(60*60*8));
    setcookie('id',$acc['id'],time()+(60*60*8));
    
        $_SESSION['name'] = $acc['name'];
        $_SESSION['id'] = $acc['id'];
    
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header("Location:$home_url");
    }
    else{
    echo '<div class="page-header" style="float:right;color:red;padding-top:10px"><h4>Your User Name or Password is incorrect</h4></div>';
        chnagelogintextcolor();
    }
}
}
?>