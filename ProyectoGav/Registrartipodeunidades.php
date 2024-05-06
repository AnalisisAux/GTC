<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "header.php";
include "conexion.php";

?>
<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    
<form method = "post" class="row g-3" >
        <h2>Registro de unidad</h2>

        <div class = "input-wrapper">
            <label class="form-label">Tipo de unidades</label>
            <input type="text" name="tipodeunidades">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Norma</label>
            <input type="text" name="norma">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Alcance</label>
            <input type="text" name="alcances">
        </div>

        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar">
  
    </form>
    <a class="btn btn-primary" href="Tiposdeunida.php"  role="button">Regresar</a>




<!--registro de los usuarios-->

<?php

if (isset($_POST['Registrar'])){
    if(
        //Validacion de contenido de campos (llenos o vacios)
        strlen($_POST['tipodeunidades']) >= 1 &&
        strlen($_POST['norma']) >= 1 &&
        strlen($_POST['alcances']) >= 1 ){
            //asignacion de las variables

        $tipodeunidades = trim($_POST['tipodeunidades']);
        $norma = trim($_POST['norma']);
        $alcances = trim($_POST['alcances']);

       //Sentencia de introduccion en la base de datos
        $consultas = "INSERT INTO tiposdeunidad( tipodeunidades, norma, alcances) 
        VALUES ('$tipodeunidades ',' $norma','$$alcances')";
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


    
</body>
</html>