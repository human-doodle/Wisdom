<?php
//index.php

?>
<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:../login.php");
} else {
?>

<html>  
    <head>  
        <title>poll</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="pollstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Kalam|Merienda" rel="stylesheet">

		
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<h2 align="center">LIVE POLL ! </h2>
			<h1 align="center"> VOTE FOR YOUR FAVORITE GENRE AND LET US KNOW WHICH OF THESE YOU LOVE !</h1> 
			 <br />
			<div class="row">
				<div class="col-md-6">
					<form method="post" id="poll_form">
						<h3>GO AND VOTE FOR YOUR FAVORITE ONE</h3>
						<br />
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="fiction" /> FICTION</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="biography" /> BIOGRAPHY</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="science" /> SCIENCE</h4></label>
						</div>
						
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="spirituality" /> SPIRITUALITY</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="education" /> EDUCATION</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="fantasy" /> FANTASY</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="poetry" /> POETRY</h4></label>
						</div>
						
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="horror" /> HORROR</h4></label>
						</div>
						<div class="radio">
							<label><h4><input type="radio" name="poll_option" class="poll_option" value="children" /> CHILDREN</h4></label>
						</div>
						<br />
						<input type="submit" name="poll_button" id="poll_button" class="btn btn-primary" />
					</form>
					<br />
				</div>
				<div class="col-md-6">
					<br />
					<br />
					<br />
					<h4>Live Poll Result</h4><br />
					<div id="poll_result"></div>
				</div>
			</div>
			
			
			<br />
			<br />
			<br />
		</div>
    </body>  
</html>  
<?php
}
?>
<script>  
$(document).ready(function(){
	
	fetch_poll_data();

	function fetch_poll_data()
	{
		$.ajax({
			url:"fetch_poll_data.php",
			method:"POST",
			success:function(data)
			{
				$('#poll_result').html(data);
			}
		});
	}
	
	$('#poll_form').on('submit', function(event){
		event.preventDefault();
		var poll_option = '';
		$('.poll_option').each(function(){
			if($(this).prop("checked"))
			{
				poll_option = $(this).val();
			}
		});
		if(poll_option != '')
		{
			$('#poll_button').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"poll.php",
				method:"POST",
				data:form_data,
				success:function()
				{
					$('#poll_form')[0].reset();
					$('#poll_button').attr('disabled', false);
					fetch_poll_data();
					// alert("Poll Submitted Successfully");
					// window.location.href = "../catalog.php";
				}
			});
		}
		else
		{
			alert("Please Select Option");
		}
	});
	
	
	
});  
</script>