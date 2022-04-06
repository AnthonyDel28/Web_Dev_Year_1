<section class="result">

<?php


if(isset($_POST['country']) && isset($_POST['quantity']) && isset($_POST['name_option'])) {
    $index = intval($_POST['quantity']);
    while($index >= 1){
        if($_POST['name_option'] == 'Name' || $_POST['name_option'] == 'Surname'){
            if($_POST['name_option'] == 'Name'){
                $first_name = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
                print $first_name.'<br>';
                $index--;
            } elseif($_POST['name_option'] == 'Surname'){
                $last_name = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
                print $last_name.'<br>';
                $index--;
            }
        } elseif($_POST['name_option'] == 'Name + Surname'){
            $first_name = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
            $last_name = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
            print $first_name.' '.$last_name.'<br>';
            $index--;
        }
    }
} else {    
    header('Location: ./index.php');
}

?>

</section>