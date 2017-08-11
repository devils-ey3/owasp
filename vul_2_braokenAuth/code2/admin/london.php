<?php
session_start();

if(!($_GET['user']==$_SESSION['user'] && $_GET['pid']==$_SESSION[$_SESSION['user']])){
    echo "Unauthorize user";
    header('Location: ../index.php', true, 302);
    //die();

}
echo "london <br>";
for($i=0;$i<=5;$i++)
{
for($j=1;$j<=$i;$j++)
{
echo "* ";
}
echo "<br>";
}  
?>
