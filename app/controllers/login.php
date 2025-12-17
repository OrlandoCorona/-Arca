<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arca";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["id_usuario"] = $row["id"];
        header("Location: /?view=home");
        exit();
    } else {
        header("Location: /?view=incorrect-password");
        exit();
    }

    $conn->close();
} else {
    header("Location: /?view=login");
    exit();
}
?>