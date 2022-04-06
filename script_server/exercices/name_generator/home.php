<?php
include('data/names_array.php');
include('lib/tools.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Name Generator</title>
</head>
<body>
    <div class="main-content">
        <div class="main-title">
            <p>NAME GENERATOR</p>
        </div>
        <div class="main-box">
            <form action="action/result.php" id="generator" method="post">
                <label for="country">Select a language:</label>
                <select name="country" id="country">
                    <option value="fr">French</option>
                    <option value="en">English</option>
                    <option value="de">German</option>
                    <option value="it">Italian</option>
                </select>
                <label for="quantity">How many?</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10">
                <div class="submit-buttons">
                    <input type="submit" name="name_option" value="Name"/>
                    <input type="submit" name="name_option" value="Surname"/>
                    <input type="submit" name="name_option" value="Name + Surname"/>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
