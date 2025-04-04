<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);


include_once("connectMySql.php");

$query = "SELECT 
    atractivos_tb.*,  
    gallery_tb.gal_url,
    municipios_tb.muni_name
FROM 
    atractivos_tb
JOIN 
    gallery_tb
ON 
    atractivos_tb.atrac_id = gallery_tb.gal_dif
JOIN 
    municipios_tb
ON 
    atractivos_tb.atrac_muni_id = municipios_tb.muni_id;
"; 
$result = $connectMySql->query($query);

$locations = [];
while ($row = $result->fetch_assoc()) {
    $locations[] = $row;
}

echo json_encode($locations); // Devolver los datos en JSON
?>
