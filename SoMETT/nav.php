
<div class="off-canvas-wrapper">
  <!-- <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper> -->
 	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
 	  <!-- Mobiili Navipalkki (ÄLÄ KOSKE!) -->
      <ul class="vertical menu mobile-menu">
        <li><a href="index.php">Etusivu</a></li>
        <li><a href="kuvapankki.php">Kuvapankki</a></li>
        <li><a href="lahetyspalvelu.php">Lähetyspalvelu</a></li>
        <li><a href="info.php"><i class="fi-info"></i> info</a></li>
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
              <li><a href="index.php">Etusivu</a></li>
              <li><a href="kuvapankki.php">Kuvapankki</a></li>
              <li><a href="lahetyspalvelu.php">Lähetyspalvelu</a></li>
            </ul>
          </div>
          <div class="top-bar-right">
            <ul class="menu">
            <li><a href="info.php"><i class="fi-info"></i> info</a></li>
            <?php if($_SESSION['FBID'] || $_SESSION['login_user']) {?>
            
            <li><a class="secondary small button" href="<?php echo 'fblogin/logout.php';?>">Kirjaudu Ulos</a></li>
            <?php }
            else {?>
            <li><a class="secondary small button" href="kommentointi_login.php">Kirjaudu Sisään</a></li>            
            <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
  <div class="off-canvas position-left" id="offCanvas1" data-off-canvas>
  <!-- Mobiili Navipalkki (ÄLÄ KOSKE!) -->
    <ul class="vertical menu mobile-menu">
      <li><a href="index.php">Etusivu</a></li>
      <li><a href="kuvapankki.php">Kuvapankki</a></li>
      <li><a href="lahetyspalvelu.php">Lähetyspalvelu</a></li>
    </ul>
    <hr>
    <ul class="vertical menu mobile-menu">
      <li><a href="info.php"><i class="fi-info"></i> info</a></li>
      <li><a class="secondary button" href="kommentointi_login.php">Kirjaudu Sisään</a></li>
    </ul>
  </div>
                                                
