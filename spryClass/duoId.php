<?php
	// incluimos la conexión a la base de datos include ("../../../../sudi_assets/connectMySql.php");
	include ("../../../sudi_assets/connectMySql.php");
?>
<?php

 $query_rsData_2 = "SELECT ".$_POST['field_name'].", ".$_POST['field_id']." FROM ".$_POST['table']." WHERE ".$_POST['field_commun']." = ".$_POST['old_id']." GROUP BY ".$_POST['field_name'].";";
 
 //echo $query_rsData_2;
 
 $rsData_2 = mysqli_query($connectMySql, $query_rsData_2) or die(mysqli_error($connectMySql));
 if( $rsData_2 ) {
	$row_rsData_2 = mysqli_fetch_assoc($rsData_2);
	$totalRows_rsData_2 = mysqli_num_rows($rsData_2);
 }
 $contenido = '';
 $return = new stdClass();
 $return -> Resultado = array();


 do{
	array_push($return -> Resultado, array('value'=>$row_rsData_2['town_id'], 'label'=>$row_rsData_2['town_nombre']));
 } while ($row_rsData_2 = mysqli_fetch_assoc($rsData_2));
 mysqli_data_seek($rsData_2, 0);
 $row_rsDatos = mysqli_fetch_assoc($rsData_2);
  
 echo json_encode($return);


//echo $contenido;
?>