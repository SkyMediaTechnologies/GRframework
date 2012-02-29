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
 * Router Class 
 */ 

Class GR_Router {
	
    	public static function route (GR_Request $request ) {
    		$controller = $request ->getController();
    		$method = $request -> getMethod();
    		$values = $request -> getValues();
    		
    		$controllerFile = ROOT . DS . 'application' . DS . 'controllers'. DS . $controller . '.php';
    	        
    		// проверяем существует ли файл и доступен ли он на чтение
    		if (is_readable($controllerFile)) {
	               // подключаем контроллер
	               require_once ($controllerFile);
	               
	               $className =  'GR_Controller_' . $controller;
	               
	               $controller = new $className;
	               
	               $method = (is_callable(array($controller,$method))) ? $method : 'index';
	               
	               if(!empty($values)){
						call_user_func_array(array($controller,$method),$values);
				  }else{	
						call_user_func(array($controller,$method));
				  }	
				 return;
    		}	
    		else {

    			/
    			$controllerFile = ROOT . DS . 'application' . DS . 'controllers'. DS .  '404.php';
    			
    			require_once ($controllerFile);
	         $className =  'GR_Controller_404';
	         $controller = new $className;
	         $method = 'index';
	         call_user_func(array($controller,$method));
    		}	
    }
    
}	
?>