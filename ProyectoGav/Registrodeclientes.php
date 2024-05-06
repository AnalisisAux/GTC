<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/estilo.css">
<?php 
include ('header.php');
include ('conexion.php');
include("FormularioregistroClientes.php");
include("Formularioverificador.php");

?>
</head>
<body>

    <form method = "post" class="row g-3" >
        <h2>Registro de nuevo cliente</h2>

        <div class = "col-md-6">
            <label class="form-label">Nombre comercial</label>
            <input type="text" name="Nombrecomercial">
        </div>
<br>
        <div class = "col-md-6">
            <label class="form-label">Régimen fiscal</label>
            <input type="text" name="Régimenfiscal">
        </div>
        <br>
        <div class = "col-md-6">  
            <label class="form-label">Razón social</label>
            <input type="text" name="Razónsocial">
        </div>

        <br>

        <!--boton radio-->
     
  <!-- <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Persona moral
  </label>

  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Persona fisica
  </label>-->
        <!--boton radio fin-->



        <div class = "col-md-6">
            <label class="form-label">RFC</label>
            <input type="text" name="RFC" maxlength="13">
        </div>
        <br>

        <div class = "col-md-4">
            <label class="form-label">Teléfono</label>
            <input type="text" name="Teléfono">
        </div>
        <br>
        <div class = "col-md-4">
            <label class="form-label">Celular</label>
            <input type="text" name="Celular">
        </div>
        <br>
        <div class = "col-md-4">
            <label class="form-label">Correo</label>
            <input type="text" name="Correo">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Dirección</label>
            <input type="text" name="Dirección">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Ciudad</label>
            <input type="text" name="Ciudad">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Estado</label>
            <input type="text" name="Estado">
        </div>
        <br>
        <div class = "col-md-6">
            <label class="form-label">Codigo postal</label>
            <input type="text" name="Codigopostal">
        </div>
        <input class="btn btn-primary" type="submit" name="Registrar" value="Registrar" href="clientes.php" >

    </form>
    <a class="btn btn-primary" href="clientes.php" role="button">Regresar a clientes</a>
</body>
</html>