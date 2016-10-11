<?php
session_start();
$upl = 0;
$upl = $_GET['upl'];

/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/

if($_SESSION['FBID'] || $_SESSION['login_user']){


?>
<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SoMETT</title>
  <?php include("styles.php");?>
</head>
<body>
  <?php include("nav.php");?>
  <!-- Jotain ylimääräistä paskaa, joka saa sivun näyttämään kivemmalta -->
  <section class="main lisays">
    <div class="wrap">
     
    <!-- Kuvan lähetys ja muuta mukavaa -->
      <div class="row uplform">
        <div class="small-9 small-centered medium-centered large-centered colums">
          <?if($upl==1){?>
          <h2>Kiitos kuvan lähettämisestä!</h2>
          <p>("Tähän saisi lisätä jonkinmoista mallitekstiä. Kiitos nam!")</p>
          <a href="http://cosmo.kpedu.fi/~tomijylha/SoMETT-1.0/SoMETT/kuvapankki.php">Siirry kuvagalleriaan!</a>
          <? } else { ?>      
          <h1>Lähetyspalvelu</h1>
          <p>Tämän kautta voit lähettä kuviasi yhteisön ja museoasiantuntioiden tutkittavaksi.
          Suosittelemme lämpimästi käytäjäehtoihin tutustumista ennen kuvien lähettämistä.
          Mikäli et tiedä kuinka lähetysboksia käytetään, löytyy aiheesta tietoa sivunalaosassa.</p>
          <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
            <fieldset>
              <h3 class="uplotsikko">Kuvan julkaisu</h3>
              <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="3000000"/>
              <div>
                <div id="messages" hidden></div>
                <div id="upl"><input type="file" id="fileselect" name="fileselect[]" multiple="multiple"/></div>
                <label>Otsikko</label>
                <input type="text" class="brd" name="title" required/>
                <label>Kuvaus</label>
                <input type="text" class="brd" name="description" required/>
                <label>Kategoria</label>
                <input type="checkbox" value="asusteet"/> Asusteet
                <input type="checkbox" value="paikat"/> Paikat
                <input type="checkbox" value="kuvat"/> Kuvat
              </div>
              <div id="submitbutton">
                <input type="submit">
              </div>
            </fieldset>
          </form>

        <?}?>
      </div>
    </div>
  </div>
</section>
  <!-- Apua uusavuttomille -->
<div class="secondary apupalkki">
  <div class="wrap">
    <button class="apua">Tarvitsetko apua?</button>
  </div>
</div>
<section hidden class="secondary help">
  <div class="wrap">
    <h2>Helppinurkka</h2>
    <hr>
    <p>SoMETTin lähetyspalveluboksi on "drag & drop -tekniikalla" toimiva lähetyslaatikko.
    Mikäli selaimesi tukee kyseistä tiedostojen lähetystapaa voi yksinkertaisesti "raahata ja
    tiputtaa" kuvan lähetysboksin ruutuun. Jos selain ei tue "drag & drop -tekniikkaa", voit 
    klikata ruudussa olevaa tekstiä, joka avaa perinteisen tiedoston valinta ikkunan.</p>
    <div class="wrap row">
      <div class="small-12 large-uncentered medium-uncentered medium-6 column">
        <h3>Selaintuki</h3>
        <ul>
          <li>Chrome 7+</li>
          <li>Firefox 4+</li>
          <li>IE 10+</li>
          <li>Opera 12+</li>
          <li>Safari 6+</li>
        </ul>
      </div>
      <div class="small–12 small-centered large-uncentered medium-uncentered medium-6 column">
        <h3>Tiedostomuodot</h3>
        <ul>
          <li>JPG</li>
          <li>PNG</li>
          <li>GIF</li>
          <li>JPEG</li>
        </ul>
      </div>
    </div>
  </div>
</section>
</div>
</div>
  <!-- Footer osio -->
<?php include("footer.php");?>
<?php include("script.php");?>

</body>
</html>
<?php 
  }
  else{
	 $muuttuja1 = 1;
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=kommentointi_login.php?ohjaus=' . $muuttuja1 . '">'; 
   //header('Location:upl_login.php');
   }
    ?>
  
