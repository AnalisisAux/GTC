<?php

  if(isset($_GET["Clave"]) && $_GET["Clave"] != ''){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "proyectogav";
    $conn = new mysqli($servername, $username,  $password,  $database);

    if($conn->connect_error){
      die ("Error en la conexion: ");
    }

    $Clave = $_GET['Clave'];
    $sql = "SELECT * FROM servicios WHERE Clave LIKE
    '%$Clave%'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){

      while($row = $result->fetch_assoc()){
        echo "<li>" .  $row["Clave"] . "</li>";
      }
 
    }else{
      echo "<li>" . "No contamos con $Clave de servicio en este momento" . "</li>";
    }
    $conn->close();
  }
  ?>