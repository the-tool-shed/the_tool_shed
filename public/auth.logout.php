<?php  

session_start();
$sessionId = session_id();

require_once "../bootstrap.php";

Auth::logout();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
</body>
</html>