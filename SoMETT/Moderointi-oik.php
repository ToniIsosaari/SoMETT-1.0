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
          $result = $my->query("SELECT  * FROM 581D_Kayttaja WHERE UID = '$Userid' ");
          while($rows = $result->fetch_array(MYSQLI_ASSOC)){
          $nimi = $rows['Nimi'];
          $snimi = $rows['SNimi'];
          $sposti = $rows['Sposti'];
          $oikeudet = $rows['Status'];
          $UID = $rows['UID'];
          $Kommentti = $rows['Kommentti'];
          $report = $rows['Tila'];
        ?>
        <div class="table-scroll">          
        <table>
        <form method="POST">
        <thead>
          <tr>
            <th width="200">Nimi</th>
            <th width="200">sukunimi</th>
            <th width="200">email</th>
            <th width="200">Oikeudet <input type="submit" name="Muokkaa" value="Muokkaa"></th>
          </tr>
        </thead>
        </tbody>
          <tr>
            <td><?echo $nimi;?></td>
            <td><? echo $snimi;?></td>
            <td><?echo $sposti;?></td>
            <td><select name="Rights">
              <option value="1" 
              <? if($oikeudet == 1) echo "selected";?>>Peruskäyttäjä</option>
              <option value="2" 
              <? if($oikeudet == 2) echo "selected";?>>ETT-käyttäjä</option>
              <option value="3"
              <? if($oikeudet ==3) echo "selected";?>>PRO-käyttäjä</option>
            </td>
          </tr>
        </tbody>
        </form>
        </table>
        </div>
        <?
          }
          
          if(isset ($_POST['Muokkaa'])){
            $muokkaus = $_POST['Rights'];
            $query = "UPDATE 581D_Kayttaja SET Status = '$muokkaus' WHERE UID = '$Userid';";
            if($result = $my->query($query)){
            echo "<meta HTTP-EQUIV='REFRESH' content='0; url=Moderointi.php'>";
            }
            }
          
        ?>
      </div>
    </section>
    </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
      