<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      include "header.php";
      include "conexion.php";
    ?>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
      <h2>Cursos</h2>
      <br>
      <!--Contenedor de botones y buscador--> 
      <div class="container">
        <div class="row align-items-end">
          <div class="col">
            <a class="btn btn-primary" href="Registrarcursos.php" role="button">Registro de cursos</a>
            <a class="btn btn-primary" href="#" role="button">Exportar</a>
          </div>
          <div class="col">
            <label class="form-label">Buscar curso</label>
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
              <td>ID</td>
              <td>Curso</td>
              <td>Duracion</td>
              <td>Vigencia</td>
              <td>Normas</td>
              <td>Especialidad</td>
            </tr>
         </thead>
          <tbody>
            <?php
              $sql="SELECT * FROM cursos";
              $result=mysqli_query($conexion, $sql) or die ("error al extraer los datos");
              while ($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar["IDcurso"]?></td>
              <td><?php echo $mostrar["curso"]?></td>
              <td><?php echo $mostrar["duracion"]?></td>
              <td><?php echo $mostrar["vigencia"]?></td>
              <td><?php echo $mostrar["normas"]?></td>
              <td><?php echo $mostrar["especialidad"]?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
          </table>
    </body>
</html>
