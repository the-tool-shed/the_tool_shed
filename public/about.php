<?php

require_once "../views/partials/header.php";
require_once "../views/partials/footer.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>ABOUT PAGE</title>
	<link rel='stylesheet' type="text/css" href="/css/bootstrap.min.css">
	<style type="text/css">
	.jumbotron {
		margin-top: 70px;
		text-align: center;
	}
	h3 {
		text-align: center;
	}
	#christian {
		text-align: center;
		padding-top: 50px;

	}
	#david {
		text-align: center;
		padding-top: 50px;		
	}
	h4 {
		text-decoration: underline;
	}

	</style>


</head>
<body>
	<div class='jumbotron'>
		<h1>What is the Tool Shed?</h1>
		<p>paragraph explaining the tool shed...</p>
	</div>

	<div id='founders'>
		<h3>The Founders</h3>
		<div id='christian' class='col-md-6'>
			<h4>Christian Tobias</h4>		
			<p>Some short bio...</p>
		</div>
		<div id='david' class='col-md-6'>
			<h4>Daivd Collier</h4>
			<p>Some short bio...</p>
		</div>
	</div>

</body>
</html>