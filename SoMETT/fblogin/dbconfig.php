<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'data15');    // DB username
define('DB_PASSWORD', 'aJrHfybLxsLU76rV');    // DB password
define('DB_DATABASE', 'data15');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>