<?php
include_once("connectMySql.php");

$muni_id = (isset($_GET['muni_id']) && $_GET['muni_id'] !== 'all') ? intval($_GET['muni_id']) : null;
$type_ids_raw = isset($_GET['type_ids']) ? $_GET['type_ids'] : null;
$region_id = (isset($_GET['region_id']) && $_GET['region_id'] !== 'all') ? intval($_GET['region_id']) : null;




$type_filter = '';
if ($type_ids_raw) {
    $type_ids = array_filter(array_map('intval', explode(',', $type_ids_raw)));
    if (!empty($type_ids)) {
        $in_values = implode(',', $type_ids);
        $type_filter = " AND a.atrac_type IN ($in_values)";
    }
}

$query = "
SELECT 
    a.atrac_id,
    a.atrac_status,
    a.atrac_name,
    a.atrac_reg_id,
    a.atrac_latitud,
    a.atrac_longitud,
    a.atrac_cover_text,
    m.muni_name,
    r.reg_id,
    r.reg_name,
    g.gal_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN regiones_tb r ON a.atrac_reg_id = r.reg_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
WHERE a.atrac_status = 1
";

// Agrega los filtros aquí
if ($muni_id) {
    $query .= " AND a.atrac_muni_id = $muni_id";
}

if ($region_id) {
    $query .= " AND a.atrac_reg_id = $region_id";
}

$query .= $type_filter;
$query .= " GROUP BY a.atrac_id";

$result = $connectMySql->query($query);

$locations = [];
while ($row = $result->fetch_assoc()) {
    $locations[] = $row;
}

echo json_encode($locations);
?>