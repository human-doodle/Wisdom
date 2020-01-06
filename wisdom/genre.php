<!DOCTYPE html>
<html>
<head>
  <title>genre</title>
  <link rel="stylesheet" type="text/css" href="genrestyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Kalam|Merienda" rel="stylesheet">
</head>
<body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisdom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$a=$_POST["genre"];
$sql = "SELECT isbn,image, name, author FROM book where genre='$a'";

$result = $conn->query($sql);
?>

<div class="header">
  <h1 style="font-size: 80px; font-family: 'Cinzel Decorative', cursive;"> <?php echo $_POST["genre"]; ?> </h1>
</div>

<?php 
session_start();
if(!isset($_SESSION["sess_user"])){ ?>

 <ul class="topnav">
  <li><a  href="home.php">HOME</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li><a href="catalog.php">CATALOG</a></li>
  <li class="right"><a href="login.php">GET STARTED</a></li>
</ul>

<?php
} else {
?>
 <ul class="topnav">
  <li><a  href="home.php">HOME</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li><a href="catalog.php">CATALOG</a></li>
  <li style="display: block; color: #f1f1f1; text-align: center;padding: 14px 16px; margin-left: 10px;"> HI ! <?=$_SESSION['sess_user'];?>! </li>
  <li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>

<?php
}
?>

<?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    	{ ?>
    	<form action="bbook.php" method="post" id="2">
        <div class="row">

    <div class="column">
     <?php
	echo '<button type="submit" value= "'.$row['isbn'].'" name="book" form="2" />';
	 ?>
        <div class="polaroid">
          <?php
          $image= $row['image'];
          echo "<img src='$image' alt='photo' width=100% height=300px />";
          ?>
          <div class="container" >
            <?php
          echo " ".$row["name"]."<br>" .$row["author"]."<br>";
          ?>
          </div>
        </div>
      </button>
  </div>

  
    <?php }
} else {
    echo "0 results";
}
 ?>
</div>
</form>
<?php $conn->close(); ?>
 
</body>
</html>