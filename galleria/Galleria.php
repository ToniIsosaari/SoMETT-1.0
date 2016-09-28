
<!DOCTYPE html>
	<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
	<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
	<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
	<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <title>Paska galleria </title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width,
		initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="keywords" content="carousel, jquery, responsive, fluid,
		elastic, resize, thumbnail, slider" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
    </head>
    <body>
		<div class="container demo-1">

            <div class="main">
				<header class="clearfix">	
					</nav>
				</header>
<h2 align="center"> Uusimmat kuvat </h2> 

				<ul id="carousel" class="elastislide-list">
                     




 <?
session_start();
$nico = "http://cosmo.kpedu.fi/~nikolipponen/SoMETT-1.0/kommentointi/kommentointi.php";
                    $sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
                    #tarkistetaan yhteyden tila
                    if($sql->connect_errno) {
                    echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
                    }

                    $sql->set_charset("utf8");
                    $result = $sql->query("SELECT * FROM 581D_Kuva ORDER BY KuvaID DESC");

                    while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
echo "<li data-preview='".$rivi['URL']."'>"."<a href="."#"."><img src=".$rivi['URL']."></a> </li>";

                    $_SESSION['kuvaid']=$rivi['KuvaID'];
                    $_SESSION['kuva']=$rivi['URL'];
                    


$d = $rivi['URL'];
}
echo "</ul>";

 echo         "<a href=".$nico."?KID=".$rivi['KuvaID']."> <img  id="."preview"." src=".$rivi['URL']."> </a>  </li>";

  $sql->close; 
?>
 </div> 
<div style="margin-top:3em;">


<h2 align="center"> Suosituimmat kuvat </h2> 


       <ul  id="carousel1" class="elastislide-list">


<?		
 
                    $sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
                    #tarkistetaan yhteyden tila
                    if($sql->connect_errno) {
                    echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
                    }

                    $sql->set_charset("utf8");
                    $result = $sql->query("SELECT * FROM 581D_Kuva ORDER BY Suosituin DESC");
      while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
   echo "<li data-preview='".$rivi['URL']."'>"."<a href="."#"."><img src=".$rivi['URL']."></a> </li>";
                    $_SESSION['kuvaid']=$rivi['KuvaID'];
                    $_SESSION['kuva']=$rivi['URL'];





                                }

echo "</ul>";



$sql->close;             
?>
</div>



</li> 

<div style="margin-top:3em;">

<h2 align="center"> Tykätyimmät kuvat </h2>


   <ul  id="carousel2" class="elastislide-list">

<?
session_start();
$nico = "http://cosmo.kpedu.fi/~nikolipponen/SoMETT-1.0/kommentointi/kommentointi.php";
                    $sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
                    #tarkistetaan yhteyden tila
                    if($sql->connect_errno) {
                    echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
                    }

                    $sql->set_charset("utf8");
                    $result = $sql->query("SELECT * FROM 581D_Kuva ORDER BY Tykkaus DESC");

                    while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
echo "<li data-preview='".$rivi['URL']."'>"."<a href="."#"."><img src=".$rivi['URL']."></a> </li>";

                    $_SESSION['kuvaid']=$rivi['KuvaID'];
                    $_SESSION['kuva']=$rivi['URL'];


}

echo "</ul>";




  $sql->close;
?>
</div> </div> 

			</div>
		</div>
		<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquerypp.custom.js"></script>
		<script type="text/javascript"
		src="js/jquery.elastislide.js"></script>

 <script type="text/javascript">

            // example how to integrate with a previewer

            var current = 0,
                $preview = $( '#preview' ),
                $carouselEl = $( '#carousel' ),
                $carouselItems = $carouselEl.children(),
                carousel = $carouselEl.elastislide( {
                    current : current,
                    minItems : 4,
                    onClick : function( el, pos, evt ) {

                        changeImage( el, pos );
                        evt.preventDefault();

                    },
                    onReady : function() {

                        changeImage( $carouselItems.eq( current ), current
);

                    }
                } );

            function changeImage( el, pos ) {

                $preview.attr( 'src', el.data( 'preview' ) );
                $carouselItems.removeClass( 'current-img' );
                el.addClass( 'current-img' );
                carousel.setCurrent( pos );

            }

        </script>



		<script type="text/javascript">
			
			
		</script>
<script type="text/javascript">

            // example how to integrate with a previewer

            var current = 0,
                $preview = $( '#preview' ),
                $carouselEl = $( '#carousel1' ),             
                $carouselItems = $carouselEl.children(),
                carousel1 = $carouselEl.elastislide( {
                    current : current,
                    minItems : 4,
                    onClick : function( el, pos, evt ) {

                        changeImage( el, pos );
                        evt.preventDefault();

                    },
                    onReady : function() {

                        changeImage( $carouselItems.eq( current ), current
);

                    }
                } );

            function changeImage( el, pos ) {

                $preview.attr( 'src', el.data( 'preview' ) );
                $carouselItems.removeClass( 'current-img' );
                el.addClass( 'current-img' );
                carousel.setCurrent( pos );

            }

        </script>
<script type="text/javascript">

            // example how to integrate with a previewer

            var current = 0,
                $preview = $( '#preview' ),
                $carouselEl = $( '#carousel2' ),
                $carouselItems = $carouselEl.children(),
                carousel2 = $carouselEl.elastislide( {
                    current : current,
                    minItems : 4,
                    onClick : function( el, pos, evt ) {

                        changeImage( el, pos );
                        evt.preventDefault();

                    },
                    onReady : function() {

                        changeImage( $carouselItems.eq( current ), current
);

                    }
                } ); 

            function changeImage( el, pos ) {

                $preview.attr( 'src', el.data( 'preview' ) );
                $carouselItems.removeClass( 'current-img' );
                el.addClass( 'current-img' );
                carousel.setCurrent( pos );

            }

        </script>


            
        </script>

    </body>
</html>