<?php
$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
  }
  $my->set_charset("utf8");

$info = $_GET['id'];
if (isset($_GET['id'])) {
  $result = $my->query("UPDATE 581D_Kommentti SET Tila=1 WHERE 581D_Kommentti.KommenttiID = '$info'");
  echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentointi.php'>";
    }
$my->close();
?>
