<html>
    <div class="login-box">
        <h3>Connect your account</h3>
        <div class="login-form">
            
            <form id="login" method="post" action="./action/login.php">
                    <label for="username">
                        <p>Username : </p>
                    </label>
                    <input type="text" name="username" id="username" placeholder="Username">
                <label for="password">
                    <p>Password : </p>
                </label>
                <input type="text" name="password" id="password" placeholder="Password">
                <button type="submit" form="login" value="Submit">Confirm</button>
            </form>
            <div class="no-account">
                <p class="no-account-text">No account yet? <a href="./form/registration.php">Sign up here!</a></p>
            </div>
        </div>
    </div>
</html>


<?php 
