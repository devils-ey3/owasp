<?php
$username = "admin";
$password = "admin";

if ($_SERVER['REQUEST_METHOD']){
  if ($_POST['user']!='admin' || $_POST['pass']!='admin'){
        header('Location: ../index.php');
  }
    include_once("content.php");
    echo "<h1>Hello world</h1>";
}
?>
