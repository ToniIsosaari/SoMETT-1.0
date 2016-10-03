<?php
require 'dbconfig.php';
function checkuser($fbid,$fbfullname,$femail){
    	$check = mysql_query("select * from 581D_Kayttaja where UID='$fbid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO 581D_Kayttaja (UID,Nimi,Sposti) VALUES ('$fbid','$fbfullname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE 581D_Kayttaja SET Nimi='$fbfullname', Sposti='$femail' where UID='$fbid'";
	mysql_query($query);
	}
}?>
