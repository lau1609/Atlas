<?php
	class item_data {
	/*
	*Clase: Item Data
	@return: Datos 
	*/
		
		// Propiedades
			/* 1) User Add */ 
			public $user_add; 
			/* 2) Date Add */ 
			public $date_add; 
			/* 3) Hour Add */ 
			public $hour_add; 
			/* 4) User Edit */ 
			public $user_edit; 
			/* 5) Date Edit */ 
			public $date_edit; 
			/* 6) Hour Edit */ 
			public $hour_edit; 
			/* 7) Hide Field */ 
			public $hideField; 
			
		public function __construct($the_user_add,$the_date_add,$the_hour_add,$the_user_edit,$the_date_edit,$the_hour_edit,$the_hideField) {
			$this->user_add=$the_user_add;
			$this->date_add=$the_date_add;
			$this->hour_add=$the_hour_add;
			$this->user_edit=$the_user_edit;
			$this->date_edit=$the_date_edit;
			$this->hour_edit=$the_hour_edit;
			$this->hideField=$the_hideField;
		}
		
		public function display(){
			$item = serialize($this);
			$item_data = unserialize($item);
			//return 'Serializado : '.$item.';
			return print_r($item_data);
			//return var_dump($item_data);
		}
		
		// Metodo magico que permite establecer cuales datos se mostraran y cuales no
		/*public function __sleep() {  
     		return array("user_add", "date_add");  
  		}*/
	} // [END CLASS] item_data
	
?>