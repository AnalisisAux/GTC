<?php
    //Implementacion de las conexiones
    include ('conexion.php');
    //Obtener informacion del boton
    if (isset($_POST['Cargarcondiciones'])){
        if(
            //Validacion que los campos de texto
       
            strlen($_POST['comentariosacordeon']) >= 1){
            //Asignacion de un nombre de variable
  
            $comentariosacordeon = trim($_POST['comentariosacordeon']);

            //Operacin de insertar informacion en la base de datos
            $consultas = "INSERT INTO cotizacion (Condiciones) 
            VALUES ('$comentariosacordeon')";
        
            //Combinacion e implementacion en base de datos
            $resultado = mysqli_query($conexion,$consultas);
            //condiciones correspondientes al resultado
	        if ($resultado) {
    	    	?> 
        	    	<h3 class="ok">¡Se registro correctamente!</h3>
                <?php
	        } else {
    	    	?> 
	    	        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php
	        }
            } else {
	    	    ?> 
	    	        <h3 class="bad">¡Por favor complete los campos!</h3>
                <?php
            }
    }



?>