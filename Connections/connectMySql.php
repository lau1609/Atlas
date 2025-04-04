<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$server_source = "local"; // 'local' o 'remote'

$hostname_connectMySql = "localhost";

if($server_source == 'local'):
$rootPath = 'https://localhost/atlas/';
$database_connectMySql = "atlas_bd";
$username_connectMySql = "root";
$password_connectMySql = "";
else:
$rootPath = 'https://sitio/'; 
$database_connectMySql = "atlas_bd";
$username_connectMySql = "";
$password_connectMySql = "";
endif;

$connectMySql = new mysqli($hostname_connectMySql, $username_connectMySql, $password_connectMySql, $database_connectMySql);
if (mysqli_connect_error()) {
    printf("Conexi&oacute;n fallida: %s\n", mysqli_connect_error());
    exit();
}
$GLOBALS['connectMySql'] = $connectMySql;
mysqli_query($connectMySql,"SET NAMES 'utf8'");
?>