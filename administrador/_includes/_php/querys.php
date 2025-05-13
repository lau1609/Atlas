<?php
error_reporting(0);
include_once("../../Connections/config.php");





if ($_POST['viewComen'] == 'true') {
    // echo 'entro';
    
    $id = $_POST['id'];
    $query_rsQueryComen = sprintf("SELECT *
       FROM comentarios_tb 
       WHERE comen_pres_id = $id");
   $rsQueryComen = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryComen);
   $row_rsQueryComen = mysqli_fetch_assoc($rsQueryComen);
   $totalRows_rsQueryComen = mysqli_num_rows($rsQueryComen);

   $queryComen = array();
    if ($totalRows_rsQueryComen > 0) {
        do{ 
            array_push($queryComen, array(
                'texto' => $row_rsQueryComen['comen_text'],
                'fecha' => $row_rsQueryComen['comen_fecha'],
                'hora' => $row_rsQueryComen['comen hora']
            ));
        } while ($row_rsQueryComen = mysqli_fetch_assoc($rsQueryComen));
        print_r(json_encode($queryComen));
        exit;
    }
}

if ($_POST['cancel'] == 'true') {
    $id = $_POST['id'];
    $vehi = $_POST['vehi'];
    // echo $vehi;
    // exit;
    $sql = "UPDATE prestamos_tb
            SET pres_status = 3
            WHERE pres_id = $id";

    $sql2 = "UPDATE vehiculos_tb
            SET vehi_status = 1
            WHERE vehi_id = $vehi";

            if ($_POST['comen']) {
                $comen = $_POST['comen'];
                comentarios($id, $comen, $connectMySql);
            }
    // exit;
    if (mysqli_query($connectMySql, $sql) && mysqli_query($connectMySql, $sql2)) {
        echo 'successful';
    }
}
if ($_POST['initCalen'] == 'true') {

    
    $query_rsQueryPresCalen = sprintf("SELECT * FROM prestamos_tb p
                                JOIN vehiculos_tb v
                                ON p.pres_id_vehi = vehi_id");
    $rsQueryPresCalen = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryPresCalen);
    $row_rsQueryPresCalen = mysqli_fetch_assoc($rsQueryPresCalen);
    $totalRows_rsQueryPresCalen = mysqli_num_rows($rsQueryPresCalen);
    $queryPresCalen = array();

    if ($totalRows_rsQueryPresCalen > 0) {
        do {
            array_push($queryPresCalen, array(
                'ini' => $row_rsQueryPresCalen['pres_fec_ini'].'T'.$row_rsQueryPresCalen['pres_hor_ini'],
                'fin' => $row_rsQueryPresCalen['pres_fec_fin'].'T'.$row_rsQueryPresCalen['pres_hor_fin'],
                'dest' => $row_rsQueryPresCalen['pres_destino'],
                'user' => $row_rsQueryPresCalen['pres_folio_emp'],
                'folio' => $row_rsQueryPresCalen['pres_folio'],
                'det' => $row_rsQueryPresCalen['pres_det'],
                'stat' => $row_rsQueryPresCalen['pres_status'],
                'vehi' => $row_rsQueryPresCalen['vehi_name'],
                'placas' => $row_rsQueryPresCalen['vehi_placas'],
                'color' => $row_rsQueryPresCalen['vehi_color'],
                'vehi_id' => $row_rsQueryPresCalen['vehi_id']
            ));
        } while ($row_rsQueryPresCalen = mysqli_fetch_assoc($rsQueryPresCalen));

        print_r(json_encode($queryPresCalen));
        // print_r(json_encode($queryEmp));
        // var_dump($queryEmp);
        // echo '-------------------------------';
    }
}


if ($_POST['images'] == 'true') {
// ini_set("display_errors",1);
// error_reporting(E_ALL);
    
    $query_rsQueryQueryImages = sprintf("SELECT * 
                                        FROM gallery_tb g 
                                        JOIN type_img_tb t
                                        ON t.type_img_id = g.gal_type AND g.gal_type != 2 AND g.gal_type != 3");
    $rsQueryQueryImages = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryQueryImages);
    $row_rsQueryQueryImages = mysqli_fetch_assoc($rsQueryQueryImages);
    $totalRows_rsQueryQueryImages = mysqli_num_rows($rsQueryQueryImages);
    $queryImages = array();

    //echo $query_rsQueryQueryImages;
    if ($totalRows_rsQueryQueryImages > 0) {
        do {
            array_push($queryImages, array(
                'id' => $row_rsQueryQueryImages['gal_id'],
                'urlImg' => $row_rsQueryQueryImages['gal_url_img'],
                'url' => $row_rsQueryQueryImages['gal_url'],
                'gal_id_type' => $row_rsQueryQueryImages['gal_type'],
                'dif' => $row_rsQueryQueryImages['gal_dif'],
                'typ_id' => $row_rsQueryQueryImages['type_img_id'],
                'typ_name' => $row_rsQueryQueryImages['type_img_name']
            ));
        } while ($row_rsQueryQueryImages = mysqli_fetch_assoc($rsQueryQueryImages));

        //  var_dump($queryImages);
        print_r(json_encode($queryImages));
    }
}


