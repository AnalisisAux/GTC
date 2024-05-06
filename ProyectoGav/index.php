<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    include "header.php";
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Document</title>
</head>
<body>

  <form action="" method="GET">
    <input type="text" name="Clave" >
    <input type="submit" value ="Buscar">
  </form>
  <div id = "resultados"></div>
  <script>
    $(document).ready(function(){

      $('input[name="Clave"]').on('keyup',function(){
        var Clave = $(this).val();

        $.ajax({
          url:'buscador.php',
          type:'GET',
          data:{Clave: Clave},
          success: function(response){
            $('#resultados').html(response);
          }
        });

      });
    });
  </script>
  
</body>
</html>