<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservaciones — El Arca</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container section">

    <header class="section-header">
      <h2>Reservaciones</h2>
      <p>Reserva tu mesa fácilmente</p>
    </header>

    <div class="reservation-container">

      <article class="reservation-card glass-panel">
        <div class="reservation-info">
          <h3>Horario de Atención</h3>
          <ul class="schedule-list">
            <li><span class="day">Martes - Sábado</span><span class="hours">12:00 PM – 7:00 PM</span></li>
            <li><span class="day">Domingo</span><span class="hours">12:00 PM – 6:00 PM</span></li>
            <li class="closed"><span class="day">Lunes</span><span class="hours">Cerrado</span></li>
          </ul>
        </div>

        <form method="POST" action="/?action=realizar_reserva" id="reservationForm" class="reservation-form">

          <div class="form-group">
            <input
              type="date"
              name="fecha"
              id="fechaInput"
              required
              placeholder=" "
            >
            <label for="fechaInput">Fecha</label>
            <span class="form-error" id="fechaError"></span>
          </div>

          <div class="form-group">
            <input
              type="time"
              name="hora"
              id="horaInput"
              required
              placeholder=" "
            >
            <label for="horaInput">Hora</label>
            <span class="form-error" id="horaError"></span>
          </div>

          <div class="form-group">
            <input
              type="number"
              name="zona"
              id="zonaInput"
              min="1"
              max="20"
              required
              placeholder=" "
            >
            <label for="zonaInput">Número de personas</label>
            <span class="form-error" id="zonaError"></span>
          </div>

          <button type="submit" class="btn btn-animated" id="submitBtn">
            <span class="text">Confirmar reservación</span>
          </button>

        </form>
      </article>

    </div>

  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2025 Restaurante Bar El Arca — Donde la naturaleza y la gastronomía se encuentran.</p>
    </div>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('reservationForm');
    const fechaInput = document.getElementById('fechaInput');
    const horaInput = document.getElementById('horaInput');
    const zonaInput = document.getElementById('zonaInput');
    const fechaError = document.getElementById('fechaError');
    const horaError = document.getElementById('horaError');
    const submitBtn = document.getElementById('submitBtn');

    // Set minimum date to today
    const today = new Date();
    const todayStr = today.toISOString().split('T')[0];
    fechaInput.min = todayStr;

    // Operating hours by day (0=Sunday, 1=Monday, ..., 6=Saturday)
    const schedule = {
      0: { open: '12:00', close: '18:00', name: 'Domingo' },      // Sunday
      1: null,                                                      // Monday - closed
      2: { open: '12:00', close: '19:00', name: 'Martes' },       // Tuesday
      3: { open: '12:00', close: '19:00', name: 'Miércoles' },    // Wednesday
      4: { open: '12:00', close: '19:00', name: 'Jueves' },       // Thursday
      5: { open: '12:00', close: '19:00', name: 'Viernes' },      // Friday
      6: { open: '12:00', close: '19:00', name: 'Sábado' }        // Saturday
    };

    function showError(element, message) {
      element.textContent = message;
      element.classList.add('visible');
      element.previousElementSibling.previousElementSibling.classList.add('input-error');
    }

    function clearError(element) {
      element.textContent = '';
      element.classList.remove('visible');
      element.previousElementSibling.previousElementSibling.classList.remove('input-error');
    }

    function validateDate() {
      const dateValue = fechaInput.value;
      if (!dateValue) {
        showError(fechaError, 'Por favor selecciona una fecha');
        return false;
      }

      const selectedDate = new Date(dateValue + 'T12:00:00');
      const todayDate = new Date();
      todayDate.setHours(0, 0, 0, 0);

      if (selectedDate < todayDate) {
        showError(fechaError, 'No puedes reservar en fechas pasadas');
        return false;
      }

      const dayOfWeek = selectedDate.getDay();
      if (schedule[dayOfWeek] === null) {
        showError(fechaError, 'No abrimos los lunes. Por favor elige otro día.');
        return false;
      }

      clearError(fechaError);
      return true;
    }

    function validateTime() {
      const dateValue = fechaInput.value;
      const timeValue = horaInput.value;

      if (!timeValue) {
        showError(horaError, 'Por favor selecciona una hora');
        return false;
      }

      if (!dateValue) {
        showError(horaError, 'Primero selecciona una fecha');
        return false;
      }

      const selectedDate = new Date(dateValue + 'T12:00:00');
      const dayOfWeek = selectedDate.getDay();
      const daySchedule = schedule[dayOfWeek];

      if (!daySchedule) {
        showError(horaError, 'El día seleccionado no está disponible');
        return false;
      }

      const [hours, minutes] = timeValue.split(':').map(Number);
      const timeMinutes = hours * 60 + minutes;

      const [openH, openM] = daySchedule.open.split(':').map(Number);
      const [closeH, closeM] = daySchedule.close.split(':').map(Number);
      const openMinutes = openH * 60 + openM;
      const closeMinutes = closeH * 60 + closeM;

      if (timeMinutes < openMinutes || timeMinutes > closeMinutes) {
        const openFormatted = daySchedule.open.replace(':', ':') + ' PM';
        const closeFormatted = (parseInt(daySchedule.close.split(':')[0]) - 12) + ':00 PM';
        showError(horaError, `Horario: 12:00 PM – ${closeFormatted}`);
        return false;
      }

      clearError(horaError);
      return true;
    }

    function updateTimeConstraints() {
      const dateValue = fechaInput.value;
      if (!dateValue) return;

      const selectedDate = new Date(dateValue + 'T12:00:00');
      const dayOfWeek = selectedDate.getDay();
      const daySchedule = schedule[dayOfWeek];

      if (daySchedule) {
        horaInput.min = daySchedule.open;
        horaInput.max = daySchedule.close;
      }
    }

    fechaInput.addEventListener('change', () => {
      validateDate();
      updateTimeConstraints();
      if (horaInput.value) validateTime();
    });

    horaInput.addEventListener('change', validateTime);

    form.addEventListener('submit', (e) => {
      const isDateValid = validateDate();
      const isTimeValid = validateTime();

      if (!isDateValid || !isTimeValid) {
        e.preventDefault();
        submitBtn.classList.add('shake');
        setTimeout(() => submitBtn.classList.remove('shake'), 500);
      }
    });
  });
  </script>

</body>
</html>
