<?php
//Conexion a la base de datos
    include ('conexion.php');
    if (isset($_POST['Registrar'])){
        if(
            //Validacion de contenido de campos (llenos o vacios)
            strlen($_POST['Correo']) >= 1 &&
            strlen($_POST['Clave']) >= 1 &&
            strlen($_POST['Nombres']) >= 1 &&
            strlen($_POST['ApellidoP']) >= 1 &&
            strlen($_POST['ApellidoM']) >= 1 ){
            //asignacion de las variables
            $Correo = trim($_POST['Correo']);
            $Clave = trim($_POST['Clave']);
            $Nombres = trim($_POST['Nombres']);
            $ApellidoP = trim($_POST['ApellidoP']);
            $ApellidoM = trim($_POST['ApellidoM']);
            //Sentencia de introduccion en la base de datos
            $consultas = "INSERT INTO usuarios( Correo, Clave, Nombres, ApellidoP, ApellidoM) 
            VALUES ('$Correo ',' $Clave','$Nombres','$ApellidoP',' $ApellidoM')";
            $resultado = mysqli_query($conexion,$consultas);
            //alertas de los resultados de ingreso en base de datos

        }}
?>