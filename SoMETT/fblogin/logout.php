<?php 
session_start();
session_unset();
$kuvaid = $_GET['KID'];
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
			  						    if (isset($_GET['KID'])) {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../SoMETT/kommentointi.php?KID=' . $kuvaid . '">'; 
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../SoMETT/index.php">'; 
    }
//header("Location: ../../SoMETT/index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
