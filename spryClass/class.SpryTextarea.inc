<?php
	class input_textarea {
	/*
	*Clase: Textarea
	@return: Textarea con varias opciones

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
			/* 7) Min */ 
			public $min; 
			/* 8) Max */ 
			public $max; 
			/* 9) cleditor*/
			public $cleditor;
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
			
		function setData($the_spry, $the_name, $the_label, $the_hint, $the_required, $the_size, $the_min, $the_max, $the_cleditor, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size;  $this->min = $the_min; $this->max = $the_max; $this->cleditor = $the_cleditor; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
		}
			
		function display(){
			/** 		
				* Mostrar el Textarea en el DOM
				* @return spry or textarea
			**/
			
			if(!$this->name){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El textarea no tiene nombre</span>';	
			}
			
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->hint = ($this->hint) ? $this->hint : '';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->action == 'edit') ? $this->data : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';	
			$this->cleditor = ($this->cleditor == true) ? 'cleditor' : '' ;	
			
			//Si exite un máximo de caracteres
			if($this->max) {				 
				$maxMessage = '<span class="textareaMaxCharsMsg errorMessage">M&aacute;ximo '.$this->max.' caracteres</span>';
				$this->max = ' maxChars:'.$this->max.', ';
			}else{	
				$this->max  = ' ';
				$maxMessage = '';
			}
			
			//Si exite un mínimo de caracteres
			if($this->min) {				
				$minMessage = '<span class="textareaMinCharsMsg errorMessage">M&iacute;nimo '.$this->min.' caracteres</span>';
				$this->min = ' minChars:'.$this->min.', ';
			}else{	
				$this->min  = ' ';
				$minMessage = '';
			}
						
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextarea("'.$this->spry.'", {hint:"'.$this->hint.'",'.$this->min.$this->max.'isRequired:'.$this->required.', validateOn:["blur"]}); </script>';
				
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
				$output .='';
				$output .= '<section class="input_section input_'.$this->size.'">';
					$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>  ';
						$output .= '<textarea name="'.$this->name.'" class="aTextArea '.$this->cleditor.' '.$this->noManage.$this->class.'" id="'.$this->name.'" cols="45" rows="5">'.$this->data.'</textarea>';
						$output .= ($this->required == true) ? '<span class="textareaRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
						$output .= $minMessage;
						$output .= $maxMessage;
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_textarea
	
?>