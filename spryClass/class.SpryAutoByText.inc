<?php
	class input_auto_by_text {
	/*
	*Clase: Input auto complete
	@return: Input con varias opciones
	*/

		// Propiedades
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name;
			/* 3) Field Name */ 
			public $field; 
			/* 4) Table */ 
			public $table; 
			/* 5) Label */ 
			public $label; 
			/* 6) Hint */ 
			public $hint; 
			/* 7) Required */ 
			public $required; 
			/* 8) Size */ 
			public $size; 
			/* 9) Tooltip */ 
			public $tooltip; 
			/* 10) Class */ 
			public $class; 
			/* 11) Action */ 
			public $action; 
			/* 12) Dato */ 
			public $data; 
			/* 13) Msg_required */ 
			public $msg_required;  
			/* 14) noManage */ 
			public $noManage; 
			
		function setData($the_spry, $the_name, $the_field, $the_table, $the_label, $the_hint, $the_required, $the_size, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->field = $the_field; $this->table = $the_table; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
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
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->data = ($this->action == 'edit') ? 'value="'.$this->data.'"' : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->hint = ($this->hint) ? $this->hint : '';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			
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
			
			// Resultado
				$output ='';
				
				//Query
					$query_rsData = sprintf("SELECT %s FROM %s GROUP BY %s;", $this->field, $this->table, $this->field);
					//echo $query_rsData;
					// Jquery Result	
					$rsData = $mysqli->query($query_rsData);
					
					$row_rsData = $rsData->fetch_assoc();
					
					$theRaw = "";
				
				$output .= '
					<script type="text/javascript">
						$(document).ready(function(e) {	
						var source = [';
								do { 
									$theRaw .= "'".$row_rsData[$this->field]."',";
								} while($row_rsData = mysqli_fetch_assoc($rsData));	
								$theRaw .= '';
								//$theRaw .= rtrim($theRaw,",");
							$output .= $theRaw;
						$output .= '];
							$("#'.$this->name.'").autocomplete({
								source: source
							});		
						});
					</script>
				';

				$output .= '<section class="input_section input_'.$this->size.'">';
				$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>';
						$output .= '<input name="'.$this->name.'" id="'.$this->name.'" type="text" class="aTextField '.$class.'" '.$this->data.'>';
						$output .= ($this->required == 'true') ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
		
			return $output;
		}
	} // [END CLASS] input_auto_by_text
	
?>