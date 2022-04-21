<?php


$dbh = new PDO('mysql:host=localhost;dbname=Mediarnaque', 'root', 'root');

/*
$result = $dbh->query("SELECT * FROM vcard");
$data = $result->fetch(PDO::FETCH_ASSOC);
foreach($data as $key => $value){
    print $value[] . '<br>';
}*/

/* $sth = $dbh->query("SELECT nameB, modelV FROM vcard INNER JOIN brand ON vcard.brandV = brand.idB");

 $result = $sth->fetchAll();
 foreach($result as $key => $value){
    print $value['nameB'] . ' ' . $value['modelV'] . '<br>';
} */


#-----------------------------------------------------------------

$order = "DESC";
$sql_query = 'SELECT DISTINCT *,
                b.nameB as marque, 
                CONCAT(bcpu.nameB," ",modelCpu) as namecpu, 
                bvcard.nameB as brandvcard
        FROM laptop as l, brand as b, brand as bcpu, brand as bvcard, cpu as c, vcard as v, color as col 
        WHERE b.idB=l.brandL AND c.idCpu=l.cpuL AND v.idV=l.vcardL AND bcpu.idB=c.brandCpu AND bvcard.idB=v.brandV AND col.idC=l.colorL';

$result = $dbh->query($sql_query);

foreach($result as $data){
    print $data['marque'] . ' ' . $data['namecpu'] . ' ' . $data['brandvcard'] . '<br>';
}




?>

