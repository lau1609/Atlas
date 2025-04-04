<?php
include_once("connectMySql.php");

if ($connectMySql->connect_error) {
    die("Error de conexión: " . $connectMySql->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos.";
}
?>
