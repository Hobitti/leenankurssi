<head>
</head>
<body style="background-image: url('tausta.png');background-repeat: no-repeat;background-color:black;" >


<div style='margin-left:20%; height:150px;width:1200px; border-color:orange; border-style: solid; background-color:black; background:rgba(0,0,0,0.5);'><div style='width:25%; height:150px;border-color:orange; border-style: solid;'></div></div><div style='margin-left:20%; height:50px;width:1201px; border-color:orange; border-style: solid;'><div style='width:294px; height:50px;border-color:orange; border-style: solid;background-color:grey; background:rgba(0,0,0,0.5);display: inline-block;'></div><div style='width:294px; height:50px;border-color:orange; border-style: solid;background-color:grey; background:rgba(0,0,0,0.5);display: inline-block;'></div><div style='width:294px; height:50px;border-color:orange; border-style: solid;background-color:grey; background:rgba(0,0,0,0.5);display: inline-block;position:absolute;'></div></div><div style='width:300px; height:50px;border-color:orange; border-style: solid;background-color:grey; background:rgba(0,0,0,0.5);display: inline-block;position:absolute;left:1287px;top:165px;'>asd</div></div>";
<?php
require "./yhteys.php";
echo "<div style='position:relative;margin-left:20%; background-color:black;background:rgba(0,0,0,0.5);width:1200px;height:600px; border-color:orange; border-style: solid; fontf.family:calibri; color:#ffffff;'>";
if(isset($_GET["vaarin"])  && !empty($_GET["vaarin"])) {
	
	if($_GET["vaarin"]==0) {
		echo"jee Kirjautuminen onnnistui";
	}
	if($_GET["vaarin"]==1) {
		echo"Salasana taikka k‰ytt‰j‰nimi v‰‰rin";
	}
	if($_GET["vaarin"]==2) {
		echo"T‰yt‰ kent‰t";
	}
}
else {
echo "<form action=\"./tarkista_kirjautuminen.php\" method =\"post\" style='margin-left:45%; margin-top:30px;'>\n";
echo "Ktunnus <input type=\"text\" style=':;' name=\"ktunnus\"><br>\n";//k‰ytt‰j‰tunnus
echo "Salasana <input type=\"password\" name=\"salasana\"><br>\n";//salasana
echo "<input type=\"submit\" value=\"Tarkista kirjautuminen\">\n";
echo "</form>\n";
}
echo "</div>";
?>

</body>
</html>