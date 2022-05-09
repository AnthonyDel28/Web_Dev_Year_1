<?php
if(!isset($_SESSION['username'])){
    ?>
    <html>
        <div class="login-box">
            <h3>Create new password</h3>
            <div class="login-form">
                
                <form id="forgot" method="post" action="./action/forgot.php">
                        <label for="email">
                            <p>Email: </p>
                        </label>
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    <button type="submit" form="forgot" value="Submit">Confirm</button>
                </form>
            </div>
        </div>
    </html>
    <?php
} else {
    header("Location: ./index.php");
}
