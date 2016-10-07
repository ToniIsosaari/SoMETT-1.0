<?php
require 'dbconfig.php';
function checkuser($fbid,$fbfullname,$femail){
	$parts = explode(" ", $fbfullname);
$vika = array_pop($parts);
$eka = implode(" ", $parts);
    	$check = mysql_query("select * from 581D_Kayttaja where UID='$fbid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO 581D_Kayttaja (UID,Nimi,SNimi,Sposti) VALUES ('$fbid','$eka','$vika','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE 581D_Kayttaja SET Nimi='$eka', SNimi='$vika', Sposti='$femail' where UID='$fbid'";
	mysql_query($query);
	}
}?>
