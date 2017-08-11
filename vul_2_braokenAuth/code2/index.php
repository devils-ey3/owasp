<!DOCTYPE html>
<html>
	<head>
		<title>Documment</title>
	</head>
	<body>
		<div>
			<table>
				<form action="" method="post" >
					<tr>
							<td>Username</td>
							<td><input type="text" name="user" id="admin" /></td>
					</tr>
					<tr>
							<td>Password</td>
							<td><input type="password" name="pass" id="admin" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="submit" /></td>
					</tr>
				</form>
			</table>
		</div>
	</body>
</html>

<?php
session_start();
$username = "admin";
$password = "admin";

if ($_SERVER['REQUEST_METHOD']=="POST"){
  if ($_POST['user']!='admin' && $_POST['pass']!='admin'){
        header('Location: index.php', true, 302);
          die();
  }
else{
    $_SESSION['user']=$username;
    $_SESSION[$username]=session_id();
    header('Location: admin/content.php', true, 302);
}
    
    
}
?>
