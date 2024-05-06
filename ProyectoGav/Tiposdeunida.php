<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
include "header.php";
include "conexion.php";
?>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    
<h1>Tipo de unidad</h1>


<!--Contenedor de botones y buscador--> 

<div class="container">
  <div class="row align-items-end">
    <div class="col">

    <a class="btn btn-primary" href="Registrartipodeunidades.php" role="button">Registro de tipo de unidades</a>
    <a class="btn btn-primary" href="#" role="button">Exportar</a>

    </div>
    <div class="col">

    <label class="form-label">Buscar unidades</label>
      <input onkeyup="buscar_ahora($('buscar').val());" type="text" class="form-control" id="buscar" name="buscar">
    <br>
    <button onclick ="buscar_ahora($('buscar').val());" class ="btn btn-primary"> Buscar</button>

    </div>
  </div>
</div>
<!--Contenedor de botones y buscador--> 


<br>
        <table class ="table">
          <thead class="table-success table-striped">
            <tr>
              <td>ID</td>
              <td>Tipo de unidad</td>
              <td>Norma</td>
              <td>Alcance</td>
          
            </tr>
          </thead>
          <tbody>
            <?php
            $sql="SELECT * FROM tiposdeunidad";
            $result=mysqli_query($conexion, $sql) or die ("error al extraer los datos");
            while ($mostrar=mysqli_fetch_array($result)){

            ?>
            <!--Mostrar los valores que se registraron en la base de datos-->
            <tr>
              <td><?php echo $mostrar["Idunidad"]?></td>
              <td><?php echo $mostrar["tipodeunidades"]?></td>
              <td><?php echo $mostrar["norma"]?></td>
              <td><?php echo $mostrar["alcances"]?></td>

<!--botones de acciones CRUD-->

            </tr>
            <?php
            }
            ?>
              </tbody>
          </table>
  </body>
</html>
