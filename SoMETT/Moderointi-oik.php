<?php include('config.php');?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SoMETT</title>
    <?php include('styles.php');?>
  </head>
  <body>
    <?php include('nav.php');?>
    <section class="secondary grey">
      <div class="wrap">
        <?php
          $Userid = $_GET['Oikeudet'];
          $result = $my->query("SELECT * FROM 581D_Kayttaja , 581D_Kommentti WHERE 581D_Kayttaja.UID = 581D_Kommentti.UID AND 581D_Kayttaja.UID = '$Userid' ");
          while($rows = $result->fetch_array(MYSQLI_ASSOC)){
          $nimi = $rows['Nimi'];
          $snimi = $rows['SNimi'];
          $sposti = $rows['Sposti'];
          $oikeudet = $rows['Status'];
          $UID = $rows['UID'];
          $Kommentti = $rows['Kommentti'];
          $report = $rows['Tila'];
        ?>
                  
        <table>
          <td><?echo $nimi;?></td><td><? echo $snimi;?></td><td><?echo $sposti;?></td>
        </table>
        
        <?
          }
        ?>
      </div>
    </section>
    </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
      