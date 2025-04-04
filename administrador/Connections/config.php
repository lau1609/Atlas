<?php
# Connect MySQL
$server_source = "local"; // 'local' or 'remote'

$hostname_connectMySql = "localhost";

if($server_source == 'local'):
$database_connectMySql = "atlas_bd";
$username_connectMySql = "userAtlas";
$password_connectMySql = "Atlas.2025";
else:
$database_connectMySql = "u960560109_perfil_visitan";
$username_connectMySql = "if0_34488716";
$password_connectMySql = "2bw5y0gd";
endif;
// echo  $database_connectMySql, $username_connectMySql, $password_connectMySql;
$connectMySql = new mysqli($hostname_connectMySql, $username_connectMySql, $password_connectMySql, $database_connectMySql);

//  var_dump($concnectMySql);

if (mysqli_connect_errno()) {
    printf("Conexi&oacute;n fallida: %s\n", mysqli_connect_error());
    exit();
}

$GLOBALS['connectMySql'] = $connectMySql;
$GLOBALS['thisDomain'] = 'http://testgoogle.free.nf/';
mysqli_query($connectMySql,"SET NAMES 'utf8'");
mysqli_query($connectMySql,"SET lc_time_names = 'es_MX'");

// Zona: México
setlocale(LC_TIME, 'es_MX');
date_default_timezone_set('America/Chihuahua');
?>