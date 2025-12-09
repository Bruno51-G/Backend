<?php

function ctrlLogin():void
{
    $objCandidat = new CandidateRepository();
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $email = trim($_POST['identifiant']);
        $password = $_POST['motdepasse'];
        $errors = [];

        if (empty($email) || empty($password))
        {
            $errors[] = "Tous les champs sont obligatoires.";
        } else {
            $user = $objCandidat->verifSign($email, $password);

            if ($user !== false) {
                echo "Connexion réussie";

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nom'] = $user['lastname_user'];
                $_SESSION['prenom'] = $user['firstname_user'];
                header("Location: index.php?page=compteperso");
                exit();
            } else {
                $errors[] = "Email ou mot de passe incorrect.";
            }
        }
    }

    require "./src/views/login.php";
}