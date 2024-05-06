<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="CSS/estilo.css">
        <?php 
            include ('header.php');
            include ('conexion.php');
            $sql="SELECT * FROM marcas";
            $result=mysqli_query($conexion, $sql);
            $mostrar=mysqli_fetch_array($result);{
        ?>
    </head>
    <body>
        <?php
            if(isset($_POST["enviar"])){  
            }else{
        ?>
        <form method = "post" action="<?=$_SERVER["PHP_SELF"]?>">
            <h2>Editar marca</h2>
                <label class="form-label">Marca</label>
                <input type="text" name="Marca" value="<?php  echo $mostrar["Marca"] ?>">
            <br>
	                <!--<input type="submit" value="Guardar"-->
            <input class="btn btn-primary" type="submit" name="enviar" value="Actualizar"  >
        </form>
        <?php
        }}
        ?>
            <a class="btn btn-primary" href="Marcasdeunidad.php" role="button">Regresar marcas</a>
    </body>
</html>