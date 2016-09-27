<?php
$upl = 0;
$upl = $_GET['upl'];
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
    <h1>Lähetyspalvelu</h1>
    <p>Tämän kautta voit lähettä kuviasi yhteisön ja museoasiantuntioiden tutkittavaksi.
    Suosittelemme lämpimästi käytäjäehtoihin tutustumista ennen kuvien lähettämistä.
    Mikäli et tiedä kuinka lähetysboksia käytetään, löytyy aiheesta tietoa sivunalaosassa.</p>
  </div>
    <!-- Kuvan lähetys ja muuta mukavaa -->
    <div class="row uplform">
      <div class="small-9 small-centered colums">
      <?if($upl==1){
          echo "Upload succesfull!";
        }
        else 
        {
      ?>      
      <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <h3 class="uplotsikko">Kuvan julkaisu</h3>
          <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="3000000" />
          <div>
            <input type="file" id="fileselect" name="fileselect[]" multiple="multiple"/>
            <div id="filedrag" name="filedrag[]">or drop files here</div>
            <label>Otsikko</label>
            <input type="text" name="title" required></input>
            <label>Kuvaus</label>
            <input type="text" name="description" required></input>
          </div>
          <div id="submitbutton">
            <input type="submit">Upload Files</input>
          </div>
        </fieldset>
      </form>
      
      <div id="progress"></div>
      <div id="messages">
        <p>Status Messages</p>
      </div>
      <!--
      <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>HTML File Upload</legend>
          <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
          <div>
            <label for="fileselect">Files to upload:</label>
            <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
            <div id="filedrag">or drop files here</div>
          </div>
          <div id="submitbutton">
            <button type="submit">Upload Files</button>
          </div>
        </fieldset>
      </form>
      <div id="progress"></div>
      <div id="messages">
        <p>Status Messages</p>
      </div>
      -->
     <?}?>
    </div>
  </	div>
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
</div>
</div>
</div>
</body>
</html>
