<?php

require_once "../bootstrap.php";
require_once "../views/partials/header.php";

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
		box-shadow: 5px 5px 5px 5px #777777;
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
		<p>A space to learn a skill not traditionally taught in today's school system.</p>
		<p>A space to teach that one nuanced skill, become Obi-Wan.  </p>
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