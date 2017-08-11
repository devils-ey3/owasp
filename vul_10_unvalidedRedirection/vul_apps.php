<?php include('../header.html'); ?>


<form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="GET">
<select name="url" >
			<option value="#">Select website</option>
            <option value="http://facebook.com">Facebook</option>
            <option value="http://www.linkedin.com/">LinkedIn</option>
            <option value="http://twitter.com/">Twitter</option>
</select> <br><br>
        <button type="submit" name="form" value="submit">Go</button>
</form>

<?php 
if ($_GET['form']==='submit'){
	header('Location: '.$_GET['url']);
	die();
} 
?>

<?php include('../footer.html') ?>