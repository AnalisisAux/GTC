<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      include "header.php";
      include "conexion.php";
    ?>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <h3>Instructores</h3>
    <!--Contenedor de botones y buscador--> 
    <div class="container">
      <div class="row align-items-end">
        <div class="col">
          <a class="btn btn-primary" href="Registrarinstructores.php" role="button">Registro de instructor</a>
            <a class="btn btn-primary" href="#" role="button">Exportar</a>
        </div>
        <div class="col">
          <label class="form-label">Buscar instructor</label>
          <input onkeyup="buscar_ahora($('buscar').val());" type="text" class="form-control" id="buscar" name="buscar">
          <br>
          <button onclick ="buscar_ahora($('buscar').val());" class ="btn btn-primary"> Buscar</button>
        </div>
      </div>
    </div>
    <!--Contenedor de botones y buscador--> 
    <!--generacion de la tabla-->
    <br>
    <table class ="table">
      <thead class="table-success table-striped">
        <tr>
          <td>Instructores</td>
          <td>Nombre</td>
          <td>ApellidosP</td>
          <td>ApellidosM</td>
          <td>Nombres completos</td>
          <td>Datos de registro</td>
          <td>Registros STPS</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql="SELECT * FROM instructores";
          $result=mysqli_query($conexion, $sql) or die ("error al extraer los datos");
          while ($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
          <td><?php echo $mostrar["IDinstructores"]?></td>
          <td><?php echo $mostrar["Nombre"]?></td>
          <td><?php echo $mostrar["ApellidoP"]?></td>
          <td><?php echo $mostrar["ApellidoM"]?></td>
          <td><?php echo $mostrar["NombreCompleto"]?></td>
          <td><?php echo $mostrar["Datosderegistro"]?></td>
          <td><?php echo $mostrar["RegistroSTPS"]?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </body>
</html>