<?php 

require_once "../views/partials/header.php";
require_once "../views/partials/footer.php";

$ads = [

    ['username'=> 'Peter', 'email' => 'peter@gmail.com', 'city' => 'San Antonio', 'subject'=> 'coding'],
    ['username'=> 'Bjorn', 'email' => 'bjorn@gmail.com', 'city' => 'Houston', 'subject'=> 'boating'],
    ['username'=> 'John', 'email' => 'john@gmail.com', 'city' => 'Dallas', 'subject'=> 'horse-back riding']




];

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
            <div class="col-md-4">
                <div class="span2">
                    <h3>FILTER</h3>
                    <form>
                        <input type='text' placeholder='Search by Subject'>
                        <br>
                        <input type='text' placeholder='Search by Username'>
                        <br>
                        <select name="cities">
                            <option value="San Antonio">San Antonio</option>
                            <option value="Houston">Houston</option> 
                            <option value="Dallas">Dallas</option>
                            <option value="Austin">Austin</option>
                        </select>
                        <br>
                        <button>Search</button>
                    </form>
                </div>
            </div>
                <div class='col-md-8'>
                    <div class="span10">
                        <h3>TEACHERS</h3>
                        <div class="well">
                            <a href="ads.show.php">Here are all of the ads...</a>
                        </div>
                        <? foreach($ads as $ad): ?>
                        <div class='well'>
                            <p><?=$ad['username'] ?></p>
                            <a href="https://en.wikipedia.org/wiki/Peter_Bjorn_and_John"<p><?=$ad['email'] ?></p></a>
                            <p><?=$ad['city'] ?></p>
                            <p><?=$ad['subject'] ?></p>
                        </div>
                        <? endforeach; ?>
                        <div class="well">
                            <p>Here is the last ad...</p>
                        </div>
                    </div>
                </div>

        </div>

</body>
</html>