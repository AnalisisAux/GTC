<?php
    //Implementacion de las conexiones
    include ('conexion.php');
    //Obtener informacion del boton
    if (isset($_POST['Registrar'])){
        if(
            //Validacion que los campos de texto
            strlen($_POST['Nombrecomercial']) >= 0 &&
            strlen($_POST['Régimenfiscal']) >= 0 &&
            strlen($_POST['Razónsocial']) >= 0 &&
            strlen($_POST['RFC']) >= 0 &&
            strlen($_POST['Teléfono']) >= 0 &&
            strlen($_POST['Celular']) >= 0 &&
            strlen($_POST['Correo']) >= 0 &&
            strlen($_POST['Dirección']) >= 0 &&
            strlen($_POST['Ciudad']) >= 0 &&
            strlen($_POST['Estado']) >= 0 &&
            strlen($_POST['Codigopostal']) >= 0){
            //Asignacion de un nombre de variable
            $Nombrecomercial = trim($_POST['Nombrecomercial']);
            $Régimenfiscal = trim($_POST['Régimenfiscal']);
            $Razónsocial = trim($_POST['Razónsocial']);
            $RFC = trim($_POST['RFC']);
            $Teléfono = trim($_POST['Teléfono']);
            $Celular = trim($_POST['Celular']);
            $Correo = trim($_POST['Correo']);
            $Dirección = trim($_POST['Dirección']);
            $Ciudad = trim($_POST['Ciudad']);
            $Estado = trim($_POST['Estado']);
            $Codigopostal = trim($_POST['Codigopostal']);

            //Operacin de insertar informacion en la base de datos
            $consultas = "INSERT INTO clientes( Nombrecom, 
            Regimenfiscal, Razonsocial, RFC, Telefono, Celular, 
            Correo, Direccion, Ciudad, Estado, Codigopostal) 
            VALUES ('$Nombrecomercial','$Régimenfiscal','$Razónsocial',
            '$RFC','$Teléfono','$Celular','$Correo',
            '$Dirección','$Ciudad','$Estado','$Codigopostal')";
        
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
            } else {
	    	    ?> 
	    	        <h3 class="bad">¡Por favor complete los campos!</h3>
                <?php
            }
    }
?>