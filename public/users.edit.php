<?php
require_once "../bootstrap.php";
require_once "../views/partials/header.php";
require_once "../views/partials/footer.php";

$thisUser = User::findLogin($_SESSION['LOGGED_IN_USER']);
// var_dump($thisUser);

if(Input::has("username") && Input::has("email"))  {
	$thisUser->username = Input::get("username");
	$thisUser->email = Input::get("email");
	$thisUser->save();
	Auth::logoutForInfoChange();
	Auth::attempt($thisUser->username, $thisUser->password);

}

if(!$thisUser) {
	header('location:auth.login.php');
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
		margin-right: 100px;
	}
	h2 {
		float:right;
		margin-top: 30px;
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
	<div class='jumbotron'>
	<h1>Edit Your Information<small></small></h1>
	<h2>Logged in as: <?= $_SESSION['LOGGED_IN_USER'] ?></h2>
		<form method='POST'>
			<input class='user-inputs' type='text' name='username' placeholder='EDIT Username' required="required" autofocus value="<?= $thisUser->username ?>" ><br>
			<input class='user-inputs' type='email' name='email' placeholder='EDIT Email Address' required="required" value="<?= $thisUser->email ?>" ><br>
			<input type="submit" class="btn" id='submitbtn'>
		</form>
	</div>
</body>
</html>