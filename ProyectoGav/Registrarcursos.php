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
        <h2>Registro de nuevo curso</h2>

        <div class = "col-md-6">
            <label class="form-label">Curso</label>
            <input type="text" name="curso">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Duracion</label>
            <input type="text" name="duracion">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Vigencia</label>
            <input type="date" name="vigencia">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Normas</label>
            <input type="text" name="normas">
        </div>
<br>
        <div class = "input-wrapper">
            <label class="form-label">Especialidad</label>
            <input type="text" name="especialidad">
        </div>
        <div class="col-md-12">
        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar">
        </div>
     
    </form>
   
        <a class="btn btn-primary" href="Cursos.php"  role="button">Regresar</a>


<!--registro de los usuarios-->
<?php
if (isset($_POST['Registrar'])){
    if(
        //Validacion de contenido de campos (llenos o vacios)
        strlen($_POST['curso']) >= 1 &&
        strlen($_POST['duracion']) >= 1 &&
        strlen($_POST['vigencia']) >= 1 &&
        strlen($_POST['normas']) >= 1 &&
        strlen($_POST['especialidad']) >= 1 ){
            //asignacion de las variables

        $curso = trim($_POST['curso']);
        $duracion = trim($_POST['duracion']);
        $vigencia = trim($_POST['vigencia']);
        $normas = trim($_POST['normas']);
        $especialidad = trim($_POST['especialidad']);

       //Sentencia de introduccion en la base de datos
        $consultas = "INSERT INTO cursos( curso, duracion, vigencia,normas,especialidad) 
        VALUES ('$curso','$duracion',' $vigencia','$normas','$especialidad')";
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