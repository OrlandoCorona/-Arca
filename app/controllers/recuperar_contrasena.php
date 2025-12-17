<?php
// Verificar si se ha enviado un correo electrónico
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $correo = $_POST["correo"];

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

    // Consulta SQL para buscar el correo electrónico en la base de datos
    $sql = "SELECT contrasena FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo electrónico existe en la base de datos
        $row = $result->fetch_assoc();
        $contrasena = $row["contrasena"];

        // Guardar la contraseña en una sesión
        session_start();
        $_SESSION['contrasena'] = $contrasena;

        // Redirigir a la página de recuperación de contraseña exitosa
        header("Location: recuperacion_de_contraseña.php");
        exit();
    } else {
        header("Location: /?view=recover-password");
        exit();
    }
} else {
    // Si se intenta acceder al archivo directamente sin enviar datos, redirigir a la página de inicio
    header("Location: /?view=home");
    exit();
}
?>
