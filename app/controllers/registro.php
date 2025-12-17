<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos obligatorios están completos
    if (empty($_POST["correo"]) || empty($_POST["nombre"]) || empty($_POST["apellido_paterno"]) || empty($_POST["apellido_materno"]) || empty($_POST["telefono"]) || empty($_POST["contrasena"]) || empty($_POST["repass"])) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Obtener los datos del formulario
    $correo = $_POST["correo"];
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $telefono = $_POST["telefono"];
    $contrasena = $_POST["contrasena"];

    // Establecer las credenciales de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = ""; // Contraseña vacía
    $dbname = "arca";

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Verificar si el correo ya está registrado
    $sql_check = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql_check);
    if ($result->num_rows > 0) {
        header("Location: correo_ya_registrado.html");
        exit();
    }

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO usuarios (correo, nombre, apellido_paterno, apellido_materno, telefono, contrasena)
            VALUES ('$correo', '$nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$contrasena')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de registro exitoso
        header("Location: registro_exitoso.html");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si se intenta acceder al archivo directamente sin enviar datos, redirigir a inicio.html
    header("Location: inicio.html");
    exit();
}
?>
