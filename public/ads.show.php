<?php 

require_once "../bootstrap.php";
require_once "../views/partials/header.php";

if (Input::has('postID')) {
    $id = Input::getNumber('postID');
    $details = Ad::findById($id);
    $getHighlights = Ad::getHighlights($id);
    $highlights = explode(', ', $getHighlights[0]['highlights']);
} else {
    Auth::homeRedirect();
}   

?>

<!DOCTYPE html>
 <html>
 <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        #backBtn {
            margin-top: 10%;
            margin-left: 2%;
            position:absolute;
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
        h5 {
            clear:left;
            margin-left: 30px;
        }
        .jumbotron {
        margin-top: 70px;
        }

        #expires {
            margin-left: 20px;
        }
    </style>
 </head>
 <body>

    <button class="btn btn-lg" id="backBtn" onclick="goBack()">Back</button>
<div class='jumbotron'>
    <div id="postHeader" class ="row">
        <div class="col-md-4"></div>
        <div class = "col-md-8">
            <div>
                <h1 id="postTitle"><?= $details[0]['category'] ?></h1>
                <h5><?= $details[0]['city'] ?></h5>
            </div>

            <div id="postImg">
                <img class="center-block" src="<?= $details[0]['img_url'] ?>">
            </div>
        </div>
    </div>


    <div id="postBody" class="row">
        <div id="postHighlights" class="col-md-4">
            <h3>Highlights</h3>
            <ul>
                <? foreach ($highlights as $highlight): ?>
                    <li><?= $highlight ?></li>
                <? endforeach; ?>
            </ul>
        </div>
        <div id="postParagraph" class="col-md-8">
            <h3>About this class</h3>
            <p><?= $details[0]['description'] ?></p>
            <h4>Mentor: <?= $details[0]['username'] ?></h4>
            <h6>Posted: <?= $details[0]['post_date'] ?><span id="expires">Expires: <?= $details[0]['expire_date'] ?></span></h6>
        </div>
    </div>
</div>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>
 
 </body>
 </html>