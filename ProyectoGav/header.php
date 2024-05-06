<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
    rel="stylesheet"/>
    <title>MENU</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-4 m-0 border-0 bd-example m-0 border-0">  
    <!-- inicio del navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="btn btn-primary" href="CerrarSesion.php" role="button">Cerrar Sesion</a>
        <div class="container-fluid">
          <!--fuera de lienzo-->
          <div
            class="offcanvas offcanvas-start text-bg-dark"
            tabindex="-1"
            id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <!--Modulos-->
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                Modulos
              </h5>
              <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close">
              </button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <!--Modulo de inicio-->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Inicio.php">Inicio</a>
                </li>
                <!--Modulo de usuarios -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="usuario.php">Usuario</a>
                </li>
                <!--Modulo de empleados/personal -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Empleadospersonal.php">Empleados/Personal</a>
                </li>
                <!--Modulo de clientes -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="clientes.php">Clientes</a>
                </li>
                <!--Modulo de cotizaciones -->
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="cotizacion.php">Cotizaciones</a>
                </li>
                <!--Modulo de capacitaciones  -->
                <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="Capacitaciones"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">Capacitaciones
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <a class="dropdown-item" href="listadecapacitaciones.php">Lista de capacitaciones</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="Listadecertificados.php">Lista de certificados</a>
                  </li>
                </ul>
              </li>
              <!--Modulo de inspecciones -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="Inspecciones.php"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">Inspecciones
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <a class="dropdown-item" href="Listadeinspecciones.php">Lista de inspecciones</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider"/>
                  </li>
                  <li>
                    <a class="dropdown-item" href="Listadecertificados.php">Lista de certificados</a>
                  </li>
                </ul>
              </li>
              <!--Modulo de inspecciones -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="Catalogos"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">Catalogos
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="Instructores.php">Instructores</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="Cursos.php">Cursos</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="Marcasdeunidad.php">Marcas de unidad</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="Tiposdeunida.php">Tipos de unidad</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="Cuentasbancarias.php">Cuentas bancarias</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="Servicios.php">Servicios</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="Notasaclaratorias.php">Notas aclaratorias</a>
                  </li>
                </ul>
              </li>
              <!--Modulo de Configuracion -->
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Configuración.php">Configuración</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Fin del navbar -->
</body>
</html>