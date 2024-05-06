<!DOCTYPE html>
<html lang="en">
<head>  
</head>
  <?php 
include ('header.php');
include ('conexion.php');
include("FormularioregistroClientes.php");
include("Formularioverificador.php");
  ?>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
  <h1>Clientes</h1>
<div class="container">
  <div class="row align-items-end">
    <div class="col-md-6">


      <!-- boton modal de diseño-->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Nuevo cliente
      </button>

      <!-- Primer Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro de nuevo cliente</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form method = "post" class="row g-3" >
                    <div class = "col-md-6">
                        <label class="form-label">Nombre comercial</label><br>
                        <input class="form-control" type="text" name="Nombrecomercial" required>
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Régimen fiscal</label><br>
                        <input class="form-control" type="text" name="Régimenfiscal" required>
                    </div>
                      <br>
                    <div class = "col-md-6">  
                        <label class="form-label">Razón social</label><br>
                        <input class="form-control" type="text" name="Razónsocial">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">RFC</label><br>
                        <input class="form-control" type="text" name="RFC" maxlength="13" required>
                    </div>
                      <br>
                    <div class = "col-md-4">
                        <label class="form-label">Teléfono</label><br>
                        <input class="form-control" type="text" name="Teléfono">
                    </div>
                      <br>
                    <div class = "col-md-4">
                        <label class="form-label">Celular</label><br>
                        <input class="form-control" type="text" name="Celular">
                    </div>
                      <br>
                    <div class = "col-md-4">
                        <label class="form-label">Correo</label><br>
                        <input class="form-control" type="text" name="Correo">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Dirección</label><br>
                        <input class="form-control" type="text" name="Dirección">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Ciudad</label><br>
                        <input class="form-control" type="text" name="Ciudad">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Estado</label><br>
                        <input class="form-control" type="text" name="Estado">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Codigo postal</label><br>
                        <input class="form-control" type="text" name="Codigopostal">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar" href="clientes.php" >
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <label class="form-label">Buscar un cliente</label>
      <input x="buscar_ahora($('buscar').val());" type="text" class="form-control" id="buscar" name="buscar">
      <br>
      <button onclick ="buscar_ahora($('buscar').val());" class ="btn btn-primary"> Buscar</button>
    </div>
  </div>
</div>
<br>
<div class="table-responsive">
  <table class ="table table-bordered">
    <thead class="table-success table-striped">
      <tr>
        <td>Numero de referencia</td>
        <td>Nombre comercial</td>
        <td>Régimen fiscal</td>
        <td>Razón social</td>
        <td>RFC</td>
        <td>¿Estado Verificado?</td>
        <td>Teléfono</td>
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
        $sql="SELECT * FROM clientes";
        $result=mysqli_query($conexion, $sql);
        while ($mostrar=mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $mostrar["Numref"]?></td>
        <td><?php echo $mostrar["Nombrecom"]?></td>
        <td><?php echo $mostrar["Regimenfiscal"]?></td>
        <td><?php echo $mostrar["Razonsocial"]?></td>
        <td><?php echo $mostrar["RFC"]?></td>
        <td><?php echo $mostrar["Estadoverificado"]?></td>
        <td><?php echo $mostrar["Telefono"]?></td>
        <td><?php echo $mostrar["Celular"]?></td>
        <td><?php echo $mostrar["Correo"]?></td>
        <td><?php echo $mostrar["Direccion"]?></td>
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
            aria-expanded="false">Opciones
          </a>
              <ul class="dropdown-menu">    
                <li><?php echo "<a class='dropdown-item' href='Editarclientes.php?Numref=".$mostrar['Numref']."'?>Editar</a>"; ?> </li>
                <li><hr class="dropdown-divider"/></li>
                <li><?php echo "<a class='dropdown-item' href='Verificador.php?Numref=".$mostrar['Numref']."'?>Verificar</a>"; ?></li>
              </ul>
        </td>
          <?php
            }
          ?>
    </tbody>
  </table>
</div>
  </body>
</html>
