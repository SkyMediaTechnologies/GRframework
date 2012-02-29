<?php
// GRframework (version 1.0) PHP5 framework for web application
// Autor: Mike Grigoriev & SkyMediaTechnologies Dev Team

// Main file 

header('Content-Type: text/html; charset=windows-1251');
session_start();

define ('DS', DIRECTORY_SEPARATOR);

// имя хоста
define ('HOST_NAME', $_SERVER['SERVER_NAME']);

define( 'ROOT' ,  realpath(dirname(__FILE__) ). DS ); 

// TODO: сделать выбор шаблона из БД 
// устанавливаем имя шаблона
define('TEMPLATE_NAME', 'default');

// файл инициализации
require_once ('library'. DS .'unit.php');

//$url = $_GET['url'];

require_once (ROOT . DS . 'library' . DS . 'unit.php');

// Подключаем Smarty
$smarty = new Smarty;

// ”станавливаем папки шаблонов
$smarty->template_dir = ROOT . DS . 'application' . DS . 'templates'. DS  . TEMPLATE_NAME  .  DS .'tpl' . DS;
$smarty->compile_dir  = ROOT . DS . 'application' . DS . 'templates'.  DS  . TEMPLATE_NAME . DS .'tpl_c' . DS;  
$smarty->cache_dir = ROOT . DS . 'application' . DS . 'templates'. DS  . TEMPLATE_NAME .  DS .'cache' . DS;

$smarty->caching = false;
$smarty->debugging = true;

// Инициализируем класс Registry
$registry = GR_registry::getInstance();

$registry->smarty = $smarty;

// Сохраняем экземпляр класса Smarty при помощи registry
//GR_registry:: set( 'smarty' , $smarty );


$router = GR_Router::route(new GR_request);

?>