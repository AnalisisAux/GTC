<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/estilo.css">
<?php 
include ('header.php');
include ('conexion.php');
include("Formulariounidad.php");
include("Formularioverificador.php");

?>
</head>
<body>

    <form method = "post" action="">
        <h2>Registro de nueva marca</h2>

        <div class = "input-wrapper">
            <label class="form-label">Marca</label>
            <input type="text" name="Marca">
        </div>
     
        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar"  >
  
    </form>
    <a class="btn btn-primary" href="Marcasdeunidad.php" role="button">Regresar a clientes</a>

     
</body>
</html>