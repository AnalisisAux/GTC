<td> <div  action="" method="GET"> <input  type="text" size="12" name="Clave[]">
            
            </div>
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