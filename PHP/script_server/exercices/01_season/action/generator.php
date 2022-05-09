<section class="result">

<?php

if(isset($_POST['date'])) {
    $date = date_create($_POST['date']);
    $date = date_format($date, 'md');
    if($date >= '0320' && $date <= '0620')
        print "Spring!";
    elseif($date >= '0621' && $date <= '0922')
        print "Summer!";
    elseif($date >= '0923' && $date <= '1220')
        print "Autumn!";
    else
        print "Winter!";
} else {    
    header('Location: ./index.php');
}

?>

</section>