<?php
/* 
 * GRframework 
 * 
 *  Application development framework for PHP 5.1.6 or newer
 * 
 * @author		Grigorieff Mike | SkyMediaTechnologies Dev Team
 * @copyright	Copyright (c) 2011, SkyMediaTechnologies
 * @license		http://fw.skymediatechnologies.com/license/
 * @link				http://fw.skymediatechnologies.com
 * @since			Version 1.0
 */


/*
 * Registry Class 
 */ 


class GR_registry {
	
	private static $vars = array();
	
	private static $instance;
	
	
	private function __construct() {}
	
	public static function getInstance() {
		if ( empty(self::$instance) ) {
			self::$instance = new GR_registry();
		}
		return self::$instance;
	}
	
	
	// Устанавливаем значение в $vars
	
	public function __set($key, $var) {
		if (isset( self ::$vars[$key] ) == true ) {	
	    	throw new Exception('Unable to set var `' . $key . '`. Already set.');
	    }
	
	    self :: $vars[$key] = $var;

	    return ( true );
	        
	}
	
	
	// Забираем значение из $vars
	public function __get($key) {
	
	        if (isset(self :: $vars[$key]) == false) {
		                return ( NULL );
	        }
	        return ( self :: $vars[$key] );
	
	}
	
	
	public function __clone() { 	}
	  	
}

?>