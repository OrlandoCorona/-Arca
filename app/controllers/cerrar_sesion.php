<?php
session_start();

/* Destruir la sesión */
$_SESSION = [];
session_destroy();

/* Redirigir usando el router */
header("Location: /?view=login");
exit();
