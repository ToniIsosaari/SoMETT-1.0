<?php include('config.php');?>
<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SoMETT</title>
<?include('styles.php');?>
</head>
  <body>
<?include('nav.php');?>
<section class="secondary grey">
  <div class="wrap">
    <h2 class="text-center">Kommenttien moderointi</h2>
    <hr>
    <table class="table1">
      <form method="POST">
  <tr class="table1">
    <td>KäyttäjäID</td>
    <td>Nimi</td>
    <td>Kommentti</td>
    <td>Ilmoitukset</td>
    <td>Oikeudet<input type="submit" name="Muokkaa" value="ei toimi"></td>
    <td><input type="submit" name="delete" value="delete"></td>



  </tr>
    <?

  $result = $my->query('SELECT * FROM `581D_Kommentti`, `581D_Kayttaja` WHERE 581D_Kommentti.UID=581D_Kayttaja.UID');
  while($i = $result->fetch_array(MYSQLI_ASSOC)) {
   ?>

      <tr class="table1">
        <?$ID = $i['UID'];?>
        <td><? echo $ID?></td>
        <td><? echo $i['Nimi']?></td>
        <td><? echo $i['Kommentti'];?></td>
        <td><? echo $i['Tila'];?></td>
        <td><select name="Rights[]">
              <option value="<?echo $ID?>,0" <? if($i['Status'] == 0){
              echo "selected";
              }else{
              echo "";
              }?>>0</option>
              <option value="<?echo $ID?>,1" <? if($i['Status'] == 1){
              echo "selected";
              }else{
              echo "";
              }?>>1</option>
              <option value="<?echo $ID?>,2" <? if($i['Status'] == 2){
              echo "selected";
              }else{
              echo "";
              }?>>2</option>
              <option value="<?echo $ID?>,3" <? if($i['Status'] == 3){
              echo "selected";
              }else{
              echo "";
              }?>>3</option>
            </select></td>
           <td class="table1"><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?echo $i['KommenttiID'];?>"/></td>
      </tr>




<?



}
      if(isset($_POST['Muokkaa']))
      {
      $oikeudet = $_POST['Rights'];
      for($q=0;$q<count($oikeudet);$q++){
      list($UID,$turha,$muokkaus) = $oikeudet[$q];


      $oik_id = $muokkaus;
      $user_id = $UID;
      $query3 = "UPDATE 581D_Kayttaja SET Status = '$oik_id' WHERE UID = '$user_id';";
      if($result3 = $my->query($query3)){
      echo "<meta HTTP-EQUIV='REFRESH' content='0; url=Moderointi.php'>";

      }
      }
      }
    if(isset($_POST['delete']))
      {
      $checkbox = $_POST['checkbox'];
      for($a=0;$a<count($checkbox);$a++){
      $del_id = $checkbox[$a];
      $query2 = "DELETE FROM 581D_Kommentti WHERE KommenttiID ='$del_id';";
      if($result = $my->query($query2)){
     echo "<meta HTTP-EQUIV='REFRESH' content='0; url=Moderointi.php'>";
      }
      }
      }
      $my->close();
    ?>
      </form>
    </table>
    </div>
    </section>
    </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>







