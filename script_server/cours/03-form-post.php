<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Form - Post</title>
</head>
<body>
<?php
$jobs = ['Webdeveloper', 'Data analyst', 'Designer', 'Java Developer'];
// $_POST['name'];
?>
<form action="04-form-processing.php" method="post">
    <label for="name">FirstName & Surname</label>
    <input type="text" id="name" name="name"><br>
    <label for="job">Job</label>
    <select name="job" id="job">
    <!-- Liste déroulante dynamique à partir de tableau $jobs -->
            <?php 
                foreach($jobs as $value){
                    print "<option value='.$value.'>$value</option>";
                }
            ?>
    </select>
    <br>
    <label for="birth">Year of birth</label>
    <select name="birth" id="birth">
    <!-- Liste déroulante dynamique avec des valeurs de 1950 à cette année -->
            <?php
                for($i = date('Y'); $i >= 1950; $i--){
                    print "<option value='.$i.'>$i</option>";
                }
            ?>
    </select>
    <br>
    <input type="submit">
</form>
</body>
</html>