<?php
// Función para cargar eventos desde un archivo JSON
function loadEventsFromJson() {
    // Nombre del archivo JSON
    $file = 'usuarios.json';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        return json_decode($content, true) ?? []; // Decodificar JSON o devolver un array vacío
    }
    return []; // Si el archivo no existe, devolver un array vacío
}
// Función para guardar eventos en un archivo JSON
function saveEventsToJson($users) {
    // Nombre del archivo JSON
    $file = 'usuarios.json';
    $usuariosExistentes = loadEventsFromJson();
    $usuariosExistentes[] = $users;
    file_put_contents($file, json_encode($usuariosExistentes, JSON_PRETTY_PRINT));
}
?>