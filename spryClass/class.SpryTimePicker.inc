<?php
	class input_timepicker {
	/*
	*Clase: Input de tiempo
	@return: Input con varias opciones
	*/

		// Propiedades
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name; 
			/* 3) Label */ 
			public $label;  
			/* 4) Required */ 
			public $required; 
			/* 5) Size */ 
			public $size;  
			/* 6) Min */ 
			public $min; 
			/* 7) Max */ 
			public $max; 
			/* 8) Tooltip */ 
			public $tooltip; 
			/* 9) Class */ 
			public $class; 
			/* 10) Action */ 
			public $action; 
			/* 11) Dato */ 
			public $data; 
			/* 12) Msg_required */ 
			public $msg_required; 
			/* 13) noManage */ 
			public $noManage; 
			
		function setData($the_spry, $the_name, $the_label, $the_required, $the_size, $the_min, $the_max, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->required = $the_required; $this->size = $the_size; $this->min = $the_min; $this->max = $the_max; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
		}
			
		function display(){
			/** 		
				* Mostrar el Input en el DOM
				* @return spry or input
			**/
			
			if(!$this->name){
				return '<span class="inputError"><i class="fa fa-warning"></i> Error: El input no tiene nombre</span>';	
			}
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->action == 'edit') ? 'value="'.$this->data.'"' : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			$this->max = ($this->max) ? 'max="'.$this->max.'"' : '';
			$this->min = ($this->min) ? 'min="'.$this->min.'"' : '';
		
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextField("'.$this->spry.'", "none", {isRequired:"'.$this->required.'", validateOn:["blur"]}); </script>';
				
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
				$output .= '<section class="input_section input_'.$this->size.'">';
					$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>  ';
						$output .= '<input name="'.$this->name.'" type="time" class="aTextField '.$this->noManage.$this->class.'" '.$this->min.' '.$this->max.' id="'.$this->name.'" '.$this->data.'>';
						$output .= ($this->required == true) ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : ''; 
						$output .= '<span class="textfieldInvalidFormatMsg errorMessage"">Formato no v&aacute;lido</span>';

					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_time_picker
	
?>