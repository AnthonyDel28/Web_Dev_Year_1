<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jouer</title>
<h1>Veuillez choisir un numéro!</h1>
<div class="field">
    <form action="action/result.php" method="post">
        <label for="number">Choisissez un numéro:</label>
        <select name="number" id="number">
            <option value="">Séléctionner</option>
            <?php
            $i = 1;
            while($i <= 100){
                print "<option value=".$i.">$i</option>";
                $i++;
            }
            ?>
        </select>
        <input type="submit" value="Confirmer">
    </form>
</div>
</head>
<body>
</body>
</html>

