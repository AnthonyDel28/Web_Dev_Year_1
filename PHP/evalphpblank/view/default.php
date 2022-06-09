<main role="main" class="container-fluid">
    <?php
    if (!empty($_SESSION['alert']) && !empty($_SESSION['alert_level'])) {
        print '<div class="btn btn-' . $_SESSION['alert_level'] . '">' . $_SESSION['alert'] . '</div>';
        unset($_SESSION['alert']);
        unset($_SESSION['alert_level']);
    }
    if (!empty($_GET['source']) && ($_GET['source'] != 'view/default')) {
        getContent($_GET['source']);
    } else {
        echo '<h1>Scripts Serveurs</h1>
              <div class="alert alert-info">Bienvenue à votre examen blanc de Scripts Serveurs!</div>';
    }
    ?>
</main>