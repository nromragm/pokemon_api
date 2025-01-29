<?php 
    require_once "jsonhandler.php";

    if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        $user = [
            "nombre" => $nombre, 
            "email" => $email, 
            "password" => $password
        ];

        $rep = false;
        $usuariosJson = loadEventsFromJson();

        if ($password == $password2) {
            if (count($usuariosJson) > 0) {
        
                foreach ($usuariosJson as $usuario) {
                    if ($usuario["email"] == $email) {
                        $rep = true;
                        $register_incorrecto = true;
                        require_once "do_register.php";       
                    }
                }

                if (!$rep) {
                    saveEventsToJson($user);
                    require_once "api.php";
                }
            } else {
                saveEventsToJson($user);
                require_once "api.php";
            }
            
        } else {
            $register_incorrecto = true;
            require_once "do_register.php";       
        }
    }
?>