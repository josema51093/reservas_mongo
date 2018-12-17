<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	class CrudReserva {
 
		// método para mostrar todas las reservas
		public static function mostrar($unaFecha){
			$bd=Db::conectar();

			//Dentro de la base de datos seleccionamos una colección (tabla)
			$coleccion = $bd->Reservas;
			//Buscamos todas las reservas
			$cursor = $coleccion->find(['Fecha' => $unaFecha]);
 			$listaReservas=[];

		    foreach ($cursor as $documento) {
		    	$miReserva = new Reserva($documento["_id"],$documento["Apellidos"],$documento["Nombre"],$documento["Fecha"],$documento["Hora"],$documento["Comensales"]);
				$listaReservas[]=$miReserva;
		    }

			$bd=null;
			return $listaReservas;
		}


		// método para mostrar todas las reservas
		public static function esPosible($unaReserva){
			$suma=0;

			$date = new DateTime($unaReserva->getFecha());
			$fecha = $date->format('d/m/Y');

			$reservas = CrudReserva::mostrar($fecha);
			foreach ($reservas as $reserva) {
				if ($unaReserva->getHora() == $reserva->getHora()) {
					$suma+=$reserva->getComensales();
				}
			}

			if ( ($suma + $unaReserva->getComensales()) > Reserva::$maxcomensales)
				return false;
			else
				return true;
		}


		//Eliminar una película
		public static function eliminar($idReserva) {
			$bd=Db::conectar();
			//Dentro de la base de datos seleccionamos una colección (tabla)
			$coleccion = $bd->Reservas;
			//Buscamos todas las reservas
			$coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idReserva)]);


			$dbh=null;
		}

		//Método para insertar una reserva que recibe un objeto Pelicula
		public static function insertar($unaReserva) {
			
			if (CrudReserva::esPosible($unaReserva)) {

				$bd=Db::conectar();
				//Dentro de la base de datos seleccionamos una colección (tabla)
				$coleccion = $bd->Reservas;

				$date = new DateTime($unaReserva->getFecha());
				$fecha = $date->format('d/m/Y');

				$documento = array( 
				  "Nombre" => $unaReserva->getNombre(), 
				  "Apellidos" => $unaReserva->getApellidos(), 
				  "Email" => "yalohare@gmail.com",
				  "Tel" => 649589665,
				  "Fecha" => $fecha, 
				  "Hora" => $unaReserva->getHora(), 
				  "Comensales" => $unaReserva->getComensales() 
				);
	 
	   			$coleccion->insertOne($documento);

				$dbh=null;
				return true;

			} else {
				return false;
			}

		}

}