<?php
/* Créer une fonction « getTimeLeft() » acceptant un argument de type string et qui retourne une chaine de caractère.
La valeur de l'argument représente une date au format Y-m-d (ex: 2020-11-23). 
La fonction doit vérifier si la date fournie est valide (bon format, date cohérente).
Si la date est ultérieure à la date du jour, la fonction retourne la différence en années/mois ou mois/jours (voir exemples).
Si la date est égale à la date du jour, la fonction retourne « Aujourd'hui ».
Si la date est antérieure à la date du jour, la fonction retourne « Évènement passé ». */

function getTimeLeft() : string
{
    $dateToday = date ('d/m/y');
    echo $dateToday;    // Affiche la date
    return $dateToday;  // Retourne la date
}

$appelDate = getTimeLeft(); //Appel de la fonction

?>
