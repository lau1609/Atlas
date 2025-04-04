<?php
	class input_datepicker {
	/*
	*Clase: Input de fecha
	@return: Input con varias opciones
	@propiedades:
	*/

		// Propiedades
			/* 1) Spry */ 
			public $spry; 
			/* 2) Name */ 
			public $name; 
			/* 3) Label */ 
			public $label; 
			/* 4) MinDate */ 
			public $min; 
			/* 5) MaxDate */ 
			public $max; 
			/* 6) NumMeses */ 
			public $months; 
			/* 7) ShowM */ 
			public $showM;
			/* 8) ShowY */ 
			public $showY;   
			/* 8) Required */ 
			public $required; 
			/* 10) Size */ 
			public $size; 
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
			
		function setData($the_spry, $the_name, $the_label, $the_min, $the_max, $the_months, $the_show_m, $the_show_y, $the_required, $the_size, $the_tooltip, $the_class, $the_action, $the_data, $the_msg_required, $the_noManage){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->spry = $the_spry; $this->name = $the_name; $this->label = $the_label; $this->min = $the_min; $this->max = $the_max; $this->months = $the_months; $this->showM = $the_show_m; $this->showY = $the_show_y; $this->required = $the_required; $this->size = $the_size; $this->tooltip = $the_tooltip; $this->class = $the_class; $this->action = $the_action; $this->data = $the_data; $this->msg_required = $the_msg_required; $this->noManage = $the_noManage;
			
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
			$this->max = ($this->max) ? $this->max : '';
			$this->min = ($this->min) ? $this->min : '';
			$this->months = ($this->months) ? $this->months : '1';
			$this->showM = ($this->showM == true) ? 'changeMonth: true,' : '' ;
			$this->showY = ($this->showY == true) ? 'changeYear: true,' : '' ;
			$this->required = ($this->required == true) ? 'true' : 'false';
			$this->class = ($this->class) ? $this->class : '';
			$this->msg_required = ($this->msg_required) ? $this->msg_required : 'Requerido';		
						
			//Si es Spry
			if($this->spry){
				//Id del Spry
				$idSpry = 	' id="'.$this->spry .'" ';
				$classSpry = 'Spry';
				
				$spryWidget = '<script type="text/javascript"> 	var '.$this->spry.' = new Spry.Widget.ValidationTextField("'.$this->spry.'", "none", {isRequired:'.$this->required.', format:"yyy-mm-dd", validateOn:["blur"]}); </script>';
				
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
			
			$dateDefault = ($this->action == 'edit') ? 'datedefault:"'.str_replace('-','/',$this->data).'",' : '';
			
			
			// Resultado
				$output = '
					<script type="text/javascript">
						$(document).ready(function(e) {
							$("#'.$this->name.'").datepicker({				
								firstDay: 1,
								'.$dateDefault.'
								showButtonPanel: true,
								prevText: "<Ant",
								nextText: "Sig>",
								currentText: "Hoy",
								yearRange: "-100:+15",
								monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
								monthNamesShort: ["Ene","Feb","Mar","Abr", "May","Jun","Jul","Ago","Sep", "Oct","Nov","Dic"],
								dayNames: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
								dayNamesShort: ["Dom","Lun","Mar","Mié","Juv","Vie","Sáb"],
								dayNamesMin: ["Do","Lu","Ma","Mi","Ju","Vi","Sá"],
								weekHeader: "Sm",
								dateFormat: "yy-mm-dd",
								closeText: "Cerrar",                
								constrainInput: false,
								minDate: "'.$this->min.'",
								maxDate: "'.$this->max.'",
								'.$this->showM.'
								'.$this->showY.'
								numberOfMonths: '.$this->months.',
									 onSelect: function(dateText, inst) {
										$("#'.$this->name.'").focus();
										$("#'.$this->name.'").blur(); 
									}
							});
						});
					</script>
				';
				
				$dateValue = ($this->action == 'edit') ? 'value="'.str_replace('/','-',$this->data).'"' : '';
				
				$output .='';
				$output .= '<section class="input_section input_'.$this->size.'">';
					$output .= $thisTooltip;
					$output .= '<span '.$idSpry.'class="'.$classSpry.'">';
						$output .= '<label for="'.$this->name.'" class="label_spry">'.$this->label.'</label>  ';
						$output .= '<i class="icon icon-sudi-calendar date_calendar"></i>';
						$output .= '<input name="'.$this->name.'" type="text" class="aTextField datePickerUi '.$this->noManage.$this->class.'" id="'.$this->name.'"'.$dateValue.' readonly="readonly">';
						
						$output .= ($this->required == true) ? '<span class="textfieldRequiredMsg errorMessage">'.$this->msg_required.'</span>' : ''; 
						$output .= '<span class="textfieldInvalidFormatMsg errorMessage"">Formato no valido</span>';
						
					$output .= '</span>';
					$output .= $spryWidget;
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_textfield
	
?>