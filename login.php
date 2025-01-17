<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1 style="color: red;">Login de la pagina web</h1>

    <form action="" method="get">
        <label for="usuario">usuario</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="password">password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" >
    </form>

    <?php 
        $usuarios = [
            "usuario1"=> "123",
            "usuario2"=> "1234",
            "usuario3"=> "12345"
        ];

        if (isset($_GET["usuario"]) && isset($_GET["password"])) {

            $usuario = $_GET["usuario"];
            $password = $_GET["password"];

            for ($i = 0; $i < count($usuarios); $i++) {
                if (password_verify($password, $usuario)) {
            }
        }
    ?>
    <?php

        function Login($email, $password, $usuarios) {
            foreach ($usuarios as $valor) {
                if ($valor["email"] == $email && $valor["password"] == $password) {
                    return true;
                }
            }

            return false;

        }
    ?>
</body>
</html>