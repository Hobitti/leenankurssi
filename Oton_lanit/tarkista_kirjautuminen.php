 <?php
session_start();//aloitetaan istunto
//kirjastot käyttöön
	require "yhteys.php";//yhteys kantaan
	require "tkfunktiot.php";//Functiot
	require "funktiot.php";//Functiot

//lomakkeenkäsitelijä
if(!empty($_POST["ktunnus"]) && !empty($_POST["salasana"]))
{
	//tiedot muutujiin
	$ktunnus = $_POST["ktunnus"];
	$salasana = $_POST["salasana"];
	$ktunnus = putsaa($ktunnus);
	
	//haetaan id kanasta
	$id = hae_id_kannasta($yhteys,$ktunnus,$salasana);
	
	if($id!=null)//jos id löytyi
	{

		$_SESSION["kid"] = $id;
		$_SESSION["istuntoid"] = session_id();
		$_SESSION["salasana"]=$salasana;
		header("Pragma: No-Cache");
		header("Location: index.php?vaarin=0");
		die();

	}
	//jos id:tä ei löydy, uudeleenohjaus lomakeeseen, kysymysmerkkijonoon tieto vääristä kirjautumistiedoista
	else header("Location: index.php?vaarin=$id");

}
//lomakkeesta puutuu tietoja, uudelleen ohjaus takaisin ja kysymysmerkkijonoon tieto puutuvista kirjautumistiedoista
else header("Location: index.php?vaarin=2");