<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );	

	include "includes/cabecera.php";

?>

<header class="cabecera">
	<h1>RESERVAS</h1><h3>No se pudo hacer la reserva, superado aforo.</h3><h3>&nbsp;</h3>
</header>



<?php
include "includes/pie.php";

?>
