<?php 

require_once "../bootstrap.php";
require_once "../views/partials/header.php";

$posts = Ad::all();
$cities = City::all();

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

        header div {
            display:inline-block;
            padding:5px;
            height: 50px;

        }
        #right-side {
            display:inline-block;
            padding:5px;
            float:right;
            margin-left: 385px;

        }
        #logo {
            padding:10px;
            margin-right: 385px;

        }
        #center-search {
            padding:0px;
            display: inline-block;
        }
        button {
            margin-left: 5px;
        }
        .container-fluid {
            margin-top: 50px;
        }
        .col-md-4 form {
            /*padding: 20px;*/

        }
        .col-md-4 input {
            margin-top: 30px;

        }
        .col-md-4 select {
            margin-top: 30px;

        }
        h3 {
            text-decoration: underline;
        }
        .col-md-4 button {
            margin-top: 30px;
        }
        .col-md-8 {
            padding-bottom: 100px;
        }
        


    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- SIDEBAR: search & filter -->
        <div class="col-md-4">
            <div class="span2">
                <h3>FILTER</h3>
                <form>
                    <input type='text' placeholder='Search by Subject'>
                    <br>
                    <input type='text' placeholder='Search by Username'>
                    <br>
                    <select name="cities">
                            <option></option>
                        <? foreach ($cities as $city): ?>
                            <option value="<?= $city['city'] ?>"><?= $city['city'] ?></option>
                        <? endforeach; ?>
                    </select>
                    <br>
                    <button>Search</button>
                </form>
            </div>
        </div>
        <!-- POSTS: show all ads or filtered results -->
        <div class='col-md-8'>
            <div class="span10">
                <h3>POSTS</h3>
                <? foreach($posts as $post): ?>
                <div class='well'>
                    <form method="GET" action="ads.show.php/?postID=<?= $post['id'] ?>">
                        <a href="ads.show.php?postID=<?= $post['id'] ?>"><p><?= $post['category'] ?></p></a>
                    </form>
                    <p><?= $post['city'] ?></p>
                    <p><?= $post['username'] ?></p>
                    <p><?= $post['post_date'] ?></p>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

</body>
</html>