<script src="holder.js"></script>
<link href="cssfix.css" rel="stylesheet" type="text/css">
<!-- Main osio (lisää sivulle olennainen sisältö tänne) -->
<section class="main etusivu" data-interchange="[http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/Somett_otsikkokuvat/Mini.jpg, small],[http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/Somett_otsikkokuvat/Medium.jpg, medium], [http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/Somett_otsikkokuvat/Large.jpg, large]">
  <div class="wrap">
      <p>"Vähän niin kuin Musketti, mutta vain sata kertaa parempi"</p>
      <h1>SoMETT</h1>
  </div>
</section>
  <!-- Secondary osio (lisää eri niin tärkeä sisältö tänne) -->
<section class="secondary">
  <div class="wrap">
      <h3>Uusimmat</h3>
      <hr>

				<ul id="carousel1" class="elastislide-list">
                    

 <?php
$nico = "kommentointi.php";
                    $sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
                    #tarkistetaan yhteyden tila
                    if($sql->connect_errno) {
                    echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
                    }
                    $sql->set_charset("utf8");
                    $result = $sql->query("SELECT * FROM 581D_Kuva ORDER BY KuvaID DESC");
                    while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
                    
            echo "<li data-preview='".$rivi['URL']."'>"."<a href=".$nico."?KID=".$rivi['KuvaID']."><object class='object' data='".$rivi['URL']."'>"."<img data-src='holder.js/160x160?text=Kuvaa ei ole.' alt='".$rivi['Title']."'></object></a> </li>";                    
                    $_SESSION['kuvaid']=$rivi['KuvaID'];
                    $_SESSION['kuva']=$rivi['URL'];
                    	
                    	
                    }
echo "</ul>";
  $sql->close; 
?>
  </div>
</section>


<section class="secondary grey">
  <div class="wrap">
      <h3>Suosituimmat</h3>
      <hr>
<ul  id="carousel" class="elastislide-list">


<?		
 
                    $sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
                    #tarkistetaan yhteyden tila
                    if($sql->connect_errno) {
                    echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
                    }
                    $sql->set_charset("utf8");
                    $result = $sql->query("SELECT * FROM 581D_Kuva ORDER BY Suosituin DESC");
                    while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
                    echo "<li data-preview='".$rivi['URL']."'>"."<a href=".$nico."?KID=".$rivi['KuvaID']."><object class='object' data='".$rivi['URL']."'>"."<img data-src='holder.js/160x160?text=Kuvaa ei ole.' alt='".$rivi['Title']."'></object></a> </li>";
                    $_SESSION['kuvaid']=$rivi['KuvaID'];
                    $_SESSION['kuva']=$rivi['URL'];
 }
echo "</ul>";
$sql->close;             
?>
  </div>
</section>
</div>
</div>

