# Copilot Instructions for ElArcaWeb

## Arquitectura General
- Proyecto PHP estructurado en MVC clásico:
  - `app/controllers/`: Lógica de negocio y controladores de rutas.
  - `app/views/`: Vistas HTML y plantillas PHP.
  - `public/`: Punto de entrada (`index.php`), recursos estáticos (CSS, JS, imágenes).
  - `config/`: Archivos de configuración y base de datos (`BD.sql`).
- No se utiliza framework PHP moderno (como Laravel), la estructura es personalizada.

## Flujos y Convenciones Clave
- **Autenticación y sesiones:**
  - Controladores como `AuthController.php`, `login.php`, `cerrar_sesion.php` gestionan login/logout.
  - Las vistas de autenticación están en `app/views/auth/`.
- **Reservas:**
  - Lógica en `realizar_reserva.php` y `reservaciones.php`.
  - Confirmaciones y notificaciones por correo en `correo_de_reserva.php`.
- **Vistas:**
  - HTML y PHP mezclados, sin motor de plantillas externo.
  - Partials en `app/views/partials/`.
- **Estilos y scripts:**
  - CSS y JS en `public/assets/`.

## Dependencias y Herramientas
- **Composer:**
  - Dependencias PHP gestionadas en `composer.json` y `vendor/`.
  - Incluye PHPMailer para envío de correos (`vendor/phpmailer/`).
- **Docker:**
  - Archivo `Dockerfile` para despliegue/entorno reproducible.

## Prácticas Específicas
- No hay tests automatizados ni scripts de build documentados.
- Los controladores suelen incluir directamente archivos de conexión y utilidades.
- Las rutas y flujos de usuario se gestionan manualmente en los controladores y el `index.php` público.

## Ejemplos de Patrones
- Para agregar un nuevo flujo:
  1. Crear controlador en `app/controllers/`.
  2. Crear vista en `app/views/`.
  3. Registrar la ruta en `public/index.php`.
- Para enviar correo:
  - Usar PHPMailer desde `vendor/phpmailer/` (ver `correo_de_reserva.php`).

## Archivos Clave
- `app/controllers/AuthController.php`: Lógica de autenticación.
- `app/controllers/realizar_reserva.php`: Lógica de reservas.
- `public/index.php`: Punto de entrada y ruteo manual.
- `composer.json`: Dependencias PHP.
- `Dockerfile`: Configuración de entorno.

## Notas
- Mantener la estructura MVC personalizada.
- Seguir los patrones de inclusión y ruteo manual existentes.
- No introducir frameworks externos sin consenso del equipo.
