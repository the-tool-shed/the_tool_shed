<?php  

require_once "../bootstrap.php";
require_once "../views/partials/indexheader.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tool Shed</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        body {
            text-align: center;
            border-style: outset;
        }
        #indexTitle {
            text-align: center;
            font-size: 4em;
            margin-top: 20%;
            color:white;
            background-color: black;
        }

        #mainForm {
            text-align: center;
            margin-top: 3%;
        }

        #mainForm > p {
            font-size: 1.3em;
        }

        #mainSearch {
            width: 25%;
            display: inline-block;
        }

        #mainFormLabel {
            font-size: 1em;
        }
        header div {
            display:inline-block;
            padding:5px;

        }
        #right-side {
            display:inline-block;
            padding:5px;
            float:right;
            margin-left: 1070px;

        }
        #logo {
            
            padding:10px;

        }
        footer div {
            display: inline-block;
            padding: 15px;
        }
        h1 {
            color:darkorange;
        }

        #jumbo1 {
            height: 750px;
            background-image: url("/img/boots.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            vertical-align: middle;
        }

        #jumbo2 {
            background-color: #f5f5f5;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #jumbo3 {
            background-image: url("/img/chalkboard.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class='jumbotron' id="jumbo1">

        <h1 id="indexTitle">Tool Shed</h1>
        <a href="ads.index.php"><button class="btn btn-lg btn-warning">ENTER</button></a>
    </div>
    <div class='jumbotron' id="jumbo2">
        <h2>What is the Tool Shed?</h2>
        <p>A space to learn.</p>
        <p>A space to teach.</p>
    </div>
    <div class='jumbotron' id="jumbo3">
        <h2>Why we're different</h2>
        <p>Here at the Tool Shed, we've created a space to learn essential "tools" that are not present in the traditional K-12 system.<p>
            <p>From learning the basics of carpentry to learning advanced algorithmic equations, a Tool Shed user can find anything.</p>
        <p>Want to learn a unique new skill? <a href="users.create.php">Sign up</a> now.</p>
        <p>Have a unique skill you'd like to teach? <a href="users.create.php">Sign up</a> now and make a post!</p>

        </p>
    </div>
</body>
</html>