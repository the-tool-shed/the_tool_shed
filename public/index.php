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
    </style>
</head>
<body>
    <div class='jumbotron'>
        <h1 id="indexTitle">Tool Shed</h1>
        <form id="mainForm" action="/ads.index.php">
                <p id="mainFormLabel">I want to learn...</p>
                <input id="mainSearch" type="search" name="search" placeholder="x" autofocus>
                <input id="searchSubmit" type="submit">
        </form>
    </div>
</body>
</html>