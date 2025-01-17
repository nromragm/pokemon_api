<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" onsubmit="return validarContraseñas()">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <label for="password2">Repite la password</label>
        <input type="pasword" name="password2" required>
        <br>
        <span id="error" style="color:red; display:none;">Las contraseñas no coinciden. Intenta de nuevo.</span><br><br>
        <input type="submit">
    </form>
    <script src="script.js"></script>
    <?php

        require_once "jsonhandler.php";

        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];

            $user = [$nombre, $email, $password];

            if ($password == $password2) {
                saveEventsToJson($user);
            } else {
                echo"";
            }
        }

    ?>

</body>
</html>