<?php
require_once "../bootstrap.php";
require_once "../views/partials/header.php";
require_once "../views/partials/footer.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Create New User</title>
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
		margin-right: 100px;
	}
	.jumbotron {
		margin-top: 70px;
	}
	#submitbtn {
		margin-left: 70px;
		margin-top: 20px;
	}

	</style>
</head>
<body>
	<div class='jumbotron'>
	<h1>Edit Your Information<small></small></h1>
		<form action='users.show.php' method='POST'>
			<input class='user-inputs' type='text' name='username' placeholder='EDIT Username' required="required" autofocus ><br>
			<input class='user-inputs' type='email' name='email' placeholder='EDIT Email Address' required="required" ><br>
			<input class='user-inputs' type='password' name='password' placeholder='EDIT Password' required="required" ><br>
			<input class='user-inputs' type='password' name='confirm-password' placeholder='Confirm Password' required="required" >
			<input type="submit" class="btn" id='submitbtn'>
		</form>
	</div>
</body>
</html>