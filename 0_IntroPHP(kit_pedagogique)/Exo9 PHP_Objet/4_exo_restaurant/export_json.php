<?php
// export_json.php
// Récupère les données depuis la BDD via RestaurantRepository
// puis écrit un JSON UTF-8 lisible dans `sorties/liste.json` et l'affiche.

require __DIR__ . '/src/dao/Dbconnexion.php';
require __DIR__ . '/src/dao/RestaurantRepository.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $repo = new RestaurantRepository();
    $data = $repo->searchAll();

    // Normaliser l'encodage en UTF-8 pour toutes les chaînes du tableau
    array_walk_recursive($data, function (&$item) {
        if (is_string($item)) {
            // Détecte l'encodage et reconvertit en UTF-8 en ignorant les caractères invalides
            $enc = mb_detect_encoding($item, mb_detect_order(), true);
            $enc = $enc ?: 'UTF-8';
            $item = iconv($enc, 'UTF-8//IGNORE', $item);
        }
    });

    // Encode en JSON sans échapper les caractères Unicode, et lisible
    $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    if ($json === false) {
        // Erreur d'encodage JSON
        http_response_code(500);
        echo json_encode(['error' => 'json_encode failed: ' . json_last_error_msg()]);
        exit;
    }

    // Écrit le fichier de sortie (remplace l'ancien)
    $outPath = __DIR__ . '/sorties/liste.json';
    if (false === file_put_contents($outPath, $json)) {
        http_response_code(500);
        echo json_encode(['error' => 'Impossible d\'écrire le fichier ' . $outPath]);
        exit;
    }

    // Affiche le JSON (déjà encodé) au navigateur / client
    echo $json;

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
