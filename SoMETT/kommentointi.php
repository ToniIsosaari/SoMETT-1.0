<?php

$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
}
$my->set_charset("utf8");

session_start();
$kuvaid = $_GET['KID'];
$logged_user = $_SESSION['login_user'];
$logged_fbuser = $_SESSION['FULLNAME'];
$faceid = $_SESSION['FBID'];
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml" class="no-js" lang="fi">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kommentointi</title>
    <?php include('styles.php');?>
    <!--<link rel="stylesheet" href="css/foundation.min.css" />--!>
    <link rel="stylesheet" href="css/foundation-icons.min.css" rel="stylesheet" type="text/css" />
    <!--<link rel="stylesheet" href="css/stylesheet.css" />--!>
  </head>
  <body>
    <?php include('nav.php');?>
    <!--JOS KÄYTTÄJÄ ON KIRJAUTUNUT ALKAA-->
  <?php if ($_SESSION['FBID'] or $_SESSION['login_user']): ?>
  <?php
  $sql ="SELECT URL FROM 581D_Kuva WHERE KuvaID = '$kuvaid'";
  #echo $sql;
  $result = $my->query($sql);
  $kkysely = $result->fetch_object();
  ?>
      <img src="<?php echo $kkysely->URL;?>" width="300" height="400" name="image" />
     <div class="row">
 <div class="panel">
   <!--HAETAAN KUVA TIETOKANNASTA-->
<?
$sql = "SELECT UID FROM 581D_Kayttaja, 3972_FBKayttaja WHERE Sposti = '$logged_user' OR Fuid = '$faceid'";
if ($_SESSION['FBID']) {
    echo "<p>Kirjautunut Facebook käyttäjällä $logged_fbuser</p>";
} else {
    echo "<p>Kirjautunut käyttäjällä $logged_user</p>";
}
$result3 = $my->query($sql);
#var_dump($result3);
$comment = $_POST['comment'];
$submit = $_POST['submit'];
// if($comment != "")
if (isset($_POST['submit'])) {
  $obj = $result3->fetch_object();
if ($_SESSION['FBID']) {
    $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti,KuvaID) VALUES ('".$faceid."','$comment','".$kuvaid."') ";
} else {
    $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti,KuvaID) VALUES ('".$obj->UID."','$comment','".$kuvaid."') ";
}
  $result = $my->query($sql);
#die($sql);
      echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentointi.php?KID=' . $kuvaid . ' '>";
}
?>
        <div>
          <form action="kommentointi.php" method="POST">
            <div>
              <h5 class="float-left">Kommentteja</h5>
     <!--HAETAAN KUVAKOHTAISET KOMMENTIT TIETOKANNASTA-->
<?php
$result1 = $my->query("SELECT * FROM 581D_Kommentti WHERE KuvaID = '$kuvaid'");
$numrows = $result1->num_rows;
echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
              <textarea name="comment" maxlength="140" rows="2" required></textarea>
              <input class="button float-right" type="submit" name="submit" value="Kommentoi">
              <a href="logout.php">Kirjaudu Ulos</a><br>
              <hr>
            </div>
          </form>
        </div>
        <div>
    <!--HAETAAN KAIKKI KUVAAN LIITTYVÄT TIEDOT-->
<?php
$result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID AND KuvaID = '$kuvaid' ORDER BY KTime DESC");
while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
  $id = $rows['UID'];
  $uid = $rows['Nimi'];
  $time = $rows['KTime'];
  $kid = $rows['KommenttiID'];
  $comment = $rows['Kommentti'];
  echo nl2br (
       '<div>' .
         '<table>' .
           '<tbody>' .
             '<tr>' .
               '<th class="float-left">' .
                 '<a class="float-left" href="profiili.php?id=' . $id . '">' . $uid . '</a>' .
                 '<p class="float-left">&nbsp</p>' .
                 '<p class="float-left date">' . $time . '</p>' .
               '</th>' .
               '<th>' .
                 '<a href=raportoi.php?id=' . $kid . ' title="Ilmoita asiattomasta kommentista" class="float-right">' .
                   '<i class="fi-megaphone"></i>' .
                 '</a>' .
               '</th>' .
             '</tr>' .
             '<tr>' .
               '<td>' .
                 '<p id="kommentti">' . $comment . '</p>' .
               '</td>' .
               '<th>' .
               '</th>' .
             '</tr>' .
           '</tbody>' .
         '</table>' .
       '</div>'
);
}
$my->close();
?>
        </div>
      </div>
    </div>

     <!--JOS KÄYTTÄJÄ ON KIRJAUTUNUT LOPPUU JA JOS KÄYTTÄJÄ EI OLE KIRJAUTUNUT ALKAA-->
    <?php else: ?>

<?
  $sql ="SELECT URL FROM 581D_Kuva WHERE KuvaID = '$kuvaid'";
  #echo $sql;
  $result = $my->query($sql);
  $kkysely = $result->fetch_object();
?>

  <img src=<? echo  $kkysely->URL; ?> width="300" height="400" name="image" />
     <div class="row">
      <div class="panel">
        <div>
            <div>
              <h5 class="float-left">Kommentteja</h5>
<?
$result1 = $my->query("SELECT * FROM 581D_Kommentti WHERE KuvaID = '$kuvaid'");
$numrows = $result1->num_rows;
echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
              <input type="button" value="Kirjaudu Sisään" onclick="openWin()">
              <hr>
            </div>
        </div>
        <div>
<?php
$result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID AND KuvaID = '$kuvaid' ORDER BY KTime DESC");
while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
  $id = $rows['UID'];
  $uid = $rows['Nimi'];
  $time = $rows['KTime'];
  $kid = $rows['KommenttiID'];
  $comment = $rows['Kommentti'];
  echo nl2br (
       '<div>' .
         '<table>' .
           '<tbody>' .
             '<tr>' .
               '<th class="float-left">' .
                 '<a class="float-left">' . $uid . '</a>' .
                 '<p class="float-left">&nbsp</p>' .
                 '<p class="float-left date">' . $time . '</p>' .
               '</th>' .
               '<th>' .
               '</th>' .
             '</tr>' .
             '<tr>' .
               '<td>' .
                 '<p id="kommentti">' . $comment . '</p>' .
               '</td>' .
               '<th>' .
               '</th>' .
             '</tr>' .
           '</tbody>' .
         '</table>' .
       '</div>'
);
}
$my->close();
?>
        </div>
      </div>
    </div>
<!--JOS KÄYTTÄJÄ EI OLE KIRJAUTUNUT LOPPUU-->
    <?php endif ?>
  <script>
  function openWin() {
    window.location.href = "kommentointi_login.php";
  }
  </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/readmore.js"></script>
        <script>
$(document).foundation();
        </script>
        <script>
$('p#kommentti').readmore({
  moreLink: '<a href="#" class="more">Näytä enemmän <i class="fi-arrow-down"></i></a>',
  lessLink: '<a href="#" class="less">Näytä vähemmän <i class="fi-arrow-up"></i></a>',
});
        </script>
 <?php include('footer.php');?>
  </body>
</html>

