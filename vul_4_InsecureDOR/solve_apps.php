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
        
        	// Get input
	$a = stripslashes( $a );

	// Split the IP into 4 octects
	$octet = explode( ".", $a );

	// Check IF each octet is an integer
	if( ( is_numeric( $octet[0] ) ) && ( is_numeric( $octet[1] ) ) && ( is_numeric( $octet[2] ) ) && ( is_numeric( $octet[3] ) ) && ( sizeof( $octet ) == 4 ) ) {
		// If all 4 octets are int's put the IP back together.
		$a = $octet[0] . '.' . $octet[1] . '.' . $octet[2] . '.' . $octet[3];
        
        $val = shell_exec("ping -c 1 ".$a);
        return '<span>'.$val.'</span>';
		
	}
	else {
		return '<span>Not a valid ip</span>';
	}

        

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