<?php 
    require_once "jsonhandler.php"; // Importa el manejador de JSON para cargar usuarios desde un archivo JSON

    // Verifica si se han enviado los datos del formulario de login
    if (isset($_POST["nombreLogin"]) && isset($_POST["passwordLogin"])) {
        $usuariosJson = loadEventsFromJson(); // Carga los datos de usuarios desde el JSON
        $nombre = $_POST["nombreLogin"]; // Obtiene el nombre de usuario ingresado
        $password = $_POST["passwordLogin"]; // Obtiene la contraseña ingresada
        $existe = false; // Variable para verificar si el usuario existe

        // Si hay usuarios registrados en el JSON
        if (count($usuariosJson) > 0) {
            foreach ($usuariosJson as $usuario) {
                // Compara los datos ingresados con los del JSON
                if ($usuario["nombre"] == $nombre && $usuario["password"] == $password) {
                    $existe = true; // El usuario existe y la contraseña coincide
                    require_once "api.php"; // Incluye la API y detiene la ejecución del script
                }
            }

            // Si el usuario no fue encontrado, muestra el login con mensaje de error
            if (!$existe) {
                $login_incorrecto = true;
                require_once "do_login.php";
            }
        } else {
            // Si no hay usuarios en el JSON, también muestra el login con error
            $login_incorrecto = true;
            require_once "do_login.php";
        }
    }
?>
