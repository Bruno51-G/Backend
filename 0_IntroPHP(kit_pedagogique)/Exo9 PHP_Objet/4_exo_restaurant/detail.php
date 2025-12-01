<?php

require "./src/dao/Dbconnexion.php";
require "./src/dao/RestaurantRepository.php";

$objResto = new RestaurantRepository();
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) 
    {
        die("ID de restaurant invalide !");
    }
    else
    {
        $id=(int)$_GET['id'];
        //tableau de la ligne du restaurant sélectionné
        $restaurantData = $objReste->searchById($id);
        if (!$restaurantData)
        {
            die("Restaurant non trouvé !");
        }

        $msg="";
        if($_server["REQUEST_METHOD"]=="POST")
            {
                if (!empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["prix"]) 
                    && !empty($_POST["commentaire"]) && !empty($_POST["note"]) && !empty($_POST["visite"]))
                {
                    try
                        {
                            $ddate = new DateTime($_POST["visite"]);
                            $currentDate = new DateTime();
                            if ($ddate > $currentDate)
                                {
                                    throw new Exception('La date saisie doit être avant aujourd\'hui ! ');
                                };
                        } catch (Exception $e) 
                            {
                                throw new Exception('Erreur de format de la date : ' . $e->getMessage());
                            }
                        $test = $objResto->updateRestaurantBis($id, $_POST["nom"], $_POST["adresse"], $_POST["prix"], $_POST["commentaire"], $_POST["note"], $ddate);
                        if ($test)
                            {
                                header('Location:http://localhost/restaurant/index.php');
                                exit;
                            }
                            else
                            {
                                $msg = "Erreur de mise à jour dans la table";
                            }
                } else
                    {
                        $msg = "Veuillez remplir toutes les zones du formulaire :";
                    }
            } else 
                {
                    $msg = "Veuillez utiliser le formulaire suivant :";
                }
    }

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion listes des critiques de restaurants.</title>
    <link rel="stylesheet" href="./assets/css/formulaire.css">
</head>
<body>
    <div class="container">
        <h1>Modifier la critique Restaurant numéro <?php echo $id??"indéterminé" ?></h1>
        <?php echo $msg; ?>
        <form action="#" method="POST">

            <div class="form-group">
                <label for="nom">Nom du Restaurant :</label>
                <input type="text" id="nom" name="nom" required maxlength="100" value="<?php echo htmlspecialchars($restaurantsData['nom']) ??''; ?>">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required maxlength="250" value="<?php echo htmlspecialchars($restaurantData['adresse'] ??''); ?>">
            </div>

            <div class="form-group">
                <label for="prix">Prix moyen (€) :</label>
                <input type="number" id="prix" name="prix" required min="0" step="0.01" value="<?php echo $restaurantData['prix'] ??''; ?>">
            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea id="commentaire" name="commentaire" required rows="5"><?php echo htmlspecialchars($restaurantData['commentaire'] ??''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="note">Note (/10) :</label>
                <input type="number" id="note" name="note" required min="0" max="10" step="0.1" value="<?php echo $restaurantData['note'] ??''; ?>">
            </div>

            <div class="form-group">
                <label for="visite">Date de visite :</label>
                <input type="date" id="visite" name="visite" required value="<?php echo $restaurantData['visite'] ??'' ;?>">
            </div>

            <button type="submit">Enregistrer le Restaurant</button>

        </form>

    </div>
    
</body>
</html>