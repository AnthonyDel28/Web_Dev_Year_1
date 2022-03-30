<?php 
    if(!isset($_SESSION['username'])){
        ?>
    <html>
        <div class="login-box">
            <h3>Connect your account</h3>
            <div class="login-form">
                
                <form id="login" method="post" action="index.php?view=action/login">
                        <label for="username">
                            <p>Username : </p>
                        </label>
                        <input type="text" name="username" id="username" placeholder="Username">
                    <label for="password">
                        <p>Password : </p>
                    </label>
                    <input type="text" name="pwd" id="pwd" placeholder="Password">
                    <button type="submit" form="login" value="Submit">Confirm</button>
                </form>
                <div class="no-account">
                    <p class="no-account-text">No account yet? 
                            <?php
                                print signUpLink("./index.php?view=form/f_signup");
                            ?>
                    </p>
                    <p class="no-account-text">Forgot password? 
                            <?php
                                print forgotLink("./index.php?view=form/f_forgot");
                            ?>
                    </p>
                </div>
            </div>
        </div>
    </html>
    <?php
    } else {
        header('Location: index.php?view=view/profile');
    }