// ini_set("display_errors",1);
// error_reporting(E_ALL);



if ($_POST['changeStat'] == 'true') {
//     ini_set("display_errors",1);
// error_reporting(E_ALL);

    $stat = $_POST['valStat'];
    $id = $_POST['id'];
    $sql = "UPDATE atractivos_tb
        SET atrac_status = '$stat'
        WHERE 	atrac_id  = '$id'"; 
    // echo $sql;
        if (mysqli_query($connectMySql, $sql)) {
            echo 'successful';
        }else{
            echo 'unsuccesful';
        }
}

if ($_POST['changeStatAtrac'] == 'true') {
    //     ini_set("display_errors",1);
    // error_reporting(E_ALL);
    
        $stat = $_POST['valStat'];
        $id = $_POST['id'];
        $sql = "UPDATE type_atrac_tb
            SET status_typ_atrac = '$stat'
            WHERE 	id_typ_atrac  = '$id'"; 
        // echo $sql;
            if (mysqli_query($connectMySql, $sql)) {
                echo 'successful';
            }else{
                echo 'unsuccesful';
            }
    }

if ($_POST['validateAddMuni'] == 'true') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $temp = $_POST['temp'];
    $cult = $_POST['cult'];
    $natu = $_POST['natu'];
    $region = $_POST['region'];
    $descShort = $_POST['descShort'];
    $id = $_POST['id'];

    $sql2 = "UPDATE municipios_tb SET muni_reg_id = '$region',
                                    muni_name = '$name', 
                                    muni_cover_text = '$descShort', 
                                    muni_desc = '$desc', 
                                    muni_temp = '$temp', 
                                    muni_cult = '$cult', 
                                    muni_nat = '$natu'
                WHERE muni_id = '$id'";
    if ($connectMySql->query($sql2) === TRUE) {
        echo 'succesfull';
    } else {
        echo "Error en el INSERT: " . $connectMySql->error;
    }
}


if ($_POST['editImage']) {

    $id = $_POST['id'];
    $typ_id = $_POST['typ_id'];
    if ($_POST['url']) {
        $url = $_POST['url'];
    }else{
        $url = '';
    }

    if (isset($_FILES['imagen'])) {
        $fileName = $_FILES['imagen']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $pathPor = '_images/imagenesPlat/' . $fileName . '.'. $fileExtension;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/atlas/administrador/_images/imagenesPlat/' . $fileName . '.'.$fileExtension);
    }else{
        $pathPor = $_POST['urlImgExi'];
    }
    $sql3 = "UPDATE gallery_tb SET gal_url = '$pathPor', gal_url_img = '$url'
            WHERE gal_id = '$id'";

            //echo $sql3;

    if ($connectMySql->query($sql3) === TRUE) {
        echo 'succesfull';
    }
}

if ($_POST['delImg'] == 'true') {
    $id = $_POST['id'];
    $sql = "DELETE FROM gallery_tb WHERE gal_id = $id";
    if (mysqli_query($connectMySql, $sql)) {
        echo 'successful';
    }
}


if ($_POST['addImg'] == 'true') {
    $typImage = $_POST['typImage'];

    if ($_POST['urlRed']) {
        $urlRed = $_POST['urlRed'];
    }else{
        $urlRed = '';
    }

    if (isset($_FILES['imagen'])) {
        $fileName = $_FILES['imagen']['name'];
        $fileNameCmps = explode(".", $fileName);  
        $fileExtension = strtolower(end($fileNameCmps));
        $pathIg = '_images/imagenesPlat/' . $fileName. '.'. $fileExtension;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/atlas/administrador/_images/imagenesPlat/' . $fileName. '.'.$fileExtension);
    }
    $sql4 = "INSERT INTO gallery_tb (gal_url, gal_type, gal_dif, gal_url_img) VALUES ('$pathImg' , '$typImage','0', '$urlRed')";
            
    if ($connectMySql->query($sql4) === TRUE) {
        echo 'succesfull';
    }
        
}


