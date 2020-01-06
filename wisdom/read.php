<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>book</title>
  <link rel="stylesheet" type="text/css" href="readstyle.css">
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
$sql = "SELECT file,name, isbn FROM book where isbn='$a'";

$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>
<ul class="topnav">
  <li><a  href="home.php">HOME</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li><a href="catalog.php">CATALOG</a></li>
  <li class="right"><button class="button1" onclick="light()"> LIGHT </button></li>
</ul>

  <H1 id="bname" style="font-size: 60px"><?php echo $row["name"]; ?></H1>

<div class="div1">
  <?php
          $file= $row['file'];
          echo "<embed src='$file' type='application/pdf' width=100% height=100% />";
			?>
</object>
</div>

<script type="text/javascript">
	var x=0;
function light() {
	if(x%2==0){
    document.body.style.background = '#a4978e';
	document.getElementById("bname").style.color = '#040c0e';
	}
	else{
		document.body.style.background = '#040c0e';
	document.getElementById("bname").style.color = '#a4978e';
	}
	x=x+1;
}
</script>
</body>
</html>

<?php
}