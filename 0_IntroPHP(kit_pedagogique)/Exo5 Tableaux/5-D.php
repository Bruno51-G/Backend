<?php
/* Créer une fonction « stringItems() » acceptant un argument de type array. 
Cette fonction retourne une chaine de caractère contenant tous les éléments 
du tableau triés par ordre croissant et séparés par une virgule et un espace. 
Si le tableau est vide, il faudra retourner la valeur « Nothing to display ». */

function stringItems(array $myArray) : array
{
    if(empty($myArray)){
        return ["Nothing to display"];
    } else {
        sort($myArray);
        return $myArray;
    }
}

$name = (["Clotaire", "François", "Henry", "Anatole", "Zoé", "Yves", "Justine", "Sarah"]);
$sortName = stringItems($name);
echo implode(', ', $sortName);

?>


