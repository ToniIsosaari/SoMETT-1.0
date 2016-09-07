<?php
$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
}
$my->set_charset("utf8");
?>
<!DOCTYPE HTML>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kommentoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.css" />
    <link rel="stylesheet" href="seeassas.css" />
  </head>
  <body>
    <div class="panel">
<?php
$comment = $_POST['comment'];
$submit = $_POST['submit'];
// if($comment != "")
if (isset($_POST['submit'])) {
  $result = $my->query("INSERT INTO 581D_Kommentti (Kommentti) VALUES ('$comment') ");
  echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentoi.php'>";
}
?>
      <div>
        <form action="kommentoi.php" method="POST">
          <div>
            <h5 class="float-left">Kommentteja</h5>
<?php
$result1 = $my->query("SELECT * FROM 581D_Kommentti");

$numrows = $result1->num_rows;

echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
            <textarea name="comment" maxlength="140"></textarea>
            <input class="button float-right" type="submit" name="submit" value="Kommentoi">
            <hr>
          </div>
        </form>
      </div>
      <div>
<?php
$result = $my->query("SELECT * FROM 581D_Kommentti, 581D_Kayttaja WHERE 581D_Kommentti.UID = 581D_Kayttaja.UID ORDER BY KTime DESC");
while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
  $id = $rows['UID'];
  $uid = $rows['Nimi'];
  $time = $rows['KTime'];
  $comment = $rows['Kommentti'];
  echo '<div>' . '<table>' . '<tbody>' . '<tr>' . '<th class="float-left">' . '<a class="float-left" href="http://cosmo.kpedu.fi/~etunimisukunimi/profiili.php?id=' . $id . '">' . $uid . '</a>' . '<p class="float-left">&nbsp</p>' . '<p class="float-left date">' . $time . '</p>' . '</th>' . '</tr>' . '<tr>' . '<td>' . '<p class="more">' . $comment . '</p>' . '</td>' . '</tr>' . '</tbody>' . '</table>' . '</div>';
}
$my->close();
?>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="js/vendor/what-input.min.js"></script>
      <script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script>
      <script>
        $(document).foundation();
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          var maxLength = 140;
          $(".show-read-more").each(function() {
            var myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
              var newStr = myStr.substring(0, maxLength);
              var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
              $(this).empty().html(newStr);
              $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
              $(this).append('<span class="more-text">' + removedStr + '</span>');
            }
          });
          $(".read-more").click(function() {
            $(this).siblings(".more-text").contents().unwrap();
            $(this).remove();
          });
        });
      </script>
    </div>
  </body>
</html>
