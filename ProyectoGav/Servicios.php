<!DOCTYPE html>
<html lang="en">
  <head>
   </head>
   <?php 
include ('header.php');
include ('conexion.php');
include ('Formularioregistroservicio.php');

$ID= $_GET['ID']?? null;
$activo = $mostrar["Estadoverificado"]?? null;

$sql="SELECT * FROM servicios WHERE  ID = '$ID'";
$result=mysqli_query($conexion, $sql);
$mostrar=mysqli_fetch_array($result);

?>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
  <h1>Servicios</h1>
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
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo servicio</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form method = "post" class="row g-3" >
                    <div class = "col-md-6">
                    <label class="form-label">Tipo de servicio</label><br>
                      <select class="form-select" aria-label="Default select example" name="Tiposervicio">
                          <option>Seleccione</option>
                          <option value="Personal/Capacitación" <?php if($activo=='Personal/Capacitación'){echo 'selected';}?>>Personal/Capacitación</option>
                          <option value="Equipo/Inspección" <?php if($activo=='VerificEquipo/Inspecciónado'){echo 'selected';}?>>Equipo/Inspección</option>
                      </select>
                    </div>

                    <div class = "col-md-6">
                        <label class="form-label">Clave</label><br>
                        <input class="form-control" type="text" name="Clave" required>
                    </div>
                 
                    <div class = "col-md-6">  
                        <label class="form-label">Nombre del servicio </label><br>
                        <input class="form-control" type="text" name="Nombreservicio" required>
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Descripción</label><br>
                        <input class="form-control" type="text" name="Descripción" required>
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Precio de lista</label><br>
                        <input class="form-control" type="text" name="Preciolista">
                    </div>
                      <br>
                    <div class = "col-md-6">
                        <label class="form-label">Moneda</label><br>
                        <input class="form-control" type="text" name="Moneda" value="MXN" readonly="readonly">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <input class="btn btn-primary" type="submit" name="RegistrarServicio" value="Registrar" >
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
        <td>No</td>
        <td>Nombre del servicio</td>
        <td>Clave</td>
        <td>Descripción</td>
        <td>Precio</td>
        <td>Moneda</td>
        <td>Tipo / servicio</td>
        <td>Acciones</td>
                  
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT * FROM servicios";
        $result=mysqli_query($conexion, $sql);
        while ($mostrar=mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $mostrar["ID"] ?></td>
        <td><?php echo $mostrar["Nombreservicio"]?></td>
        <td><?php echo $mostrar["Clave"]?></td>
        <td><?php echo $mostrar["Descripcion"]?></td>
        <td><?php echo $mostrar["Precio"]?></td>
        <td><?php echo $mostrar["Moneda"]?></td>
        <td><?php echo $mostrar["Tiposervicio"]?></td>
        <td>


<!-- boton modal de diseño-->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tablamodal">
      Editar
      </button>

      <!--Modal tabla -->
      <div class="modal fade" id="tablamodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Seleccione un estatus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post"  class="row g-3">
                    <div class = "col-md-6">
                      <label class="form-label">Clientes:</label> <br>
                      <input class="form-control" type="text" name="Clientes" value ="<?php  echo $mostrar['Folio']??NULL ?>">
                    </div>  
              
                    <div class = "col-md-6">
                      <label class="form-label">Contacto:</label> <br>
                      <input class="form-control" type="text" name="Contacto">
                    </div>  
                    <br>

                    <div class = "col-md-12">
                      <label class="form-label">Detalle de cotizacion:</label> <br>
                      <input class="form-control" type="text" name="Contacto">
                    </div> 

                    <label>Estado de verificaion:</label>
                      <select name="estatus" class="form-select">
                          <option value="Preliminar" <?php if($estatuscotizacion=='Preliminar'){echo 'selected';}?>>Preliminar</option>
                          <option value="Emitida" <?php if($estatuscotizacion=='Emitida'){echo 'selected';}?>>Emitida</option>
                          <option value="Aprobada" <?php if($estatuscotizacion=='Aprobada'){echo 'selected';}?>>Aprobada</option>
                          <option value="Cancelada" <?php if($estatuscotizacion=='Cancelada'){echo 'selected';}?>>Cancelada</option>
                        </select>
            
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <input class="btn btn-primary" type="submit" name="Cargarestatus" value="Cargar">
                    </div>
                </form>
              </div>
              </div>
          </div>
      </div>










              <ul class="dropdown-menu">    
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
