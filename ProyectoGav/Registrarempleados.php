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
    
<form method = "post" class="row g-3">
        <h2>Registro de nuevo empleado</h2>

        <div class = "col-md-4">
            <label class="form-label">Nombre(s)</label>
            <input type="text" name="Nombres">
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">Apellido paterno</label>
            <input type="text" name="ApellidoP">
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">Apellido materno</label>
            <input type="text" name="ApellidoM">
        </div>
<br>
        <div class ="col-md-4">
            <label class="form-label">Nombre completo</label>
            <input type="text" name="Nombrecompleto">
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">RFC</label>
            <input type="text" name="RFC" >
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">Celular</label>
            <input type="text" name="Celular">
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">Correo</label>
            <input type="text" name="Correo">
        </div>
<br>
        <div class = "col-md-4">
            <label class="form-label">Dirección</label>
            <input type="text" name="Dirección">
        </div>
 <br>
        <div class = "col-md-4">
            <label class="form-label">Ciudad</label>
            <input type="text" name="Ciudad">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Estado</label>
            <input type="text" name="Estado">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Codigo postal</label>
            <input type="text" name="Codigopostal">
        </div>
        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar" href="Empleadospersonal.php" >
  
    </form>
    <a class="btn btn-primary" href="Empleadospersonal.php"  role="button">Regresar</a>




<!--registro de los usuarios-->

<?php

if (isset($_POST['Registrar'])){
    if(
        //Validacion de contenido de campos (llenos o vacios)
        strlen($_POST['Nombres']) >= 1 &&
        strlen($_POST['ApellidoP']) >= 1 &&
        strlen($_POST['ApellidoM']) >= 1 &&
        strlen($_POST['Nombrecompleto']) >= 1 &&
        strlen($_POST['RFC']) >= 1 &&
        strlen($_POST['Celular']) >= 1 &&
        strlen($_POST['Correo']) >= 1 &&
        strlen($_POST['Dirección']) >= 1 &&
        strlen($_POST['Ciudad']) >= 1 &&
        strlen($_POST['Estado']) >= 1 &&
        strlen($_POST['Codigopostal']) >= 1 ){
            //asignacion de las variables

        $Nombres = trim($_POST['Nombres']);
        $ApellidoP = trim($_POST['ApellidoP']);
        $ApellidoM = trim($_POST['ApellidoM']);
        $Nombrecompleto = trim($_POST['Nombrecompleto']);
        $RFC = trim($_POST['RFC']);
        $Celular = trim($_POST['Celular']);
        $Correo = trim($_POST['Correo']);
        $Dirección = trim($_POST['Dirección']);
        $Ciudad = trim($_POST['Ciudad']);
        $Estado = trim($_POST['Estado']);
        $Codigopostal = trim($_POST['Codigopostal']);

       //Sentencia de introduccion en la base de datos
        $consultas = "INSERT INTO empleados( Nombres, ApellidoP, ApellidoM, Nombrecompleto, RFC, Celular, Correo, Dirección, Ciudad, Estado, ) 
        VALUES ('$Nombres ',' $ApellidoP','$$ApellidoM ','$Nombrecompleto','$RFC','$Celular','$Correo','$Dirección','$Ciudad','$Estado','$Codigopostal')";
        $resultado=mysqli_query($conexion,$consultas);


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