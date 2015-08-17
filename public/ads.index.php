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
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/livefilter.jquery.js"></script>  
    <script type="text/javascript" src="/js/post_sort.js"></script>
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
                <form method="GET" action="/ads.index.php">
                    <input id="categorySearch" name="cat" type='text' placeholder='I want to learn...'>
                    <br>
                    <input id="usernameSearch" name="user" type='text' placeholder='I want to learn from...'>
                    <br>
                    <select id="citySearch" name="city">
                            <option></option>
                        <? foreach ($cities as $city): ?>
                            <option value="<?= $city['city'] ?>"><?= $city['city'] ?></option>
                        <? endforeach; ?>
                    </select>
                    <br>
                    <input id="searchSubmit" type="submit">
                </form>
            </div>
        </div>
        <!-- POSTS: show all ads or filtered results -->
        <div class='col-md-8'>
            <div class="span10">
                <h3>POSTS</h3>
                <? foreach($posts as $post): ?>
                <div class='well'>
                    <a href="ads.show.php?postID=<?= $post['id'] ?>">
                        <p class="category"><?= $post['category'] ?></p>
                    </a>
                    <p class="city"><?= $post['city'] ?></p>
                    <p class="username"><?= $post['username'] ?></p>
                    <p class="post_date"><?= $post['post_date'] ?></p>
                </div>
                <? endforeach; ?>
            </div>s
        </div>
    </div>

</body>
</html>