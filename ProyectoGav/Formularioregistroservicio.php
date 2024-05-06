<?php
    //Implementacion de las conexiones
    include ('conexion.php');
    //Obtener informacion del boton
    if (isset($_POST['RegistrarServicio'])){
        if(
            //Validacion que los campos de texto
            strlen($_POST['Tiposervicio']) >= 0 &&
            strlen($_POST['Clave']) >= 0 &&
            strlen($_POST['Nombreservicio']) >= 0 &&
            strlen($_POST['Descripción']) >= 0 &&
            strlen($_POST['Preciolista']) >= 0 &&
            strlen($_POST['Moneda']) >= 0){
            //Asignacion de un nombre de variable
            $Tiposervicio = trim($_POST['Tiposervicio']);
            $Clave = trim($_POST['Clave']);
            $Nombreservicio = trim($_POST['Nombreservicio']);
            $Descripción = trim($_POST['Descripción']);
            $Preciolista = trim($_POST['Preciolista']);
            $Moneda = trim($_POST['Moneda']);

            //Operacin de insertar informacion en la base de datos
            $consultas = "INSERT INTO servicios(Nombreservicio, 
            Clave, Descripcion, Precio, Moneda, Tiposervicio) 
            VALUES ('$Nombreservicio','$Clave','$Descripción',
            '$Preciolista','$Moneda','$Tiposervicio')";
        
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