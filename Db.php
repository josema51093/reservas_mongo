<?php
	require 'vendor/autoload.php';

	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){

				//cambio 2.0.1
				//Rework de Josema
				//Abrimos conexión a Mongo
				$conexion = new MongoDB\Client;
				//Seleccionamos base de datos
				self::$conexion = $conexion->pruebas;

				return self::$conexion;
		}		
	} 
?>