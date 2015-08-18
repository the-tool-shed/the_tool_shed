<?php

require_once "../bootstrap.php";
// require_once "../views/partials/header.php";

$currentUser = $_SESSION['LOGGED_IN_USER'];
$myPosts = Ad::usernameSearch($currentUser);

var_dump($myPosts);

// if($_FILES) {
//     $uploads_directory = "img/uploads/";
//     $filename = $uploads_directory . basename($_FILES['somefile']['name']);

//     if(move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
//         echo '<p>The file ' . basename($_FILES['somefile']['name']) . ' has been uploaded.</p>';
//     } else {
//         echo '<p>Sorry, there was an error uploading your file.</p>';
//         $filename = $post['img_url'];
//     }
// }

if($_POST) {
	foreach ($myPosts as $post) {
		$post->id = $post['id'];
		$post->username = $_SESSION['LOGGED_IN_USER'];
		$post->category = Input::get('category');
		$post->city = Input::get('city');
		$post->post_date = date('Y-m-d');
		$post->expire_date = $date->format('Y-m-d');
		$post->highlights = Input::get('highlights');
		$post->description = Input::get('description');
		$post->img_url = $post['img_url'];
		$post->save();
	}
}

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
		margin-top: 30px;
		margin-right: 10%;
	}
	h2 {
		clear:right;
		float: right;
		margin-top: 10px;
		margin-right: 10%;
	}

	#jumbo1 {
		margin-top: 70px;
		height: 25%
	}

	#jumbo2 {
		text-align: center;
	}

	.category,
	.city {
		width: 25%;
	}

	.highlights, 
	.description {
		width: 75%;
	}

	.submitBtn {
		margin-top: 5px;
	}

	.img_url {
		margin-left: auto;
		margin-right: auto;
	}
	
	</style>
</head>
<body>
	<div class='jumbotron' id='jumbo1'>
		<h1>Update Your Course</h1>
		<h2>Knowledge is Power</h2>
	</div>

	<div class='jumbotron' id='jumbo2'>
		<?php foreach ($myPosts as $post) : ?>
			<div>
				<p>Post ID: <?= $post['id'] ?></p>
				<form  method='POST' action="#">
					<input class="category"    type="text"     value="<?= $post['category'] ?>">
					<input class="city"        type="text"     value="<?= $post['city'] ?>">
					<input class="highlights"  type="text"     value="<?= $post['highlights'] ?>">
					<input class="description" type="text" value="<?= $post['description'] ?>">
					<!-- <input class="img_url" type="file" value="<?= $post['img_url'] ?>"></li> -->
					<input type="submit" class="btn btn-md submitBtn" value="Update">
				</form>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>