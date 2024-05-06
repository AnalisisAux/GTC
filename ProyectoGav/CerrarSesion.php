<?php
// Inicia las sesiones
session_start();
session_unset();
// Destruye cualquier sesión del usuario
session_destroy();
// Redirecciona a login.php
header('Location: Login.php');
