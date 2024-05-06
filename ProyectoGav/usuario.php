<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="CSS/style.css">
  </head>
    <?php 
include "header.php";
include "conexion.php";


?>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
  
    <h3>Usuarios</h3>
    <br>

    <div class="container">
      <div class="row align-items-end">
        <div class="col">
          <a class="btn btn-primary" href="Registrodeusuarios.php" role="button">Registro de usuario</a>
          <a class="btn btn-primary" href="#" role="button">Exportar</a>
        </div>

        <div class="col">
          <label class="form-label">Buscar un usuario</label>
          <input onkeyup="buscar_ahora($('buscar').val());" type="text" class="form-control" id="buscar" name="buscar">
          <br>
          <button onclick ="buscar_ahora($('buscar').val());" class ="btn btn-primary"> Buscar</button>

        </div>
      </div>
    </div>  
        <!--busacador script (incompleto)-->
    <script type="text/javascript">
      function buscar_ahora(buscar){
      var parametros = ("buscar":buscar);
      $.ajax({
      data:parametros,
      type: 'POST',
      url: 'usuario.php',
      success: function(data){
      document.getElementById("datos_buscador").innerHTML=data;
      }
      });
      }
    </script>

        <!--fin del buscador-->

      <br>

        <!--generacion de la tabla-->

        <br>
        <table class ="table">
          <thead class="table-success table-striped">
            <tr>
              <td>ID</td>
              <td>Correo</td>
              <td>Clave</td>
              <td>Estatus</td>
              <td>Nombre</td>
              <td>Apellido paterno</td>
              <td>Apellido materno</td>
              <td>Acciones</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql="SELECT * FROM usuarios";
            $result=mysqli_query($conexion, $sql) or die ("error al extraer los datos");
            while ($mostrar=mysqli_fetch_array($result)){

            ?>
            <!--Mostrar los valores que se registraron en la base de datos-->
            <tr>
              <td><?php echo $mostrar["ID"]?></td>
              <td><?php echo $mostrar["email"]?></td>
              <td><?php echo $mostrar["contraseña"]?></td>
              <td></td>
              <td><?php echo $mostrar["Nombres"]?></td>
              <td><?php echo $mostrar["ApellidoP"]?></td>
              <td><?php echo $mostrar["ApellidoM"]?></td>
              <td>
<!--botones de acciones CRUD-->
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
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="#">Verificar</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="#">Contactos</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="#">Participantes</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="#">Unidades</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="#">Eliminar</a></li>
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

  </body>
</html>
