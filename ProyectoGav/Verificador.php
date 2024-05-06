<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="CSS/estiloverificador.css">
<?php 
include "header.php";
include "conexion.php";
include "Formularioverificador.php";

$numeref= $_GET['Numref']?? null;
$activo = $mostrar["Estadoverificado"]?? null;

$sql="SELECT * FROM clientes WHERE  Numref = '$numeref'";
$result=mysqli_query($conexion, $sql);
$mostrar=mysqli_fetch_array($result);

?>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-6">

<?php   

            if(isset($_POST["enviar"])){  
            }else{
        ?>
        <form method="post" action="<?=$_SERVER["PHP_SELF"]?>" class="row g-3">
            <h2>Datos de cliente</h2>
                <div class = "col-md-6">
                    <label class="form-label">Numero de referencia</label>
                    <input type="text" name="NumrefT" value="<?php  echo $mostrar["Numref"]?? null ?>">
                </div>
            
                <br>

                <div class = "col-md-6">
                <label class="form-label">Nombre comercial</label>
                <input type="text" name="NombrecomT" value="<?php  echo $mostrar["Nombrecom"]?? null ?>">
            </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Régimen fiscal</label>
                    <input type="text" name="RegimenfiscalT" value="<?php  echo $mostrar["Regimenfiscal"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Razón social</label>
                     <input type="text" name="RazonsocialT" value="<?php  echo $mostrar["Razonsocial"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">RFC</label>
                    <input type="text"  maxlength ='13' name="RFCT" value="<?php  echo $mostrar["RFC"]?? null ?>">
                  </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="TelefonoT" value="<?php  echo $mostrar["Telefono"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Celular</label>
                    <input type="text" name="CelularT" value="<?php  echo $mostrar["Celular"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="text" name="CorreoT" value="<?php  echo $mostrar["Correo"]?? null ?>">
                </div>

                <br>
                <div class = "col-md-6">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="DireccionT" value="<?php  echo $mostrar["Direccion"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="CiudadT" value="<?php  echo $mostrar["Ciudad"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Estado</label>
                    <input type="text" name="EstadoT" value="<?php  echo $mostrar["Estado"]?? null ?>">
                </div>

                <br>

                <div class = "col-md-6">
                    <label class="form-label">Codigo postal</label>
                    <input type="text" name="CodigopostalT" value="<?php  echo $mostrar["Codigopostal"]?? null ?>">
                </div>
                <br>
                        <!--Inplementacion del apartado de verificaion-->
                <label>Estado de verificaion</label>
                <select name="activo">
                    <option value="Sinverificar" <?php if($activo=='Sinverificar'){echo 'selected';}?>>Sin verificar</option>
                    <option value="Verificado" <?php if($activo=='Verificado'){echo 'selected';}?>>Verificado</option>
                </select>
                <br>
            
                <input class="btn btn-primary"  href="clientes.php" type="submit" name="Actualizar" value="Actualizar">
        </form>

                <?php
                }
//Asignacion de variables para el update
                $activo = !empty($_POST['activo'])? $_POST['activo']:null;
                $NumrefT = !empty($_POST['NumrefT'])? $_POST['NumrefT']: null;
                $NombrecomT = !empty($_POST['NombrecomT'])?$_POST['NombrecomT']: null;
                $RegimenfiscalT = !empty($_POST['RegimenfiscalT'])?$_POST['RegimenfiscalT']:null;
                $RazonsocialT = !empty($_POST['RazonsocialT'])?$_POST['RazonsocialT']: null;
                $RFCT = !empty($_POST['RFCT'])?$_POST['RFCT']: null;
                $TelefonoT = !empty($_POST['TelefonoT'])?$_POST['TelefonoT']:null;
                $CelularT = !empty($_POST['CelularT'])?$_POST['CelularT']:null;
                $CorreoT = !empty($_POST['CorreoT'])?$_POST['CorreoT']:null;
                $DireccionT = !empty($_POST['DireccionT'])?$_POST['DireccionT']:null;
                $CiudadT = !empty($_POST['CiudadT'])?$_POST['CiudadT']:null;
                $EstadoT = !empty($_POST['EstadoT'])?$_POST['EstadoT']:null;
                $CodigopostalT = !empty($_POST['CodigopostalT'])?$_POST['CodigopostalT']:null;
                $archivoT = !empty($_POST['archivo'])?$_POST['archivo']:null;

                if (isset($_POST['Actualizar'])){
                    $sql="UPDATE clientes SET Nombrecom='$NombrecomT',
                    Regimenfiscal='$RegimenfiscalT', Razonsocial='$RazonsocialT', Estadoverificado= '$activo',
                    RFC='$RFCT', Telefono='$TelefonoT', Celular='$CelularT', 
                    Correo='$CorreoT', Direccion='$DireccionT',Ciudad='$CiudadT',
                    Estado='$EstadoT',Codigopostal='$CodigopostalT' WHERE Numref = $NumrefT";
                    if($conexion->query($sql) === true){
                    }
                    else{
                        die("ERROR: " . $conexion->error);
                    }
            }
            
            $conexion->close();
                ?>
            
    </form>
    <br>

    <a class="btn btn-primary" href="clientes.php" role="button">Regresar a clientes</a>

    </div>
    <div class="col-6">

    <!-- Mostrar PDF -->
    <div class="container-sm">

      <form method = "post">
        <h3>Constancia</h3>
        <embed src="Formulario/<?php  echo $mostrar["Codigopostal"]?? null ?>"  type="application/pdf" width="125%" height="800px" />
        <br>
      </form>
    </div> 
    <!--mostrar pdf-->

<!--subir constancia-->
<form action="subirpdf.php" method="POST" enctype = "multipart/form-data">
    <h3>Subir constancia</h3>
    <div class="mb-3">

        <label for="file">Subir PDF</label>
        <input type="file" id="file" name="file">
        <input type="submit"  value="Subir" >


    </div>
 
    </form>

    </div>
  </div>
</body>
</html>