<?php

require_once "../bootstrap.php";
require_once "../views/partials/header.php";

$date = new DateTime(date('Y-m-d'));
$date->add(new DateInterval('P21D'));

// var_dump($_POST);
if($_POST) {
$ad = new Ad();
$ad->user_id = 1; //comes from session
$ad->city_id = 4; //select html input
$ad->category_id = 3; //select html input
$ad->post_date = date('Y-m-d');
$ad->expire_date = $date->format('Y-m-d');
$ad->highlights = Input::get('highlights');
$ad->description = Input::get('description');
$ad->img_url = '/img/uploads/tamugma.jpg';
$ad->save();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Create A POST</title>
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
		<form method='POST'>
		<input class='user-inputs' type='text' name='highlights' placeholder='Enter Course Highlights' required="required" ><br>
		<input class='user-inputs' type='text' name='description' placeholder='Enter Course Description' required="required" autofocus ><br>
		<input type="submit" class="btn" id='submitbtn'>
		</form>
	</div>

</body>
</html>