<?php

session_start();

$my = mysqli_connect("#","#","#","#");
if($my->mysql_errno){
  die("MySQL, virhe yhteyden luonnissa" . $my->connect_error);
}
$my->set_charset('utf8');

?>
