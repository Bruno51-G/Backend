<?php
// Inclure la classe Contribuable
require_once '../models/Contribuable.php';

// Vérifier si les données du formulaire sont envoyées
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Récupère les données du formulaire
    $nom = htmlspecialchars($_POST['nom']); // Échape les caractères spéciaux pour la sécurité
    $revenu = (float)$_POST['revenu']; // Convertit le revenu en float

    try{
        // Instancier un objet Contribuable
        
    }
}