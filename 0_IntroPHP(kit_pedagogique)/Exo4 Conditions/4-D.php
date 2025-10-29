<?php
/* Créez une fonction « capitalCity() » qui accepte un argument de type string 
(le pays dont on cherche la capitale). 
Elle devra retourner le nom de la capitale des pays suivants : 
Si le pays ne fait pas partie de la liste ci-dessus, la fonction retourne la valeur « Capitale inconnue ».
Note : Utilisez la structure SWITCH pour faire cet exercice. */

function capitalCity(string $pays) : string
{
    switch($pays) {
        case 'France':
            return 'Paris';
        
        case 'Allemagne':
            return 'Berlin';

        case 'Italie':
            return 'Rome';

        case 'Maroc':
            return 'Rabat';

        case 'Espagne':
            return 'Madrid';

        case 'Portugal':
            return 'Lisbonne';

        case 'Angleterre':
            return 'Londre';
        
        default:
            return 'Capital inconnue';
    }
}

$pays = readline("Entrez un pays parmi la liste suivante : 
                    France, Allemagne, Italie, Maroc, Espagne, Portugal, Angleterre :");

$capital = capitalCity($pays);

echo "La capital du pays : $pays est : $capital.";

?>

