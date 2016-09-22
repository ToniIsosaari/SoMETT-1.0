
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
				    <div class="container demo-1">
<div class="elastislide-wrapper elastislide-horizontal">
<div class="elastislide-carousel">
<ul id="carousel" class="elastislide-list" style="display: block; max-height: 150px; transition: all 500ms ease-in-out; transform: translateX(-553px);">

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
                


	$d = $rivi['Title'];
                    $e = $rivi['Description'];                       
                                }            


                    
                   echo "</ul>"; 

                     echo "<div class="."image-preview".">";


echo "<p color=blue>".$d."</p>";                        
 echo
                         "<img id="."preview"." src=".$rivi['URL']."></a> </li>";
                   
echo "<p>".$e."</p>";
echo "<br>";
 
  
  
?>
</div> </div> </div> </div> 

 <div class="container demo-1">
<div class="elastislide-wrapper elastislide-horizontal">
<div class="elastislide-carousel">
<ul id="carousel1" class="elastislide-list" style="display: block; max-height: 150px; transition: all 500ms ease-in-out; transform: translateX(-553px);">

 
<? 
 while($rivi = $result->fetch_array(MYSQL_ASSOC)) {
                     echo "<li data-preview='".$rivi['URL']."'>"."<a href="."#"."><img src=".$rivi['URL']."></a> </li>";
}

echo "</ul>";

$sql->close();
 ?>

     
</div> 
                    
				
            
				

            
</div> </div> 
			</div>
	



 <p align="center" class="info"><strong>Käyttäjän "4":</strong> Kuvat</p>
    <div class="container demo-1">	
<div class="elastislide-wrapper elastislide-horizontal">
<div class="elastislide-carousel">
<ul id="carousel1" class="elastislide-list" style="display: block; max-height: 150px; transition: all 500ms ease-in-out; transform: translateX(-553px);">
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;">
<a href="#"><img src="images/small/1.jpg" alt="image01"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/2.jpg" alt="image02"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/3.jpg" alt="image03"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/4.jpg" alt="image04"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/5.jpg" alt="image05"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/6.jpg" alt="image06"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/7.jpg" alt="image07"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/8.jpg" alt="image08"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/9.jpg" alt="image09"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/10.jpg" alt="image10"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/11.jpg" alt="image11"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/12.jpg" alt="image12"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/13.jpg" alt="image13"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/14.jpg" alt="image14"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/15.jpg" alt="image15"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/16.jpg" alt="image16"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/17.jpg" alt="image17"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/18.jpg" alt="image18"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/19.jpg" alt="image19"></a></li>
<li style="width: 33.1126%; max-width: 176px; max-height: 150px;"><a href="#"><img src="images/small/20.jpg" alt="image20"></a></li>
</ul></div><nav><span class="elastislide-prev" style="display: block;">Previous</span><span class="elastislide-next" style="display: block;">Next</span></nav></div>
					
				

 </div> 




</body> 

</html> 

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

            // example how to integrate with a previewer

            var current = 0,
                $preview = $( '#preview1' ),
                $carouselEl = $( '#carousel1' ),
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
