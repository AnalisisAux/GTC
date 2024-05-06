<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="CSS/styletable.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
    <?php 
      include ("header.php");
      include ('conexion.php');
      include ('registrarcotizacion.php');

      $estatuscotizacion = $mostrar["estatus"]?? null;
      $Folio= $_GET['Folio']?? null;
      
      $sql="SELECT * FROM cotizacion ";
      $result=mysqli_query($conexion, $sql);
      $mostrar=mysqli_fetch_array($result)


    ?>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
        $("#ocultar").click(function(){
            $('th:nth-child(7)').toggle();
            $('td:nth-child(7)').toggle();
            $('th:nth-child(8)').toggle();
            $('td:nth-child(8)').toggle();
            $('th:nth-child(9)').toggle();
            $('td:nth-child(9)').toggle();
        });
    });


    $(document).ready(function(){
        $("#financiamientoocultar").click(function(){
            $('th:nth-child(10)').toggle();
            $('td:nth-child(10)').toggle();
            $('th:nth-child(11)').toggle();
            $('td:nth-child(11)').toggle();
            $('th:nth-child(12)').toggle();
            $('td:nth-child(12)').toggle();
        });
    });
    $(document).ready(function(){
        $("#IVAoocultar").click(function(){
            $('th:nth-child(13)').toggle();
            $('td:nth-child(13)').toggle();
        });
    });
    </script> 
    <body>
    <h2>Cotizaciones</h2>






    <div class="d-grid gap-2 col-4 mx-auto">
      <!-- boton modal de diseño-->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Nueva cotizacion
      </button>
</div>

