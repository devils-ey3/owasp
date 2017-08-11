<?php include('../header.html'); ?>

 <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="GET">


        <select name="url">
            <option value="#">Select website</option>
            <option value="1">Facebook</option>
            <option value="2">LinkedIn</option>
            <option value="3">Twitter</option>
        </select>

<button type="submit" name="form" value="submit">Go</button>

</form>
<?php 
if ($_GET['form']==='submit'){  
switch($_GET["url"])
    {
        case "1" :

            header("Location: http://facebook.com");
            break;

        case "2" :

            header("Location: http://www.linkedin.com/");
            break;

        case "3" :

            header("Location: http://twitter.com/");
            break;
        default :
            header("Location: http://localhost/SecurityLab/vul_10_unvalidedRedirection/");
          break;

    }
}
 ?>

<?php include('../footer.html') ?>