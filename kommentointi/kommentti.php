<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="kommentti.css">
    <meta charset="utf-8">
    <title>osifj</title>
  </head>
  <body>
    <table class="table1">
      <form method="POST">
  <tr class="table1">
    <td>KommenttiID</td>
    <td>Kommentti</td>
    <td>KäyttäjäID</td>
    <td>Oikeudet</td>
    <td><input type="submit" name="Muokkaa" value="Muokkaa"></td>
    <td><input type="submit" name="delete" value="delete"></td>
   
  </tr>
    <?
  $d=0;  

  $sql=mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
  if($sql->mysql_errno) {
    die("mysql, virhe yhteyden luonnissa:" . $sql->connect_error);
  }
  $sql->set_charset("utf8");
  $result = $sql->query('SELECT * FROM `581D_Kommentti`, `581D_Kayttaja` WHERE 581D_Kommentti.UID=581D_Kayttaja.UID');
  while($i = $result->fetch_array(MYSQLI_ASSOC)) {
  ?>
 
      <tr class="table1">
        
        <td><? echo $i['KommenttiID']?></td>
        <td><? echo $i['Kommentti'];?></td>
        <td><? echo $i['UID'];?></td>
        <td><select name="Rights[]">
              <option value="0" <? if($i['Status'] == 0){
              echo "selected";
              }else{
              echo "";
              }
              ?>>0</option>
              <option value="1" <? if($i['Status'] == 1){
              echo "selected";
              }else{     
              echo "";
              }?>>1</option>
              <option value="2" <? if($i['Status'] == 2){
              echo "selected";
              }else{     
              echo "";
              }?>>2</option>
              <option value="3" <? if($i['Status'] == 3){
              echo "selected";
              }else{     
              echo "";
              }?>>3</option>
            </select>
        <td class="table1"><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?echo $i['KommenttiID'];?>"/></td>
      </tr>
      <?}
          $Rights = $_POST['Rights'];
          var_dump($Rights);
     	 
    
      if(isset($_POST['Muokkaa']))
      {

      for($e=0;$e<count($Rights);$e++){

      $upd_id = $Rights[$e];
      $query3 = "UPDATE 581D_Kayttaja SET Status ='$upd_id';";
      if($result = $sql->query($query3)){
 
      }
      }
      }

      ?>
     <? 
      if(isset($_POST['delete']))
      {
      $checkbox = $_POST['checkbox'];

      for($a=0;$a<count($checkbox);$a++){

      $del_id = $checkbox[$a];
      $query2 = "DELETE FROM 581D_Kommentti WHERE KommenttiID ='$del_id';";
      if($result = $sql->query($query2)){
      header("Refresh:0");
      }
      }
      }
   
      $sql->close();
     
         
    ?>
      </form>
    </table>
  </body>
</html>
