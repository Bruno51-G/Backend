<?php
/* Créer une fonction « getFullName() » acceptant deux arguments (nom et prénom) de type string. 
Cette fonction doit retourner la concaténation des deux valeurs avec un espace entre les 2, 
le prénom en minuscule et le nom en MAJUSCULE. */

function getFullName(string $prenom, string $nom) : string
{
    return strtolower($prenom) . ' ' . strtoupper($nom);
}

echo getFullName('bruno', 'godbillot');

?>
