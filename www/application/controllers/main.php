<?php
Class GR_Controller_main Extends GR_Controller_Base {
		
	public function __construct(){
		parent::__construct();
	}

        function index() {
        	$this->registry->smarty->display('welcome.tpl');
	 }

}
?>