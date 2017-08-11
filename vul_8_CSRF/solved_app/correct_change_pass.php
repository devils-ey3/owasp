<?php

require_once('../../header.html');
require_once('../../PDOdbCon.php');
session_start();
if (!$_SESSION['id']){ // broken authentication protection
    header( "refresh:1;url=correct_app.php" );
    die();
}
if ($_SERVER['REQUEST_METHOD']=='POST'){

global $conn;

 
if(!isset($_POST['token'])){
    throw new Exception('No token found!');
}
 
//It exists, so compare the token we received against the 
//token that we have stored as a session variable.

if(strcasecmp($_POST['token'], $_SESSION['token']) != 0){
    throw new Exception('Token mismatch!');

}


$upass=hash("sha1", $_POST['password'], false);
$stmt = $conn->prepare("UPDATE `users` SET `password`=:password WHERE id=".$_SESSION['id']."");
$stmt->execute(array(':password'=>$upass));
echo '<div class="alert alert-success col-md-4 col-md-offset-4" align="center"><strong>Succesed</strong>&nbspSession destroyed</div>';
}
?>


<link rel="stylesheet" type="text/css" href="../../vul_6_sensitiveDataDiscloser/extra.css" media="screen" />
    <div class="wrapper">
        <form name='change_pass' class="form-signin" method="post" id="form-id">
            <h4 class="form-signin-heading">Type your new password</h4>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" onclick="document.getElementById('form-id').submit();" >Change</button>
        </form>
    </div>