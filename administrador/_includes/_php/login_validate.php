<?php
// ini_set("display_errors",1);
// error_reporting(E_ALL);	
// var_dump($_GET);

// Ajustar el tiempo de vida de la sesión a 2 semanas (1209600 segundos)
error_reporting(0);
$session_lifetime = 1209600; // 2 semanas en segundos

ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params([
    'lifetime' => $session_lifetime,
    'path' => '/',
    'domain' => '', // Coloca tu dominio si es necesario
    'secure' => isset($_SERVER['HTTP']), // true si se usa HTTPS
    'httponly' => true,
    'samesite' => 'Lax' // Puede ser 'Strict' o 'None' dependiendo de tus necesidades
]);

if ($_POST['empleado'] == true) {
    session_name('_emp');
}else{
    session_name('_user');
}

session_name('_user');
session_start();


include_once("../../Connections/config.php");
//var_dump($_GET);
if ($_GET['method'] == 'validate_session') {
    if (isset($_SESSION['EC_Username'])) {
        //echo 'si hay se sion';
        validate_userPass($_SESSION['EC_Username'], $_SESSION['EC_Password']);
    } else {
        // echo 'no hay sesion';
        // echo $_POST['login_user'], sha1($_POST['login_password']);
        validate_userPass($_POST['login_user'], sha1($_POST['login_password']));
    }
}

function validate_userPass($loginUsername,$password){
    $LoginRS__query=sprintf("
        SELECT id_users, name_user, contra_user
        FROM users_tb
        WHERE name_user = '%s'
        AND contra_user = '%s'
        AND status_user = 1", $loginUsername, $password);
    //     echo '<br>';
    // echo $LoginRS__query;
    // echo '<br>';
    $LoginRS = mysqli_query($GLOBALS['connectMySql'],$LoginRS__query);
    $loginFoundUser = mysqli_num_rows($LoginRS);
    $loginData = mysqli_fetch_assoc($LoginRS);
    
    //Si el login es exitoso
    if ($loginFoundUser)
    {

        // if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
        //Declaramos el nombre de usuario en la sesión
        $_SESSION['EC_Username'] = $loginUsername;
        $_SESSION['EC_Password'] = $password;
        $sessionData = array($loginUsername,$password);
        print_r(json_encode($sessionData));

        // para llevar un control en el inicio de sessiones
        // $thisBinaccle = new binnacle($loginData['user_id'],'','','','login');
        exit;
    //Si no coincide el login
    }else
    {
        echo 'unsuccessful';
    }
} // <--- Fin de validate_userPass();
?>