<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un menu de navigation en HTML permettant d'accéder à :
 * - la page d'accueil, avec l'intitulé "Home"
 * - le profil utilisateur, avec l'intitulé "Profile"
 * - la page affichant la liste des items, avec l'intitulé "Items"
 * - le formulaire de login, avec l'intitulé "Login"
 *
 * La page d'accueil sera affichée par défaut
 *
 * Estimation : max 15min
 *
 * === BONUS (degré de maîtrise) ===
 *
 * Affichez le lien vers le profil utilisateur uniquement si l'utilisateur est connecté.
 * Affichez le bouton de déconnexion à la place de l'intitulé "Login" si l'utilisateur est connecté.
 *
 */
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">EvalPHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <?php if (!empty($_SESSION['userid'])) { ?>
                    <li class="nav-item">
                        <a href="index.php?source=view/profile" class="nav-link">Profile</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="index.php?source=view/item" class="nav-link">Items</a>
                </li>
                <?php if(empty($_SESSION['userid'])) { ?>
                <li class="nav-item">
                    <a href="index.php?source=view/login" class="nav-link">Login</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a href="index.php?source=view/logout" class="nav-link">Logout</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
