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

    $page = $_GET["page"] ?? 'home';
    switch ($page) {
        case 'inscription':
            include "./src/views/inscription.php";
            break;
        
        default:
            include "./src/views/home.php";
            break;
    }

    ?>
</body>
</html>