<?php
$KID = $_GET['KID'];
/*
$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
if($my->mysql_errno){
  die("MySQL, virhe (#".$my->mysql_errno.") yhteyden luonnissa:".$my->connect_error);
}
$my->set_charset("utf8");*/
$sqlA = 'SELECT * FROM 581D_Kuva WHERE KuvaID = "'.$KID.'";';
if($resultA = $my->query($sqlA)){
  while($d = $resultA->fetch_object()){
    $KID = $d->KuvaID;
    $c = $d->Suosituin + 1;
    $sql2A= 'UPDATE 581D_Kuva SET Suosituin = "'.$c.'"  WHERE KuvaID = "'.$KID.'";';
    if($result2A = $my->query($sql2A)){
    }
  }
} 
else {
  echo "Virhe SQL-kyselyssä!";
}
$my->close();
?>



