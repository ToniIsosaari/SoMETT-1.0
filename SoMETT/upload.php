
<?php
/*
$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
if($my->mysql_errno){
	die("MySQL, virhe (#".$my->mysql_errno.") yhteyden luonnissa:".$my->connect_erroe);
}
$my->set_charset("utf8");
if($result = $my->query("SELECT * FROM 581D_Kuva ")){
	while($d = $result->fetch_object()){
		$KID = $d->KuvaID;
	}
} else {
	echo "Virhe SQL-kyselyssä!";
}
$my->close();
*/
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
echo $fn;
$title = $_POST["title"];
$description = $_POST["description"];
$UID = $_POST["UID"];
$UID = '12'; #tähän pitää getata se käyttäjäid

    if ($fn) {
	
	    // AJAX call
	    file_put_contents('uploads/' . $fn,file_get_contents('php://input'));
	    echo "$fn uploaded";
	    exit();
    }
    else {


        // form submit
        $files = $_FILES['fileselect'];
        foreach ($files['error'] as $id => $err) {
            if ($err == UPLOAD_ERR_OK) {
                $fn = $files['name'][$id];
                $directory = "http://cosmo.kpedu.fi/~tomijylha/test/SoMETT-1.0/SoMETT/uploads/";
                $newfilename = round(microtime(true));
                move_uploaded_file(
                $files['tmp_name'][$id],
                'uploads/' . $newfilename
                ); 
                
            
                            
                // this is the one that fails /\                                       
                echo "<p>File $name uploaded.</p>";
                $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");	
    			if($my->mysql_errno){
    				die("MySQL, virhe (#".$my->mysql_errno.") yhteyden luonnissa:".$my->connect_error);	
    			}
    			$my->set_charset("utf8");
                $filu = $directory.$newfilename;
	    		$sql = 'INSERT INTO 581D_Kuva(KuvaID,URL,UID,Title,Description,PublishDate)VALUES(" ","'.$filu.'","'.$UID.'","'.$title.'","'.$description.'"," ")';
    			if($tulos=$my->query($sql)){
    				echo '<p>Nimi tallennettu!</p>';
    			}	
	    		else {
    				echo "Virhe SQL-kyselyssä!";
    			}
    			$my->close();
    			header('Location:lahetyspalvelu.php?upl=1"'.$fn.'""'.$newfilename.'""'.$temp.'"');
    		}

    	}

    }
