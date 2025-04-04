<?php
	class input_auto_by_id {
	/*
	*Clase: Input auto complete
	@return: Input con varias opciones
	*/

		// Propiedades
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
			
		function setData($the_spry, $the_name, $the_id, $the_field, $the_table, $the_label, $the_hint, $the_required, $the_size, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->id = $the_id; $this->field = $the_field; $this->table = $the_table; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
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
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->action = ($this->data)? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->hint = ($this->hint) ? $this->hint : '';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->data) ? $this->data : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			
			if($this->field){
				$campos = "";
				$busqueda = "";
				$acum = 0;
				for ($i = 1; $i <= count($this->field); $i++) {
					$campos .= $this->field[$acum].', " ", ';
					$acum++;
					
				}
				$campos = substr($campos, 0, -2);
				
				//echo $campos;
				
				$campos = "CONCAT (".$campos.") AS concatenacion ";
			}
			//print_r($this->field); exit;
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
						
			//Si existe Tooltip
			if($this->tooltip){
				$thisTooltip = '<span class="tooltipQuestion tooltip" data-tip-type="text" data-tip-source="'.$this->tooltip.'"><i class="fa fa-question"></i></span>';
			}else{
				$thisTooltip = '';
			}			
			
			$thisID = randomCode(4);
		
			// Resultado
				$output ='';
				
				//Query
					$query_rsData = sprintf("SELECT %s, %s, %s FROM %s WHERE hideField = 0 GROUP BY %s;", $campos, $this->field[0], $this->id, $this->table, $this->field[0]);
					// echo $query_rsData; //exit;
					// Jquery Result	
					$rsData = $mysqli->query($query_rsData);
					
					$row_rsData = $rsData->fetch_assoc();
					
					$theRaw = "";
				
				$output .= '
					<script type="text/javascript">
						
						$(document).ready(function(e) {	
						
						
						
						var raw = [';
								
								
								do {  
									$theRaw .= "{ value: ".$row_rsData[$this->id] . ", label: '".$row_rsData['concatenacion']."' },";
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
							$(".'.$this->name.'_'.$thisID.'").autocomplete({
								
								//console.log("creando auto complete");
								source: source,
								select: function (event, ui) {
									return false;
								},
								select: function (event, ui) {
									$(this).val(ui.item ? ui.item : " ");
									$("#'.$this->name.'_'.$thisID.'").val(mapping[ui.item.value]);
									},
								
								change: function (event, ui) {
									if (!ui.item) {
										this.value = "";
										$("#'.$this->name.'_'.$thisID.'").val("");
										console.log("ho hay selecion");
									}
									else{
										console.log("ho hay selecion");
									}
								}
							});			
						
						
						}); 
						
					</script>
				';
				
				$theData = ($this->action == 'edit') ? 'value="'.$this->data.'"' : '';
				
				
				if($this->action == 'edit'){
					//Query
								$query_rsData = sprintf("SELECT %s FROM %s WHERE %s = %s;", $campos, $this->table, $this->id, $this->data);
								
								// Jquery Result	
								$rsData = $mysqli->query($query_rsData);
								
								$row_rsDataEdit = $rsData->fetch_assoc();
					
					$theTextData = 'value="'. $row_rsDataEdit['concatenacion'].'"';
				}else{
					$theTextData = '';	
				}
				
				$output .= '<section class="input_section input_'.$this->size.'">';
				$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>';
						$output .= '<input name="autocompleteById" type="text" class="aTextField '.$this->name.'_'.$thisID.' '.$this->noManage.$this->class.'" id="autocompleteById"'.$theTextData.'>';
						$output .= '<input type="hidden" '.$the_data.' name="'.$this->name.'" id="'.$this->name.'_'.$thisID.'">';
						$output .= ($this->required == 'true') ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
		
			return $output;
		}
	} // [END CLASS] input_auto_by_id
	
?>