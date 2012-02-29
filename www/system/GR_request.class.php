<?php
class GR_request {
	
	private $controller;
	private $method;
	private $values;

	public function __construct() {
		$parts = explode('/',$_SERVER['REQUEST_URI']);
		$parts = array_filter($parts);
		
		$this -> controller = ( $c = array_shift($parts) ) ? $c : 'main' ;
		$this -> method = ( $c = array_shift($parts) ) ? $c : 'index' ;
		$this -> values = ( isset( $parts[0] ) ) ? $parts : array() ;
	}
	
	public function getController() {
		return $this->controller;
	}
	
	public function getMethod() {
		return $this->method;
	}
	
	public function getValues() {
		
		return $this->values;
	}
	
}
?>
