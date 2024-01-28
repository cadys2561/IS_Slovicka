<?php

require "nav/nav.php";
require_once "service/session.php";



//TODO - přidat callback handler aby mě to hodilo na domů obrazovku


// Initialize the session.
// If you are using session_name("something"), don't forget it now!
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();



/*
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();
*/
?>