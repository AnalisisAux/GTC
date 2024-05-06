<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="CSS/estilo.css">
        <?php 
        include "header.php";
        include "conexion.php";
        include("FormularioregistroUsuario.php");
        ?>
    </head>
<body>
      <!--Implemnetacion del formulario-->
<form method = "post" class="row g-3">
        <h2>Registro de usuario</h2>

        <div class = "col-md-4">
            <label class="form-label">Nombres</label>
            <input type="text" name="Nombres">
        </div>

        <div class = "col-md-4">
            <label class="form-label">Apellido paterno</label>
            <input type="text" name="ApellidoP" >
        </div>
        
        <div class = "col-md-4">
            <label class="form-label">Apellido materno</label>
            <input type="text" name="ApellidoM">
        </div>

        <div class = "col-md-6">
            <label class="form-label">Correo</label>
            <input type="text" name="Correo" >
        </div>

        <div class = "col-md-6">
            <label class="form-label">Contraseña</label>
            <input type="password" name="Clave">
        </div>

        <input class="btn" href="usuario.php" type="submit" name="Registrar" value="Enviar">

    </form>


    <a class="btn btn-primary" href="usuario.php" role="button">Regresar a usuarios</a>

</body>
</html>