<?php
$pays = new PaysDAO($cnx);
$liste = $pays->getPays();

if(is_null($liste)){
    print "<br>Pas de données";
}
else {
    print "pays : ".$liste[0]->nom_pays;

    print '<pre>';
//var_dump($liste);
    print '</pre>';

}
