<?php
 
include('../header.html');
//require_once('../dbCon.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bWAPP";
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

?> 

<h1>Please search a movie name</h1><br>
<form class="navbar-form navbar-left" method="GET">
  <div class="form-group">
    <input type="text" name="movie" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<br>
<?php

if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['movie'])){
    ?>
    <table class="table">
    <thead>
      <tr class="active">
        <th>id</th>
        <th>title</th>
        <th>release_year</th>
        <th>genre</th>
        <th>main_character</th>
        <th>imdb</th>
        <th>tickets_stock</th>
    <?php

$stmt = $conn->prepare("SELECT id, title, release_year, genre, main_character, imdb, tickets_stock FROM movies WHERE title like ? ");
    $stmt->bindParam(':movie', $movie_name);
    $param = "%{$_GET['movie']}%";
    $stmt->execute(array($param));
    $myrow = $stmt->fetchAll();
    echo "<h2>You are searching for the movie contains with <span style='color:blue'>".$_GET['movie']."</span> letter</h2><br>";
    echo "Those result is shown to bellow";
    foreach($myrow as $data=>$row){
        echo '<tr class="success">';
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["title"].'</td>';
        echo '<td>'.$row["release_year"].'</td>';
        echo '<td>'.$row["genre"].'</td>';
        echo '<td>'.$row["main_character"].'</td>';
        echo '<td>'.$row["imdb"].'</td>';
        echo '<td>'.$row["tickets_stock"].'</td>';
        echo '</tr>';
    }
    
    

} else {
    echo "0 results";
}
//$conn= null;

    ?>
      </tr>
    </thead>
    <tbody>
    

      
    </tbody>
  </table>
    
    <?php


require_once('../footer.html');
?>
    
