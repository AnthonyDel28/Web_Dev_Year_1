<section class="result">

<?php

if(isset($_POST['country']) && isset($_POST['quantity']) && isset($_POST['name_option'])) {
    $tmp = array();
    while(count($tmp) < $_POST['quantity']){
        if($_POST['name_option'] == 'Name' || $_POST['name_option'] == 'Surname'){
            if($_POST['name_option'] == 'Name'){
                $tmp[] = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
                $tmp = array_unique($tmp);
            } 
            elseif($_POST['name_option'] == 'Surname'){
                $tmp[] = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
                $tmp = array_unique($tmp);
            }
        } elseif($_POST['name_option'] == 'Name + Surname'){
            $first_name = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
            $last_name = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
            $tmp[] = $first_name .' '. $last_name;
            $tmp = array_unique($tmp);
        }
    }
    foreach($tmp as $key => $value){
        print $value.'<br>';
    }
} else {    
    header('Location: ./index.php');
}

?>

</section>