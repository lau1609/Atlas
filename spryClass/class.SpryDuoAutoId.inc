<?php
	class input_duo_auto_id {
	/*
	*Clase: Input auto complete
	@return: Input con varias opciones
	*/

		// Propiedades
			/*=========PRIMER MANAGE============*/
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name;
			/* 3) Field id */ 
			public $id;
			/* 4) Field Name */ 
			public $field; 
			/* 5) Table */ 
			public $table; 
			/* 6) Label */ 
			public $label; 
			/* 7) Hint */ 
			public $hint; 
			/* 8) Required */ 
			public $required; 
			/* 9) Size */ 
			public $size; 
			/* 10) Tooltip */ 
			public $tooltip; 
			/* 11) Class */ 
			public $class; 
			/* 12) Action */ 
			public $action; 
			/* 13) Dato */ 
			public $data; 
			/* 14) Msg_required */ 
			public $msg_required;  
			/* 15) noManage */ 
			public $noManage;
			/*=========SEGUNDO MANAGE============*/
			/* 16) Spry */ 
			public $spry_2;
			/* 17) Name */ 
			public $name_2;
			/* 18) Field id */ 
			public $id_2;
			/* 19) Field Name */ 
			public $field_2; 
			/* 20) Table */ 
			public $table_2; 
			/* 21) Label */ 
			public $label_2; 
			/* 22) Hint */ 
			public $hint_2;
			/* 23) Tooltip */ 
			public $tooltip_2; 
			/* 24) Class */ 
			public $class_2;
			/* 25) Dato */ 
			public $data_2; 
			/* 26) Msg_required */ 
			public $msg_required_2;
			/* 27) noManage */ 
			public $noManage_2;
			/* 28) fielCommun*/
			public $fieldCommun;
			
			
		function setData($the_spry, $the_name, $the_id, $the_field, $the_table, $the_label, $the_hint, $the_required, $the_size, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage, $the_spry_2, $the_name_2, $the_id_2, $the_field_2, $the_table_2, $the_label_2, $the_hint_2, $the_tooltip_2, $the_class_2, $the_data_2, $the_msg_required_2, $the_noManage_2, $thefieldCommun){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->id = $the_id; $this->field = $the_field; $this->table = $the_table; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage; $this->spry_2 = $the_spry_2; $this->name_2 = $the_name_2; $this->id_2 = $the_id_2; $this->field_2 = $the_field_2; $this->table_2 = $the_table_2; $this->label_2 = $the_label_2; $this->hint_2 = $the_hint_2; $this->tooltip_2 = $the_tooltip_2; $this->class_2 = $the_class_2; $this->data_2 = $the_data_2; $this->msg_required_2 = $the_msg_required_2; $this->noManage_2 = $the_noManage_2; $this->fieldCommun = $thefieldCommun;
			
		}
		
		function display(){
			/** 		
				* Mostrar el Input en el DOM
				* @return spry or input
			**/
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			
			if(!$this->name){
				return '<span class="inputError"><i class="fa fa-warning"></i> Error: El input no tiene nombre</span>';	
			}
			if(!$this->name_2){
				return '<span class="inputError"><i class="fa fa-warning"></i> Error: El input no tiene nombre</span>';	
			}
			// Asignar valores si existen o no.
			/*Valores Gral.*/
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->required = ($this->required == true) ? 'true' : 'false';
			
			/*Inputs 1*/
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->hint = ($this->hint) ? $this->hint : '';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->data) ? $this->data : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			
			/*Inputs 2*/
			$this->label_2 = ($this->label_2) ? $this->label_2 : '';
			$this->noManage_2 = ($this->noManage_2 == true) ? '' : 'spryManage ';
			$this->hint_2 = ($this->hint_2) ? $this->hint_2 : '';
			$this->class_2 = ($this->class_2) ? $this->class_2 : '';
			$this->data_2 = ($this->data_2) ? $this->data_2 : '';
			$this->msg_required_2 = ($this->msg_required_2) ? $this->msg_required_2 : 'Requerido';
			
			
			
			
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextField("'.$this->spry.'", "none", {hint:"'.$this->hint.'", isRequired:'.$this->required.', validateOn:["blur"]}); </script>';
				
			}else{
				$idSpry = $classSpry = '';
				$spryWidget = '';
			}
			
			/*Inputs 2*/
			//Si es Spry_2
			if($this->spry_2){
				//Id del Spry
				$idSpry_2 = 	' id="'.$this->spry_2 .'" ';
				$classSpry_2 = 'Spry';
				
				$spryWidget_2 = '<script type="text/javascript"> 	var '.$this->spry_2.' = new Spry.Widget.ValidationTextField("'.$this->spry_2.'", "none", {hint:"'.$this->hint_2.'", isRequired:'.$this->required.', validateOn:["blur"]}); </script>';
				
			}else{
				$idSpry_2 = $classSpry_2 = '';
				$spryWidget_2 = '';
			}
						
			//Si existe Tooltip
			if($this->tooltip){
				$thisTooltip = '<span class="tooltipQuestion tooltip" data-tip-type="text" data-tip-source="'.$this->tooltip.'"><i class="fa fa-question"></i></span>';
			}else{
				$thisTooltip = '';
			}	
			
			/*Inputs 2*/
			//Si existe Tooltip
			if($this->tooltip_2){
				$thisTooltip_2 = '<span class="tooltipQuestion tooltip" data-tip-type="text" data-tip-source="'.$this->tooltip_2.'"><i class="fa fa-question"></i></span>';
			}else{
				$thisTooltip_2 = '';
			}			
			
			// incluimos la conexión a la base de datos
			//include ("../../../../sudi_assets/connectMySql.php");
			
			// Resultado
				$output ='';
				
				//Query
				$query_rsData = sprintf("SELECT %s, %s FROM %s GROUP BY %s;", $this->field, $this->id, $this->table, $this->field);
				
				// Jquery Result	
				$rsData = $mysqli->query($query_rsData);
				
				$row_rsData = $rsData->fetch_assoc();
				
				$theRaw = "";
				
				$output .= '
					<script type="text/javascript">
						$(document).ready(function(e) {	
						var raw = [';
								/*$query_rsData = "SELECT ".$this->field.", ".$this->id." FROM ".$this->table." GROUP BY ".$this->field.";";
								$rsData = mysqli_query($connectMySql, $query_rsData) or die(mysqli_error($connectMySql));
								if( $rsData ) {
									$row_rsData = mysqli_fetch_assoc($rsData);
									$totalRows_rsData = mysqli_num_rows($rsData);
								}
								$theRaw = "";*/
								do {  
									$theRaw .= "{ value: ".$row_rsData[$this->id] . ", label: '".$row_rsData[$this->field]."' },";
								} while($row_rsData = mysqli_fetch_assoc($rsData));	
								$theRaw .= '';
								//$theRaw .= rtrim($theRaw,",");
							$output .= $theRaw;
						$output .= '];
						var source  = [ ];
						var mapping = { };
						for(var i = 0; i < raw.length; ++i) {
							source.push(raw[i].label);
							mapping[raw[i].label] = raw[i].value;
						}            
							$(".'.$this->name.'").autocomplete({
								source: source,
								select: function (event, ui) {
									return false;
								},
								select: function (event, ui) {
									$(this).val(ui.item ? ui.item : " ");
									$("#'.$this->name.'").val(mapping[ui.item.value]);
									},
								
								change: function (event, ui) {
									if (!ui.item) {
										this.value = "";
										alert($("#'.$this->name.'").val());
										$("#'.$this->name.'").val("");
									}
									else{
										//alert("'.$this->field_2.'");
										//alert("field_id '.$this->id_2.'");
										//alert("table '.$this->table_2.'");
										//alert("field_commun '.$this->fieldCommun.'");
										//alert("old_id '.$this->name.'");
										var old_id_value = $("#'.$this->name.'").val();
										//alert(old_id_value);
										//alert("field_name='.$this->field_2.'&field_id='.$this->id_2.'&table='.$this->table_2.'&field_commun='.$this->fieldCommun.'&old_id="+old_id_value);
										//alert($("#'.$this->name.'").val());
										 $(".'.$this->name_2.'").val("");
										 $.ajax({
											 url: "./_phpClasses/duoId.php", //ruta a donde se enviaran los datos
											 dataType: "json",
											 type: "POST", //por que metodo se enviaran las variables
											 data: "field_name='.$this->field_2.'&field_id='.$this->id_2.'&table='.$this->table_2.'&field_commun='.$this->fieldCommun.'&old_id="+old_id_value,
											 success: function(data){
												var raw = data["Resultado"];
												var source  = [ ];
												var mapping = { };
												for(var i = 0; i < raw.length; ++i) {
													source.push(raw[i].label);
													mapping[raw[i].label] = raw[i].value;
												}            
													$(".'.$this->name_2.'").autocomplete({
														source: source,
														select: function (event, ui) {
															return false;
														},
														select: function (event, ui) {
															$(this).val(ui.item ? ui.item : " ");
															$("#'.$this->name_2.'").val(mapping[ui.item.value]);
															},
														
														change: function (event, ui) {
															if (!ui.item) {
																this.value = "";
																//alert($("#'.$this->name_2.'").val());
																$("#'.$this->name_2.'").val("");
															}
															else{
																
															}
														}
													});
											   }
							 			  });
									}
								}
							});
						});
					</script>
				';
				
				$theData = ($this->action == 'edit') ? 'value="'.$this->data.'"' : '';
				if($this->action == 'edit'){
					/*$query_rsDataEdit = "SELECT ".$this->field." FROM ".$this->table." WHERE ".$this->id." = ".$this->data.";";
					$rsDataEdit = mysqli_query($connectMySql, $query_rsDataEdit) or die(mysqli_error($connectMySql));
					if( $rsDataEdit ) {
						$row_rsDataEdit = mysqli_fetch_assoc($rsDataEdit);
						$totalRows_rsDataEdit = mysqli_num_rows($rsDataEdit);
					}
					$theTextData = 'value="'. $row_rsDataEdit[$this->field].'"';*/
					
					//Query
					$query_rsDatas = sprintf("SELECT %s FROM %s WHERE %s = %s;", $this->field, $this->table, $this->id, $this->data);
					
					//echo $query_rsDatas.' id='.$this->data;
					// Jquery Result	
					$rsDatas = $mysqli->query($query_rsDatas);
					
					$row_rsDatasEdit = $rsDatas->fetch_assoc();
					
					$theTextData_2 = 'value="'. $row_rsDatasEdit[$this->field].'"';
					
				}else{
					$theTextData_2 = '';	
				}
				
				//SEGUNDO INPUT
				$theData_2 = ($this->action == 'edit') ? 'value="'.$this->data_2.'"' : '';
				if($this->action == 'edit'){
					/*$query_rsDataEdit = "SELECT ".$this->field_2." FROM ".$this->table_2." WHERE ".$this->id_2." = ".$this->data_2.";";
					$rsDataEdit = mysqli_query($connectMySql, $query_rsDataEdit) or die(mysqli_error($connectMySql));
					if( $rsDataEdit ) {
						$row_rsDataEdit = mysqli_fetch_assoc($rsDataEdit);
						$totalRows_rsDataEdit = mysqli_num_rows($rsDataEdit);
					}
					$theTextData = 'value="'. $row_rsDataEdit[$this->field_2].'"';*/
					
					//Query
					$query_rsData = sprintf("SELECT %s FROM %s WHERE %s = %s;", $this->field_2, $this->table_2, $this->id_2, $this->data_2);
					
					
					// Jquery Result	
					$rsData = $mysqli->query($query_rsData);
					
					$row_rsDataEdit = $rsData->fetch_assoc();
					
					$theTextData = 'value="'. $row_rsDataEdit[$this->field_2].'"';
				}else{
					$theTextData = '';	
				}
				
				
				//PRIMER INPUT
				$output .= '<section class="input_section input_'.$this->size.'">';
				$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>';
						$output .= '<input name="autocompleteById" type="text" class="aTextField '.$this->name.' '.$this->noManage.$this->class.'" id="autocompleteById"'.$theTextData.'>';
						$output .= '<input type="hidden" '.$the_data.' name="'.$this->name.'" id="'.$this->name.'">';
						$output .= ($this->required == 'true') ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
				
				
				
				//SEGUNDO INPUT
				$output .= '<section class="input_section input_'.$this->size.'">';
				$output .= $thisTooltip_2;
					$output .= '<span '.$idSpry_2.'class="'.$classSpry_2.'">';
						$output .= '<label for="'.$this->name_2.'" class="label_spry">'.$this->label_2.'</label>';
						$output .= '<input name="autocompleteById" type="text" class="aTextField '.$this->name_2.' '.$this->noManage_2.$this->class_2.'" id="autocompleteById"'.$theTextData_2.'>';
						$output .= '<input type="hidden" '.$the_data_2.' name="'.$this->name_2.'" id="'.$this->name_2.'">';
						$output .= ($this->required == 'true') ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required_2.'</span>' : '';
					$output .= '</span>';
					$output .= $spryWidget_2;
				$output .= '</section>';
				
		
			return $output;
		}
	} // [END CLASS] input_auto_by_id
	
?>