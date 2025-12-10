<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<header class="site-header" role="banner">
    <div class="site-header__inner">
        <a class="site-logo" href="index.php?page=home">
            <img src="./assets/img/raisin.png" alt="Raisin" class="site-logo__img">
            <span class="site-logo__text">Foire aux vins</span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-controls="primary-navigation" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="hamburger"></span>
        </button>

        <nav id="primary-navigation" class="site-nav" role="navigation">
            <ul>
                <li class="navHeader"><a href="index.php?page=home">Accueil</a></li>
                <li class="navHeader"><a href="index.php?page=inscription">S'inscrire</a></li>
                <li class="navHeader"><a href="index.php?page=login">Se connecter</a></li>
                <li class="navHeader"><a href="index.php?page=compteperso">Mon compte</a></li>
            </ul>
        </nav>

        <div class="site-user">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <span class="user-greet">Bonjour <?= htmlspecialchars($_SESSION['nom'] ?? '') ?></span>
                <a class="user-logout" href="index.php?page=home&logout=1">Déconnexion</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    (function(){
        const btn = document.getElementById('navToggle');
        const nav = document.getElementById('primary-navigation');
        btn.addEventListener('click', function(){
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            nav.classList.toggle('open');
        });
    })();
</script>
