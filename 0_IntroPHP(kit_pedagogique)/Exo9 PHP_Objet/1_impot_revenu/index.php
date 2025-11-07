<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Impôt</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php

require "./resultats/resultatImpot.php";
require "./models/Contribuable.php";
$res=display();

?>
    <div class="container">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Calcul de l'Impôt sur le Revenu</legend>

                <label for="nom">Nom Contribuable</label>
                <input type="text" id="nom" name="nom" required>

                <label for="revenu">Revenu Annuel</label>
                <input type="number" id="revenu" name="revenu" min="0" required>

                <button type="submit" name="send">Calculer</button>

                <label for="impot">Impôt sur le revenu annuel</label>
                <input type="text" id="impot" name="impot" value="<?php echo $res??"0" ?>" readonly>

            </fieldset>
        </form>
    </div>
</body>
</html>

