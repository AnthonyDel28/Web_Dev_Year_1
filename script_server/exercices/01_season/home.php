<?php
include('lib/tools.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Season Check</title>
</head>
<body>
    <div class="main-content">
        <div class="main-title">
            <p>SEASON CHECK</p>
        </div>
        <div class="main-box">
            <form action="action/result.php" id="season_check" method="post">
                <label for="season_check">Select a date</label>
                <input type="date" id="date" name="date"
                min="1900-01-01" ></input>
                    <input type="submit" name="submit" value="Confirm"/>
            </form>
        </div>
    </div>
</body>
</html>
