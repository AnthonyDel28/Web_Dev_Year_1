<?php
require_once __DIR__ . '/lib/database.php';
require_once __DIR__ . '/lib/functions.php';
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>PDO</title>
    </head>
    <body>
    <table class="table table-striped" style="max-width:400px; background-color:lightgrey;">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Marque</th>
            <th>Processeur</th>
            <th>Carte Graphique</th>
            <th>Mémoire</th>
            <th>Ecran</th>
            <th>Poids</th>
            <th>Couleur</th>
            <th>Prix TVAC</th>
        </tr>
        </thead>
        <tbody>
        <select name="price" id="price">
            <option value=""></option>
        </select>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    </body>
    </html>
<?php