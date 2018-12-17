<?php
	class Reserva {
		private $id;
		private $apellidos;
		private $nombre;
		private $fecha;
		private $hora;
		private $ncomensales;
		public static $maxcomensales = 30;
 
		public function __construct($unId,$apellidos,$nombre,$fecha,$hora,$comensales) {
			$this->id = $unId;
			$this->apellidos = $apellidos;
			$this->nombre = $nombre;
			$this->fecha = $fecha;
			$this->hora = $hora;
			$this->ncomensales = $comensales;
		}
 
		public function getApellidos(){
		return $this->apellidos;
		}
 
		public function setApellidos($apellidos){
			$this->apellidos = $apellidos;
		}
 
		public function getNombre(){
			return $this->nombre;
		}
 
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
 
		public function getFecha(){
			return $this->fecha;
		}
 
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		public function getHora(){
			return $this->hora;
		}
 
		public function setHora($hora){
			$this->hora = $hora;
		}

		public function getComensales(){
		return $this->ncomensales;
		}
 
		public function setComensales($ncomensales){
			$this->ncomensales = $ncomensales;
		}

		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}
	}
?>