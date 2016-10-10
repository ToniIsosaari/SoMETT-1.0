<?php
session_start();
$kuvaid    = $_GET['KID'];
$hakemisto = $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
// added in v4.0.0
require_once 'autoload.php';
require 'functions.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication('1216316551765571', '80b03311c222c56dc432584c448890ec');
// login helper with redirect_uri

if (isset($_GET['KID'])) {
    $helper = new FacebookRedirectLoginHelper('http://' . $hakemisto . '/fbconfig.php?KID=' . $kuvaid . '');
} else {
    $helper = new FacebookRedirectLoginHelper('http://' . $hakemisto . '/fbconfig.php');
}
try {
    $session = $helper->getSessionFromRedirect();
}
catch (FacebookRequestException $ex) {
    // When Facebook returns an error
}
catch (Exception $ex) {
// When validation fails or other local issues
}
// see if we have a session
if (isset($session)) {
    // graph api request for user data
    $request              = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=id,name,email');
    $response             = $request->execute();
    // get response
    $graphObject          = $response->getGraphObject();
    $fbid                 = $graphObject->getProperty('id'); // To Get Facebook ID
    $fbfullname           = $graphObject->getProperty('name'); // To Get Facebook full name
    $femail               = $graphObject->getProperty('email'); // To Get Facebook email ID
    /* ---- Session Variables -----*/
    $_SESSION['FBID']     = $fbid;
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL']    = $femail;
    /* ---- header location after session ----*/
    //  checkuser($fuid,$ffname,$femail);
    checkuser($fbid, $fbfullname, $femail);
    
    if (isset($_GET['KID'])) {
        header("Location: ../../SoMETT/kommentointi.php?KID=" . $kuvaid);
    } else {
        header("Location: ../../SoMETT/index.php");
    }
} else {
    $loginUrl = $helper->getLoginUrl(array(
        'scope' => 'email'
    ));
    header("Location: " . $loginUrl);
}
?>
