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


$query_rsQueryAtractivos = sprintf("SELECT g.*, r.*, m.*, t.*
       FROM atractivos_tb a
       LEFT JOIN gallery_tb g ON a.atrac_id = g.gal_dif 
       LEFT JOIN regiones_tb r ON a.atrac_reg_id = r.reg_id
       LEFT JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
       LEFT JOIN type_atrac_tb t ON a.atrac_muni_id = t.id_typ_atrac
       where a.atrac_status = 1
       ORDER BY a.atrac_id  desc");
    $rsQueryAtractivos = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryAtractivos);
    $row_rsQueryAtractivos = mysqli_fetch_assoc($rsQueryAtractivos);
    $totalRows_rsQueryAtractivos = mysqli_num_rows($rsQueryAtractivos);
    $QueryAtractivos = array();


    echo $query_rsQueryAtractivos;
    echo '<br>';
    echo '<br>';
    var_dump($row_rsQueryAtractivos);
    echo '<br>';
    echo '<br>';


    $query_rsQueryRegiones = sprintf("SELECT * FROM regiones_tb ");
       $rsQueryRegiones = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryRegiones);
       $row_rsQueryRegiones = mysqli_fetch_assoc($rsQueryRegiones);
       $totalRows_rsQueryRegiones = mysqli_num_rows($rsQueryRegiones);
    
       $QueryRegiones = array();
        if ($totalRows_rsQueryRegiones > 0) {
            do{ 
                array_push($QueryRegiones, array(
                    'id' => $row_rsQueryRegiones['reg_id'],
                    'name' => $row_rsQueryRegiones['reg_name']
                ));
            } while ($row_rsQueryRegiones = mysqli_fetch_assoc($rsQueryRegiones));
            print_r(json_encode($QueryRegiones));
            echo '<br>';
    echo '<br>';
            exit;
        }
    ?>