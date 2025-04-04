<?php
	class input_googlemaps {
	/*
	*Clase: Google Maps
	@return: mapa de google 
	*/
		
		// Propiedades
			/* 1) Spry */ 
			public $long; 
			/* 2) Name */ 
			public $lat; 
			/* 3) Label */ 
			public $zoom; 
			/* 4) tooltip */ 
			public $tooltip; 
			/* 5) size */ 
			public $size; 
			/* 6) label */ 
			public $label; 
			
		function setData($the_long, $the_lat, $the_zoom, $the_tooltip,$size,$label){
			/** 		
				* Asignar datos a la variable
				* @return none
			**/
			$this->long = $the_long; $this->lat = $the_lat; $this->zoom = $the_zoom; $this->tooltip = $the_tooltip;
			$this->size = $size; $this->label = $label; 
			
		}
			
		function display(){
			/** 		
				* Mostrar el Input en el DOM
				* @return spry or input
			**/

			// Asignar valores si existen o no. 
			$this->long = ($this->long) ? $this->long : '-106.06910040000002';
			$this->lat = ($this->lat) ? $this->lat : '28.6329957';
			$this->zoom = ($this->zoom) ? $this->zoom : '11';	
			$this->size = ($this->size) ? $this->size : '1x' ;
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
				$output .= '
					<label class="label_spry">'.$this->label.'</label>
					<fieldset class="gllpLatlonPicker" style="border:none;">
					
					<input type="text" class="gllpSearchField aTextField" id="mapSearch" name="no_reg" style="max-width:300px; display:inline-block;">
					<input type="button" class="gllpSearchButton sendBtn" id="mapBtn" name="no_reg" style="display:inline-block;" value="Buscar">
					<br/><br/>
					<div class="gllpMap" style="width:100%;">Google Maps</div>
					<br/>
					<div style="display:none">lat/lon:
				    <input type="text" class="gllpLatitude" name="map_lat" id="map_lat" value="' . $this->lat . '"/>
					/
					<input type="text" class="gllpLongitude" name="map_long" id="map_long" value="' . $this->long . '"/>
					zoom: <input type="text" class="gllpZoom" name="map_zoom" id="map_zoom" value="' . $this->zoom . '"/>
					<input type="button" class="gllpUpdateButton" name="no_reg" value="update map">
					</div>
					<br/>
					</fieldset>
				';
				$output .= '</section>';
						
			return $output;
		}
	} // [END CLASS] input_textfield
	
?>