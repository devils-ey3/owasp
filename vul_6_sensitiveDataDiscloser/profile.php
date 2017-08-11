<?php
require_once('../header.html');
require_once('../PDOdbCon.php');
session_start();

if (!$_SESSION['auth']){
    header( "refresh:1;url=vul_apps.php" );
    die();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id=? limit 0,1");
    $param = "{$_GET['profileID']}";
    $stmt->execute(array($param));
    $myrow = $stmt->fetchAll();
    foreach($myrow as $data=>$row){
    echo '<div class="panel panel-primary col-md-6 col-md-offset-4>">';
      echo '<div class="panel-heading"><span class="label label-success">Email</span>&nbsp&nbsp'.$row['email'].'</div>';
      echo '<div class="panel-body"><span class="label label-warning">Password</span>&nbsp&nbsp'.$row['password'].'</div>';
      echo '<div class="panel panel-danger panel-body"><span class="label label-primary">Signature</span>&nbsp&nbsp'.$row['secret'].'</div>';
    echo '</div>';
    }

?>


