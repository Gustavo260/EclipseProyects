<!doctype html>
<html>
<head>

<?php
	require("conexion_bd.php");
	require("funciones.php");
?>





<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
<!--	
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}
/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing block. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the blocks, instead of the block elements themselves, gets rid of any box model math. A nested block with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}
/* ~~ This fixed width container surrounds all other blocks ~~ */
.container {
	width: 960px;
	background-color: #FFFFFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}
/* ~~ The header is not given a width. It will extend the full width of your layout. ~~ */
header {
	background-color: #e3e3e3;
}
/* ~~ These are the columns for the layout. ~~ 

1) Padding is only placed on the top and/or bottom of the block elements. The elements within these blocks have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the block itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the block element and place a second block element within it with no width and the padding necessary for your design.

2) No margin has been given to the columns since they are all floated. If you must add margin, avoid placing it on the side you're floating toward (for example: a right margin on a block set to float right). Many times, padding can be used instead. For blocks where this rule must be broken, you should add a "display:inline" declaration to the block element's rule to tame a bug where some versions of Internet Explorer double the margin.

3) Since classes can be used multiple times in a document (and an element can also have multiple classes applied), the columns have been assigned class names instead of IDs. For example, two sidebar blocks could be stacked if necessary. These can very easily be changed to IDs if that's your preference, as long as you'll only be using them once per document.

4) If you prefer your nav on the left instead of the right, simply float these columns the opposite direction (all left instead of all right) and they'll render in reverse order. There's no need to move the blocks around in the HTML source.

*/
.sidebar1 {
	float: right;
	width: 179px;
	background-color:#;
	padding-bottom:100%;
	
}
.content {
	padding: 10px 0;
	width: 780px;
	float: right;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol {
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The navigation list styles (can be removed if you choose to use a premade flyout menu like Spry) ~~ */
ul.nav {
	list-style: none; /* this removes the list marker */
	border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px; /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the link block properties causing it to fill the whole LI containing it. This causes the entire area to react to a mouse click. */
	width: 160px;  /*this width makes the entire button clickable for IE6. If you don't need to support IE6, it can be removed. Calculate the proper width by subtracting the padding on this link from the width of your sidebar container. */
	text-decoration: none;
	background-color: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background-color: #ADB96E;
	color: #FFF;
}

/* ~~ The footer ~~ */
footer {
	padding: 10px 0;
	background-color: #999;
	position: relative;/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
}

/*HTML 5 support - Sets new HTML 5 tags to display:block so browsers know how to render the tags properly. */
header, section, footer, aside, article, figure {
	display: block;
}
-->

.caja
{
	background:white;
	color:black;
	float:center;
	width:614px;
	height:170px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:15px;
}
</style>
<link href="ratingbar.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header>
  	<table border="1" bordercolordark="#000000" width="100%">
    <tr><td width="82%">
    <img src="recursos/cooltext138285584887145.png" width="202" height="55" id="Insert_logo" />
    </td>
    <td width="18%" align="center"><?php login(); ?></td></tr>
    </table>
  </header>
  
  <div class="sidebar1">   
        <ul class="nav">
              <li><a href="#">Link one</a></li>
              <li><a href="#">Link two</a></li>
              <li><a href="#">Link three</a></li>
              <li><a href="#">Link four</a></li>
        </ul>
        <aside>	
            <br />    
        </aside>
  	<!-- end .sidebar1 -->
  </div>
  
  <article class="content">
    <table width="778" border="0"><tr><td width="268"><h1>Restaurantes</h1></td><td width="494" align="center"><div class="flexsearch">
		<div class="flexsearch--wrapper">
			<form class="flexsearch--form" action="#" method="post">
				<div class="flexsearch--input-wrapper">
				  <input class="flexsearch--input" type="search" placeholder="search" width="250px">
				  <input class="flexsearch--submit" type="submit" value="&#10140;"/>
				</div>
			</form>
		</div>
</div></td></tr></table>
<hr />
    <section>
     <h2></h2>
     <p></p>
    </section>
   <center>
    <?php 
	if(isset($_POST["btnBuscar"]))
	{ 
		$localizacion=$_POST['txtLocalizacion'];
		$sqlBusqueda="SELECT ID_Restaurante, Nombre, Rating, Imagen FROM Restaurantes WHERE Hubicacion='".$localizacion."';";
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			while($row2=mysql_fetch_array($resp))
			{
				?>               	                
					<section> 
                    <!-- NODOS -->
                    <div class="caja">
                    <form id="form<?php echo $row2['ID_Restaurante']; ?>" name="form<?php echo $row2['ID_Restaurante']; ?>" method="get" action="testestilos2.php">  
                    <table width="614" height="25" border="0">
                        <tr>
                        <td width="100"><center><img src="<?php echo $row2['Imagen']; ?>" onmouseover="this.style.opacity=0.5" onmouseout="this.style.opacity=1" width="100px" height="100px"></center></td>
                            <td width="441">
                                <table>
                                    <tr><td align="left" colspan="2"><h4><?php echo $row2['Nombre']; ?></h4></td><td></td></tr>
                                    <tr>
                                      <td colspan="2">
                                      <?php if($row2['Rating']=="1")
									  	{
											?>
											<img src="recursos/ratingbar/1estrella.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="2")
									  	{
											?>
											<img src="recursos/ratingbar/2estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="3")
									  	{
											?>
											<img src="recursos/ratingbar/3estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="4")
									  	{
											?>
											<img src="recursos/ratingbar/4estrellas.png" id="" name="">
                                           	<?php
										} 
									  elseif($row2['Rating']=="5")
									  	{
											?>
											<img src="recursos/ratingbar/5estrellas.png" id="" name="">
                                           	<?php
										}?>
                                     </td><td colspan="2" align="center">
                                      
                                      <input type="submit" id="btnRestaurante<?php echo $row2['ID_Restaurante']; ?>" name="btnRestaurante<?php echo $row2['ID_Restaurante']; ?>" value="Buscar >">
                                      <input type="hidden" id="txtRestaurante" name="txtRestaurante" value="<?php echo $row2['ID_Restaurante']; ?>"></td><td width="6"></td></tr>
                                    <tr><td width="133">100Km</td><td width="166">45Min</td><td width="118">$2500</td></tr>
                                    <tr><td>Distancia</td><td>Costo de envio</td><td>Pedido Minimo</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                     <!-- FIN NODOS -->
                    </section>
                    <section>          
                    <h1></h1>
                    <p></p>
                    </section>
                    <!-- Fin repetidor!!
                <?php
			}
		}
	}
	?>
    </center>
    
    
    <section> </section>
    <!-- end .content --></article>
    <hr />
  <footer>
        <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2)9571 83 27</td></tr>
        </table>
    <address>
    </address>
  </footer>
  <!-- end .container --></div>
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				$(':radio').change
				(
 					 function()
					 {
    					$('.choice').text( this.value + ' stars' );
 					 } 
				)
			});
		</script>
</html>