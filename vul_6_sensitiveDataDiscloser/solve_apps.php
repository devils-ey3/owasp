<?php
 
include('../header.html');
require_once('../PDOdbCon.php');

?>
    <link rel="stylesheet" type="text/css" href="extra.css" media="screen" />
    <div class="wrapper">
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
function login($uname,$upass)
    {
       try
       {
           
        global $conn;
        $upass=hash("sha1", $upass, false);
        $stmt = $conn->prepare("SELECT * FROM users WHERE login=:uname and password=:password LIMIT 1");
        $stmt->execute(array(':uname'=>$uname, ':password'=>$upass));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              echo password_verify($upass, $userRow['password']);
             if($upass==$userRow['password']) 
             {
                 session_start();
                $_SESSION['id'] = $userRow['id'];
                $_SESSION['auth'] = true;
                 $_SESSION['PHPSESSID']=$_COOKIE['PHPSESSID'];
                 return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    if(login($_POST['username'],$_POST['password'])){
        echo '<div class="alert alert-success col-md-4 col-md-offset-4" align="center"><strong>Logged</strong></div>';
        header( "refresh:2;url=solve_profile.php?profileID=".$_SESSION['id'] );
    }
    else {
        echo '<div class="alert alert-danger col-md-4 col-md-offset-4" align="center"><strong>Username or Password not matched</strong></div>';
}
}
?>
