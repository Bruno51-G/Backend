<form action="index.php?page=inscription" method="post" enctype="multipart/form-data">
    <div>
        <label for="lastname">Nom candidat:</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
     <div>
        <label for="firstname">Prénom candidat:</label>
        <input type="text" id="firstname" name="firstname" required>
    </div>
    <div>
        <label for="email">Email candidat:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="confirmPassword">Confirmation du mot de passe:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
    </div>
        <select name="department" id="department">
            <?php
                $objDept = new DepartmentRepository();
                $tabData = $objDept->searchAll();
                for ($i = 0; $i < count($tabData); $i++)
                    {
                        echo "<option value='".$tabData[$i]["id_dep"]."' > ".$tabData[$i]["Name"] . "</option>";
                    }
            ?>
        </select>
        <div>
            <label for="age"> Votre age : * </label>
            <input type="number" name="age" id="age" step="1" min="18" max="120">
        </div>
        <div id="summary">* Vous devez avoir plus de 18 ans pour participer au jeu-concours</div>
    
        <button type="submit">Register</button>
</form>

<?php
    var_dump($errors);
?>