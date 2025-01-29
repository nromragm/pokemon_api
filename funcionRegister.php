<?php 
    require_once "jsonhandler.php"; // Importa el manejador de JSON para cargar y guardar usuarios

    // Verifica si se han enviado los datos del formulario de registro
    if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
        $nombre = $_POST["nombre"]; // Obtiene el nombre ingresado
        $email = $_POST["email"]; // Obtiene el email ingresado
        $password = $_POST["password"]; // Obtiene la contraseña ingresada
        $password2 = $_POST["password2"]; // Obtiene la repetición de la contraseña

        // Estructura del nuevo usuario
        $user = [
            "nombre" => $nombre, 
            "email" => $email, 
            "password" => $password // 🚨 La contraseña se almacena en texto plano, lo cual es inseguro
        ];

        $rep = false; // Variable para verificar si el email ya está registrado
        $usuariosJson = loadEventsFromJson(); // Carga los datos de usuarios desde el JSON

        // Verifica si las contraseñas coinciden
        if ($password == $password2) {
            // Si hay usuarios en el JSON, verifica que el email no esté repetido
            if (count($usuariosJson) > 0) {
                foreach ($usuariosJson as $usuario) {
                    if ($usuario["email"] == $email) { // Si el email ya está en uso
                        $rep = true;
                        $register_incorrecto = true;
                        require_once "do_register.php"; // Muestra el formulario de registro con error
                        exit; // Detiene la ejecución para evitar que siga el proceso de registro
                    }
                }

                // Si el email no está repetido, guarda el nuevo usuario y redirige a la API
                if (!$rep) {
                    saveEventsToJson($user);
                    require_once "api.php"; 
                    exit;
                }
            } else {
                // Si no hay usuarios en el JSON, guarda el usuario directamente
                saveEventsToJson($user);
                require_once "api.php";
                exit;
            }
        } else {
            // Si las contraseñas no coinciden, muestra el formulario de registro con error
            $register_incorrecto = true;
            require_once "do_register.php";       
            exit;
        }
    }
?>
