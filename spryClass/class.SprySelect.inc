<?php
	class input_select {
	/*
	*Clase: Select
	@return: Select con varias opciones
	*/
	
		/* Opciones */		
		//$options = array();
		//array_push($options,array('Proceso','0'));
		//array_push($options,array('Completo','1'));
		
		// Propiedades
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name; 
			/* 3) Label */ 
			public $label; 
			/* 4) title */ 
			public $title;
			/* 5) options */ 
			public $options; 
			/* 6) Required */ 
			public $required; 
			/* 7) Size */ 
			public $size; 
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
			
		function setData($the_spry, $the_name, $the_label, $the_title, $the_options, $the_required, $the_size, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/  
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->title = $the_title; $this->options = $the_options; $this->required = $the_required; $this->size = $the_size; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
		}
			
		function display(){
			/** 		
				* Mostrar el Select en el DOM
				* @return spry or select
			**/
			
			if(!$this->name){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El select no tiene nombre</span>';	
			}
			
			
			if(!$this->options){
				return '<span class="inputError"><i class="icon icon-sudi-warning"></i> Error: El select esta vacío</span>';	
			}
			
			// Asignar valores si existen o no.
			$this->action = ($this->action) ? $this->action : 'add';
			$this->size = ($this->size) ? $this->size : '1x';
			$this->label = ($this->label) ? $this->label : '';
			$this->noManage = ($this->noManage == true) ? '' : 'spryManage ';
			$this->title = ($this->title) ? $this->title : 'Seleciona una opción';
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->data = ($this->action === 'edit') ? $this->data : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';		
		
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$validValue = ($this->required == 'false') ? '' : 'invalidValue:"-1",' ;
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationSelect("'.$this->spry.'", {'.$validValue.' isRequired:'.$this->required.', validateOn:["blur"]}); </script>';
				
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
						$output .= '<label for="'.$this->name.'" class="label_spry label_select">'.$this->label. '</label>  ';
						$output .= '<select name="'.$this->name.'" class="aSelect '.$this->noManage.$this->class.'" id="'.$this->name.'">';
					    $output .= '<option value="-1" selected="selected" >'.$this->title.'</option>';
					    for($i=0;$i<count($this->options);$i++){ 
							$theData = ($this->data == $this->options[$i][1] && $this->action == 'edit') ? 'selected="selected"' : '' ;
							$output .= '<option value="'.$this->options[$i][1].'" '.$theData.' >'.$this->options[$i][0] .'</option>';
						 }       
					    $output .= '</select>';
			           $output .= ($this->required == 'true') ? '<span class="selectInvalidMsg errorMessage">Seleccione un valor valido.</span>' : '';
						$output .= ($this->required == 'true') ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : '';
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_textfield
	
?>