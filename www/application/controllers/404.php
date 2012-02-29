<?php
Class GR_Controller_404 Extends GR_Controller_Base {
		
		public function __construct(){
			parent::__construct();
		}

        function index() {
        		$this->registry->smarty->display('404.tpl');
	    }
}
?>