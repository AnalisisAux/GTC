<?php
    //Implementacion de las conexiones
    include ('conexion.php');
    //Obtener informacion del boton
    if (isset($_POST['Registrar'])){
        if(
            //Validacion que los campos de texto
            strlen($_POST['Marca']) >= 1){            
            //Asignacion de un nombre de variable
            $Marca = trim($_POST['Marca']);
            //Operacin de insertar informacion en la base de datos
            $consultas = "INSERT INTO marcas( Marca) 
            VALUES ('$Marca')";
            //Combinacion e implementacion en base de datos
            $resultado = mysqli_query($conexion,$consultas);
            //condiciones correspondientes al resultado
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