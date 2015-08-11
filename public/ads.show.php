<?php 

// require_once "../views/partials/header.php"

 ?>

<!DOCTYPE html>
 <html>
 <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        #backBtn {
            margin-top: 2%;
            margin-left: 2%;
            /*float: left;*/
        }

        .center-block {
            display: block;
            float: left;
            padding-left: 15px;
        }

        #postTitle {
            float: left;
            text-align: left;
            padding-left: 30px;
        }

        #postImg {
            clear: left;
            padding-left: 15px;
        }

        #postBody {
            margin-left: auto;
            margin-right: auto;
            max-width: 85%;
        }

        #postHighlights,
        #postParagraph {
            padding-left: 0px;
            padding-right: 0px;
        }

        #username {
            font-size: 2em;
            /*font-weight: bold;*/
        }

        #rating {
            font-size: 2em;
            font-weight: bold;
        }

        #postUserRating {
            margin-top: 2%;
            text-align: left;
            padding-left: 30px;
        }
        }
    </style>
 </head>
 <body>

    <button class="btn btn-lg" id="backBtn" onclick="goBack()">Back</button>

    <div id="postHeader" class ="row">
        <div class="col-md-4"></div>
        <div class = "col-md-8">
            <div>
                <h1 id="postTitle">Carpentry</h1>
            </div>

            <div id="postImg">
                <img class="center-block" src="/img/shed1.jpg">
            </div>
        </div>
    </div>


    <div id="postBody" class="row">
        <div id="postHighlights" class="col-md-4">
            <h3>Highlights</h3>
            <ul>
                <li>ipsum dolor sit</li>
                <li>ullamco laboris nisi ut aliquip</li>
                <li>dolore eu fugiat nulla</li>
                <li>deserunt mollit anim</li>
            </ul>
        </div>
        <div id="postParagraph" class="col-md-8">
            <h3>About this class</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

    <div id="postUserRating">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <p>
                <span id="username">username </span> has a  <span id="rating"> 9.8 </span>  rating out of 10
            </p>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
 
 </body>
 </html>