<?php

require_once "../bootstrap.php";
require_once "../views/partials/header.php";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome User</title>
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
	<h1>Welcome <?=$_SESSION['LOGGED_IN_USER']?>!</h1>
	<a href="users.edit.php"><h2>Manage Your Profile Here</h2></a>	
	</div>



</body>
</html>