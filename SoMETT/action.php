<?php
$KID = $_GET['KID'];
/*
$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
if($my->mysql_errno){
  die("MySQL, virhe (#".$my->mysql_errno.") yhteyden luonnissa:".$my->connect_error);
}
$my->set_charset("utf8");*/
$sql = 'SELECT * FROM 581D_Kuva WHERE KuvaID = "'.$KID.'";';
if($result = $my->query($sql)){
  while($d = $result->fetch_object()){
    $KID = $d->KuvaID;
    $c = $d->Suosituin + 1;
    $sql2= 'UPDATE 581D_Kuva SET Suosituin = "'.$c.'"  WHERE KuvaID = "'.$KID.'";';
    if($result2 = $my->query($sql2)){
    }
  }
} 
else {
  echo "Virhe SQL-kyselyssä!";
}
$my->close();
?>



