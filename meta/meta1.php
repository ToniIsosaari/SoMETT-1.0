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

<link rel="stylesheet" href="http://cosmo.kpedu.fi/~tomijylha/SoMETT-1.0/dad/dropzone-4.3.0/dist/dropzone.css">
<link rel="stylesheet" href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/dad/node_modules/foundation-sites/dist/foundation.min.css">
<link rel="stylesheet" href="foundation-icons/foundation-icons.css">
<link rel="stylesheet" href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/tyylit.css">
</head>


<body>
<div class="off-canvas-wrapper">
 <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
  <!-- Mobiili Navipalkki (ÄLÄ KOSKE!) -->
<ul class="vertical menu mobile-menu">
 <li><a href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/index.php">Etusivu</a></li>
 <li><a href="#">Kuvapankki</a></li>
 <li><a href="#">Lähetyspalvelu</a></li>
</ul>

</div>

<div class="off-canvas-content" data-off-canvas-content>
   <div class="title-bar nav-mobile">
  <div class="title-bar-left">
    <button class="menu-icon" type="button" data-open="offCanvas"></button>
    <span class="title-bar-title">SoMETT</span>
  </div>
</div>
  <!-- Poytakone Navipalkki (ÄLÄ KOSKE!) -->
<div class="top-bar nav-desktop">
<div class="wrap">
  <div class="top-bar-left">
    <ul class="dropdown menu dropdown-desktop" data-dropdown-menu>
      <li class="menu-text">SoMETT</li>
      <li><a href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/index.php">Etusivu</a></li>
      <li><a href="#">Kuvapankki</a></li>
      <li><a href="#">Lähetyspalvelu</a></li>
    </ul>
  </div>
</div>
</div>
  <!-- Main osio (lisää sivulle olennainen sisältö tänne) -->
<section class="main">
  <div class="wrap">
    <h1><?echo $rows[1][3]?></h1>
    
    <center><a href='http://cosmo.kpedu.fi/~toniahola/someTT/SoMETT-1.0/meta/meta.php?USID=3'><img src="<?echo $rows[1][1]?>"></a></center>
    <p>
    <?
     $p = 0;
     while($rows[$p]){
     echo "<p><br>".$rows[$p][0]."&nbsp YKSI &nbsp".$rows[$p][1]."&nbsp YKSI &nbsp".$rows[$p][2]."&nbsp YKSI &nbsp".$rows[$p][3]."&nbsp YKSI &nbsp".$rows[$p][4]."&nbsp YKSI &nbsp".$rows[$p][5]."&nbsp YKSI &nbsp".$rows[$p][6]."&nbsp YKSI &nbsp".$rows[$p][7]."&nbsp YKSI &nbsp".$rows[$p][8]."&nbsp YKSI &nbsp".$rows[$p][9]."&nbsp YKSI &nbsp".$rows[$p][10]."&nbsp YKSI &nbsp".$rows[$p][11]."&nbsp YKSI &nbsp".$rows[$p][12]."&nbsp YKSI &nbsp".$rows[$p][13]."&nbsp YKSI &nbsp".$rows[$p][14]."&nbsp YKSI &nbsp".$rows[$p][15]."&nbsp YKSI &nbsp".$rows[$p][16]."&nbsp YKSI &nbsp".$rows[$p][17]."</p>";        
     $p++;
     }     
    ?></p>
  </div>
</section>
  <!-- Secondary osio (lisää eri niin tärkeä sisältö tänne) -->
<section class="secondary">
  <div class="wrap">
    <h2>Väliotsikko</h2>
    <hr>
    <p>Tähän tulee kaikki ei niin tärkeä sisältö, joissain tilanteissa tämä voi olla myös piillotettu ja tulee näkyviin vain käyttäjän
    halutessa nähdä epäolennaista sisältöä. Mikäli haluat lisätä omia tyylejäsi tähän osioon sinun tulee antaa osiolle "ylimääräinen"
    class määrittely, jota käsittelet omissa tyylimäärittelyissäsi</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et lectus vulputate, mattis arcu ac, venenatis nibh. Nunc ac augue quam. Suspend
  </div>
</section>
  <!-- Footer osio (ÄLÄ KOSKE!) -->
<section class="footer">
    <div class="row">
    <div class="large-4 column">
        <h4><i class="fi-torsos-all"></i> SoMETTista</h4>
        <hr>
        <p>SoMETTi on Erikoistietotoimiston Musketin sosiaalisenmedian nettiversio,
        joka mahdollistaa tavallisten ihmisten kuvien lähettämisen yhteisön ja
        Erikoistietotoimiston työntekijöiden tutkittavaksi.</p>
    </div>
    <div class="large-4 column">
        <h4><i class="fi-book"></i> Käyttäjäehdot</h4>
        <hr>
        <p>Huomioithan, että sinulla tulee olla oikeudet lähettämääsi kuvaan ja
        kuva ei saa sisältää mitään sopimatonta materiaalia tai se tullaan
        poistamaan palvelusta lopullisesti.</p>
    </div>
    <div class="large-4 column">
        <h4><i class="fi-magnifying-glass"></i> Löydä meidät</h4>
        <hr>
          <a href="https://fi-fi.facebook.com/"><i class="fi-social-facebook"></i></a>&nbsp;
          <a href="https://twitter.com/?lang=fi"><i class="fi-social-twitter"></i></a>&nbsp;
          <a href="https://fi.pinterest.com/"><i class="fi-social-pinterest"></i></a>&nbsp;
          <a href="https://www.reddit.com/"><i class="fi-social-reddit"></i></a>&nbsp;
          <a href="https://plus.google.com/"><i class="fi-social-google-plus"></i></a>
    </div>
    </div>
</section>
<script src="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/dad/node_modules/foundation-sites/vendor/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script>
<script src="http://cosmo.kpedu.fi/~tomijylha/SoMETT-1.0/dad/dropzone-4.3.0/dist/dropzone.js"></script>
<script>
      $(document).foundation();
</script>
<script>
      $(document).ready(function(){
        $(".apua").click(function(){
          $(".help").toggle(1000);
        });
      });
</script>
</div>
</div>
</div>
</body>
</html>


