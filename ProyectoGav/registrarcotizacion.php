<?php
    //Implementacion de las conexiones
    include ('conexion.php');
    //Obtener informacion del boton
    if (isset($_POST['Cargar'])){
        if(
            //Validacion que los campos de texto
            strlen($_POST['tipodecotizacion']?? null) >= 1 &&
            strlen($_POST['Solicitante']) >= 1 &&
            strlen($_POST['Fechadecotizacion']) >= 1 &&
            strlen($_POST['Clientes']) >= 1 &&
            strlen($_POST['Contacto']) >= 1 &&
            strlen($_POST['Comentarios']) >= 1 ){
            //Asignacion de un nombre de variable
            $tipodecotizacion = !empty($_POST['tipodecotizacion'])? $_POST['tipodecotizacion']:null;
            $Solicitante = !empty($_POST['Solicitante'])? $_POST['Solicitante']:null;
            $Fechadecotizacion = !empty($_POST['Fechadecotizacion'])? $_POST['Fechadecotizacion']:null;
            $Clientes = !empty($_POST['Clientes'])? $_POST['Clientes']:null;
            $Contacto = !empty($_POST['Contacto'])? $_POST['Contacto']:null;
            $Comentarios = !empty($_POST['Comentarios'])? $_POST['Comentarios']:null;

            //Operacin de insertar informacion en la base de datos
            $consultas = "INSERT INTO cotizacion (Tipodecotizacion, Solicitante, Fecha, Clientes,Contacto,Comentarios) 
            VALUES ('$tipodecotizacion','$Solicitante',' $Fechadecotizacion','$Clientes',' $Contacto','$Comentarios')";
        
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