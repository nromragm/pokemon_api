<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon API</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="poke.css">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form method="POST" action="index.php">
            <label for="nombre_id" class="form-label">Nombre/Id del Pokémon</label>
            <input type="text" class="form-control" name="nombre_id" id="nombre_id" required placeholder="Ingresa el nombre o ID">
            <button type="submit" class="btn">Buscar</button>
        </form>
    </div>

    <?php
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

            return $colors[$typ] ?? $colors["default"];
        }

        if (isset($_POST["nombre_id"])) {

            $pokemon = $_POST["nombre_id"];

            $ch = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon/");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            $datos_pokemon = json_decode($result, true); 
            curl_close($ch);

            if (isset($datos_pokemon["name"])) {
                $name = ucfirst($datos_pokemon["name"]);
                $def = $datos_pokemon["stats"][2]["base_stat"];
                $hp = $datos_pokemon["stats"][0]["base_stat"];
                $spa = $datos_pokemon["stats"][3]["base_stat"];
                $atq = $datos_pokemon["stats"][1]["base_stat"];
                $typ = ucfirst($datos_pokemon["types"][0]["type"]["name"]);
                $typ2 = isset($datos_pokemon["types"][1]) ? ucfirst($datos_pokemon["types"][1]["type"]["name"]) : "";
                $spd = $datos_pokemon["stats"][4]["base_stat"];
                $img = $datos_pokemon["sprites"]["front_default"];
                $id = $datos_pokemon["id"];

                $color = getBackgroundColor(strtolower($typ));

                echo "
                <div class='card'>
                    <div class='card-header'>
                        <img src='$img' alt='Image' class='card-img' style='background-color: $color;>
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title' style='color: $color;'>$name</h3>
                        <p>Tipo: $typ " . ($typ2 ? $typ2 : '') . "</p>
                        <p>HP: $hp</p>
                        <p>Atq: $atq</p>
                        <p>Def: $def $id</p>
                        <p>Sp. Atq: $spa</p>
                        <p>Sp. Def: $spd</p>
                    </div>
                </div>  
                ";
            } else {
                echo '<script>alert("Pokemon no encontrado")</script>';
            }
        }
    ?>
</div>

</body>
</html>
