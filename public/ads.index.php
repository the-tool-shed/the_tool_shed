<?php 

require_once "../bootstrap.php";
require_once "../views/partials/header.php";

$posts = Ad::all();

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
            border-style: outset;
            box-shadow: 5px 5px 5px 5px #777777;
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
        <div class="col-md-1">
            <div class="span2">
                <h3>FILTER</h3>

                <form id="live-search" action="" class="styled" method="post">
                    <fieldset>
                        <input type="text" class="text-input" id="filter" value="" />
                        <span id="filter-count"></span>
                    </fieldset>
            </div>
        </div>
        <!-- POSTS: show all ads or filtered results -->
        <div class='col-md-8 col-md-offset-2'>
            <div class="span10">
                <h3>POSTS</h3>
                <? foreach($posts as $post): ?>
                    <ul class="list-group commentlist" id="livefilter-list">
                        <li class="category list-group-item">
                            <a href="ads.show.php?postID=<?= $post['id'] ?>"><?= $post['category'] ?></a>
                        </li>
                        <li class="city list-group-item"><?= $post['city'] ?></li>
                        <li class="username list-group-item"><?= $post['username'] ?></li>
                        <li class="post_date list-group-item"><?= $post['post_date'] ?></li>
                    </ul>
                <? endforeach; ?>
            </div>
        </div>
    </div>

</body>
</html>