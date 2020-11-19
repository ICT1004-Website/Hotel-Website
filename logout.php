<?php
session_start();

//If user is not logged in, redirect to sign in page
if(!isset($_SESSION["memberid"])){
    header("Location: /login.php");
    //Exit to stop content from loading
    exit;
}

//Perform necessary steps for logging out
//Unset session variables
$_SESSION = array();

//Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//Destroy the session
session_destroy();

//Redirect back to login page
header("Location: /project/login.php");

?>