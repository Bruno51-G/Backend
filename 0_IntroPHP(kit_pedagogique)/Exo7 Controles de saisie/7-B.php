<?php
/* Créez une fonction de vérification « passwordCheck() » acceptant un argument de type string. 
Cette fonction retourne un booléen qui vaut true si le mot de passe respecte les règles suivantes :
 
- Contient au moins 9 caractères
- Contient au moins 1 chiffre
- Contient au moins une majuscule et une minuscule
- Contient au moins 1 caractère non alphanumérique

Dans votre fonction, vous devez appeler la fonction « stringLength () » créée dans l’exercice précédent. */

function stringLengh(string $chaine) : bool
{
    if (empty(trim($chaine)))
        {
            return false;
        } else {
            return strlen($chaine) >= 9;
        }
}

function controlPassword(string $password) : bool
    {
        if (!stringLengh($password)){
            return false;
        }

        // Regex pour :
        // Au moins 1 chiffre (\d)
        // Au moins 1 majuscule ([A-Z])
        // Au moins 1 minuscule ([a-z])
        // Au moins 1 caractère non alphanumérique
        $pattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).+$/';

        return preg_match($pattern, $password) ===1;
    } 

    var_dump(controlPassword("hththrhr55rhtY"));

    ?>
