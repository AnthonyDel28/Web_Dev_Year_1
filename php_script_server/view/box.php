<section class="main">
    <div class="left-menu">
        <button>
            <a href="index.php?view=view/main" class="nav-link">Home</a>
        </button>
        <button>
            <a href="index.php?view=view/profile" class="nav-link">Profile</a>
        </button>
        <button>
            <a href="index.php?view=view/play" class="nav-link">Play</a>
        </button>
        <button>
            <a href="index.php?view=form/f_login" class="nav-link">Login</a>
        </button>
    </div>
    <div class="box">
        <?php
            if (isset($_GET['view'])) {
                $page = $_GET['view'];
                if($page == "view/main"){
                    include 'home.php';
                }
            }
            include $page.".php";
        ?>
    </div>
 </section>
                