if ($_POST['addAtrac'] == 'true') {
    $name = $_POST['name'];

    $sql4 = "INSERT INTO type_atrac_tb (name_typ_atrac) VALUES ('$name')";
            
    if ($connectMySql->query($sql4) === TRUE) {
        echo 'succesfull';
    }
        
}


if ($_POST['edtTypAtrac'] == 'true') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql3 = "UPDATE type_atrac_tb SET name_typ_atrac = '$name'
            WHERE id_typ_atrac = '$id'";

    if ($connectMySql->query($sql3) === TRUE) {
        echo 'succesfull';
    }

}


if ($_POST['typImage'] == 'true') {
    $query_rsQueryTypImg = sprintf("SELECT * FROM type_img_tb where type_img_id != 1 AND type_img_id != 2 AND type_img_id != 3");
    $rsQueryTypImg = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryTypImg);
    $row_rsQueryTypImg = mysqli_fetch_assoc($rsQueryTypImg);
    $totalRows_rsQueryTypImg = mysqli_num_rows($rsQueryTypImg);
    $queryTypImg = array();
    if ($totalRows_rsQueryTypImg > 0) {
        do {
            array_push($queryTypImg, array(
                'id' => $row_rsQueryTypImg['type_img_id'],
                'name' => $row_rsQueryTypImg['type_img_name']
            ));
            
        } while ($row_rsQueryTypImg = mysqli_fetch_assoc($rsQueryTypImg));
        // var_dump($queryVehiDis);
        // echo '-------------------------------';
    }
    print_r(json_encode($queryTypImg));

}


if ($_POST['typAtrac'] == 'true') {
    $query_rsQueryTypAtrac = sprintf("SELECT * FROM type_atrac_tb");
    $rsQueryTypAtrac = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryTypAtrac);
    $row_rsQueryTypAtrac = mysqli_fetch_assoc($rsQueryTypAtrac);
    $totalRows_rsQueryTypAtrac = mysqli_num_rows($rsQueryTypAtrac);
    $queryTypAtrac = array();
    if ($totalRows_rsQueryTypAtrac > 0) {
        do {
            array_push($queryTypAtrac, array(
                'id' => $row_rsQueryTypAtrac['id_typ_atrac'],
                'stat' => $row_rsQueryTypAtrac['status_typ_atrac'],
                'name' => $row_rsQueryTypAtrac['name_typ_atrac']
            ));
            
        } while ($row_rsQueryTypAtrac = mysqli_fetch_assoc($rsQueryTypAtrac));
        // var_dump($queryVehiDis);
        // echo '-------------------------------';
    }
    print_r(json_encode($queryTypAtrac));

}




