<?php
require_once 'config.php';
class DB{
	/*  
    * Atributo estático para instância do PDO  
    */ 
	private static $instance;
	/*  
    * Método estático para retornar uma conexão válida  
    * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */
	public static function getInstance(){
		if(!isset(self::$instance)){
			try {
				self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				/*
				PDO::ATTR_ERRMODE espera receber um dos três modos disponíveis:
					PDO::ERRMODE_SILENT: Só defina o código de erro
					PDO::ERRMODE_WARNING: gerar um E_WARNING.
					PDO::ERRMODE_EXCEPTION: Lance uma exceção.
				*/
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}
	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}

}