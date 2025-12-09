<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <title><?php $titre = "Foire aux vins"; echo $titre; ?></title>
</head>
<body>
    <?php

    session_start();
    // Controlleur principal
    require "./src/dao/DbConnection.php";
    require "./src/dao/DepartmentRepository.php";
    require "./src/dao/CandidateRepository.php";
    require "./src/controllers/CtrlAccueil.php";
    require "./src/controllers/CtrlInscription.php";
    require "./src/controllers/CtrlLogin.php";
    require "./src/controllers/Ctrlcompte.php";
    
    // logout simple via ?logout=1
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }

    // inclure le header global
    include __DIR__ . '/header.php';

    $path = $_GET["page"] ?? "home";

    switch ($path) {
        case 'inscription':
            ctrlInscription();
            break;

        case 'home' :
            ctrlAccueil();
            break;

        case 'login':
            ctrlLogin();
            //include "./src/views/login.php";
            break;
        
        case "compteperso":
            ctrlCompte();
            break;
                
        default:
            ctrlAccueil();
            break;
    }

    ?>
</body>
</html>