<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
        <?php
        include("conexion.php");
        ?>

    <div class="formulario">
        <h1>Inicio de sesion</h1>

        <form method = "post" action="Validacion.php">
            <div class="username">
                <input type="text" id="username" name="username" required placeholder = "Nombre de usuario">
                <!-- <label>Nombre de usuario</label> -->
            </div>
            <div class="username">
                <input type="password" id="password" name="password" required placeholder = "Contraseña">
                <!-- <label>Contraseña</label> -->
            </div>
            <input type="submit"  name="Inicio">
            <div id="error-msg" class="dialog">
       <?php if(isset($_GET['error'])) { echo $_GET['error']; } 
        ?>
      </div>
        </form>
    </div>    
</body>
</html>