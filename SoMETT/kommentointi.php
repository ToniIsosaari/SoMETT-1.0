<?php
session_start();
  $my = mysqli_connect('localhost', 'data15', 'aJrHfybLxsLU76rV', 'data15');
  if ($my->mysqli_errno) {
      die('MySQL, virhe yhteyden luonnissa:'.$my->connect_error);
  }
  $my->set_charset('utf8');

  $kuvaid = $_GET['KID'];
  $logged_user = $_SESSION['login_user'];
  $logged_fbuser = $_SESSION['EMAIL'];
  $faceid = $_SESSION['FBID'];
 
 $sql = "SELECT URL FROM 581D_Kuva WHERE KuvaID = '$kuvaid'";
   $result = $my->query($sql);
   $kkysely = $result->fetch_object();
   $_SESSION['kuvaid']=$kuvaid;

?>
<?php// include('action.php');
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml" class="no-js" lang="fi">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- OG data -->
    <meta property="og:title" content="SoMETT" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://cosmo.kpedu.fi/~miiahuvila/SoMETT2/SoMETT-1.0/SoMETT/" />
    <meta property="og:image" content="<?php echo  $kkysely->URL; ?>" />
    <meta property="og:description" content="INSERT DESCRIPTION HERE" />
    <meta property="og:site_name" content="SoMETT" />
    <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
    <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
    <meta property="article:section" content="Article Section" />
    <meta property="article:tag" content="Article Tag" />
    <!-- Google+ -->
    <meta itemprop="name" content="SoMETT">
    <meta itemprop="description" content="INSERT DESCRIPTION HERE">
    <meta itemprop="image" content=" <?php echo  $kkysely->URL; ?>">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="SoMETT">
    <meta name="twitter:description" content="INSERT DESCRIPTION HERE">
    <meta name="twitter:creator" content="@author_handle">
    <!-- IMG +280x150px -->
    <meta name="twitter:image:src" content="<?php echo  $kkysely->URL; ?>">
    <meta name="description" content="INSERT DESCRIPTION HERE" />
    
    <title>Kommentointi</title>
    <!-- <link rel="stylesheet" href="css/foundation.min.css" /> -->
    <link rel="stylesheet" href="css/foundation-icons.min.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="css/stylesheet.css" /> -->
    <?php
      include 'styles.php';
    ?>
  </head>
  <body>
    <?php include 'nav.php'; ?>
    <section class="main">
    <div class="wrap">
    <!--JOS KÄYTTÄJÄ ON KIRJAUTUNUT ALKAA-->
    <?php if ($_SESSION['FBID'] or $_SESSION['login_user']): ?>
    <?php
      $sql = "SELECT URL FROM 581D_Kuva WHERE KuvaID = '$kuvaid'";
      //echo $sql;
      $result = $my->query($sql);
      $kkysely = $result->fetch_object();
      $_SESSION['kuvaid']=$kuvaid;
    ?>
    <img class="centered" src="<?php echo $kkysely->URL; ?>" name="image" />
    </div>
    </section>
	<section class="secondary">
    <div class="row">
      <div class="panel">
        <!--HAETAAN KUVA TIETOKANNASTA-->
        <?php
          if ($_SESSION['FBID']) {
			  $sql = "SELECT UID FROM 581D_Kayttaja WHERE Sposti = '$logged_fbuser'";
              echo "<p>Kirjautunut Facebook käyttäjällä $logged_fbuser</p>";
          } else {
			  $sql = "SELECT UID FROM 581D_Kayttaja WHERE Sposti = '$logged_user'";
              echo "<p>Kirjautunut käyttäjällä $logged_user</p>";
          }
          //echo $sql;
          $result3 = $my->query($sql);
          //var_dump($result3);
          $comment = $_POST['comment'];
          $submit = $_POST['submit'];
          // if($comment != "")
          if (isset($_POST['submit'])) {
            $obj = $result3->fetch_object();
			var_dump($obj);
			$jps = $obj->UID;
            if ($_SESSION['FBID']) {
              $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti,KuvaID) VALUES ('$faceid','$comment','$kuvaid') ";
            } else {
              $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti,KuvaID) VALUES ('$jps','$comment','$kuvaid') ";
            }
            $result = $my->query($sql);
            //die($sql);
            //echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentointi.php?KID=".$kuvaid."'>";
			header("Location: kommentointi.php?KID=".$kuvaid);
          }
        ?>
        <div>
          <form action="<?php echo 'kommentointi.php?KID='.$kuvaid.'';?>" method="POST">
            <div>
			  
              <!--HAETAAN KUVAKOHTAISET KOMMENTIT TIETOKANNASTA-->
              <textarea name="comment" maxlength="140" rows="2" required></textarea>
              <input class="button float-right" type="submit" name="submit" value="Kommentoi">
              <a href="<?php echo 'fblogin/logout.php?KID='.$kuvaid.'';?>">Kirjaudu Ulos</a><br>
              <hr>
			  <h5 class="float-left">Kommentteja</h5>
              <?php
                $result1 = $my->query("SELECT * FROM 581D_Kommentti WHERE KuvaID = '$kuvaid'");
                $numrows = $result1->num_rows;
                echo '<h5	 class="float-left">&nbsp•&nbsp'.$numrows.'</h5>';?><br>
              <!--HAETAAN KAIKKI KUVAAN LIITTYVÄT TIEDOT-->
              <?php
                $result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID AND KuvaID = '$kuvaid' ORDER BY KTime DESC");
                while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                  $id = $rows['UID'];
                  $uid = $rows['Nimi'];
                  $time = $rows['KTime'];
                  $kid = $rows['KommenttiID'];
                  $comment = $rows['Kommentti'];
                  echo nl2br(
                    '<div>'.
                      '<table>'.
                        '<tbody>'.
                          '<tr>'.
                            '<th class="float-left">'.
                              '<a class="float-left" href="profiili.php?id='.$id.'">'.$uid.'</a>'.
                              '<p class="float-left">&nbsp</p>'.
                              '<p class="float-left date">'.$time.'</p>'.
                            '</th>'.
                            '<th>'.
                              '<a href=raportoi.php?id='.$kid.' title="Ilmoita asiattomasta kommentista" class="float-right">'.
                                '<i class="fi-megaphone"></i>'.
                              '</a>'.
                            '</th>'.
                          '</tr>'.
                          '<tr>'.
                            '<td>'.
                              '<p id="kommentti">'.$comment.'</p>'.
                            '</td>'.
                            '<th>'.
                            '</th>'.
                          '</tr>'.
                        '</tbody>'.
                      '</table>'.
                    '</div>'
                  );
                }

            ?>
          </div>
        </div>
      </div>
      </section>
      <!--JOS KÄYTTÄJÄ ON KIRJAUTUNUT LOPPUU JA JOS KÄYTTÄJÄ EI OLE KIRJAUTUNUT ALKAA-->
    <?php else: ?>
    <?php
      $sql = "SELECT URL FROM 581D_Kuva WHERE KuvaID = '$kuvaid'";
      //echo $sql;
      $result = $my->query($sql);
      $kkysely = $result->fetch_object();
    ?>

    <img src=<?php echo  $kkysely->URL; ?> width="300" height="400" name="image" />
    <div class="row">
      <div class="panel">
        <div>
          <div>
			<a href="<?php echo 'kommentointi_login.php?KID='.$kuvaid.'';?>">Kirjaudu Sisään</a><br>
            <hr>
			<h5 class="float-left">Kommentteja</h5>
            <?php
              $result1 = $my->query("SELECT * FROM 581D_Kommentti WHERE KuvaID = '$kuvaid'");
              $numrows = $result1->num_rows;
              echo '<h5 class="float-left">&nbsp•&nbsp'.$numrows.'</h5>';
            ?>
            <br>
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
              echo nl2br(
                '<div>'.
                 '<table>'.
                   '<tbody>'.
                     '<tr>'.
                       '<th class="float-left">'.
                         '<a class="float-left">'.$uid.'</a>'.
                         '<p class="float-left">&nbsp</p>'.
                         '<p class="float-left date">'.$time.'</p>'.
                       '</th>'.
                       '<th>'.
                       '</th>'.
                     '</tr>'.
                     '<tr>'.
                       '<td>'.
                         '<p id="kommentti">'.$comment.'</p>'.
                       '</td>'.
                       '<th>'.
                       '</th>'.
                     '</tr>'.
                   '</tbody>'.
                 '</table>'.
               '</div>'
            );
          }
          $my->close();
        ?>
       </div>
       </div>
       </div>
       </div>
       </div>
      <!--JOS KÄYTTÄJÄ EI OLE KIRJAUTUNUT LOPPUU-->
      <?php endif ?>
       <?
           include 'footer.php';
               ?>
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
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57f35e41dd32c72d"></script>
  </body>
</html>
