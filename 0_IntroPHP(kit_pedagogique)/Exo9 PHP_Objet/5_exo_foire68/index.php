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
    // Controlleur principal
    require "./src/dao/dbConnection.php";
    require "./src/dao/DepartmentRepository.php";
    require "./src/dao/CandidateRepository.php";
    require "./src/controllers/CtrlAccueil.php";
    require "./src/controllers/CtrlInscription.php";
    
    if (isset($GET["page"]))
        {
            $patch = $_GET["page"] ?? "home";
        } else {
            $patch = "home";
        }

    switch ($page) {
        case 'inscription':
            ctrlInscription();
            break;

        case 'home' :
            ctrlAccueil();
            break;

        case 'login':
            include "./src/views/login.php";
            break;
        
        default:
            ctrlAccueil();
            break;
    }

    ?>
</body>
</html>