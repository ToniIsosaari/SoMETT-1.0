<?php 
session_start();
session_unset();
$kuvaid = $_GET['KID'];
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: ../../SoMETT/index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
