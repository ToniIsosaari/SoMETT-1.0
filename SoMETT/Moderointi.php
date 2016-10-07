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
  <div class="table-scroll">
    <table role="grid">
      <form method="POST">
  <thead>
  <tr class="table1">
    <th>KäyttäjäID</th>
    <th>Nimi</th>
    <th width="150">Kommentti</th>
    <th>Ilmoitukset</th>
    <th>Oikeudet</th>
    <th><input type="submit" name="delete" value="delete"></th>
  </tr>
  </thead>
  <tbody>
    <?

  $result = $my->query('SELECT * FROM `581D_Kommentti`, `581D_Kayttaja` WHERE 581D_Kommentti.UID=581D_Kayttaja.UID');
  while($i = $result->fetch_array(MYSQLI_ASSOC)) {
   ?>

      <tr class="table1">
        <?$ID = $i['UID'];?>
        <td><? echo $ID;?></td>
        <td><a href="Moderointi-oik.php?Oikeudet=<?echo $ID;?>"><?echo $i['Nimi'];?></a>
        <td><? echo $i['Kommentti'];?></td>
        <td><? echo $i['Tila'];?></td>
        <td><? echo $i['Status']?></td>
           <td class="table1"><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?echo $i['KommenttiID'];?>"/></td>
      </tr>




<?


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
      }
      $my->close();
    ?>
    </tbody>
      </form>
    </table>
    </div>
    </div>
    </section>
    </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>