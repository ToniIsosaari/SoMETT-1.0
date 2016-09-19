
<!DOCTYPE html>
	<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
	<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
	<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
	<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <title>Elastislide - A Responsive Image Carousel</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width,
		initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Elastislide - A Responsive Image
		Carousel" />
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
		<div class="container demo-4">
			
            <div class="main">
				<header class="clearfix">	
					<h1>Käyttäjän kuvat <span>Selaa käyttäjän kuvia</span></h1>
											
                    
				</header>
				 <div class="gallery">
				    <ul id="carousel" class="elastislide-list">
					<?php 
					
				
					$sql=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
					#tarkistetaan yhteyden tila
					if($sql->connect_errno) {
					echo "MySQL, virhe yhteyden luonnissa:" . $sql->connect_error;
					}
					
					$sql->set_charset("utf8");														
                    $result = $sql->query("SELECT * FROM 581D_Kuva"); 
                    
                    while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
                    echo "<li data-preview='".$rivi['URL']."'>"."<a href="."#"."><img src=".$rivi['URL']."></a> </li>";
                
                                           
                                            
            
                    }
                   echo "</ul>"; 
                     echo "<div class="."image-preview".">";
                         echo
                         "<img id="."preview"." src=".$rivi['URL']."></a> </li>";
                     
                     
                    ?>
     
</li>
<? $sql->close(); ?> 
                    
				</div> </div> 
				<p class="info"><strong>Käyttäjän "4":</strong> Kuvat</p>

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
    </body>
</html>
