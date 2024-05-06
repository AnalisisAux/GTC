<link rel="stylesheet" href="CSS/estilo.css">
<?php
    include ('header.php');
    include ('conexion.php');
   

    $numeref= $_GET['Numref']?? null;

$sql="SELECT * FROM clientes WHERE  Numref = '$numeref'";
$result=mysqli_query($conexion, $sql);
$mostrar=mysqli_fetch_array($result);

?>
</head>
<body>
<?php
        if(isset($_POST["enviar"])){  
        }else{
    ?>
    <form method="post" action="<?=$_SERVER["PHP_SELF"]?>" class="row g-3">
        <h2>Datos de cliente</h2>
            <div class = "col-md-4">
                <label class="form-label">Numero de referencia</label>
                <input type="text" name="NumrefT" value="<?php  echo $mostrar['Numref']??NULL ?>">
            </div>  
            <br>
            <div class = "col-md-4">
            <label class="form-label">Nombre comercial</label>
            <input type="text" name="NombrecomT" value="<?php  echo $mostrar["Nombrecom"]??null ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Régimen fiscal</label>
                <input type="text" name="RegimenfiscalT" value="<?php   echo $mostrar["Regimenfiscal"]??null   ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Razón social</label>
                 <input type="text" name="RazonsocialT" value="<?php  echo $mostrar["Razonsocial"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">RFC</label>
                <input type="text" maxlength='15' name="RFCT" value="<?php  echo $mostrar["RFC"]??null  ?>">
              </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Teléfono</label>
                <input type="text" name="TelefonoT" value="<?php  echo $mostrar["Telefono"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Celular</label>
                <input type="text" name="CelularT" value="<?php  echo $mostrar["Celular"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Correo</label>
                <input type="text" name="CorreoT" value="<?php  echo $mostrar["Correo"]??null  ?>">
            </div>

            <br>
            <div class = "col-md-4">
                <label class="form-label">Dirección</label>
                <input type="text" name="DireccionT" value="<?php  echo $mostrar["Direccion"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Ciudad</label>
                <input type="text" name="CiudadT" value="<?php  echo $mostrar["Ciudad"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Estado</label>
                <input type="text" name="EstadoT" value="<?php  echo $mostrar["Estado"]??null  ?>">
            </div>

            <br>

            <div class = "col-md-4">
                <label class="form-label">Codigo postal</label>
                <input type="text" name="CodigopostalT" value="<?php  echo $mostrar["Codigopostal"]??null  ?>">
            </div>
            <br>
                    <!--<input type="submit" value="Guardar"-->
            <br>
        
            <input class="btn btn-primary" type="submit" name="Actualizar" value="Actualizar">
    </form>
            <?php
            }
//Asignacion de variables para el update
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

            if (isset($_POST['Actualizar'])){
                $sql="UPDATE clientes SET Nombrecom='$NombrecomT',
                Regimenfiscal='$RegimenfiscalT', Razonsocial='$RazonsocialT', 
                RFC='$RFCT', Telefono='$TelefonoT', Celular='$CelularT', 
                Correo='$CorreoT', Direccion='$DireccionT',Ciudad='$CiudadT',
                Estado='$EstadoT',Codigopostal='$CodigopostalT' WHERE Numref = '$NumrefT'";
                if($conexion->query($sql) === true){
                }
                else{
                    die("ERROR: " . $conexion->error);
                }
        }
        $conexion->close();
            ?>
          <a class="btn btn-primary" href="clientes.php" role="button">Regresar a los clientes</a>
</form>