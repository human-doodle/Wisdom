<!doctype html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

<?php include 'nav.php';?>

<div class="loginpage">

<center><h3 style="color: #FEECC4; font-size: 30px; padding: 20px;">REGISTERATION FORM</h3></center>

<form name="myform" action="" method="POST">
<div class="container">
	<label for="name"><b>NAME</b></label>
    <input type="text" placeholder="Enter Name" name="name">

    <label for="email"><b>EMAIL</b></label>
    <input type="text" placeholder="Enter email" name="email" >

	<label for="user"><b>Username</b></label>
    <input type="text" id="user" placeholder="Enter Username" name="user">

    <label for="pass"><b>Password</b></label>
    <input type="password" id="pass" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" required>

    
    <button type="submit" value="Register" name="submit" onclick="validateEmail();">REGISTER</button>
    <center><span style="font-size: 15px;">Already registered? <a href="login.php" style="text-decoration: none; color: #28314f"> LOGIN </a></span></center>
 </div>

</form>

</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>


<script>

	function validateEmail()  
	{  
	var x=document.myform.email.value;  
	var atposition=x.indexOf("@");  
	var dotposition=x.lastIndexOf(".");  
	if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  	alert("Please enter a valid e-mail address \n");  
  	return false;  
  	}  
	}  

var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
 

</script>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$email=$_POST['email'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('database') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM admin WHERE username='".$user."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO admin(name,email,username,password) VALUES('$name','$email','$user','$pass')";

	$result=mysql_query($sql);


	if($result){
	echo "<p style='color: #f1f1f1; margin: auto;'>Account Successfully Created. Please LOGIN and enjoy reading plethora of books!<p>";
	} else {
	echo "<p style='color: #f1f1f1; margin: auto;'>Failure!";
	}

	} else {
	echo "<p style='color: #f1f1f1; margin: auto;'>That username already exists! Please try again with another.<p>";
	}

} else {
	echo "<p style='color: #f1f1f1;'>All fields are required!<p>";
}
}
?>

</body>
</html>