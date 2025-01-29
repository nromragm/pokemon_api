<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon API</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./poke.css">
</head>
<body>

<div class="container">
    <div class="form-container">
        <!-- Formulario para buscar un Pokémon por nombre o ID -->
        <form method="POST" action="api.php">
            <label for="nombre_id" class="form-label">Nombre/Id del Pokémon</label>
            <input type="text" class="form-control" name="nombre_id" id="nombre_id" required placeholder="Ingresa el nombre o ID">
            <button type="submit" class="btn">Buscar</button>
        </form>
    </div>

    <?php
        // Función para obtener el color de fondo según el tipo de Pokémon
        function getBackgroundColor($typ) {
            $colors = [
                "fire" => "red",
                "grass" => "green",
                "water" => "blue",
                "electric" => "yellow",
                "psychic" => "purple",
                "normal" => "gray",
                "ice" => "lightblue",
                "fighting" => "brown",
                "poison" => "violet",
                "ground" => "sandybrown",
                "flying" => "skyblue",
                "rock" => "darkgray",
                "bug" => "olive",
                "ghost" => "indigo",
                "steel" => "silver",
                "dragon" => "darkblue",
                "dark" => "black",
                "fairy" => "pink",
                "default" => "white"
            ];

            // Devuelve el color asociado o el color por defecto si no se encuentra
            return $colors[$typ] ?? $colors["default"];
        }

        // Verifica si se ha enviado un nombre o ID en el formulario
        if (isset($_POST["nombre_id"])) {

            $pokemon = $_POST["nombre_id"]; // Captura el valor ingresado por el usuario

            // Inicializa cURL para hacer la solicitud a la PokeAPI
            $ch = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // Ejecuta la solicitud

            $datos_pokemon = json_decode($result, true); // Decodifica la respuesta JSON
            curl_close($ch); // Cierra la conexión cURL

            // Si se encuentra un Pokémon válido en la API
            if (isset($datos_pokemon["name"])) {
                $name = ucfirst($datos_pokemon["name"]);
                $def = $datos_pokemon["stats"][2]["base_stat"];
                $hp = $datos_pokemon["stats"][0]["base_stat"];
                $spa = $datos_pokemon["stats"][3]["base_stat"];
                $atq = $datos_pokemon["stats"][1]["base_stat"];
                $typ = ucfirst($datos_pokemon["types"][0]["type"]["name"]); // Obtiene el tipo principal
                $typ2 = isset($datos_pokemon["types"][1]) ? ucfirst($datos_pokemon["types"][1]["type"]["name"]) : ""; // Obtiene el segundo tipo si existe
                $spd = $datos_pokemon["stats"][4]["base_stat"];
                $img = $datos_pokemon["sprites"]["front_default"];
                $id = $datos_pokemon["id"];

                // Obtiene el color de fondo según el tipo del Pokémon
                $color = getBackgroundColor(strtolower($typ));

                // Muestra la información del Pokémon en una tarjeta
                echo "
                <div class='card'>
                    <div class='card-header'>
                        <img src='$img' alt='Image' class='card-img' style='background-color: $color;'>
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title' style='color: $color;'>$name #$id</h3>
                        <p>Tipo: $typ " . ($typ2 ? $typ2 : '') . "</p>
                        <p>HP: $hp</p>
                        <p>Atq: $atq</p>
                        <p>Def: $def</p>
                        <p>Sp. Atq: $spa</p>
                        <p>Sp. Def: $spd</p>
                    </div>
                </div>  
                ";
            } else {
                // Muestra un mensaje si el Pokémon no es encontrado
                echo "
                <div class='card'>
                    <h3 class='card-title'>Pokemon no Encontrado</h3>
                </div>
                ";
            }
        }
    ?>
</div>

</body>
</html>
