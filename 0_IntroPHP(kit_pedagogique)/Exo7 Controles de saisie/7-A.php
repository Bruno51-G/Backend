<?php
/* Créez une fonction « stringLength() » qui accepte un argument de type string 
et retourne un booléen qui vaut true si la chaine de 
caractères contient au moins 9 caractères et false 
si elle contient moins de 9 caractères. */

function stringLengh(string $chaine) : bool
{
    if (empty(trim($chaine)))
        {
            return false;
        } else {
            return strlen($chaine) >= 9;
        }
}

var_dump(stringLengh(""));

?>

