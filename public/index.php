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
        }
        #indexTitle {
            text-align: center;
            font-size: 4em;
            margin-top: 20%;
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
        <h2>Section A</h2>
        <ul>
            <li>Thing 1</li>
            <li>Thing 2</li>
            <li>Thing 3</li>
        </ul>
    </div>
    <div class='jumbotron' id="jumbo3">
        <h2>Section B</h2>
        <p>Paragraph here</p>
        <p>Paragraph here</p>
        <p>Paragraph here</p>
        <p>Paragraph here</p>
    </div>
</body>
</html>