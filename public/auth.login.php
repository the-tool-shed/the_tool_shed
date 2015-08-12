<?php  
    session_start();
    $sessionId = session_id();

    require_once "../bootstrap.php";
    require_once "../views/partials/header.php";

    if (Input::has('username') && Input::has('password')) {
        Auth::attempt(Input::get('username'), Input::get('password'));
        if (!Auth::check()) {
            $message = 'Username and password did not match.';
        } else if (Auth::check()) {
            Auth::login();
        }
    } else {
        $message = 'Please enter your username and password.';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        body { 
            text-align: center;
        }

        .input {
            height: 42px;
            font-size: 120%;
            color: #5a5854;
            background-color: #f2f2f2;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
            padding: 5px 5px 5px 30px;
        }
        
        .jumbotron {
            margin-top: 70px;
        }
    </style>
</head>
<body>

    <form method="POST">
        <div class='jumbotron'>
            <div class="container">
                <h1>Tool Shed Login</h1>
            </div>
            <p><?= $message; ?></p>
            <input class="input" type="text" name="username" placeholder="Username" autofocus required="required" >
            <input class="input" type="password" name="password" placeholder="Password" required="required" >
            <input type="submit" class="btn">
        </div>

    </form>

</body>
</html>