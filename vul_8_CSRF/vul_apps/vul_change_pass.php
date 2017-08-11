<?php
require_once('../../header.html');
require_once('../../PDOdbCon.php');
session_start();
if (!$_SESSION['id']){
    header( "refresh:1;url=vul_apps.php" );
    die();
}
if ($_SERVER['REQUEST_METHOD']=='POST'){

global $conn;

$upass=hash("sha1", $_POST['password'], false);
$stmt = $conn->prepare("UPDATE `users` SET `password`=:password WHERE id=".$_SESSION['id']."");
$stmt->execute(array(':password'=>$upass));
}
?>


<link rel="stylesheet" type="text/css" href="../../vul_6_sensitiveDataDiscloser/extra.css" media="screen" />
    <div class="wrapper">
        <form name='change_pass' class="form-signin" method="post" id="form-id">
            <h4 class="form-signin-heading">Type your new password</h4>
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" onclick="document.getElementById('form-id').submit();" >Change</button>
        </form>
    </div>