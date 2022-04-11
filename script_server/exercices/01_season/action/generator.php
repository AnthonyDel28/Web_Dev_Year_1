<section class="result">

<?php

if(isset($_POST['date'])) {
    $date = date_create($_POST['date']);
   $date = date_format($date, 'd/m');
   if($date > '20/03' && $date < '20/06'){
       print "Spring !";
   } elseif ($date > '21/06' && $date < '22/09'){
       print "Summer !";
   } elseif ($date >= '23/06' && $date <= '20/12'){
       print "Autumn !";
   } 
} else {    
    header('Location: ./index.php');
}

?>

</section>