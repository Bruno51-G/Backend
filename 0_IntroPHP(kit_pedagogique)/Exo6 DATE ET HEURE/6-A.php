<?php
/* Créer une fonction « getToday() ». 
Cette fonction doit afficher et retourner la date du jour au format d/m/Y sous forme de 
chaine de caractères (exemple : 21/10/2020). */

function getToday() : string
{
    $dateToday = date ('d/m/y');
    echo $dateToday;    // Affiche la date
    return $dateToday;  // Retourne la date
}

$appelDate = getToday(); //Appel de la fonction

?>


