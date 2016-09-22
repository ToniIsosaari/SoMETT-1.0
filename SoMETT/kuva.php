<?php
session_start();
$logged_user= $_SESSION['login_user'];
$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
  }
  $my->set_charset("utf8");
?>
<?php
     $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");

        if($my->mysql_errno)  {
            die("MySQL, virhe yhteyden luonnissa:" . $my->connect_eror);
        }
        $my->set_charset('utf8');
        if($result = $my->query("SELECT * FROM 581D_Kuva, 581D_Kayttaja, 581D_Kommentti WHERE 581D_Kuva.UID = 581D_Kayttaja.UID = 581D_Kommentti.UID")){
           while($d = $result->fetch_object()){
                $rows[]=array($d->KuvaID,$d->URL,$d->UID,$d->Title,$d->Description,$d->PublishDate,$d->SSana,$d->Nimi,$d->Snimi,$d->Sposti,$d->Status,$d->Liittyi,$d->KuvaID,$d->KommenttiID,$d->Kommentti,$d->KTime,$d->Tila);
              }
            } else {
              echo "Error";
            }
               $my->close();


?>
<!DOCTYPE html>
<html temscope itemtype="http://schema.org/Article">
	<head>
		
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>SoMETT</title>
<meta name="description" content="INSERT DESCRIPTION HERE" /> 
<!-- Google+ -->
<meta itemprop="name" content="SoMETT">
<meta itemprop="description" content="INSERT DESCRIPTION HERE">
<meta itemprop="image" content=" <?echo $rows[1][1]?>">
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image"> 
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="SoMETT">
<meta name="twitter:description" content="INSERT DESCRIPTION HERE">
<meta name="twitter:creator" content="@author_handle">
<!-- IMG +280x150px -->
<meta name="twitter:image:src" content="<?echo $rows[1][1]?>">
<!-- OG data -->
<meta property="og:title" content="SoMETT" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.example.com/" />
<meta property="og:image" content="<?echo $rows[1][1]?>" />
<meta property="og:description" content="INSERT DESCRIPTION HERE" />
<meta property="og:site_name" content="SoMETT" />
<meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
<meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
<meta property="article:section" content="Article Section" />
<meta property="article:tag" content="Article Tag" />
<meta property="fb:admins" content="Facebook numberic ID" />
<?php include("styles.php");?>
<link rel="stylesheet" href="foundation-icons/foundation-icons.css">
<link rel="stylesheet" href="css/foundation-icons.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/stylesheet.css" />
</head>


<body>
<?php include("nav.php");?>
  <!-- Main osio (lisää sivulle olennainen sisältö tänne) -->
<section class="main">
  <div class="wrap">
    <h1><?echo $rows[1][3]?></h1>
    
    <center><img class="imageclass" src="<?echo $rows[1][1]?>"></center>
    <p>
    <?
     echo "<p><br>".$rows[$p][0]."&nbsp YKSI &nbsp".$rows[$p][1]."&nbsp YKSI &nbsp".$rows[$p][2]."&nbsp YKSI &nbsp".$rows[$p][3]."&nbsp YKSI &nbsp".$rows[$p][4]."&nbsp YKSI &nbsp".$rows[$p][5]."&nbsp YKSI &nbsp".$rows[$p][6]."&nbsp YKSI &nbsp".$rows[$p][7]."&nbsp YKSI &nbsp".$rows[$p][8]."&nbsp YKSI &nbsp".$rows[$p][9]."&nbsp YKSI &nbsp".$rows[$p][10]."&nbsp YKSI &nbsp".$rows[$p][11]."&nbsp YKSI &nbsp".$rows[$p][12]."&nbsp YKSI &nbsp".$rows[$p][13]."&nbsp YKSI &nbsp".$rows[$p][14]."&nbsp YKSI &nbsp".$rows[$p][15]."&nbsp YKSI &nbsp".$rows[$p][16]."&nbsp YKSI &nbsp".$rows[$p][17]."</p>";        
  
        
    ?></p>
  </div>
</section>
  <!-- Secondary osio (lisää eri niin tärkeä sisältö tänne) -->
<section class="secondary">
  <div class="wrap">
    <h2>Kommentit</h2>
    <a href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/kommentointi.php"></a>
    <hr>
    <div class="row">
      <div class="panel">
<?php
$sql = "SELECT UID FROM 581D_Kayttaja WHERE Sposti = '$logged_user'";
echo "<p>Kirjautunut käyttäjällä $logged_user</p>";
$result3 = $my->query($sql);
#var_dump($result3);
$comment = $_POST['comment'];
$submit = $_POST['submit'];
// if($comment != "")
if (isset($_POST['submit'])) {
  $obj = $result3->fetch_object();
    var_dump($obj);
  $sql = "INSERT INTO 581D_Kommentti (UID,Kommentti) VALUES ('".$obj->UID."','$comment') ";
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
              <input type="button" value="Kirjaudu Sisään" onclick="openWin()">
              <hr>
            </div>
          </form>
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
</section>
</div>
</div>
  <!-- Footer osio (ÄLÄ KOSKE!) -->
<?php include("footer.php")?>
<?php include("script.php")?>
</div>
</div>
</div>
</body>
</html>


