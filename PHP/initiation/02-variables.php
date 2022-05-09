<?php
// Déclaration de mes variables

$firstName = 'Jhon'; // string
$lastName = 'Doe'; // string
$price = 100.50; // float
$quantity = 10; // integer

// Utilisation des variables 
// Substitution
print $firstName.' - '.$lastName;

// Affichez le nom et le prénom dans un titre de niveau 1 (HTML)
print '<h1>'.$firstName.' - '.$lastName. '</h1>';

// Affichez avec les variables le text suivant
// Bonjour Jhon Doe, content de vous revoir.

print 'Bonjour '.$firstName.' '.$lastName.', content de vous revoir.';
print '<br>';

/* Avec l'utilisation des apostrophes (simple quote), les viriables doivent être concaténées 
entre elles ou avec tu texte. On utilise comme symbole le point. */


// Impression de la même phrase avec des doubles quotes
print "Bonjour $firstName $lastName, content de vous revoir";
/* Avec l'utilisation des guillemets (double quote), les variables sont automatiquement
remplacées par leur valeur. */

// A l'aide des variables, écrivez le texte suivant:   Montant total à payer: 1005€ 
print '<br>';
print 'Montant total à payer: '.$price * $quantity.'€.';
?> <!-- Sortie du PHP -->

<h1> Site web </h1>
<h2> Home Page </h1>
<h3> Auteur: <?php print ''.$firstName.' '.$lastName.''; ?> </h3> <!-- Version longue -->
<h3> Auteur: <?= ''.$lastName.' '.$firstName.''; ?></3> <!-- Version courte -->

<?php   
$var = TRUE;

if($var = TRUE)
{
    print '<br> Boucle:';
    print '<br>';
    $switch = 1;
    while($switch <= 5)
    {
        print $switch;
        print '<br>';
        $switch = $switch + 1;
        $var = FALSE;
    }
}
?>