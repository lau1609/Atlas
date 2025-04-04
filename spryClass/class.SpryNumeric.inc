<?php
	class input_numeric {
	/*
	*Clase: Input de texto
	@return: Input con varias opciones
	@propiedades:
		.type
			* real
			* float
			* integer
	*/
		
		// Propiedades
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name; 
			/* 3) Label */ 
			public $label; 
			/* 4) Hint */ 
			public $hint; 
			/* 5) Required */ 
			public $required; 
			/* 6) Size */ 
			public $size; 
			/* 7) Type */ 
			public $type;
			/* 8) Step */ 
			public $step; 
			/* 9) Min */ 
			public $min; 
			/* 10) Max */ 
			public $max; 
			/* 11) Tooltip */ 
			public $tooltip; 
			/* 12) Class */ 
			public $class; 
			/* 13) Action */ 
			public $action; 
			/* 14) Dato */ 
			public $data; 
			/* 15) Msg_required */ 
			public $msg_required; 
			/* 16) noManage */ 
			public $noManage; 
			
		function setData($the_spry, $the_name, $the_label, $the_hint, $the_required, $the_size, $the_type, $the_step, $the_min, $the_max, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_msg_noValid, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size; $this->type = $the_type; $this->step = $the_step; $this->min = $the_min; $this->max = $the_max; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $data; $this->msg_required = $the_msg_required; $this->msg_noValid = $the_msg_noValid; $this->noManage = $the_noManage;
			
		}
			
		function display(){
			/** 		
				* Mostrar el Input en el DOM
				* @return spry or input
			**/
			
			if(!$this->name){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El input no tiene nombre</span>';	
			}
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->hint = ($this->hint) ? $this->hint : '';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->action == 'edit') ? 'value="'.$this->data.'"' : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			$this->step = ($this->step) ? $this->step : '1';		
			$this->type = ($this->type) ? $this->type : 'integer';			
		
		
			//Si existe valor mínimo
			if($this->min){
				$spryMin = 'minValue:'.$this->min.', ';	
				$spryMax = 'maxValue:'.$this->max.', ';
				
				$inputMin = 'max="'.$this->max.'"';
				$inputMax = 'min="'.$this->min.'"';
			
			}else{
				$spryMin = '';
				$spryMax = '';
				
				$inputMin = '';
				$inputMax = '';
			}
								
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextField("'.$this->spry.'", "'.$this->type.'", {hint:"'.$this->hint.'",isRequired:'.$this->required.', ' . $spryMin . $spryMax . 'validateOn:["blur"]}); </script>';
				
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
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>  ';             
        				$output .= '<input name="'.$this->name.'" type="number" step="'.$this->step.'" '.$inputMax.' '.$inputMin.' class="aTextField '.$this->noManage.$this->class.'" id="'.$this->name.'"'.$this->data.'>';
						$output .= ($this->required == true) ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : ''; 
						$output .= '<span class="textfieldInvalidFormatMsg errorMessage"">Formato no valido</span>';
						$output .= '<span class="textfieldMinValueMsg errorMessage">El valor m&iacute;nimo es '.$this->min.'</span>';
						$output .= '<span class="textfieldMaxValueMsg errorMessage">El valor m&aacute;ximo es '.$this->max.'</span>';
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_numeric
	
?>