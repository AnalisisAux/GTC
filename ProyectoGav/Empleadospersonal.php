<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include "header.php";
      include "conexion.php";
    ?>
  </head>
  <body>
    <h2>Empleados/Personal</h2>
      <!--Contenedor de botones y buscador--> 
    <div class="container">
      <div class="row align-items-end">
        <div class="col">
          <a class="btn btn-primary" href="Registrarempleados.php" role="button">Registro de empleados</a>
          <a class="btn btn-primary" href="#" role="button">Exportar</a>
        </div>
        <div class="col">
          <label class="form-label">Buscar un Empleado o personal</label>
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
          <td>Nombre(s)</td>
          <td>Apellido paterno</td>
          <td>Apellido materno</td>
          <td>Nombre completo</td>
          <td>Estatus</td>
          <td>RFC</td>
          <td>Celular</td>
          <td>Correo</td>
          <td>Dirección</td>
          <td>Ciudad</td>
          <td>Estado</td>
          <td>Codigo postal</td>
          <td>Acciones</td>    
        </tr>
      </thead>
    <tbody>
    <?php
      $sql="SELECT * FROM empleados";
      $result=mysqli_query($conexion, $sql);
      while ($mostrar=mysqli_fetch_array($result)){
    ?>
      <tr>
        <td><?php echo $mostrar["ID"]?></td>
        <td><?php echo $mostrar["Nombres"]?></td>
        <td><?php echo $mostrar["ApellidoP"]?></td>
        <td><?php echo $mostrar["ApellidoM"]?></td>
        <td><?php echo $mostrar["Nombrecompleto"]?></td> 
        <td></td>
        <td><?php echo $mostrar["RFC"]?></td>
        <td><?php echo $mostrar["Celular"]?></td>
        <td><?php echo $mostrar["Correo"]?></td>
        <td><?php echo $mostrar["Dirección"]?></td>
        <td><?php echo $mostrar["Ciudad"]?></td>
        <td><?php echo $mostrar["Estado"]?></td>
        <td><?php echo $mostrar["Codigopostal"]?></td>
        <td>        
          <!--botones de acciones-->
            <a
              class="nav-link dropdown-toggle"
              href="Catalogos"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Opciones
            </a>
            <ul class="dropdown-menu">                  
              <li><a class="dropdown-item" href="#">Editar</a></li>
              <li>
                <hr class="dropdown-divider"/>
              </li>
              <li><a class="dropdown-item" href="Verificador.php">Verificar</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
      </table>
    </div>
</body>
</html>