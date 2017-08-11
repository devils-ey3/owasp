<?php 
$result = "";
class calculator
{
    var $a;
    var $b;

    function getresult($a)
    {
        $this->a = $a;
//        $ma ="print (".$a.");";
        echo $a."<br>";
        $val = shell_exec("ping -c 4 ".$a);
        return '<span>'.$val.'</span>';
    }
}

$cal = new calculator();
if(isset($_POST['submit']))
{   
    $result = $cal->getresult($_POST['n1']);
}
?>

<form method="post">
<table align="center">
    <tr>
        <td><strong><?php echo $result; ?><strong></td>
    </tr>
    <tr>
        <td>Enter ip address for check system is aslive</td>
        <td><input type="text" name="n1"></td>
    </tr>


    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="                =                "></td>
    </tr>

</table>
</form>

