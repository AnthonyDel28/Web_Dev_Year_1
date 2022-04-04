<?php

?>

<html>
<div class="login-box">
    <h3>Change your password</h3>
    <div class="login-form">
        <form action="index.php?view=action/change_password" method="post">
            <label for="password">Current password</label>
            <input type="text" id="password" name="password">
            <label for="new_password">New password</label>
            <input type="text" id="new_password" name="new_password">
            <input type="submit" value="Confirm">
        </form>
    </div>
</div>
</html>