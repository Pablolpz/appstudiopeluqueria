<h1 class="nombre-pagina">Olvidaste tu contraseña?</h1>
<p class="descripcion-pagina">Reestablece tu contraseña escribiendo tu email a continuacion</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formuario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
        />
    </div>
    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>
<div class="acciones">
    <a href="/">Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">Aun no tienes una cuenta? Crear una</a>
</div>  