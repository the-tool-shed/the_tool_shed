<?php

require_once 'Logger.php';
require_once 'Input.php';


class Auth 
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt ($username, $password)
    {

        $getUser = User::findLogin($username);
        // var_dump($getUser);
        if ($username == $getUser->attributes[0]['username'] && password_verify($password, $getUser->attributes[0]['password'])) {
            $_SESSION['LOGGED_IN_USER'] = $username;
            $_SESSION['USER_ID'] = $getUser->attributes[0]['id'];
            $log1 = new Log();
            $log1->logInfo("User $username logged in.");
        } else {
            $log1 = new Log();
            $log1->logError("User $username failed to log in.");
        }
    }
            // var_dump($_SESSION);

    public static function check ()
    {
        if (isset($_SESSION['LOGGED_IN_USER'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function user ()
    {
        if (!empty($_SESSION['LOGGED_IN_USER'])) {
            return $_SESSION['LOGGED_IN_USER'];
        }
    }

    public static function logout ()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        session_destroy();

        Auth::redirect();  
    }

    public static function redirect ()
    {
        header("location: /auth.login.php");
        exit();  
    }

    public static function homeRedirect ()
    {
        header("location: /ads.index.php");
        exit();
    }

    public static function login ()
    {
        header('location:users.show.php');
        exit();
    }

    public static function escape($input)
    {
        $input = htmlspecialchars(strip_tags($input));
        return $input;
    }

}