<?php 
session_start();
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: http://cosmo.kpedu.fi/~johanneskallinen/SoMETT-1.0/kommentointi/kommentointi.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
