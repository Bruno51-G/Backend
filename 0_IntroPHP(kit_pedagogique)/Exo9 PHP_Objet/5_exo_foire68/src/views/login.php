<div class="loginContainer">
    <form class="loginForm" method="POST" action="index.php?page=login">
        <h2>Connexion</h2>

        <div class="formGroup">
            <label for="identifiant">identifiant</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>

        <div class="formGroup">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" required>
        </div>

        <button type="submit">Se connecter</button>
    </form>
</div>