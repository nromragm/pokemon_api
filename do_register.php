<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="./do_register.css"> <!-- Enlace a la hoja de estilos CSS -->
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Registro de usuario</h2>

            <!-- Formulario para registrar un nuevo usuario -->
            <form action="funcionRegister.php" method="post">
                
                <!-- Campo para el nombre -->
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" name="nombre" required 
                    style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " 
                    value="<?= isset($nombre) ? $nombre : '' ?>"> <!-- Mantiene el valor en caso de error -->
                <br> 

                <!-- Campo para el correo electrónico -->
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" required 
                    style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " 
                    value="<?= isset($email) ? $email : '' ?>"> <!-- Mantiene el valor en caso de error -->
                <br>

                <!-- Campo para la contraseña -->
                <label for="password"><b>Contraseña</b></label>
                <input type="password" name="password" required 
                    style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " 
                    value="<?= isset($password) ? $password : '' ?>"> <!-- Mantiene el valor en caso de error -->
                <br>

                <!-- Campo para repetir la contraseña -->
                <label for="password2"><b>Repite la contraseña</b></label>
                <input type="password" name="password2" required 
                    style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " 
                    value="<?= isset($password2) ? $password2 : '' ?>"> <!-- Mantiene el valor en caso de error -->
                <br>

                <!-- Botón para enviar el formulario -->
                <input type="submit" value="Registrarse">
            </form>

            <!-- Enlace para ir al formulario de inicio de sesión si ya tiene una cuenta -->
            <h3>¿Ya tienes una cuenta? <br> <a href="do_login.php">Inicia sesión aquí</a></h3>

            <!-- Mensaje de error en caso de registro incorrecto -->
            <h4 style="color: red"> <?= isset($register_incorrecto) ? 'Registro incorrecto' : '' ?></h4>
        </div>
    </main>
</body>
</html>
