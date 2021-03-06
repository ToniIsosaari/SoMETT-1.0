<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SoMETT</title>
<link rel="stylesheet" href="http://cosmo.kpedu.fi/~tomijylha/SoMETT-1.0/dad/dropzone-4.3.0/dist/dropzone.css">
<link rel="stylesheet" href="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/dad/node_modules/foundation-sites/dist/foundation.min.css">
<link rel="stylesheet" href="foundation-icons/foundation-icons.css">
<link rel="stylesheet" href="tyylit-miia.css">
</head>
<body>
<div class="off-canvas-wrapper">
 <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
 	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
  <!-- Mobiili Navipalkki -->
<ul class="vertical menu mobile-menu">
 <li><a href="#">Etusivu</a></li>
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
  <!-- Poytakone Navipalkki -->
<div class="top-bar nav-desktop">
<div class="wrap">
  <div class="top-bar-left">
    <ul class="dropdown menu dropdown-desktop" data-dropdown-menu>
      <li class="menu-text">SoMETT</li>
      <li><a href="#">Etusivu</a></li>
      <li><a href="#">Kuvapankki</a></li>
      <li><a href="#">Lähetyspalvelu</a></li>
    </ul>
  </div>
</div>
</div>
  <!-- Jotain ylimääräistä paskaa, joka saa sivun näyttämään kivemmalta -->
<section class="main">
  <div class="wrap">
    <h1>Lähetyspalvelu</h1>
    <p>Tämän kautta voit lähettä kuviasi yhteisön ja museoasiantuntioiden tutkittavaksi.
    Suosittelemme lämpimästi käytäjäehtoihin tutustumista ennen kuvien lähettämistä.
    Mikäli et tiedä kuinka lähetysboksia käytetään, löytyy aiheesta tietoa sivunalaosassa.</p>
  </div>
    <!-- Kuvan lähetys ja muuta mukavaa -->
    <div class="row">
    <div class="small-9 small-centered colums">
      <form method="GET" action="upload.php" class="dropzone">
        <label class="laapeli-b">Otsikko:</label>
          <input class="input-field-b" type="text" name="otsikko" placeholder="Käytäthän mahdollisimman kuvailevaa otsikkoa">
        <label class="laapeli-a">Kuvailu:</label>
          <textarea class="input-field-a" name="kuvailu" placeholder="Kirjoita kaikki mitä tiedät kyseisestä objektista"></textarea>
        <button class="hollow button"><i class="fi-upload"></i> Lähetä</button>
      </form>
    </div>
  </div>
</section>
  <!-- Apua uusavuttomille -->
<div class="apupalkki">
  <div class="wrap">
    <button class="apua">Tarvitsetko apua?</button>
  </div>
</div>
<section hidden class="help">
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
  <!-- Footer osio -->
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

