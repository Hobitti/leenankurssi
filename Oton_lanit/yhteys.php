<?php
$host ="magnesium";
$user = "16aakselis";
$pass = "salasana";
$dbname = "db16aakselis";

try //yritetään ottaa yhteys
{
$yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
$user, $pass);
//luo PDO-olion
}
catch(PDOException $e) // jos ei onnistu (poikkeus)
{
echo $e->getMessage(); //antaa ilmoituksen siitä, missä virhe
}
?>