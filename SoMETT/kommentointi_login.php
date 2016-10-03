<?php
session_start();
$kuvaid = $_GET['KID'];
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
    window.location.href = "kommentointi_login.php?KID =' . $kuvaid . '";
  }
  </script>

            <form id="login" method="POST">
                <h1>Kirjaudu sisään</h1>
                    <fieldset id="inputs">
                        <input name="KEmail" type="text" placeholder="Email" autofocus required>
                        <input name="KSSana" type="password" placeholder="Salasana" required>
                    </fieldset>

                    <fieldset id="actions">
                        <input type="submit" name="submit" value="Kirjaudu">
                        <a href="<?php echo 'fblogin/fbconfig.php?KID='.$kuvaid.'';?>">Login with Facebook</a></div>
                    <a href="">Rekisteröidy</a>
                    </fieldset>
            </form>
            <?
            if (isset ($_POST['submit']))
{
            $login = "1";

            $KEmail = $_POST['KEmail'];
            $KSSana = $_POST['KSSana'];

            $sql ="SELECT * FROM 581D_Kayttaja WHERE Sposti='$KEmail' AND SSana='$KSSana'";

            $query = mysqli_query($my,$sql);
            $test = mysqli_num_rows($query);
            if($test == 1){
            echo "Kirjaudu";
            $_SESSION['login_user']=$KEmail;
            $login = $_GET['login'];

            header("Location: kommentointi.php?KID=".$kuvaid);

            }
            else
            {
            }
            }
            $my->close();
            ?>

        </body>
</html>
