<?php

Abstract Class GR_Controller_Base {

		protected $registry;	
	
		public function __construct(){
			$this->registry = GR_registry::getInstance();
			//$this->load = new Load;
		}


        abstract function index();
		
		final public function __get($key){
			if($return = $this->registry->$key){
				return $return;
			}
			return false;
		}
        
}

?>