if ($_POST['validateAddAtrac'] == 'true') {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    //var_dump($_POST);
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $temp = $_POST['temp'];
    $cult = $_POST['cult'];
    $natu = $_POST['natu'];
    $dir = $_POST['dir'];
    $hor = $_POST['hor'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $price = $_POST['price'];
    $face = $_POST['face'];
    $inst = $_POST['inst'];
    $typAtrac = $_POST['typAtrac'];
    $region = $_POST['region'];
    $muni = $_POST['muni'];
    $descShort = $_POST['descShort'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $pathPor = '';
    $pathGal = '';
    if (isset($_FILES['imagen'])) {
        $fileName = $_FILES['imagen']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $pathPor = '_images/imgAtractivos/' . $_POST['name']. '.'. $fileExtension;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/atlas/administrador/_images/imgAtractivos/' . $_POST['name']. '.'.$fileExtension);
    }

    if (isset($_FILES['imagenes'])) {
        $cont = 0;
        $nombresImagenes = []; 
        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $cont++;
            $fileName = $_FILES['imagenes']['name'][$key];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $nombreArchivo = '_images/imgAtractivos/' . $_POST['name'].$cont. '.'.$fileExtension;
            move_uploaded_file($tmp_name,$_SERVER['DOCUMENT_ROOT'] .'/atlas/administrador/_images/imgAtractivos/' . $_POST['name'].$cont. '.'.$fileExtension);
            $nombresImagenes[] = $nombreArchivo;
        }
        $pathGal = implode('***', $nombresImagenes);
        // echo $pathGal;
    }

    

    if ($_POST['editAddAtrac']) {
        $id = $_POST['id'];

        // verifica si hay portadas previas
        $query_rsQueryPort = sprintf("SELECT * FROM gallery_tb
        WHERE (gal_dif = '$idPort' AND gal_type = 3);");
        $rsQueryPort = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryPort);
        $row_rsQueryPort = mysqli_fetch_assoc($rsQueryPort);
        $totalRows_rsQueryPort = mysqli_num_rows($rsQueryPort);
        if ($totalRows_rsQueryPort > 0 ) {
            $sql3 = "UPDATE gallery_tb SET gal_url = '$pathPor', gal_type = '3' 
                WHERE gal_dif = '$id'";
        }else{
            $sql3 = "INSERT INTO gallery_tb (gal_url, gal_type, gal_dif) VALUES ('$pathPor' , '3','$id')";
        }

        // verifica si hay galeria previa
        $query_rsQueryGal = sprintf("SELECT * FROM gallery_tb
        WHERE (gal_dif = '$idPort' AND gal_type = 2);");
        $rsQueryGal = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryGal);
        $row_rsQueryGal = mysqli_fetch_assoc($rsQueryGal);
        $totalRows_rsQueryGal = mysqli_num_rows($rsQueryGal);
        if ($totalRows_rsQueryGal > 0 ) {
            $sql4 = "UPDATE gallery_tb SET gal_url = '$pathGal', gal_type = '2' 
                WHERE gal_dif = '$id'";
        }else{
            $sql4 = "INSERT INTO gallery_tb (gal_url, gal_type, gal_dif) VALUES ('$pathGal' , '2','$id')";
        }
        
        $sql2 = "UPDATE atractivos_tb SET atrac_muni_id = '$muni',
                                        atrac_type = '$typAtrac', 
                                        atrac_reg_id = '$region', 
                                        atrac_name = '$name', 
                                        atrac_cover_text = '$descShort', 
                                        atrac_desc = '$desc', 
                                        atrac_latitud = '$lat', 
                                        atrac_longitud = '$long', 
                                        atrac_direcc = '$dir', 
                                        atrac_horario = '$hor', 
                                        atrac_mail = '$mail', 
                                        atrac_tel = '$tel', 
                                        atrac_price = '$price', 
                                        atrac_soc_face = '$face', 
                                        atrac_soc_inst = '$inst'
                WHERE atrac_id = '$id'";
    }else{
        
        
        $sql2 = "INSERT INTO atractivos_tb (atrac_muni_id, atrac_type, atrac_reg_id, atrac_name, atrac_cover_text, atrac_desc, atrac_latitud, atrac_longitud, atrac_direcc, atrac_horario, atrac_mail, atrac_tel, atrac_price, atrac_soc_face, atrac_soc_inst) 
        VALUES ('$muni', '$typAtrac', '$region', '$name', '$descShort', '$desc', '$lat', '$long', '$dir', '$hor', '$mail', '$tel', '$price', '$face', '$inst')";
    }

    if ($connectMySql->query($sql2) === TRUE) {
        $last_id = $connectMySql->insert_id; 
        if ($pathPor != '') {
            if ($_POST['editAddAtrac'] != true) {
                $sql3 = "INSERT INTO gallery_tb (gal_url, gal_type, gal_dif) VALUES ('$pathPor' , '3','$last_id')";
            }
            if ($connectMySql->query($sql3) === TRUE) {
            }
        }
        if ($pathGal != '') {
            if ($_POST['editAddAtrac'] != true) {
                $sql4 = "INSERT INTO gallery_tb (gal_url, gal_type, gal_dif) VALUES ('$pathGal' , '2','$last_id')";
            }
            if ($connectMySql->query($sql4) === TRUE) {
            }
        }
        
       echo 'succesfull';
    } else {
        echo "Error en el INSERT: " . $connectMySql->error;
    }
    
}
if ($_POST['municipios'] == 'true') {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $munis = municipios($connectMySql);
    $regiones = regiones($connectMySql);
    $query_rsQueryMunis = sprintf("SELECT r.*, m.*
       FROM municipios_tb m
       JOIN regiones_tb r ON m.muni_reg_id = r.reg_id
       ORDER BY m.muni_id  desc");
    $rsQueryMunis = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryMunis);
    $row_rsQueryMunis = mysqli_fetch_assoc($rsQueryMunis);
    $totalRows_rsQueryMunis = mysqli_num_rows($rsQueryMunis);
    $queryMunis = array();
    $final = array();
    if ($totalRows_rsQueryMunis > 0) {
        do {
            array_push($queryMunis, array(
                'id' => $row_rsQueryMunis['muni_id'],
                'name' => $row_rsQueryMunis['muni_name'],
                'reg_id' => $row_rsQueryMunis['muni_reg_id'],
                'reg_name' => $row_rsQueryMunis['reg_name'],
                'descShort' => $row_rsQueryMunis['muni_cover_text'],
                'desc' => $row_rsQueryMunis['muni_desc'],
                'temp' => $row_rsQueryMunis['muni_temp'],
                'cult' => $row_rsQueryMunis['muni_cult'],
                'nat' => $row_rsQueryMunis['muni_nat'],
            ));
        } while ($row_rsQueryMunis = mysqli_fetch_assoc($rsQueryMunis));
    }

    $final = array(
        'regs' => $munis,
        'regiones' => $regiones,
        'munis' => $queryMunis,
    );

    print_r(json_encode($final));
}



if ($_POST['atractivos'] == 'true') {
    // echo 'llego al querys';
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $queryMunis = array();
    $queryRegiones = array();
    $queryTypAtrac = array();

    $queryMunis = municipios($connectMySql);
    $queryRegiones = regiones($connectMySql);
    $queryTypAtrac = tiposAtractivos($connectMySql);
    // ----------------- ATRACTIVOS TURISTICOS -----------------
    $query_rsQueryAtractivos = sprintf("SELECT g.*, r.*, m.*, t.*, a.*
       FROM atractivos_tb a
       LEFT JOIN gallery_tb g ON a.atrac_id = g.gal_dif and gal_type = 2
       LEFT JOIN regiones_tb r ON a.atrac_reg_id = r.reg_id
       LEFT JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
       LEFT JOIN type_atrac_tb t ON a.atrac_type = t.id_typ_atrac
       ORDER BY a.atrac_id  desc");
    $rsQueryAtractivos = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryAtractivos);
    $row_rsQueryAtractivos = mysqli_fetch_assoc($rsQueryAtractivos);
    $totalRows_rsQueryAtractivos = mysqli_num_rows($rsQueryAtractivos);
    $queryAtractivos = array();
    // echo $query_rsQueryAtractivos;

    $final = array();
    if ($totalRows_rsQueryAtractivos > 0) {
        do {
            array_push($queryAtractivos, array(
                'id' => $row_rsQueryAtractivos['atrac_id'],
                'muni_id' => $row_rsQueryAtractivos['atrac_muni_id'],
                'id_typ_atrac' => $row_rsQueryAtractivos['atrac_type'],
                'reg_id' => $row_rsQueryAtractivos['atrac_reg_id'],
                'name' => $row_rsQueryAtractivos['atrac_name'],
                'desc_short' => $row_rsQueryAtractivos['atrac_cover_text'],
                'desc' => $row_rsQueryAtractivos['atrac_desc'],
                'lat' => $row_rsQueryAtractivos['atrac_latitud'],
                'lon' => $row_rsQueryAtractivos['atrac_longitud'],
                'dir' => $row_rsQueryAtractivos['atrac_direcc'],
                'hor' => $row_rsQueryAtractivos['atrac_horario'],
                'mail' => $row_rsQueryAtractivos['atrac_mail'],
                'tel' => $row_rsQueryAtractivos['atrac_tel'],
                'precio' => $row_rsQueryAtractivos['atrac_price'],
                'face' => $row_rsQueryAtractivos['atrac_soc_face'],
                'inst' => $row_rsQueryAtractivos['atrac_soc_inst'],
                'status' => $row_rsQueryAtractivos['atrac_status'],
                'id_img' => $row_rsQueryAtractivos['gal_id'],
                'urlImg' => $row_rsQueryAtractivos['gal_url'],
                'muni_id' => $row_rsQueryAtractivos['muni_id'],
                'muni_name' => $row_rsQueryAtractivos['muni_name'],
                'nat' => $row_rsQueryAtractivos['muni_nat'],
                'cult' => $row_rsQueryAtractivos['muni_cult'],
                'temp' => $row_rsQueryAtractivos['muni_temp'],
                'reg_id' => $row_rsQueryAtractivos['reg_id'],
                'reg_name' => $row_rsQueryAtractivos['reg_name']
            ));
        } while ($row_rsQueryAtractivos = mysqli_fetch_assoc($rsQueryAtractivos));


    }
        // ---------------- PORTADAS ---------------------
        $query_rsQueryGal = sprintf("SELECT * FROM gallery_tb WHERE gal_type = 3 ");
       $rsQueryGal = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryGal);
       $row_rsQueryGal = mysqli_fetch_assoc($rsQueryGal);
       $totalRows_rsQueryGal = mysqli_num_rows($rsQueryGal);
    
       $queryGal = array();
        if ($totalRows_rsQueryGal > 0) {
            do{ 
                array_push($queryGal, array(
                    'url' => $row_rsQueryGal['gal_url'],
                    'idElemento' => $row_rsQueryGal['gal_dif'],
                    'id' => $row_rsQueryGal['gal_id']
                ));
            } while ($row_rsQueryGal = mysqli_fetch_assoc($rsQueryGal));
            //print_r(json_encode($QueryRegiones));
            
        }
        // var_dump($queryTypAtrac);

        $final = array(
            'regs' => $queryRegiones,
            'munis' => $queryMunis,
            'atracs' => $queryAtractivos,
            'typAtrac' => $queryTypAtrac,
            'ports' => $queryGal,
        );
        
        print_r(json_encode($final));
        // echo '-------------------------------';
    
}



