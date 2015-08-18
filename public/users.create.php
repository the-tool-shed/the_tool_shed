<?php

require_once "../bootstrap.php";
var_dump(Input::get("username"));
if($_POST && (Input::get("password") == Input::get("confirm-password"))) {

$user = new User();
$user->username = Input::get("username");
$user->email = Input::get("email");
$user->password = password_hash(Input::get("password"),PASSWORD_DEFAULT);
$user->city_id = 4;
$user->join_date = date('Y-m-d');
$user->save();
Auth::attempt(Input::get("username"), Input::get("password"));
} else {
}
if(Auth::check()){
header('location:users.show.php');
}

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
		margin-right: 140px;
	}
	.jumbotron {
		margin-top: 70px;
		box-shadow: 5px 5px 5px 5px #777777;
	}
	#submitbtn {
		margin-left: 70px;
		margin-top: 20px;
	}
	</style>
</head>
<body>
	<?php require_once "../views/partials/header.php";?>
	<div class='jumbotron'>
	<h1>Sign Up <small> It's Free!</small></h1>
		<form method='POST'>
			<input class='user-inputs' type='text' name='username' placeholder='Enter Username' required="required" autofocus ><br>
			<input class='user-inputs' type='email' name='email' placeholder='Enter Email Address' required="required" ><br>
			<input class='user-inputs' type='password' name='password' placeholder='Enter Password' required="required" ><br>
			<input class='user-inputs' type='password' name='confirm-password' placeholder='Confirm Password' required="required">
			<input type="submit" class="btn" id='submitbtn'>
		</form>
	</div>
	<?php require_once "../views/partials/footer.php"; ?>
</body>
</html>