<br>

      <!-- Modal general -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva cotizacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="accordion accordion-flush" id="Cargaracordeon">
                                <!--Primera accion-->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Tipodecotizacion" aria-expanded="false" aria-controls="Tipodecotizacion">
                      Tipo de cotizacion:
                    </button></h2>
                    <div id="Tipodecotizacion" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">                      
                        <form method="post"  class="row g-3" >
                                <!--botones tipo radio-->
                          <label>Tipo de cotizacion:  </label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipodecotizacion" id="Radio1" value="Capacitacion">
                            <label class="form-check-label" for="flexRadioDefault1">Personal/Capacitacion</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipodecotizacion" id="Radio2" value="Inspeccion">
                            <label class="form-check-label" for="flexRadioDefault2">Equipo/Inspeccion</label>
                          </div>
                              <!--solicitantes-->
                          <div class = "col-md-10">
                            <label class="form-label">Solicitante:</label> <br>
                            <input class="form-control" type="text" name="Solicitante">
                          </div>
                          <div class = "col-md-2">
                            <label class="form-label">Fecha de cotizacion:</label> <br>
                            <input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" name="Fechadecotizacion">
                          </div>
                          <div class = "col-md-6">
                            <label class="form-label">Clientes:</label> <br>
                            <input class="form-control" type="text" name="Clientes">
                          </div>  
                          <div class = "col-md-6">
                            <label class="form-label">Contacto:</label> <br>
                            <input class="form-control" type="text" name="Contacto">
                          </div>  
                            <label class="form-label">Comentarios:</label>
                          <textarea class="form-control"  rows="5" cols="50" name="Comentarios"></textarea>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <input class="btn btn-primary" type="submit" name="Cargar" value="Cargar">
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
                                <!--Segunda accion-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Calculodecotizaciones" aria-expanded="false" aria-controls="Calculodecotizaciones">
                        Calculo de cotizaciones
                      </button>
                    </h2>
                    <div id="Calculodecotizaciones" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        <?php 
                          $credito = !empty($_GET['credito'])? $_POST['credito']:null;
                          $financiamiento = !empty($_GET['financiamiento'])? $_POST['financiamiento']:null;
                        ?>
                        <script>
                          function cal() {
                            try {
                              var a = parseInt(document.f.num1.value),
                                  b = parseInt(document.f.num2.value),
                                  DescuentoIngresado = parseInt(document.f.Descuento.value);
                                  FinanciamientoIngresado = parseInt(document.f.Financiamiento.value);
                            
                                  multi = (a * b);
                                  DescuentoPorcentaje = DescuentoIngresado/100;
                                  DescuentoPorUnidad = DescuentoPorcentaje*a;
                                  DescuentoTotal = DescuentoPorUnidad* b;
                                  DescuentoParaprecio= a - DescuentoPorUnidad;

                                  document.f.DescuentoUnitario.value=DescuentoPorUnidad;
                                  document.f.DescuentoGeneral.value=DescuentoTotal;
                                  document.f.DescuentoGeneral2.value=DescuentoTotal; 
                                  
                                  document.f.FinanciamientoUnitario.value=  DescuentoParaprecio * (FinanciamientoIngresado/100);
                                  document.f.FinanciamientoTotal.value=  b * (DescuentoParaprecio * (FinanciamientoIngresado/100));
                                  document.f.FinanciamientoTotal2.value=  b * (DescuentoParaprecio * (FinanciamientoIngresado/100));
                                  FinanciamientoTot=  b * (DescuentoParaprecio * (FinanciamientoIngresado/100));
                        
                                  iva = 0.16*(FinanciamientoTot+ (DescuentoParaprecio*b));

                                  document.f.ImporteInicial.value=multi;
                                  document.f.ImporteInicial2.value=multi;

                                  
                                  document.f.PrecioUnitario.value=DescuentoParaprecio + (DescuentoParaprecio * (FinanciamientoIngresado/100));
                                  document.f.ivat.value=iva;
                                  document.f.ivat2.value=iva;
                                  document.f.Importefinal.value = FinanciamientoTot+ (DescuentoParaprecio*b);
                                  document.f.Importefinal2.value = FinanciamientoTot+ (DescuentoParaprecio*b);
                                  document.f.totalFinal.value = iva+(FinanciamientoTot+ (DescuentoParaprecio*b));
                                
                                  
                            } catch (e) {
                            }
                          }
                        </script>



                        <script>
                            var opciones = {
                              //solución, material y tiempo
                              "0": ["0", "0"],
                              "1": ["1", "1"],
                              "2": ["2", "2"],
                              "3": ["3", "3"],
                              "4": ["4", "4"],
                              "5": ["5", "5"],
                              "6": ["6", "6"],
                              "7": ["8", "8"]
                            }

                            function cambioOpciones()

                            {
                              var combo = document.getElementById('opciones');
                              var opcion = combo.value;
                              
                            
                              document.getElementById('Financiamiento').value = opciones[opcion][0];

                              document.getElementById('finan02').value = opciones[opcion][1];

                              

                            }
                        </script>
                        <form method="post"  class="row g-3">
                              <!--botones tipo radio-->
                              <label>Tipo de cotizacion:  </label>
                                <div class = "col-md-4">
                                  <!--tipo de vigencia-->
                                    <a>Vigencia</a>
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>15 Dias</option>
                                        <option value="1">30 Dias</option>
                                        <option value="2">45 Dias</option>
                                        <option value="3">60 Dias</option>
                                        <option value="4">90 Dias</option>
                                        <option value="5">120 Dias</option>
                                      </select>
                                </div>
                                <div class = "col-md-4">
                                  <!--tipo de financiamiento-->
                                  <a>Financiamiento</a>
                                  <select class="form-select" aria-label="Default select example" id='opciones' onchange='cambioOpciones();'>
                                    <option>Seleccione una opcion</option>            
                                    <option value="0">Contado</option>
                                    <option value="1">Credito a 15 dias</option>
                                    <option value="2">Credito a 30 dias</option>
                                    <option value="3">Credito a 45 dias</option>
                                    <option value="4">Credito a 60 dias</option>
                                    <option value="5">Credito a 70 dias</option>
                                    <option value="6">Credito a 90 dias</option>
                                    <option value="7">Credito a 120 dias</option>
                                  </select>
                                </div>          
                                <div class = "col-md-4">
                                  <!--tipo de impuestos-->
                                  <a>Impuesto %</a>
                                  <br><input class="form-control text-end" type='text' id='finan02' disabled readonly/>
                                </div>
                                  <!--implementacion de checkbox-->
                                <div class="form-check form-check-inline col-md-3">
                                  <input class="form-check-input" type="checkbox" id="ocultar" checked>
                                  <label class="form-check-label" for="inlineCheckbox1">Descuentos</label>
                                </div>
                                <div class="form-check form-check-inline col-md-3">
                                  <input class="form-check-input" type="checkbox" id="financiamientoocultar" checked >
                                  <label class="form-check-label" for="inlineCheckbox2">Financiamiento</label>
                                </div>
                                <div class="form-check form-check-inline col-md-3">
                                  <input class="form-check-input" type="checkbox" id="IVAoocultar" checked >
                                  <label class="form-check-label" for="inlineCheckbox3">IVA</label>
                                </div>
                        </form>
                        <br>


                        <input class="btn btn-primary" type="button" value="Partida" id="guardar">
                        <br><br>
                        <div class="table-responsive">
                          <table class="table table-bordered" style='font-size: 13px;'>
                              <thead class="table-success table-striped">
                                <tr>
                                  <td>No.</td>
                                  <td>Acciones</td>
                                  <td>Clave</td>
                                  <td>Descripcion</td>
                                  <td>Precio lista</td>
                                  <td>Cantidad</td>
                                  <td>Descuento % </td>
                                  <td>Descuento unitario $</td>
                                  <td>Descuento total $</td>
                                  <td>Financiamiento %</td>
                                  <td>Financiamiento unitario $</td>
                                  <td>Financiamiento total $</td>
                                  <td>IVA</td>
                                  <td>Precio unitario </td>
                                  <td>Importe inicial</td>
                                  <td>Importe final</td>
                                </tr>
                              </thead>
                              <tbody>
                                <form name="f" method="post"  >
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <div  action="" method="GET">
                                          <input class="form-control" type="text" name="Clave" >
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
                                    </td>
                                    <td><input class="form-control" type="text" name="Descripcion" value="" placeholder = "Descripcion"/></td>
                                    <td><input class="form-control" type="text" name="num1" value="" onchange="cal()" onkeyup="cal()" placeholder = "$0"/></td>
                                    <td><input class="form-control" type="text" name="num2" value="0" onchange="cal()" onkeyup="cal()" placeholder = "0"/></td>
                                    <td><input class="form-control" type="text" name="Descuento" value="0" onchange="cal()" onkeyup="cal()" placeholder = "0%" maxlength ='2'/></td>
                                    <td><input class="form-control" type="text" name="DescuentoUnitario" value="" placeholder = "$0" readonly="readonly" /></td>
                                    <td><input class="form-control" type="text" name="DescuentoGeneral" value="" placeholder = "$0.00" readonly="readonly"/></td>
                                    <td><input class="form-control" type="text" name="Financiamiento" id='Financiamiento' value="0" onchange="cal()" onkeyup="cal()" placeholder = "0%" /></td>
                                    <td><input class="form-control" type="text" name="FinanciamientoUnitario" value="" placeholder = "$0.00" readonly="readonly"/></td>
                                    <td><input class="form-control" type="text" name="FinanciamientoTotal" value="" placeholder = "$0.00" readonly="readonly"/></td> 
                                    <td><input class="form-control" type="text" name="ivat" value="" placeholder = "$0.00" readonly="readonly"/></td>
                                    <td><input class="form-control" type="text" name="PrecioUnitario"  placeholder = "$0.00" readonly="readonly"/></td>
                                    <td><input class="form-control" type="text" name="ImporteInicial" value="" placeholder = "$0.00" readonly="readonly"/></td>
                                    <td><input class="form-control" type="text" name="Importefinal" value="" readonly="readonly" placeholder = "$0.00" /></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Importe:<input class="form-control" type="text" name="ImporteInicial2" value="" placeholder = "$0.00" readonly="readonly"/>
                                      Descuento:<input class="form-control" type="text" name="DescuentoGeneral2" value="" placeholder = "$0.00" readonly="readonly"/>
                                      Financiamiento:<input class="form-control" type="text" name="FinanciamientoTotal2" value="" placeholder = "$0.00" readonly="readonly"/>
                                      Subtotal:<input class="form-control" type="text" name="Importefinal2" value="" placeholder = "$0.00" readonly="readonly"/>
                                      IVA:<input class="form-control" type="text" name="ivat2" value="" placeholder = "$0.00" readonly="readonly"/>
                                      Total:<input class="form-control" type="text" name="totalFinal" value="" readonly="readonly" placeholder = "$0.00"/>       
                                    </td>
                                  </tr>
                                </form>
                              </tbody>
                              
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
                                <!--Tercera accion-->
                <div class="accordion-item">
                      <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#NotasAclaratorias" aria-expanded="false" aria-controls="NotasAclaratorias">
                            Notas aclaratorias
                          </button>
                      </h2>
                      <div id="NotasAclaratorias" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                              <!--Primer conjunto de notas-->
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                  Condiciones OIL FIELD/ Capacitaciones
                                </button>
                              </h2>
                              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  <input class="btn btn-primary" type="button" onclick="selectAll0()" value="Seleccionar todos"/>
                                  <input class="btn btn-primary" type="button" onclick="deselectAll0()" value="Deseleccionar todos"/>
                                  <br><br>
                                  <input class="form-check-input me-1" type="checkbox" name="Notas0" value=""> En caso en que un participante sea declarado como no conforme, es necesario posteriormente que presente de nuevo el curso con el costo correspondiente</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value="1"> El CLIENTE deberá proporcionar aula equipada con proyector pintaron y equipo (Maquinaria, vehículos o grúas) para la práctica cuando el curso sea en sus instalaciones</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value="2"> El CLIENTE preferentemente deberá confirmar con tres días de anticipación los trabajos para que se prepare el Material, personal y equipo con oportunidad para la movilización a la obra</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value="3"> Se debe confirmar la asistencia mediante depósito anticipado</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> Condiciones de pago. Contado por adelantado mediante depósito a cuenta</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> Los precios están cotizados en Moneda Mexicana (MXN). Precios y programación de la capacitación o inspección sujeto a disponibilidad con 48 horas de anticipación</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> La presente cotización ampara los cursos y personal cotizados, independientemente del resultado; cursos adicionales serán cotizadas por separado</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> Esta cotización tiene una vigencia de 30 días naturales a partir de su elaboración. Esperando que esta propuesta sea de acuerdo a sus requerimientos y que podamos contar con su confianza. Quedamos de ustedes para cualquier aclaración al respecto</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> Precios más IVA del 16%</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> El precio del servicio es en nuestras instalaciones, en Villahermosa  Tabasco. No incluye los gastos de viáticos por desplazamiento a otra ciudad para llevar a cabo la capacitación en su planta se deberán cubrir los gastos por cuenta del cliente de traslado aéreo, traslados terrestres, alimentación y hospedaje de un instructor y depositar por adelantado, costo que será tratado particularmente con el cliente</input>
                                  <br><br>
                                  <hr class="dropdown-divider">
                                  <input type="checkbox" name="Notas0" value=""> Los horarios de servicio son de lunes a viernes de 08:00 a 18:00 hrs., incluyendo 1 hora de comida. Fuera de estos horarios o día festivo se incrementan los precios en 30%. • En caso de que la capacitación sea llevada a cabo en instalaciones donde sea necesario que nuestro instructor atienda algún curso de seguridad o seminario para poder ingresar a dichas instalaciones y por ello requiera tiempo adicional para la verificación será motivo de nueva negociación</input>             
                                  <script>
                                      function selectAll0(){
                                      const all = document.getElementsByName("Notas0")
                                      all.forEach(item => item.checked = true)  }
                                      function deselectAll0(){
                                      const all = document.getElementsByName("Notas0")
                                      all.forEach(item => item.checked = false) }
                                  </script>
                                </div>
                              </div>
                            </div>
                              <!--Segundo conjunto de notas-->
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                  Condiciones OIL FIELD / Certificacion de equipos
                                </button>
                              </h2>
                              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  <input class="btn btn-primary" type="button" onclick="selectAll1()" value="Seleccionar todos"/>
                                  <input class="btn btn-primary" type="button" onclick="deselectAll1()" value="Deseleccionar todos"/>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> La presente cotización ampara solamente los equipos mencionados; inspecciones adicionales serán cotizadas por separado.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Horarios de servicio: lunes a viernes de 08:00 a 17:00 hrs., intermedia 1 hora de comida. Fuera de estos horarios o día festivo se incrementan los precios en 30%.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> El tiempo de entrega estará sujeto a que los elementos de inspección estén listos para la evaluación y condiciones climatológicas.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Si el cliente no puede cubrir los puntos No.12 y13, inciso a) del punto 2.-CUMPLIMIENTOS DEL CLIENTE con respecto a espacio y contrapesos  ( podrá elegir una de las siguientes 2 opciones que podemos ofrecerle:
                                        <br>
                                      * Que el cliente traslade su equipo a nuestras instalaciones ubicándolo a la base más cercana a su ubicacion, según corresponda, Villahermosa, Mérida, Poza Rica, Veracruz, Cd. del Carmen, Paraíso, Reforma, en donde le proporcionaremos el espacio sin costo. Y los contrapesos con costo adicional por la renta de estos, según los que se vayan a ocupar.
                                        <br>
                                      * Trasladar los contrapesos a su locación con costo adicional por el flete de traslado y la renta de los mismos.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Inspecciones en donde sea necesario que nuestro verificador atienda algún curso de seguridad o seminario para poder ingresar a dichas instalaciones y por ello requiera tiempo adicional para la verificación será motivo de nueva negociación.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Las cancelaciones o cambios de fechas del servicio ya sea de última hora, que el inspector se encuentre en tránsito de traslado al sitio de la inspección, se hayan comprado boletos de viaje ó una vez presentado el inspector en el sitio de trabajo, se darán como servicio realizado y/o unidad no conforme, se cobra el servicio y posterior a eso deberá ser considerado de acuerdo con lo dispuesto en los anteriores puntos 8 y 9 de estas CONDICIONES DE VENTA; a menos que ésta cancelación o cambio sea notificada oportunamente. (Para Servicios locales 24 hrs y Servicios Foráneos 48 hrs de anticipación)</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> El CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value="">Las inspecciones fuera de la cobertura local generan viáticos a cargo del cliente: traslado, alimentos, hospedaje. Depositar por adelantado, El costo será tratado particularmente con el cliente dependiendo la ubicación del equipo.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> El precio del servicio es en Villahermosa o en los alrededores cercanos a esta localidad. (Local)</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> El CLIENTE proporcionará iluminación y de requerirse andamios seguros.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> En caso de unidades “no conforme”, el servicio debe ser cobrado y se realiza una 2da. Visita con costo adicional solo por traslado del inspector y cuotas sindicales para verificación de Acciones Correctivas.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Si aún con la 2da visita el equipo sigue sin cumplir, a partir de una tercer o más visitas, además de la cláusula anterior (No.8) de estas CONDICIONES DE VENTA, se le contemplará un costo adicional del 50% del costo cotizado inicialmente, por cada visita que se realice a causa del mismo equipo, por lo cual se hará una nueva cotización.</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Se consideran tiempos muertos y/o horas hombres aplicadas toda vez que el inspector se presenta al sitio de trabajo, pero por parte del cliente no es posible la inspección por indisponibilidad del equipo u otras cuestiones del cliente, para lo cual se deberá aplicar la condición No. 10 de la presente CONDICIONES DE VENTA</input>
                                  <br><br>
                                  <input type="checkbox" name="Notas1" value=""> Condiciones de pago: Contado por adelantado mediante depósito a cuenta 254694783 CLABE 072790002546947837 de Banco Mercantil del Norte S.A a Nombre de  OIL FIELD TRAINING AND CERTIFICATION S.A DE C.V.  (Notifíquenos su pago vía correo o telefónica para Agendar el Servicio por lo menos con 2 días de anticipación)</input>
                                  <script>
                                      function selectAll1(){
                                      const all = document.getElementsByName("Notas1")
                                      all.forEach(item => item.checked = true)
                                      }
                                      function deselectAll1(){
                                      const all = document.getElementsByName("Notas1")
                                      all.forEach(item => item.checked = false)
                                      }
                                  </script>
                                </div>
                              </div>
                            </div>
                              <!--Tercer conjunto de notas-->
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                  Condiciones OIL FIELD / PND
                                </button>
                              </h2>
                              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">  
                                  <input class="btn btn-primary" type="button" onclick="selectAll2()" value="Seleccionar todos"/>
                                  <input class="btn btn-primary" type="button" onclick="deselectAll2()" value="Deseleccionar todos"/>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Condiciones de pago: Contado por adelantado mediante depósito a cuenta 254694783 CLABE 072790002546947837 de Banco Mercantil del Norte S.A a Nombre de  OIL FIELD TRAINING AND CERTIFICATION S.A DE C.V.  (Notifíquenos su pago vía correo o telefónica para Agendar el Servicio por lo menos con 2 días de anticipación)</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Las inspecciones fuera de la cobertura local generan viáticos a cargo del cliente: traslado, alimentos, hospedaje. Depositar por adelantado, El costo será tratado particularmente con el cliente dependiendo la ubicación del equipo.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> El CLIENTE proporcionará iluminación y de requerirse andamios seguros.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> La presente cotización ampara solamente los equipos mencionados; inspecciones adicionales serán cotizadas por separado.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Si aún con la 2da visita el equipo sigue sin cumplir se seguirán considerando los costos adicionales de acuerdo al caso específico de la  no conformidad que se vaya presentando</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> El CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> En caso de herramientas “no conforme”, el servicio debe ser cobrado y a petición del cliente se realiza una 2da. Visita para verificación de reparaciones con costo adicional de acuerdo al caso específico de la  no conformidad a verificar.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Inspecciones en donde sea necesario que nuestro verificador atienda algún curso de seguridad o seminario para poder ingresar a dichas instalaciones y por ello requiera tiempo adicional para la verificación será motivo de nueva negociación.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> El precio del servicio es en Villahermosa o en los alrededores cercanos a esta localidad. (Local)</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Se consideran tiempos muertos y/o horas hombres aplicadas toda vez que el inspector se presenta al sitio de trabajo, pero por parte del cliente no es posible la inspección por indisponibilidad del equipo u otras cuestiones del cliente, para lo cual se deberá aplicar la condición No. 9 de la presente CONDICIONES DE VENTA</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Horarios de servicio: lunes a viernes de 08:00 a 17:00 hrs., intermedia 1 hora de comida. Fuera de estos horarios o día festivo se incrementan los precios en 30%.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> El tiempo de entrega estará sujeto a que los elementos de inspección estén listos para la evaluación y condiciones climatológicas.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas2" value=""> Las cancelaciones o cambios de fechas del servicio ya sea de última hora, que el inspector se encuentre en tránsito de traslado al sitio de la inspección, se hayan comprado boletos de viaje ó una vez presentado el inspector en el sitio de trabajo, se darán como servicio realizado y/o unidad no conforme, se cobra el servicio y posterior a eso deberá ser considerado de acuerdo con lo dispuesto en los anteriores puntos 7 y 8 de estas CONDICIONES DE VENTA; a menos que ésta cancelación o cambio sea notificada oportunamente. (Para Servicios locales 24 hrs y Servicios Foráneos 48 hrs de anticipación)</input>     
                                  <script>
                                    function selectAll2(){
                                    const all = document.getElementsByName("Notas2")
                                    all.forEach(item => item.checked = true)
                                    }
                                    function deselectAll2(){
                                    const all = document.getElementsByName("Notas2")
                                    all.forEach(item => item.checked = false)
                                    }
                                  </script>
                                </div>
                              </div>
                            </div>
                              <!--Cuarto conjunto de notas-->
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Acordeon4" aria-expanded="false" aria-controls="Acordeon4">
                                  Condiciones OIL FIELD / Pruebas de carga
                                </button>
                              </h2>
                              <div id="Acordeon4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  <input class="btn btn-primary" type="button" onclick="selectAll3()" value="Seleccionar todos"/>
                                  <input class="btn btn-primary" type="button" onclick="deselectAll3()" value="Deseleccionar todos"/>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> El CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> El precio del servicio es en Villahermosa o en los alrededores cercanos a esta localidad. (Local)</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Horarios de servicio: lunes a viernes de 08:00 a 17:00 hrs., intermedia 1 hora de comida. Fuera de estos horarios o día festivo se incrementan los precios en 30%.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Las cancelaciones o cambios de fechas del servicio ya sea de última hora, que el inspector se encuentre en tránsito de traslado al sitio de la inspección, se hayan comprado boletos de viaje ó una vez presentado el inspector en el sitio de trabajo, se darán como servicio realizado y/o unidad no conforme, se cobra el servicio y posterior a eso deberá ser considerado de acuerdo con lo dispuesto en los anteriores puntos 8 y 9 de estas CONDICIONES DE VENTA; a menos que ésta cancelación o cambio sea notificada oportunamente. (Para Servicios locales 24 hrs y Servicios Foráneos 48 hrs de anticipación)</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> El tiempo de entrega estará sujeto a que los elementos de inspección estén listos para la evaluación y condiciones climatológicas.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Las inspecciones fuera de la cobertura local generan viáticos a cargo del cliente: traslado, alimentos, hospedaje. Depositar por adelantado, El costo será tratado particularmente con el cliente dependiendo la ubicación del equipo.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Inspecciones en donde sea necesario que nuestro verificador atienda algún curso de seguridad o seminario para poder ingresar a dichas instalaciones y por ello requiera tiempo adicional para la verificación será motivo de nueva negociación.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Condiciones de pago: Contado por adelantado mediante depósito a cuenta 254694783 CLABE 072790002546947837 de Banco Mercantil del Norte S.A a Nombre de  OIL FIELD TRAINING AND CERTIFICATION S.A DE C.V.  (Notifíquenos su pago vía correo o telefónica para Agendar el Servicio por lo menos con 2 días de anticipación)</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> En caso de unidades “no conforme”, el servicio debe ser cobrado y se realiza una 2da. Visita con costo adicional solo por traslado del inspector y cuotas sindicales para verificación de Acciones Correctivas.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> El CLIENTE proporcionará iluminación y de requerirse andamios seguros.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Si aún con la 2da visita el equipo sigue sin cumplir, a partir de una tercer o más visitas, además de la cláusula anterior (No.8) de estas CONDICIONES DE VENTA, se le contemplará un costo adicional del 50% del costo cotizado inicialmente, por cada visita que se realice a causa del mismo equipo, por lo cual se hará una nueva cotización.</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> Si el cliente no puede cubrir el  punto No.8, inciso a) del punto 2.-CUMPLIMIENTOS DEL CLIENTE con respecto a especificaciones técnicas podrá elegir una de las siguientes 2 opciones que podemos ofrecerle:
                                        <br>
                                        * Que el cliente realice previamente una memoria de cálculos de la herramienta que no tenga soporte con el proveedor que el elija
                                        <br>
                                        * Que el cliente nos solicite al Área de Ventas este servicio adicional para realizarle previamente la memoria de cálculos correspondiente</input>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas3" value=""> La presente cotización ampara solamente los equipos mencionados; inspecciones adicionales serán cotizadas por separado.</input>
                                  <script>
                                    function selectAll3(){
                                    const all = document.getElementsByName("Notas3")
                                    all.forEach(item => item.checked = true)
                                    }
                                    function deselectAll3(){
                                    const all = document.getElementsByName("Notas3")
                                    all.forEach(item => item.checked = false)
                                    }
                                  </script>
                                </div>
                              </div>
                            </div>
                              <!--Quinto conjunto de notas-->
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Acordeon5" aria-expanded="false" aria-controls="Acordeon4">
                                  Condiciones OIL FIELD / Adicionales
                                </button>
                              </h2>
                              <div id="Acordeon5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  <input class="btn btn-primary" type="button" onclick="selectAll4()" value="Seleccionar todos"/>
                                  <input class="btn btn-primary" type="button" onclick="deselectAll4()" value="Deseleccionar todos"/>
                                  <hr class="dropdown-divider"><br>
                                  <input type="checkbox" name="Notas4" value=""> Adicionales</input>
                                  <div class="input-group mb-3">
                                      <div class="input-group-text">
                                        <input class="form-check-input mt-0"  type="checkbox" value="" aria-label="Checkbox for following text input">
                                      </div>
                                      <input type="text" class="form-control" aria-label="Text input with checkbox">
                                  </div>
                                  <script>
                                    function selectAll4(){
                                    const all = document.getElementsByName("Notas4")
                                    all.forEach(item => item.checked = true)
                                    }
                                    function deselectAll4(){
                                    const all = document.getElementsByName("Notas4")
                                    all.forEach(item => item.checked = false)
                                    }
                                  </script>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <input class="btn btn-primary" type="submit" name="Cargar" value="Cargar">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!--tabla-->
      <div class="table-responsive">
<table class ="table table-bordered" style='font-size: 13px;'>
    <thead class="table-success table-striped">
      <tr>
        <td>Cotización / folio sustituta:</td>
        <td>Estatus:</td>
        <td>Cliente / razon social:</td>
        <td>Contacto / nombre completo:</td>
        <td>Contacto / celular:</td>
        <td>Contacto / correo:</td>
        <td>Comentario:</td>
        <td></td>
        <td>Estatus</td>
              
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT * FROM cotizacion";
        $result=mysqli_query($conexion, $sql);
        while ($mostrar=mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $mostrar["Folio"]?></td>
        <td><?php echo $mostrar["estatus"]?></td>
        <td><?php echo $mostrar["Clientes"]?></td>
        <td><?php echo $mostrar["Solicitante"]?></td>
        <td><?php echo $mostrar["Contacto"]?></td>
        <td><?php echo $mostrar["Correo"]?></td>
        <td><?php echo $mostrar["Comentarios"]?></td>
        <td><?php echo $mostrar["Condiciones"]?></td>
        <td>
          
<!-- boton modal de diseño-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tablamodal">
      Estatus

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

        </td>
          <?php
            }
          ?>
    </tbody>
</table>
          </div>
<!--tabla-->
    </body>
</html>






