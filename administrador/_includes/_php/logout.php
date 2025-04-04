<?php
error_reporting(0);
session_start();

// Unset all session variables
$_SESSION = array();

// If the session was propagated using a cookie, remove that cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    
    if ($_POST['emp'] == true) {
        setcookie('_emp', '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"],
    );
        $_SESSION['_emp'] = NULL;
	    unset($_SESSION['_emp']);
        
    }else{
        setcookie('_user', '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"],
    );
        $_SESSION['_user'] = NULL;
	    unset($_SESSION['_user']);
    }
    
}

// Finally, destroy the session
session_destroy();

echo 'session_closed';
?>
