<h2 id="login-title">Iniciar Sesión</h2>

<form action="/?view=login_submit" method="POST" autocomplete="on">
    <div class="form-group">
        <label for="correo">Correo Electrónico:</label>
        <input
            type="email"
            id="correo"
            name="correo"
            required
            autocomplete="username"
        >
    </div>

    <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input
            type="password"
            id="contrasena"
            name="contrasena"
            required
            autocomplete="current-password"
        >
    </div>

    <button type="submit">Iniciar Sesión</button>
</form>

<p>
    ¿No tienes cuenta?
    <a class="option-text" href="/?view=register">Regístrate aquí</a>
</p>

<p>
    ¿Olvidaste tu contraseña?
    <a class="option-text" href="/?view=recover">Recupérala aquí</a>
</p>
