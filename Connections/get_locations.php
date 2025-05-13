<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);


include_once("connectMySql.php");

$query = "
SELECT 
    a.atrac_id,
    a.atrac_name,
    a.atrac_latitud,
    a.atrac_longitud,
    a.atrac_cover_text,
    m.muni_name,
    g.gal_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
";
$result = $connectMySql->query($query);

$locations = [];
while ($row = $result->fetch_assoc()) {
    $locations[] = $row;
}

echo json_encode($locations); // Devolver los datos en JSON
?>
