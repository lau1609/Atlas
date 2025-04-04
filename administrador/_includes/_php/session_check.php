<?php
error_reporting(0);
// ini_set("display_errors",1);
// error_reporting(E_ALL);
$session_lifetime = 1296000; // 2 semanas en segundos

ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params([
    'lifetime' => $session_lifetime,
    'path' => '/',
    'domain' => '', // Coloca tu dominio si es necesario
    'secure' => isset($_SERVER['HTTP']), // true si se usa HTTPS
    'httponly' => true,
    'samesite' => 'Lax' // Puede ser 'Strict' o 'None' dependiendo de tus necesidades
]);

if ($_POST['emp'] == true) {
    session_name('_emp');
}else{
    session_name('_user');
}

session_start();
if ($_POST['method'] == 'checking_a_session') {
    if (isset($_SESSION['EC_Username'])) {
        echo $_SESSION['EC_Username'];
        // echo 'session_active';
    } else {
        echo 'session_inactive';
    }
} else {
    echo "Nada que validar";
}

?>