<?php

function ctrlInscription()
{
    $objCandidat = new CandidateRepository();

    $objDept = new DepartmentRepository();
    $tabData = $objDept->searchAll();

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $lastname = trim($_POST['lastname']);
        $firstname = trim($_POST['firstname']);
        $email = ($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);
        $department = ($_POST['department']);
        $age = ($_POST['age']);

        $errors = [];

        if (empty($lastname) || empty($firstname) || empty($email) || empty($password) || empty($confirmPassword) || empty($department) || empty($age))
        {
            $errors[] = "Tous les champs sont obligatoires.";
        } else {
            if ($password !== $confirmPassword)
            {
                $errors[] = "Les mots de passe ne correspondent pas.";
            } else {
                if ($age < 18) 
                {
                    $errors[] = "Vous devez avoir au moins 18 ans pour vous inscrire.";
                } else {
                    $test = $objCandidat->insert($lastname, $firstname, $email, $password, $department, $age);
                    if ($test)
                    {
                        echo "Insersion candidat réussi.";
                        header("Location: index.php?page=home");
                        exit();
                    }
                }
            }
        }
    }

    require "./src/views/inscription.php";
}