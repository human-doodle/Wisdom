<!DOCTYPE html>
<html lang="en">

<head>

<title>book</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="bbookstyle.css">
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
$a=$_POST["book"];

$sql = "SELECT isbn, image, name, publication, rating, author FROM book where isbn='$a'";
$sqll= "SELECT a.author, b.author, a.adescription FROM book b, author a where a.author=b.author";
$result = $conn->query($sql);
$resultt= $conn->query($sqll);
$row = mysqli_fetch_assoc($result);
$roww = mysqli_fetch_assoc($resultt);

?>

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
  <li style="display: block; color: #be9063; text-align: center;padding: 14px 16px; margin-left: 10px;"> HI ! <?=$_SESSION['sess_user'];?>! </li>
  <li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>

<?php
}
?>

<div class="row">

  <div class="column side">

    <?php
    $image= $row['image'];
    echo "<img src='$image' width=100% height=500px />";
    ?>

  </div>

  <div class="column middle">

    <h2>BOOK NAME: <?php echo $row["name"]; ?></h2>
      <h3>AUTHOR NAME: <?php echo $row["author"]; ?> </h3>
      <h3>PUBLICATION: <?php echo $row["publication"]; ?></h3>
      <h3>IBSN NUMBER: <?php echo $row["isbn"]; ?></h3>
      <h3>RATING: <?php echo $row["rating"]; ?> </h3>
    </BR>
    <div>
   <h3>ABOUT THE AUTHOR<h3>
    <p class="des"> <?php echo $roww["adescription"]; ?> </p>
      </div>

  </div>

  
  <div class="column middle">

  	<form action="read.php" method="post" id="3">
    <?php
  echo '<button type ="submit" value= "'.$row['isbn'].'" name="book" form="3" class="button2" />';
   ?>
	READ</button>
    </form>

  	
   </div>

</div>

<!-- <script type="text/javascript">
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script> -->
</body>
</html>