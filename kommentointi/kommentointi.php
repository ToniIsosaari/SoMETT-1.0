<?php
session_start();
$kuva = $_SESSION['kuvaid'];
$logged_user = $_SESSION['login_user'];
$logged_fbuser = $_SESSION['FULLNAME'];
$faceid = $_SESSION['FBID'];
$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
}
$my->set_charset("utf8");
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml" class="no-js" lang="fi">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kommentointi</title>
    <link rel="stylesheet" href="css/foundation.min.css" />
    <link rel="stylesheet" href="css/foundation-icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
  </head>
  <body>
    <!--JOS KÄYTTÄJÄ ON KIRJAUTUNUT ALKAA-->
  <?php if ($_SESSION['FBID'] or $_SESSION['login_user']): ?>      
  <img src=<?php echo $_SESSION['kuvaid']; ?> width=300 height=400 alt-image path Invalid name=image />
     <div class="row">
      <div class="panel">
<?php
$sql = "SELECT UID FROM 581D_Kayttaja WHERE Sposti = '$logged_user'";
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
    var_dump($obj);
if ($_SESSION['FBID']) {
	$sql = "INSERT INTO 581D_Kommentti (UID,Kommentti) VALUES ('".$faceid."','$comment') ";
} else {
    $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti) VALUES ('".$obj->UID."','$comment') ";
}
  $result = $my->query($sql);
#die($sql);

      echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentointi.php'>";
}
?>
        <div>
          <form action="kommentointi.php" method="POST">
            <div>
              <h5 class="float-left">Kommentteja</h5>
<?php
$result1 = $my->query("SELECT * FROM 581D_Kommentti");
$numrows = $result1->num_rows;
echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
              <textarea name="comment" maxlength="140" rows="2" required></textarea>
              <input class="button float-right" type="submit" name="submit" value="Kommentoi">
              <a href="fblogin/logout.php">Kirjaudu Ulos</a><br>
              <hr>
            </div>
          </form>
        </div>
        <div>
<?php
$result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja, 3972_FBKayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID or 581D_Kommentti.UID = 3972_FBKayttaja.Fuid ORDER BY KTime DESC");
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
  <img src=<?php echo $_SESSION['kuvaid']; ?> width=300 height=400 alt-image path Invalid name=image />
     <div class="row">
      <div class="panel">
        <div>
            <div>
              <h5 class="float-left">Kommentteja</h5>
<?php
$result1 = $my->query("SELECT * FROM 581D_Kommentti");
$numrows = $result1->num_rows;
echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
              <input type="button" value="Kirjaudu Sisään" onclick="openWin()">
              <hr>
            </div>
        </div>
        <div>
<?php
$result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID ORDER BY KTime DESC");
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
  </body>
</html>
