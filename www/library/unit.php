<?php

// обрабатываем все ошибки
error_reporting (E_ALL);


// провер¤ем версию PHP
if (version_compare(phpversion(), '5.2.0', '<') == true) { die ('PHP5.1 Only'); }

// «агрузка классов "на лету"

function __autoload($class_name) {

		// пробегаемс¤ по основным классам
        $filename = strtolower($class_name) . '.class.php';
        $file = ROOT . 'system' .  DS .  $filename;

        if (file_exists($file) == false) {

        	// пробегаем папку Smarty
       		$filename = strtolower($class_name) . '.class.php';
	        $file = ROOT . DS . 'smarty' . DS . $filename;
		        	
				 	if (file_exists($file) == false) {
				 			
				 			// пробегаем папку Smarty/sysplugins
       						$filename = strtolower($class_name) . '.php';
	       					 $file = ROOT . 'smarty'. DS .'sysplugins' . DS . $filename;
	       					 
	       					 // если класс не обнаружен возвращаем false
	       					 if (file_exists($file) == false)
	       					 	return false;
	       					 
				 	}
        }

		require_once($file);

}
