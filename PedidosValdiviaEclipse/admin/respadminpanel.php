<!doctype html>
<html>


<?php
	require("../basedatos/conexion_bd.php");
	require("../procesos/funciones.php");
	session_start();
?>
<?php if($_SESSION['Perfil']=="2" && $_SESSION){ ?>

<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">

.sidebar1 {
	float: right;
	width: 179px;
	background-color:#;
	padding-bottom:100%;
	
}
.content {
	padding: 10px 0;
	width: 780px;
	float:left;
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
.nav li a:hover
	{
		background:#434343;
	}
	
	.nav > li
	{
		float:left;	
	}
	
	.nav li ul
	{
		position:absolute;
		min-width:140px;
		display:none;
	}
	
	.nav li:hover > ul
	{
		display:block;
	}
	
	.nav li ul li
	{
		position:relative;
	}
	
	.nav li ul li ul 
	{
		right:-140px;
		top:0px;
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

div#panelgeneral
{
	width:1000px;
	height:600px auto;
	background-color:white;
	margin-top:100px auto;
	
	
}
div#subpanel
{
	border:1px solid #E2E2E2;
	border-radius:10px;
	float:right;
	margin-top: 50px auto;
	width:250px;
	height:250px;
	background-color:white;
}

</style>

<link href="../estilos/ratingbar.css" rel="stylesheet" type="text/css">
<link href="../estilos/estilosCSS.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<body>
<div>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilos/estilosCSS2.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilosCSS.css">
   	<link href="../estilos/menus.css" rel="stylesheet" type="text/css" /> 
</head>
	<!-- Header -->
	<div id="header">
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="82%">
               
                        	<img src="../recursos/cooltext138285584887145.png" width="202" height="55" id="Insert_logo" /> 
            
           	    </td>
                <td>
                 <nav class="menu2">
                  <menu>
                    <li><a href="adminPanel.php">Inicio</a></li>
                    <li><a class="Ver" href="procesos/ver.php">Ver</a></li>
                    <li><a class="Agregar" href="procesos/agregar.php" >Agregar</a></li>
                    <li><a class="Modificar" href="../index.php" >Salir</a></li>
                  </menu>
                </nav>
                 <?php
					if($_SESSION['Perfil']=="2")
					{
						?>
                        	<div class="carrito"><a href="procesos/adminpedidos.php"><img src="../recursos/icon_shopcart.png" width="40px" /></a></div></td>
                        <?php
					}
					else
					{
						
					}
				?>	
           	    <td width="18%" align="center"><?php loginAdmin(); ?></td>
            </tr>
            <tr>
            	<td width="82%">
                
                </td>
            </tr>
   	    </table>
</div>
   
<!-- Fin encabezado --> 
  
  

  <article >
    <table border="0" align="center"><tr><td><h1>Panel de Administración</h1></td>
		
</div></td></tr></table>
<hr />
            <section>
              
                <div id="panelgeneral">
                <br><br><br>
                
                <table align="center" class="tablax">
                    <tr>
                        <td><div id="subpanel1" class="p1"><a href="procesos/ver.php" class="busqueda"><img alt="Busqueda/Edicion" src="../recursos/btnbuscar.png" width="250px" height="250px" ></a></div></td>
                        <td><div id="subpanel2" class="p2"><a href=""><img alt="Usuarios" src="../recursos/usuarios.png" width="250px" height="250px" ></a></div></td>
                    </tr>
                    <tr>
                        <td><div id="subpanel3" class="p3"><a href="procesos/agregar.php"><img alt="Agregar" src="../recursos/agregar.jpg" width="250px" height="250px" ></a></div></td>
                        <td><div id="subpanel4" class="p4"><a href="index.php"><img alt="Volver al inicio de la pagina" src="../recursos/salir.png" width="250px" height="250px" ></a></div></td>
                    </tr>
                </table>
                    
                </div>
                </section>
</article>
    </center>
    <hr />
 <!-- Pie de pagina -->
	<div id="footer" style="margin-top: 50px auto; height:auto">
    	 <table align="center">
        	<tr><td align="center" colspan="2">Contactanos</td></tr>
   			<tr><td align="center" colspan="2"><hr /></td></tr>
            <tr><td>Email: contacto@pedidosvaldivia.com &nbsp; &nbsp;</td><td>Fono:(2) 9 571 83 27</td></tr>
        </table>
    </div>
<!-- Fin Pie de pagina --> 
  <!-- end .container --></div>
</body>

<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".Agregar").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/agregar.php');
					$("#subpanel1").css("visibility","hidden");		
					$("#subpanel2").css("visibility","hidden");		
					$("#subpanel3").css("visibility","hidden");		
					$("#subpanel4").css("visibility","hidden");					
				});
				
				$(".Ver").click(function(event) {
					event.preventDefault();
					$("#panelgeneral").load('procesos/ver.php');
					$("#subpanel1").css("visibility","hidden");		
					$("#subpanel2").css("visibility","hidden");		
					$("#subpanel3").css("visibility","hidden");		
					$("#subpanel4").css("visibility","hidden");					
				});			});
		</script>
</html>
<?php 
  } 
  else
  {
	 header("Location: ../index.php");
  }
  ?>