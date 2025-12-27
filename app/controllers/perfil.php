<?php
declare(strict_types=1);

/**
 * ============================
 * PERFIL DE USUARIO (PROTEGIDO)
 * ============================
 */

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$id_usuario = (int) $_SESSION['id_usuario'];

/**
 * Obtener datos del usuario
 */
$sql = "
    SELECT
        nombre,
        apellido_paterno,
        apellido_materno,
        correo,
        telefono,
        creado_en
    FROM usuarios
    WHERE id_usuario = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $id_usuario
]);

$usuario = $stmt->fetch();

if (!$usuario) {
    // Seguridad: si algo raro pasa, cerramos sesión
    header('Location: /?action=logout');
    exit;
}

/**
 * Cargar vista
 */
require __DIR__ . '/../views/perfil.php';
exit;
