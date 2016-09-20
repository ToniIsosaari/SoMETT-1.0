<?php
session_start();
$my = mysqli_connect("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
if ($my->mysqli_errno) {
  die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
}
$my->set_charset("utf8");
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kirjaudu</title>
  </head>
        <body>
  <script>
  function openWin() {
    window.location.href = "kommentointi_login.php";
  }
  </script>
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

<div id="status">
</div>

            <form id="login" method="POST">
                <h1>Kirjaudu sisÃ¤Ã¤n</h1>
                    <fieldset id="inputs">
                        <input name="KEmail" type="text" placeholder="Email" autofocus required>
                        <input name="KSSana" type="password" placeholder="Salasana" required>
                    </fieldset>

                    <fieldset id="actions">
                        <input type="submit" name="submit" value="Kirjaudu">
                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                        </fb:login-button>
                    <a href="">RekisterÃ¶idy</a>
                    </fieldset>
            </form>
            <?
            if (isset ($_POST['submit']))
{

            $KEmail = $_POST['KEmail'];
            $KSSana = $_POST['KSSana'];

            $sql ="SELECT * FROM 581D_Kayttaja WHERE Sposti='$KEmail' AND SSana='$KSSana'";

            $query = mysqli_query($my,$sql);

            $test = mysqli_num_rows($query);

            if($test == 1){
            echo "Kirjaudu";
            $_SESSION['login_user']=$KEmail;
            header("Location: kommentointi.php");

            }
            else
            {
            }
            }
            $my->close();
            ?>

        </body>
</html>


