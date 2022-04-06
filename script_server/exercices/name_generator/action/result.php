<?php
include('../data/names_array.php');
include('../lib/tools.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Name Generator</title>
</head>
<body>
    <div class="main-content">
        <div class="main-title">
            <p>NAME GENERATOR</p>
        </div>
        <div class="main-box">
            <?php include('generator.php'); ?>
        </div>
    </div>
</body>
</html>