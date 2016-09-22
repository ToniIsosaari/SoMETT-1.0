?php include('config.php');?>
<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SoMETT</title>
<?php include('styles.php');?>
</head>
    <link rel="stylesheet" type="text/css" href="kommentti.css">
  <body>
 <?php include('nav.php');?>
 <?php include('main.php');?>
 <?php include('footer.php');?>
 <?php include('script.php');?>

    <table class="table1">
      <form method="POST">
  <tr class="table1">
    <td>KommenttiID</td>
    <td>Kommentti</td>
    <td>KäyttäjäID</td>
    <td>Oikeudet</td>
    <td><input type="submit" name="Muokkaa" value="ei toimi"></td>
    <td><input type="submit" name="delete" value="delete"></td>



  </tr>
    <?
  #$sql=mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
  #if($sql->mysql_errno) {
   # die("mysql, virhe yhteyden luonnissa:" . $sql->connect_error);
  #}
  #$sql->set_charset("utf8");
  $result = $my->query('SELECT * FROM `581D_Kommentti`, `581D_Kayttaja` WHERE 581D_Kommentti.UID=581D_Kayttaja.UID');
  while($i = $result->fetch_array(MYSQLI_ASSOC)) {
  ?>

      <tr class="table1">

       <?# <td><? echo $i['UID']?></td> 
        #<?
       # $asd = $i['UID'];
        #$result5 = $sql->query("SELECT * FROM 581D_Kommentti WHERE 581D_Kommentti.UID=581D_Kayttaja.UID AND UID = '$asd';");       
        #while($w = $result4->fetch_array(MYSQLI_ASSOC)){
        ?>
        <td><? echo $i['KommenttiID'];?></td>
        <td><? echo $i['Kommentti'];?></td>
        <td><? echo $i['UID']?></td>
        <td><select name="Rights[]">
              <option value="<?echo $i['UID']?>,0" <? if($i['Status'] == 0){
              echo "selected";
              }else{
              echo "";
              }?>>0</option>
              <option value="<?echo $i['UID']?>,1" <? if($i['Status'] == 1){
              echo "selected";
              }else{
              echo "";
              }?>>1</option>
              <option value="<?echo $i['UID']?>,2" <? if($i['Status'] == 2){
              echo "selected";
              }else{
              echo "";
              }?>>2</option>
              <option value="<?echo $i['UID']?>,3" <? if($i['Status'] == 3){
              echo "selected";
              }else{
              echo "";
              }?>>3</option>
            </select>
        <td class="table1"><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?echo $i['KommenttiID'];?>"/></td>
      </tr>




<?
#}
}
      if(isset($_POST['Muokkaa']))
      {
      $oikeudet = $_POST['Rights'];
      for($q=0;$q<count($oikeudet);$q++){
      list($UID,$turha,$muokkaus) = $oikeudet[$q];#[$q]; #explode("x",implode($_POST['Rights']));
     # $q++;
      #for($b=0;$b<count($muokkaus);$b++){
      #for($c=0;$c<count($UID);$c++){
      $oik_id = $muokkaus;#[$b];
      $user_id = $UID;#[$c];
      $query3 = "UPDATE 581D_Kayttaja SET Status = '$oik_id' WHERE UID = '$user_id';";
      if($result3 = $my->query($query3)){
      #echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentti.php'>";
#echo "<pre>";
 #      var_dump($muokkaus);
  #               echo"</pre>";
      #}
      #}
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
      header("Refresh:0");
      }
      }
      }
 #     echo "<pre>";
  #      var_dump($_POST['Rights']);
   #        echo"</pre>";
      $my->close();
    ?>
      </form>
    </table>
  </body>
</html>
