<?php
/*functiokirjasto vieraskirjan luomista varten
tulosta_alku()
tulosta_admin_alku()
tulosta_loppu()
tulosta_admin_loppu()
Tulostaa_sisalto($sivu)
tulostaa_admin_sisalto($sivu)
putsaa($sana)
muunna_salasana($sana)

*/

//sisällyttää html alun ja määrittää käyettävän aikavyöhykkeen.
function tulosta_alku()
{
	require "./kirjastot/alku.php";
	date_default_timezone_set("Europe/Helsinki"); }

//sisällyttää html alun ja määrittää käyettävän aikavyöhykkeen.
function tulosta_admin_alku()
{
	require "./kirjastot/admin_alku.php";
	date_default_timezone_set("Europe/Helsinki"); }
//sisällyttää html lopun
function tulosta_loppu()
{
	require "./kirjastot/loppu.php";
}
//sisällyttää html lopun
function tulosta_admin_loppu()
{
	require "./kirjastot/admin_loppu.php";
}
/*syöte $sivu sisällytettävän sivun runko-osa
määrittää, mitä sivuja saa sisällyttää
varmistaa, että syöte kuuluu näihin sivuihin
jos syöte on ok, lisää tarkentimen ja kansion sekä sisällyttää sen jos syöte ei ole ok, sisällytttää admin_etusivu.php:n*/
function tulosta_sisalto($sivu)
{
	$sallitut=array('rekisteroidy','kirjaudu','juttu','kirjoittajan_jutut','etusivu');
	if(in_array($sivu,$sallitut))
{
	$sivu=$sivu.".php";
	require "./sisalto/$sivu";
}
	else require "./sisalto/etusivu.php";
}

function tulosta_admin_sisalto($sivu)
{
	$sallitut=array('muokkaa_omia_tietoja','lisaa_juttu','muokkaa_juttua','admin_etusivu');
	if(in_array($sivu,$sallitut))
{
	$sivu=$sivu.".php";
	require "./sisalto/$sivu";
}
	else require "./sisalto/admin_etusivu.php";
}

//syöte $sana, käyttäjän käyttäjän lomakeeseen antama syöte
//poistaaa tyhjät merkit sanojen alusta ja lopusta, muuttaa html-tagit entiteeteiksi
function putsaa($sana)
{

	$sana=trim($sana);//poistaa tyhjät merkit merkkijonon alusta ja lopusta
	$sana=htmlspecialchars($sana); //muuntaa html-tagit entiteeteiksi
	return $sana;

}

//syöte $sana, salasana, joka tarkoitus suolata
function muunna_salasana($sana) //apufunktio salasanan vahvistusta varten
{

	$sana.="puppu";
	$sana=md5($sana);
	return $sana;

}
