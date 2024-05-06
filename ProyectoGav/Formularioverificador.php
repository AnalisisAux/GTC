<?php
    //Conexion a la base de datos
    include ('conexion.php');
    if (isset($_FILES['Registrarvefificado'])){
        if(
            //Validacion de contenido de campos (llenos o vacios)
            strlen($_FILES['archivo'])){
            //asignacion de las variables
            $archivo = trim($_FILES['archivo']);
            //Sentencia de introduccion en la base de datos
            $consultas = "INSERT INTO archivo(archivo) 
            VALUES ('$archivo')";
            $resultado = mysqli_query($conexion,$consultas);
            //alertas de los resultados de ingreso en base de datos
 	        if ($resultado) {
    	    	?> 
	    	        <h3 class="ok">¡Te has inscripto correctamente!</h3>
                <?php
	        } else {
    	    	?> 
	    	        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php
	        }
            }   else {
    	    	?> 
	    	        <h3 class="bad">¡Por favor complete los campos!</h3>
                <?php
            }
    }
?>