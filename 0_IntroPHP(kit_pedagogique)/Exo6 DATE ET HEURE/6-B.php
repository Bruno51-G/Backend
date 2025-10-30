<?php
/* Créer une fonction « getTimeLeft() » acceptant un argument de type string et qui retourne une chaine de caractère.
La valeur de l'argument représente une date au format Y-m-d (ex: 2020-11-23). 
La fonction doit vérifier si la date fournie est valide (bon format, date cohérente).
Si la date est ultérieure à la date du jour, la fonction retourne la différence en années/mois ou mois/jours (voir exemples).
Si la date est égale à la date du jour, la fonction retourne « Aujourd'hui ».
Si la date est antérieure à la date du jour, la fonction retourne « Évènement passé ». */

function getTimeLeft(string $dateStr) : string
{
    // Vérifie le format de la date
    $date = DateTime::createFromFormat('Y-m-d', $dateStr);
    if (!$date || $date->format('Y-m-d') !== $dateStr){
        return "Date non valide";
    }

    $dateToday = new DateTime();
    $dateToday->setTime(0, 0, 0); // Compare seulement les dates, pas les heures

    // Date = à aujourd'hui
    if ($date->format('Y-m-d') === $dateToday->format('Y-m-d')){
        return "Aujourd'hui";
    }

    // Date évènement passé
    if($date < $dateToday){
        return "Évènement passé";
    } 

    // Date évènement futur
    $interval = $dateToday->diff($date);

    // Calcul différence années/mois ou mois/jours
    if ($interval->y > 0) {
        return $interval->format("Dans %y année(s) et %m mois");
    } elseif ($interval->m > 0) {
        return $interval->format("Dans %m mois et %d jour(s)");
    } else {
        return $interval->format("Dans %d jour(s)");
    }
}

echo getTimeLeft("2124-05-10");

?>
