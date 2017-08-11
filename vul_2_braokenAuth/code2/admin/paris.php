<?php
session_start();

if(!($_GET['user']==$_SESSION['user'] && $_GET['pid']==$_SESSION[$_SESSION['user']])){
    echo "Unauthorize user";
    header('Location: ../index.php', true, 302);
    //die();

}
echo "paris <br>";
for($a=5; $a>=1; $a--)
{
if($a%2 != 0)
{
for($b=5; $b>=$a; $b--)
{
echo "* ";
}
echo "<br>";
}
}
for($a=2; $a<=5; $a++)
{
 if($a%2 != 0)
{
 for($b=5; $b>=$a; $b--)
{
echo "* ";
}
echo "<br>";
}
}

?>
