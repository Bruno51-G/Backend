<?php
/* Vous devez créer une fonction pour permettre l'identification d'un utilisateur.
Pour cet exercice, les mots de passe ne sont pas chiffrés.
Soit le tableau d'utilisateurs suivant (récupéré depuis une base de données) :
$users = [
 'joe' => 'Azer1234!', 
 'jack' => 'Azer-4321', 
 'admin' => '1234_Azer',
];
Créez une fonction « userLogin() » acceptant 3 arguments :
1) le nom d'utilisateur (string). 
2) le mot de passe à tester (string).
3) le tableau d'utilisateurs où effectuer la recherche (array).
Cette fonction retourne un booléen qui vaut true si l'utilisateur a été trouvé et que les mots de passe correspondent. 
La fonction retourne false dans le cas contraire (utilisateur non trouvé OU mot de passe invalide).
Pour cet exercice, vous devez vous servir des fonctions créées dans les exercices précédents. */


// fonction qui vérifie la longueur du mot de passe
function stringLengh(string $chaine) : bool
{
    if (empty(trim($chaine)))
    {
        return false;
    } else {
        return strlen($chaine) >= 9;
    }
}

// fonction pour l'identification de l'utilisateur
function userLogin(string $userName, string $password, array $users) : bool
{
    // Vérifie si l'utilisateur existe dans le tableau
    if (!array_key_exists($userName, $users)){
        return false; // utilisateur non trouvé
    } else {
        // Vérifie si le mot de passe correspond
        if($password === $users[$userName]){
            return true; // Idantification réussie
        } else {
            return false; // Mot de passe incorect
        }
    }
}

$users = [
    'joe' => 'Azerty1234!',
    'jack' => 'Azer-4321',
    'admin' => '1234_Azer',
];

$userName = readline("Nom utilisateur : ");

$password = readline("Mot de passe : ");

if (userLogin($userName, $password, $users)) {
    echo "Authentification réussi !\n";
} else {
    echo "Échec : nom utilisateur ou mot de passe incorrect.\n";
}

?>
