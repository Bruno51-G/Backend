<?php
/* Créer une fonction « sortItems() » acceptant un argument de type array. 
Cette fonction retourne le tableau trié par ordre décroissant. Si le tableau est vide, 
il faudra retourner un tableau vide. */

function sortItems(array $myArray) : array
{
    if(empty($myArray)) {
        return [];
    } else {
        rsort($myArray);
        return $myArray;
    }
}

$names = (["Zoé", "Martin", "Alison", "Christophe", "Vanérie", "William", "Damien"]);
$sortName = sortItems($names);
print_r($sortName);

?>

