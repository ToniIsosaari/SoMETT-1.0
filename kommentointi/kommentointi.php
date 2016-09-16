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
    <title>Kommentointi</title>
    <link rel="stylesheet" href="css/foundation.min.css" />
    <link rel="stylesheet" href="css/foundation-icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
  </head>
  <body>
  <script>
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {

      testAPI();
    } else if (response.status === 'not_authorized') {

      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '240132786384563',
    cookie     : true,

    xfbml      : true,
    version    : 'v2.5'
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
        alert ("Welcome " + response.name + ": Your UID is " + response.id);
    });
  }
</script>

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
    <div class="row">
      <div class="panel">
<?php

$comment = $_POST['comment'];
$submit = $_POST['submit'];
if (isset($_POST['submit'])) {
  $result = $my->query("INSERT INTO 581D_Kommentti (Kommentti) VALUES ('$comment') ");
  echo "<meta HTTP-EQUIV='REFRESH' content='0; url=kommentointi.php'>";
}
?>
        <div>
          <form action="kommentointi.php" method="POST">
            <div>
              <h5 class="float-left">Kommentteja</h5>
<?php
$result1 = $my->query("SELECT * FROM 581D_Kommentti");
$numrows = $result1->num_rows;
echo '<h5 class="float-left">&nbsp•&nbsp' . $numrows . '</h5>';
?>
              <textarea name="comment" maxlength="140" rows="2" required></textarea>
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
  $kid = $rows['KommenttiID'];
  $comment = $rows['Kommentti'];
  echo nl2br (
       '<div>' .
         '<table>' .
           '<tbody>' .
             '<tr>' .
               '<th class="float-left">' .
                 '<a class="float-left" href="profiili.php?id=' . $id . '">' . $uid . '</a>' .
                 '<p class="float-left">&nbsp</p>' .
                 '<p class="float-left date">' . $time . '</p>' .
               '</th>' .
               '<th>' .
                 '<a href=raportoi.php?id=' . $kid . ' title="Ilmoita asiattomasta kommentista" class="float-right">' .
                   '<i class="fi-megaphone"></i>' .
                 '</a>' .
               '</th>' .
             '</tr>' .
             '<tr>' .
               '<td>' .
                 '<p id="kommentti">' . $comment . '</p>' .
               '</td>' .
               '<th>' .
               '</th>' .
             '</tr>' .
           '</tbody>' .
         '</table>' .
       '</div>'
);
}
$my->close();
?>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/readmore.js"></script>
        <script>
$(document).foundation();
        </script>
        <script>
$('p#kommentti').readmore({
  moreLink: '<a href="#" class="more">Näytä enemmän <i class="fi-arrow-down"></i></a>',
  lessLink: '<a href="#" class="less">Näytä vähemmän <i class="fi-arrow-up"></i></a>',
});
        </script>
      </div>
    </div>
  </body>
</html>
