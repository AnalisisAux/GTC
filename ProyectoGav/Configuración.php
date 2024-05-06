<!DOCTYPE html>
<html lang="en">
  <head>  
  </head>
    <?php 
      include "header.php";
      include 'conexion.php';
   
      $sql="SELECT * FROM configuracion";
      $result=mysqli_query($conexion, $sql);
      $mostrar=mysqli_fetch_array($result);
    ?>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
      <h3>Configuracion</h3>
      <br>
        <!-- Mostrar razon social o editarla-->
      <div class="container-sm">
        <div class = "col-md-6">
          <label for="Razonsocial" class="form-label">Razon social</label>
          <input type="text" class="form-control" name="Razonsocial" 
          value="<?php echo $mostrar['Razonsocial']??NULL ?>">
        </div>
        <!-- Mostrar RFC o editarla-->
        <div class = "col-md-6">
          <label for="Razonsocial" class="form-label">RFC</label>
          <input type="text" class="form-control" name="RFC" 
          value="<?php echo $mostrar['RFC']??NULL ?>">
        </div>
        <!-- Mostrar direccion o editarla-->
        <div class = "col-md-6">
          <label for="exampleFormControlTextarea1" class="form-label">Dirección</label>
          <textarea class="form-control" name="Dirección" rows="3" ><?php echo $mostrar['Dirección']??NULL ?></textarea>
        </div>
          <br>
        <!-- Subir imagen-->
        <form action="subir-imagen.php" enctype="multipart/form-data" method="post">
          <label for="fileTest">Selecciona una imagen</label>
          <br>
          <input type="file" name="imagen">
          <input type="submit" value="Subir">
        </form>
      </div>
    </body>
</html>