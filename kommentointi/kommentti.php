<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>osifj</title>
  </head>
  <body>
    <table>
      <form method="POST">
  <tr>
    <td>KommenttiID</td>
    <td>Kommentti</td>
    <td>KäyttäjäID</td>
    <td>Oikeudet</td>
    <td><input type="submit" name="Muokkaa" value="Muokkaa"></td>
    <td><input type="submit" name="delete" value="delete"></td>
   
  </tr>
    <?
    
    
  $sql=mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
  if($sql->mysql_errno) {
    die("mysql, virhe yhteyden luonnissa:" . $sql->connect_error);
  }
  $sql->set_charset("utf8");
  $result = $sql->query('SELECT * FROM `581D_Kommentti`, `581D_Kayttaja` WHERE 581D_Kommentti.UID=581D_Kayttaja.UID ORDER BY 581D_Kayttaja.UID DESC;');
  while($i = $result->fetch_array(MYSQLI_ASSOC)) {
  ?>
 
      <tr>
        
        <td><? echo $i['KommenttiID']?></td>
        <td><? echo $i['Kommentti'];?></td>
        <td><? echo $i['UID'];?></td>
        <td><select name="Oikeudet">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
        <td><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?echo $i['KommenttiID'];?>"/></td>
      </tr>
      <?
      }
      
     # if(isset($_POST['Muokkaa']))
     # {
     # $Oikeudet = $_POST['Oikeudet'];
      
    #  for($b=0;$b<count($Oikeudet);$b++){
      
      #$muokkaus = $Oikeudet[$b];
      #$query3 =
      
      if(isset($_POST['delete']))
      {
      $checkbox = $_POST['checkbox'];

      for($a=0;$a<count($checkbox);$a++){

      $del_id = $checkbox[$a];
      $query2 = "DELETE FROM 581D_Kommentti WHERE KommenttiID ='$del_id'";
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
