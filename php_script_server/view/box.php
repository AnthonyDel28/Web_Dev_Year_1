<section class="main">
    <div class="left-menu">
        <?php 
            if(isset($_SESSION['username'])){
                print "<p class='welcome-message'> Welcome, <b>".$_SESSION['username']."</b></p>";
            }
        ?>
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
            <?php 
                if(!isset($_SESSION['username'])){
                    print '<a href="index.php?view=form/f_login" class="nav-link">Login</a>';
                } else {
                    print '<a href="index.php?view=form/f_delog" class="nav-link">Logout</a>';
                }
            ?>
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
                

