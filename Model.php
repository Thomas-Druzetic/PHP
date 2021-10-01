<?php
require_once 'Conf.php';
class Model{

	private static $pdo = NULL;

	public static function init($hostname,$database_name,$login,$password){
		try{
			self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password);			
} 
		catch(PDOException $e) {
  			echo $e->getMessage(); // affiche un message d'erreur
  			die();
}
		
	}

	public static function getPDO(){
		if(is_null(self::$pdo)){
			Model::init(Conf::gethostname(),Conf::getdatabase(),Conf::getLogin(),Conf::getpassword());
		}
		return self::$pdo;
	}
}