<!DOCTYPE html>
<html>
<head>
	<title>catalog</title>
	<link rel="stylesheet" type="text/css" href="catastyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Kalam|Merienda" rel="stylesheet">
</head>
<body>

<div class="header">
  <h1 style="font-size: 80px; font-family: 'Cinzel Decorative', cursive;">GENRE</h1>
</div>

<?php 
session_start();
if(!isset($_SESSION["sess_user"])){ ?>

 <ul class="topnav">
  <li><a  href="home.php">HOME</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li><a href="catalog.php">CATALOG</a></li>
  <li><a href="livepoll/index.php">POLL</a></li>
  <li class="right"><a href="login.php">GET STARTED</a></li>
</ul>

<?php
} else {
?>
 <ul class="topnav">
  <li><a  href="home.php">HOME</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li><a href="catalog.php">CATALOG</a></li>
  <li><a href="livepoll/index.php">POLL</a></li>
  <li style="display: block; color: #f1f1f1; text-align: center;padding: 14px 16px; margin-left: 10px;"> HI ! <?=$_SESSION['sess_user'];?>! </li>
  
  <li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>

<?php
}
?>

<form action="genre.php" method="post" id="1">
<div class="row">
  	<div class="column">
  		
  		
  			<button type="submit" value="fiction" name="genre" form="1" >
		    <div class="polaroid">
		  		<img src="pics/fiction.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >FICTION</div>
		  	</div>
	  	</button>
	  
	</div>

    	<div class="column">
  		
  			<button type="submit" value="biography" name="genre" form="1" >
		    <div class="polaroid">
		  		<img src="pics/biography.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >BIOGRAPHY</div>
		  	</div>
	  	</button>
	
	</div>

    	<div class="column">
  		
  			<button type="submit" value="science" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/science.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >SCIENCE</div>
		  	</div>
	  	</button>
	  
	</div>
</div>

<div class="row">
  	<div class="column">
  		
  			<button type="submit" value="spitituality" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/spirituality.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >SPIRITUALITY</div>
		  	</div>
	  	</button>
	 
	</div>

    	<div class="column">
  		
  			<button type="submit" value="education" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/education.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >EDUCATION</div>
		  	</div>
	  	</button>
	  
	</div>

    	<div class="column">
  		
  			<button type="submit" value="fantasy" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/fantasy.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >FANTASY</div>
		  	</div>
	  	</button>
	  
	</div>
</div>

<div class="row">
  	<div class="column">
  		
  			<button type="submit" value="poetry" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/poetry.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >POETRY</div>
		  	</div>
	  	</button>
	  
	</div>

    	<div class="column">
  		
  			<button type="submit" value="horror" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/horror.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >HORROR</div>
		  	</div>
	  	</button>
	  
	</div>

    	<div class="column">
  		
  			<button type="submit" value="children" name="genre" form="1">
		    <div class="polaroid">
		  		<img src="pics/children.jpg" . style="width:100%;height:350px;">
		  		<div class="container" >CHILDREN</div>
		  	</div>
	  	</button>
	  

	</div>
</div>
</form>
</body>
</html>