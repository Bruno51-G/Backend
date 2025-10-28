<?php
/*  Créer une fonction « askUser() » acceptant deux arguments (nom et prénom) de type string. 
Cette fonction doit retourner une chaîne de caractères sous la forme :

    « Bonjour prénom, nom. Connaissez-vous Einstein ? »

Cette fonction doit réutiliser les fonctions

    - « getFullName() » pour obtenir la concaténation des deux valeurs.
    - « getMC2() » pour obtenir le nom de l'inventeur de la formule E = MC². */

function getMC2() : string
{
    return "Albert Einstein";
}

function getFullName(string $prenom, string $nom) : string
{
    return strtolower($prenom) . ' ' . strtoupper($nom);
}

function askUser(string $prenom, string $nom) : string
{
    $fullName = getFullName($prenom, $nom);
    $Emc2 = getMC2();

    return "Bonjour $fullName, connaissez-vous $Emc2 ?";
}

// Demande à l'utilisateur de saisir son prénom
$prenom = readline("Entrez votre prénom : ");

// Demande à l'utilisateur de saisir son nom
$nom = readline("Entrez votre nom : ");

echo askUser($prenom, $nom);

?>

