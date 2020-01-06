<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<title>Login</title>
</head>
<body>

<?php include 'nav.php';?> 

<div class="loginpage">


<center><h3 style="color: #FEECC4; font-size: 30px; padding: 20px;">LOGIN FORM</h3></center>

<form action="" method="POST">
<div class="container">
	<label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user">

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass">
    <button type="submit" value="Login" name="submit" >LOGIN</button>
    <center><span style="font-size: 15px;">Not yet registered? <a href="register.php" style="text-decoration: none; color: #28314f"> REGISTER NOW. </a></span></center>
 </div>

</form>

</div>


<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('wisdom') or die("cannot select DB");

	$user=stripcslashes($user);
	$pass=stripcslashes($pass);

	$user=mysql_real_escape_string($user);
	$pass=mysql_real_escape_string($pass);


	$query=mysql_query("SELECT * FROM admin WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$user;

	/* Redirect browser */
	header("Location: catalog.php");
	}
	} else {
	echo "<p style='color: #f1f1f1; margin-left: 45%;'>Invalid username or password!</p>";
	}

} else {
	echo "<p style='color: #f1f1f1; margin-left: 45%;'>All fields are required!</p>";
}
}
?>


</body>
</html>