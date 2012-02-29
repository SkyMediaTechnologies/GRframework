<?php

// класс надстройка над PDO для работы с MySQL
// TODO: Добавить логирование ошибочных запросов 

class GR_database {
	
	private 	$connectionsDB		= 	array();		// connettions db array
	private		$activeDB			=	0;				// active database id
	//private	$query				=	NULL;			// текущий запрост
	private 	$queryCache			=	array();		// результат текущего запроса
	private		$error_log			=	NULL;			// logs for errors
	private 	$query_log			=	NULL;			// logs for queries
	
	
	// Конструктор
	public function __construct() { }
	
	
	// This method create new database connection
	public function newConnetcion($db_host, $db_user, $db_password, $db_name) {
		
		$this -> connectionsDB[] = new PDO('mysql:host=' . $db_host . ';dbname=' .$db_name,  $db_user, $db_password);
		$this -> connectionsDB[] -> exec( 'SET NAMES '.DB_ENCODING );
 
		$connection_id = count( $this->connections ) - 1;
		
		// TODO: check error  
		
		return $connection_id;
	}
	
	// This method closes the active connecton
	public function closeConnection() {
   		$this->connections[$this->activeConnection] = null;
   }
	
	// This method set active DB connection
	public function setActiveConnection( int $new ) {
    	$this->activeDB = $new;
    }
	
	// TODO: метод вывода ошибок
	

    // Метод запроса
	public function query($queryStr) {
		
		if( !$result = $this->connectionsDB[$this->activeDB]->query( $queryStr ) ) {
			//trigger_error('Error executing and caching query: '
  			//.$this->connections[$this->activeConnection]->error, E_USER_ERROR);
			return -1; 
		}
		else {
        	$this -> queryCache[] = $result;
            return count($this->queryCache) - 1;
        }
	}
	
	
	
	// Возвращает кол-во столбов в результате запроса
	function getColsFromCache() {
		
	}
	
	
	// Возвращает кол-во строк в результате зароса
	public function getRowsFromCache( $result_id ) {
       //return $this->queryCache[$result_id]->; //TODO: в  PDO num_rows????
     }
     
     
     // Возвращает id последнего запроса
     function getLastIdInsert() {
     	$this->connectionsDB[$this->activeDB]->lastIns1ertId();
     }
	
	
	//public function fetch($result_type = MYSQL_ASSOC) {
	//	return mysql_fetch_array($this->result, $result_type);
	//}
	
	
	public function select(){
		
	}
	
	public function insert() {
		
	}
	
	public function delete() {
		
	}
	
	public function	update(){
		
	}
	
//eof db class
}
?>