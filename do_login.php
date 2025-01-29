<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="./do_login.css"> <!-- Enlace a la hoja de estilos CSS -->
</head>
<body>
    <div class="form-container">
        <h2>Iniciar sesión</h2>

        <!-- Formulario para iniciar sesión -->
        <form action="funcionLogin.php" method="post">
            <!-- Campo para el nombre de usuario -->
            <label for="nombreLogin"><b>Nombre Usuario</b></label>
            <input type="text" name="nombreLogin" required 
                style="border-color: <?= $login_incorrecto ? 'red' : '' ?> " 
                value="<?= isset($nombre) ? $nombre : '' ?>"> <!-- Mantiene el valor en caso de error -->
            <br>

            <!-- Campo para la contraseña -->
            <label for="passwordLogin"><b>Contraseña</b></label>
            <input type="password" name="passwordLogin" required 
                style="border-color: <?= $login_incorrecto ? 'red' : '' ?> " 
                value="<?= isset($password) ? $password : '' ?>"> <!-- Mantiene el valor en caso de error -->
            <br>

            <!-- Botón de envío del formulario -->
            <input type="submit" value="Entrar">
        </form>

        <!-- Enlace para registrarse si no tiene cuenta -->
        <h3>¿No tienes una cuenta? <br> <a href="do_register.php">Regístrate aquí</a></h3>

        <!-- Mensaje de error en caso de login incorrecto -->
        <h4 style="color: red"> <?= isset($login_incorrecto) ? 'Login incorrecto' : ''?></h4>
    </div>
</body>
</html>
