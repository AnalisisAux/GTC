<!DOCTYPE html>
<html lang="en">
  <head>
    </head>
    <?php 
include "header.php";
include "conexion.php";

?>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

  <h1>Marcas de unidad</h1>

  <!--Botones y buscador-->

<div class="container">
  <div class="row align-items-end">
    <div class="col">

      <a class="btn btn-primary" href="Registrodeunidad.php" role="button">Registro de marca</a>
      <a class="btn btn-primary" href="#" role="button">Exportar</a>

    </div>
    <div class="col">

      <label class="form-label">Buscar</label>
      <input onkeyup="buscar_ahora($('buscar').val());" type="text" class="form-control" id="buscar" name="buscar">
      <br>
      <button onclick ="buscar_ahora($('buscar').val());" class ="btn btn-primary"> Buscar</button>

    </div>

  </div>

</div>

<br>

<table class ="table">
          <thead class="table-success table-striped">
            <tr>
              <td>No</td>
              <td>Marca</td>
              <td> Acciones </td>
            </tr>
          </thead>

          <tbody>
            <?php
            $sql="SELECT * FROM marcas";
            $result=mysqli_query($conexion, $sql);
            while ($mostrar=mysqli_fetch_array($result)){

            ?>
            <tr>
              <td><?php echo $mostrar["Nu"]?></td>
              
              <td><?php echo $mostrar["Marca"]?></td>
              <td>
                <?php echo "<a href='Editarunidad.php?Nu=".$mostrar['Nu']."'?>Editar</a>"; ?>
                </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
          </table>



  </body>
</html>