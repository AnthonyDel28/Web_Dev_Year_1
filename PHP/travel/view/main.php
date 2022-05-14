<main role="main" class="container-fluid">
    <?php

    if (!empty($_SESSION['alert']) && !empty($_SESSION['alert_level'])) {
        echo '<div style="color: green;" class="alert alert—' . $_SESSION['alert_level'] . '">' . $_SESSION['alert'] . '</div>';
        unset($_SESSION['alert']);
        unset($_SESSION['alert_level']);
    }
    // Manage views
    if (!empty($_GET['page']) && ($_GET['page'] != 'view/main')) {
        getView($_GET['page']);
    } else {
        echo '<h1>Air Travel</h1>
              <div class="alert alert-info">Welcome!</div>';
    }
    ?>
</main>