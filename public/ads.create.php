<?php

require_once "../views/partials/header.php";
require_once "../views/partials/footer.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Create An Ad</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<style type="text/css">
	.user-inputs {
	  font-size: 120%;
	  color: #5a5854;
	  background-color: #f2f2f2;
	  border: 1px solid #bdbdbd;
	  border-radius: 5px;
	  padding: 5px 5px 5px 30px;
	  background-repeat: no-repeat;
	  background-position: 8px 9px;
	  display: block;
	  margin-bottom: 10px;
	}
	h1 {
		float:right;
		margin-top: 80px;
		margin-right: 140px;
	}
	h2 {
		float:right;
		margin-top: 30px;
		margin-right: 140px;
	}
	.jumbotron {
		margin-top: 70px;
	}
	#submitbtn {
		margin-left: 70px;
		margin-top: 20px;
	}
	.image-form {
		margin-top: 20px;
	}



	</style>
</head>
<body>
	<div class='jumbotron'>
	<h1>Become A Teacher</h1>
	<h2>Knowledge is Power</h2>
		<input class='user-inputs' type='text' name='email' placeholder='Enter Email Address' required="required" ><br>
		<input class='user-inputs' type='text' name='subject' placeholder='Enter Subject' required="required" autofocus ><br>
		<textarea  class='user-inputs' id='postParagraph' placeholder='Enter A Description of Your Course'></textarea>
		<form action="http://www.example.com/upload.php" method="post" class='image-form'>
			<p>Upload Your Course Image</p>
			<input type="file" name="user-song"/><br/> 
			<input type="submit" value="Upload" />
		</form>
		<input type="submit" class="btn" id='submitbtn'>
	</div>

</body>
</html>