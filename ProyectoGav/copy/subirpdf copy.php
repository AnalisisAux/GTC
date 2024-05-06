<?php
include "header.php";
include "conexion.php";
$NumrefT = !empty($_POST['NumrefT'])? $_POST['NumrefT']: null;
$file_name = $_FILES['file']['name'];
$file_temp = $_FILES['file']['tmp_name'];
$route = "Formulario/".$file_name;
move_uploaded_file($file_temp, $route);
$sql="INSERT INTO clientes  (PDF) VALUE ('$file_name')";
$sql=mysqli_query($conexion,$sql);    





?>