function municipios($connectMySql){
    // ---------------------- MUNICIPIOS -----------------------------
        // echo 'municipios';
        $query_rsQueryMunis = sprintf("SELECT * FROM municipios_tb ");
       $rsQueryMunis = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryMunis);
       $row_rsQueryMunis = mysqli_fetch_assoc($rsQueryMunis);
       $totalRows_rsQueryMunis = mysqli_num_rows($rsQueryMunis);
    
       $queryMunis = array();
        if ($totalRows_rsQueryMunis > 0) {
            do{ 
                array_push($queryMunis, array(
                    'id' => $row_rsQueryMunis['muni_id'],
                    'reg' => $row_rsQueryMunis['muni_reg_id'],
                    'temp' => $row_rsQueryMunis['muni_temp'],
                    'cult' => $row_rsQueryMunis['muni_cult'],
                    'nat' => $row_rsQueryMunis['muni_nat'],
                    'name' => $row_rsQueryMunis['muni_name']
                ));
            } while ($row_rsQueryMunis = mysqli_fetch_assoc($rsQueryMunis));
           // print_r(json_encode($QueryRegiones));
        }
        return $queryMunis;
}


function regiones($connectMySql){
    // ------------------ REGIONES -------------------------
        // echo 'consulta regiones';
        $query_rsQueryRegiones = sprintf("SELECT * FROM regiones_tb ");
       $rsQueryRegiones = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryRegiones);
       $row_rsQueryRegiones = mysqli_fetch_assoc($rsQueryRegiones);
       $totalRows_rsQueryRegiones = mysqli_num_rows($rsQueryRegiones);
    
       $queryRegiones = array();
        if ($totalRows_rsQueryRegiones > 0) {
            do{ 
                array_push($queryRegiones, array(
                    'id' => $row_rsQueryRegiones['reg_id'],
                    'name' => $row_rsQueryRegiones['reg_name']
                ));
            } while ($row_rsQueryRegiones = mysqli_fetch_assoc($rsQueryRegiones));
            //print_r(json_encode($QueryRegiones));
        
        }
       return $queryRegiones;
}

function tiposAtractivos($connectMySql){
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    // ---------------------- TIPOS DE ATRACTIVOS  -----------------------------
        // echo 'tipos de atractivos';
        $query_rsQueryTypAtrac = sprintf("SELECT * FROM type_atrac_tb ");
       $rsQueryTypAtrac = mysqli_query($GLOBALS['connectMySql'], $query_rsQueryTypAtrac);
       $row_rsQueryTypAtrac = mysqli_fetch_assoc($rsQueryTypAtrac);
       $totalRows_rsQueryTypAtrac = mysqli_num_rows($rsQueryTypAtrac);
    
       $queryTypAtrac = array();
        if ($totalRows_rsQueryTypAtrac > 0) {
            do{ 
                array_push($queryTypAtrac, array(
                    'id' => $row_rsQueryTypAtrac['id_typ_atrac'],
                    'name' => $row_rsQueryTypAtrac['name_typ_atrac']
                ));
            } while ($row_rsQueryTypAtrac = mysqli_fetch_assoc($rsQueryTypAtrac));
            //print_r(json_encode($QueryRegiones));
            
        }
        return $queryTypAtrac;
}

?>