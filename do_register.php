<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <main>
    <div class="form-container">
        <h2>Registro de usuario</h2>
        <form action="funcionRegister.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($nombre) ? $nombre : '' ?>">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($email) ? $email : '' ?>">
            <br>
            <label for="password">Contraseña</label>
            <input type="password" name="password" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($password) ? $password : '' ?>">
            <br>
            <label for="password2">Repite la contraseña</label>
            <input type="password" name="password2" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($password2) ? $password2 : '' ?>">
            <br>
            <input type="submit" value="Registrarse">
        </form>

        <h3>¿Ya tienes una cuenta? <br> <a href="do_login.php">Inicia Sesion aqui</a></h3>
        <h4 style="color: red"> <?= isset($register_incorrecto) ? 'Register incorrecto' : ''?></h4>
    </div>
    </main>
    <main>
    <div class="form-container">
        <h2>Registro de usuario</h2>
        <form action="funcionRegister.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($nombre) ? $nombre : '' ?>">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($email) ? $email : '' ?>">
            <br>
            <label for="password">Contraseña</label>
            <input type="password" name="password" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($password) ? $password : '' ?>">
            <br>
            <label for="password2">Repite la contraseña</label>
            <input type="password" name="password2" required style="border-color: <?= $register_incorrecto ? 'red' : '' ?> " value="<?= isset($password2) ? $password2 : '' ?>">
            <br>
            <input type="submit" value="Registrarse">
        </form>

        <h3>¿Ya tienes una cuenta? <br> <a href="do_login.php">Inicia Sesion aqui</a></h3>
        <h4 style="color: red"> <?= isset($register_incorrecto) ? 'Register incorrecto' : ''?></h4>
    </div>
    </main>
</body>
</html>