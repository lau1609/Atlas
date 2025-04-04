<?php
	class input_password {
	/*
	*Clase: Input de texto
	@return: Input con varias opciones
	@propiedades:
		.type
			* integer (Entero)
			* email (Formato de Correo)
			* credit_card (Formato de tarjeta de crédito)
			* currency (Formato de moneda)
			* real (Flotante)
			* ip (Formato de IP)
			* url (Formato de URL)
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
			/* 8) Min */ 
			public $min; 
			/* 9) Max */ 
			public $max; 
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
			/* 16) noManage */ 
			public $noManage; 
			
		function setData($the_spry, $the_name, $the_label, $the_hint, $the_required, $the_size, $the_min, $the_max, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->hint = $the_hint; $this->required = $the_required; $this->size = $the_size; $this->min = $the_min; $this->max = $the_max; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
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
			$this->data = ($this->action == 'edit') ? 'value="password"' : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';
			
			//Si exite un máximo de caracteres
			if($this->max) {				
				$maxMessage = '<span class="textfieldMaxCharsMsg errorMessage">M&aacute;ximo '.$this->max.' caracteres.</span>';
				$this->max = ' maxChars:'.$this->max.', ';
			}else{	
				$this->max  = ' ';
				$maxMessage = '';
			}
			
			//Si exite un mínimo de caracteres
			if($this->min) {				
				$minMessage = '<span class="textfieldMinCharsMsg errorMessage">M&iacute;nimo '.$this->min.' caracteres.</span>';
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
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextField("'.$this->spry.'", "none", {hint:"'.$this->hint.'",'.$this->min.$this->max.'isRequired:'.$this->required.', validateOn:["blur"]}); </script>';
				
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
			
			/*
			<section class="input_section input_<?php echo $input_param[3]; ?>">
			  <span id="<?php echo $input_param[0]; ?>" class="tooltip Spry" data-tip-type="text" data-tip-source="<?php echo $input_param[5]; ?>">
					<label for="<?php echo $input_param[1]; ?>"><?php echo $input_param[2]; ?></label>
					
					<input name="<?php echo $input_param[1]; ?>" type="password" class="aTextField" id="<?php echo $input_param[1]; ?>" <?php echo createVal($action,$row_rsData[$input_param[1]]); ?> />
					<span class="passwordInvalidStrengthMsg errorMessage">El password no esta estructurado correctamente.</span>
					<span class="passwordMinCharsMsg errorMessage">No cumple con m&iacute;nimo de caracteres</span>
					<span class="passwordMaxCharsMsg errorMessage">Excede el M&aacute;ximo de caracteres</span>
			  </span>
			  <script type="text/javascript">var <?php echo $input_param[0]; ?> = new Spry.Widget.ValidationPassword("<?php echo $input_param[0]; ?>", {validateOn:["blur"], minNumbers:0, minUpperAlphaChars:0, minChars:0, maxChars:30, isRequired:<?php echo $input_param[4]; ?>});</script>
			  </section>
			  <!-- ========= PASSWORD (end) ========= -->*/
			
				$output ='';
				$output .= '<section class="input_section input_'.$this->size.'">';
					$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>  ';
						$output .= '<input name="'.$this->name.'" type="password" class="aPassword aTextField '.$this->noManage.$this->class.'" id="'.$this->name.'"'.$this->data.'>';
						$output .= ($this->required == true) ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : ''; 
						
						$output .= $minMessage;
						$output .= $maxMessage;
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_textfield
	
?>