<?php
/* Créer une fonction « getUserName() » qui accepte deux arguments (prénom et nom) de type string. 
Cette fonction doit retourner la concaténation des deux valeurs. */

function getUserName(string $prenom, string $nom) : string
{
    return ucfirst($prenom) . ' ' . ucfirst($nom);
}

echo getUserName('bruno', 'godbillot');

?>

