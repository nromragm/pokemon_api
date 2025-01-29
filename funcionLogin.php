<?php 
    require_once "jsonhandler.php";
    
    if (isset($_POST["emailLogin"]) && isset($_POST["passwordLogin"])) {
        $usuariosJson = loadEventsFromJson();
        $email = $_POST["emailLogin"];
        $password = $_POST["passwordLogin"];
        $existe = false;
        
        if (count($usuariosJson) > 0) {
            foreach ($usuariosJson as $usuario) {
                if ($usuario["email"] == $email && $usuario["password"] == $password) {
                    $existe = true;
                    require_once "api.php";
                }
            }

            if (!$existe) {
                $login_incorrecto = true;
                require_once "do_login.php";
            }
            
        } else {
            $login_incorrecto = true;
            require_once "do_login.php";
        }
    }
?>