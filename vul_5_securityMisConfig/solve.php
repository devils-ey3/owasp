<?php
require_once('../header.html');

if (isset($_POST['push']))
{
shell_exec("python3 solve.py");
echo '<div class="alert alert-success col-md-4 col-md-offset-4" align="center"><strong>Succesed</strong></div>';

}

?>

<form method="post">
<button name="push">Solve</button>&nbsp;
</form> 


</html>