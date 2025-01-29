<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <h2>Iniciar sesión</h2>
        <form action="funcionLogin.php" method="post">
            <label for="emailLogin">Email</label>
            <input type="email" name="emailLogin" required style="border-color: <?= $login_incorrecto ? 'red' : '' ?> " value="<?= isset($email) ? $email : '' ?>">
            <br>
            <label for="passwordLogin">Contraseña</label>
            <input type="password" name="passwordLogin" required style="border-color: <?= $login_incorrecto ? 'red' : '' ?> " value="<?= isset($password) ? $password : '' ?>">
            <br>
            <input type="submit" value="Entrar">
        </form>

        <h3>¿No tienes una cuenta? <br> <a href="do_register.php">Registrate aqui</a></h3>

        <h4 style="color: red"> <?= isset($login_incorrecto) ? 'Login incorrecto' : ''?></h4>
    </div>
</body>
</html>
