<?php
/* akukirjasto vieraskirjan tietokanta liitymään
tunnusta_ei_kannassa($yhteys,$ktunnus)


*/



/*tarkistaa onko käyttäjän kirjoitama ktunnus jo olemassa, jos ei ole palaute on true
syötteet $yhteys eli kahva kantaa varten
$ktunnus eli käyttäjän ehdottama ktunnus
*/
//Tauluun kayttaja liittyva apufunktio
function tunnusta_ei_kannassa($yhteys,$ktunnus)
{
	$kysely = $yhteys->prepare("SELECT * FROM otto_admin WHERE kayttajatunnus=?");
	$kysely->execute(array($ktunnus)); $rivimaara = $kysely->rowCount(); //laskee vastauksesta rivien määrän

	if($rivimaara == 0) return true;
	else return false;

}


/* Funktio palauttaa käyttäjän id:n
syötteet tietokantayhteyteen, käyttäjätunnus $ktunnus ja salanana $salanana*/
function hae_id_kannasta($yhteys,$ktunnus,$salasana)
{

$id=1;
$lause = $yhteys->prepare("SELECT * FROM otto_admin WHERE kayttajatunnus=:ktunnus AND salasana =:salasana");
$lause->bindParam(':ktunnus', $ktunnus);
$lause->bindParam(':salasana', $salasana);



$lause->execute();

$rivi = $lause->fetchAll(PDO::FETCH_ASSOC);
if(!empty($rivi)) $id = $rivi[0]["admin_id"];
return $id;

}

/* syötteet käyttäjän id $kid ja tietokantayhteys $yhteysFunctiot palauttaa käyttäjän nimen  id:m mukaan haettuna tietokantaan */
function kayttajan_nimi($kid,$yhteys)
{

	$sql="SELECT etunimi,sukunimi FROM kayttaja WHERE kid=?";

	$teksti="";

	$kysely=$yhteys->prepare($sql);
	$kysely->execute(array($kid));

	$rivi=$kysely->fetchAll(PDO::FETCH_ASSOC);
	if(empty($rivi)) $teksti= "Käyttäjää ei löydy.";
	else
	{

		$etunimi=$rivi[0]["etunimi"];
		$sukunimi=$rivi[0]["sukunimi"];
		$teksti.= $etunimi." ".$sukunimi;

	}
		return $teksti;

} 