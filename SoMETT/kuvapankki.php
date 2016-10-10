<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SoMETT</title>
<link href="Galleroni.css" rel="stylesheet" type="text/css">
    <script src="holder.js"></script>
<?php include("styles.php"); ?>
</head>
<body>
<?php include("nav.php");?>
  <!-- Main osio (lisää sivulle olennainen sisältö tänne) -->
<section class="main">
  <div class="wrap">
    <h1>Kuvagalleria</h1>
    <p style="font-size: 30px;"></p>
    <p>
    
    <p>Tervetuloa kuvagalleriaan. Täältä löydät kaikki kuvat joita palveluumme on ladattu</p>

<form name="form" action="kuvapankki.php" method="post">
  <select name="jarjestys" onchange="this.form.submit()">
  <option value="#">Valitse kategoria</option>
  <option value="Suosituin">Suosituimmat</option>
  <option value="Tykkaus">Tykätyimmät</option>
  <option value="Uusimmat">Uusimmat</option>
  </select>
</form>
<?php
  $DK = $_POST['jarjestys'];
?>


    <div class="Galleria-div">
    <?php
      $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15" );

      if($my->mysql_errno){
        die("Virhe yhteyden luonnissa". $my->connect_error);
      }
      $my->set_charset('utf8');

      if($DK == "Suosituin"){

        $sql = "SELECT * FROM 581D_Kuva ORDER BY Suosituin DESC;";
        $DK = "Suosituimmat";
      }elseif($DK == "Tykkaus"){

        $sql = "SELECT * FROM 581D_Kuva ORDER BY Tykkaus DESC;";
        $DK = "Tykätyimmät";
      }elseif($DK == "Uusimmat"){

        $sql = "SELECT * FROM 581D_Kuva ORDER BY KuvaID DESC;";
        $DK = "Uusimmat";
      }else{

        $sql = "SELECT * FROM 581D_Kuva;";
        $DK = "";
      }
      if($DK){
        echo "<h4>$DK</h4>";
      }else{}
      
      if($result = $my->query($sql)){
        while($d = $result->fetch_object()){
          echo "<a class='kuvalinkki' href='kommentointi.php?KID=".$d->KuvaID."'>
          <object class='img-galleria' data='$d->URL'>
            <img data-src='holder.js/160x160?text=Kuvaa ei ole olemassa'>
          </object>
          <p class='Galleria-otsikko'>$d->Title</p>
          </a>";
        }
      }
      $my->close();

    ?>
    </p>
  </div>
</section>
  <!-- Secondary osio (lisää eri niin tärkeä sisältö tänne) -->
</div>
</div>
<?php include("footer.php");?>
<?php include("script.php");?>
</div>
</div>
</div>
</body>
</html>

