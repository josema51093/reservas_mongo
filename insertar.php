<?php
include "includes/cabecera.php";
?>

<header class="cabecera">
	<h1>Nueva Reserva</h1>
</header>
<section>

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>

		<form action="manager.php" method="post">
		 	
		 	<section>
    			<label>Apellidos:</label>
    			<input type="text" name="apellidos" maxlength="100" required>
			</section>
			<section>
    			<label>Nombre:</label>
    			<input type="text" name="nombre" required>
			</section>
            <section>
                <label>Fecha:</label>
                <input type="date" name="fecha" required>
            </section>            
			<section>
    			<label>Hora:</label>
    			<select name="hora">
                  <option value="13:00">13:00</option>
                  <option value="13:30">13:30</option>
                  <option value="14:00">14:00</option>
                  <option value="14:30">14:30</option>
                  <option value="19:30">19:30</option>
                  <option value="20:00">20:00</option>
                  <option value="20:30">20:30</option>
                  <option value="21:00">21:00</option>                  
                </select>
    		</section>
   			<section>
    			<label>NComensales:</label>
                <input type="number" name="comensales" min="1" max="10">
    		</section>    		
			<section>
    			<label></label>
    			<input type="submit" name="insertar" value="Reservar">
			</section>

		</form>


</section>

<?php

}

include "includes/pie.php";
?>