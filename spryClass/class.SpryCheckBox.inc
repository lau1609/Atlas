<?php
	class input_checkbox {
	/*
	*Clase: CheckBox
	@return: CheckBox con varias opciones
	@propiedades:
	*/
	
		/* Opciones */			
		//$options = array();
		//array_push($options,array('ex_viajes','Pais','1',$row_rsData['ex_viajes']));
		//array_push($options,array('ex_viajes_2','Estado','1',$row_rsData['ex_viajes_2']));

		// Propiedades
		/* 1) Spry */ 
		public $spry; 
		/* 2) options */ 
		public $options; 
		/* 3) Label */ 
		public $label;  
		/* 4) Required */ 
		public $required; 
		/* 6) Size */ 
		public $size; 
		/* 7) Min */ 
		public $min; 
		/* 8) Max */ 
		public $max; 
		/* 9) Tooltip */ 
		public $tooltip; 
		/* 10) Action */ 
		public $action; 
		/* 11) Dato */ 
		public $data; 
		/* 12) Msg_required */ 
		public $msg_required; 
		/* 13) noManage */ 
		public $noManage; 
			
		function setData($the_spry, $the_options, $the_label, $the_required, $the_size, $the_min, $the_max, $the_tooltip, $the_action, $the_data, $the_msg_required,$the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->options = $the_options; $this->label = $the_label; $this->required = $the_required; $this->size = $the_size; $this->min = $the_min; $this->max = $the_max; $this->tooltip = $the_tooltip; $this->action = $the_action; $this->data = $data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
		}
			
		function display(){
			/** 		
				* Mostrar el o los CheckBox en el DOM
				* @return spry or input
			**/
			
			if(!$this->label){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El CheckBox no tiene nombre</span>';	
			}
			
			if(!$this->options){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El CheckBox no tiene opciones</span>';	
			}
			
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->action == 'edit') ? $this->data : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';	
			
			//Si exite un máximo de opciones
			if($this->max) {				
				$maxMessage = '<span class="checkboxMaxSelectionsMsg errorMessage">Max '.$this->max.' casillas</span>';
				$this->max = ' maxSelections:'.$this->max.', ';
			}else{	
				$this->max  = ' ';
				$maxMessage = '';
			}
			
			//Si exite un mínimo de opciones
			if($this->min) {				
				$minMessage = '<span class="checkboxMinSelectionsMsg errorMessage">Min '.$this->min.' casillas</span>';
				$this->min = ' minSelections:'.$this->min.', ';
			}else{	
				$this->min  = ' ';
				$minMessage = '';
			}
						
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationCheckbox("'.$this->spry.'", {validateOn:["change", "blur"],isRequired:'.$this->required.', '.$this->min.$this->max.'}); </script>';
				
			}else{
				$idSpry = $classSpry = '';
				$spryWidget = '';
			}
						
			//Si existe Tooltip
			if($this->tooltip){
				$thisTooltip = '<span class="tooltipQuestion tooltip" data-tip-type="text" data-tip-source="'.$this->tooltip.'"><i class="icon icon-sudi-help"></i></span>';
			}else{
				$thisTooltip = '';
			}			
			
			// Resultado
				$output ='';
				$output .= '<section class="input_section input_'.$this->size.'">';
					$output .= $thisTooltip;
					$output .= '<label class="label_spry">'.$this->label.'</label>  ';
					$output .= '<section class="aCheckbox">';	
						$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
							for($i=0;$i<count($this->options);$i++){ 
								$theData = (!(strcmp($this->options[$i][3],$this->options[$i][2])) && $this->action == 'edit') ? 'checked="checked"' : '' ;
								$output .= '
								<input name="' . $this->options[$i][0] . '" type="hidden" value="0" '.$theData.'/>
								<input name="' . $this->options[$i][0] . '" type="checkbox" id="'. $this->options[$i][0] . '" value="' . $this->options[$i][2] . '" '.$theData.'/>
								<label for="'. $this->options[$i][0] .'" class="check_label"><span></span>'.$this->options[$i][1] .'</label>
								';
							} 
							$output .= '<br>';
							$output .= ($this->required == true) ? '<span class="checkboxRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
							
							$output .= $minMessage;
							$output .= $maxMessage;
						$output .= '</span>';
						$output .= $spryWidget;
					$output .= '</section>';
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_checkbox
	
?>