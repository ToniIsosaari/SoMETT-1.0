<?php
$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
if($my->mysql_errno){
die("MySQL, virhe (#".$my->mysql_errno.") yhteyden luonnissa:".$my->connect_error);
}
$my->set_charset("utf8");
$URL = "http://cosmo.kpedu.fi/~tomijylha/SoMETT-1.0/dad/uploads/4.jpg";
$UID = 2;
$Title = "Tällainen otsikko";
$Desc = "jonkinlainen kuvaus kuvasta joka kuvailee kuvaa";
$sql = 'INSERT INTO 581D_Kuva(KuvaID,URL,UID,Title,Description,PublishDate)VALUES(" ","'.$URL.'","'.$UID.'","'.$Title.'","'.$Desc.'","current_timestamp")';
if($tulos=$my->query($sql)){
echo '<p>Nimi tallennettu!</p>';
}                   
else {
echo "Virhe SQL-kyselyssä!";
}
$my->close();
?>