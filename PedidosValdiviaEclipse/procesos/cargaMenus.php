<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de usuarios</title>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type='text/javascript' src="../js/funciones.js"></script>
<link href="estilos/estilosCSS3.css" rel="stylesheet" type="text/css" />

<script>
function openDetalle(id)
{
   var idt=id;
   $("#ID").val(id);  
   $(".ventanaDetalle").slideDown(2000);
}
</script>
<?php 
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
	session_start();
?>
<style type="text/css">
.caja
{
	background:white;
	color:black;
	float:left;
	width:150px;
	height:280px;
	text-align:center;
	border:1px solid #E2E2E2;
	border-radius:10px;
	margin:10px;
	margin-left:5%;
}
.contenedor
{
	background:white;
	width:580px;
	height:580px auto;
	margin:auto;		
}

</style>
</head>

<body>

<div class="contenedor" style="background-color:#ECF1F2">	
	<?php	
		$restaurante=$_GET['restaurante'];
		$sqlBusqueda="SELECT Menus.Descripcion as menu, platillos.ID_Platillo, platillos.Descripcion as Platillo, platillos.Costo, platillos.Imagen as Imagen FROM platillos JOIN menus ON platillos.ID_Menu=menus.ID_Menu WHERE platillos.ID_Menu and menus.ID_Restaurante=".$restaurante;
		$resp=mysql_query($sqlBusqueda); 
		if(mysql_num_rows($resp)>0)
		{
			$numeromenu=1;
			while($row2=mysql_fetch_array($resp))
			{
				if($numeromenu	!=$row2['menu'])
				{
	?>	    	  
    				<div style="margin-left:6%;"><p><b><h3><u><?php echo $row2['menu']; ?></u></h3></b></p></div>
                <?php
				}
				$numeromenu=$row2['menu'];
				?>
                <div class="caja" style="margin-bottom:5%;">
                    <h2><?php echo $row2['Platillo']; ?></h2>
                    <img src="<?php echo $row2['Imagen']; ?>" width="140px" height="100px" />
                    <p>$<?php echo $row2['Costo']; ?></p>  
					<?php $detalle=$row2['ID_Platillo']; ?>
                    <!-- <input type="button" href="#openmodal" value="Detalle" id="platillo<?php //echo $row2['ID_Platillo']; ?>" name="platillo<?php //echo $row2['ID_Platillo']; ?>" /> -->
					<!-- <a id="cargaModal" href="javascript:openDetalle(<?php //echo $detalle; ?>)" class="open">Detalle</a> -->
                    <?php
						$sql="SELECT ID_Usuario, ID_Sesion FROM sesiones WHERE estado=1";
						$sesion=mysql_query($sql); 
						if($_SESSION)
						{
					?>
                    		 <input type="button" class="claseagregar" value="Agregar" data-id="<?php echo $row2['ID_Platillo']; ?>" id="platillo" name="platillo" />
							 <br><a class="btn" style="width: 100px; height: 25px;" href="javascript:openDetalle(<?php echo $row2['ID_Platillo']; ?>)">Detalle</a>
                             <input type="hidden" data-id="<?php echo $restaurante; ?>" class="restaurante" value="" id="txtRestaurante" name="txtRestaurante" />	 
                              
					<?php	
						}
						
					?>
                </div>
    <?php	
			}
		}
		else
		{
			echo "<table align='center'><tr><td>No se encontraron platillos!</td></tr></table>";
		}
	
	?>
  
</div>
<!-- MIS MODALES -->
		<div class="ventanaDetalle">
			<h1>Detalles del Platillo</h1>
			<div style="width: 500px; height:800px; background-color: #FFF; color: #666; align: center; margin-left:35%;">
				<div class="cerrarDetalle"><a href="javascript:closeDetalle();">Cerrar X</a></div>
				<h1>Pizza Tocino</h1>
				<hr>
				<form method="post" name="form2" id="form2" action="procesos/autentificacion.php">
					<table>
					<tr><td><img src="recursos/restaurantes/menus/pizzatocino.jpg" width="235px" height="235px" /></td><td><p align="justify">Se prepara una pizza con masa hecha con polvo de hornear y por ello no será necesario dejarla levar, haciendo el trabajo de amasado más sencillo y rápido.
La cubierta, es una sabrosa combinación de queso cheddar, tocino y pimiento verde que además de dar sabor le otorga un colorido incomparable.</p></td></tr>
					<tr><td><b>Ingredientes Masa</b><br>

Harina 250 grs.<br>
Sal 1 cucharadita <br>
Polvo para hornear 2 cucharaditas <br>
MantequillA50 grs.<br>
Huevos 2 <br>
Leche 3 cucharadas</td><td><br><br><b>Ingredientes Cubierta</b><br>

Aceite de oliva 1 cucharada <br>
Pimiento verde 1 sin semillas y cortado en rebanadas finas <br>
Tocino 4 tiras picadas<br>
Cebollas 2 cortadas en rodajas finas <br>
Salsa de tomate 2 cucharadas de salsa de tomate <br>
Tomates cherry 5 cortados a la mitad<br>
Queso cheddar curado 85 grs. rallado</td></tr>
					</table>
					<!-- <input type="text" id="ID" name="ID" value="" /> -->
					
                    </form>
                  
			</div>
	</div>
		
<!-- FIN MODALES -->
</body>
<!-- FUNCIONES JQUERY -->
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {	
				$(".claseagregar").click(function(event) {
					var id=$(this).attr('data-id');
					$.post('procesos/cargaCompras.php',{Id:id},function(a)
					{	
						location.reload("inforestaurante.php");
					}
				);
				});		
			});
		</script>
</html>