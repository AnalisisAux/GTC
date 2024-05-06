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
    <!--registro de los usuarios-->
<form method = "post" class="row g-3" >
        <h2>Registro de nuevo instructor</h2>

        <div class = "col-md-6">
            <label class="form-label">Nombre</label>
            <input type="text" name="Nombre">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Apellido paterno</label>
            <input type="text" name="ApellidoP">
        </div>
<br>
        <div class ="col-md-6">
            <label class="form-label">Apellido materno</label>
            <input type="text" name="ApellidoM">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Nombre completo</label>
            <input type="text" name="NombreCompleto">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Datos de registro</label>
            <input type="text" name="Datosderegistro">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Registro STPS</label>
            <input type="text" name="RegistroSTPS">
        </div>

        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar">
  
    </form>
    <a class="btn btn-primary" href="Instructores.php"  role="button">Regresar</a>

<!--registro de los usuarios-->

<?php

if (isset($_POST['Registrar'])){
    if(
        //Validacion de contenido de campos (llenos o vacios)
        strlen($_POST['Nombre']) >= 1 &&
        strlen($_POST['ApellidoP']) >= 1 &&
        strlen($_POST['ApellidoM']) >= 1 &&
        strlen($_POST['NombreCompleto']) >= 1 &&
        strlen($_POST['Datosderegistro']) >= 1 &&
        strlen($_POST['RegistroSTPS']) >= 1 ){
            //asignacion de las variables

        $Nombre = trim($_POST['Nombre']);
        $ApellidoP = trim($_POST['ApellidoP']);
        $ApellidoM = trim($_POST['ApellidoM']);
        $NombreCompleto = trim($_POST['NombreCompleto']);
        $Datosderegistro = trim($_POST['Datosderegistro']);
        $RegistroSTPS = trim($_POST['RegistroSTPS']);

       //Sentencia de introduccion en la base de datos
        $consultas = "INSERT INTO instructores( Nombre, ApellidoP, ApellidoM,NombreCompleto,Datosderegistro, RegistroSTPS) 
        VALUES ('$Nombre','$ApellidoP',' $ApellidoM','$NombreCompleto','$Datosderegistro','$RegistroSTPS')";
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