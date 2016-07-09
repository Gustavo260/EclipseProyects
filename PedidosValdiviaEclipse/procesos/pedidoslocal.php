<?php
	require("../basedatos/conexion_bd.php");
	require("funciones.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Historial de Pedidos Confirmados</title>
	<link rel="stylesheet" type="text/css" href="../estilos/estilosCSS.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
    <style type="text/css">
	
	section
	{
		width: 80%;
		min-height: 500px;
		padding: 2%;
		margin:0 auto;
		margin-left: 10%;
		margin-top: 50px;
	}
	
	.caja
	{
		background:white;
		color:black;
		width:614px;
		height:auto;
		text-align:center;
		border:1px solid #E2E2E2;
		border-radius:10px;
		margin:15px auto;
		margin-bottom:auto;
		margin-top:auto;
	}
	
	.envio
	{
		background-color: #f13453;
		color:white;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 4px;
		font-size: 1.3rem;
	}
	.envio:hover{
		background-color: #4a4a4a;
		cursor: pointer;
	}
	</style>
</head>
<body>
<!-- Header -->
	<div id="header">
    	<table border="0" bordercolordark="#000000" width="100%">
            <tr>
            	<td width="82%">
            		<img src="../recursos/cooltext138285584887145.png" width="202" height="55" id="Insert_logo" /> 
           	    </td>
                <td> </td>
           	    <td width="18%" align="center"><?php infolog(); ?></td>
            </tr>
            <tr>
            	<td width="82%">
                
                </td>
            </tr>
   	    </table>
    </div>
   
<!-- Fin encabezado --> 
	
	<section>
	<center><h1>Historial de pedidos</h1></center><br>
    <div class="caja">
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Platillo</td>
			<td>Restaurante</td>
			<td>Solicitante</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>	

		<?php
		//OBTENCION DE ID USUARIO		
			$ID_Usuario=$_SESSION['ID_Usuario'];
		//FIN OBTENCION DE ID
		$re=mysql_query("SELECT ID_Restaurante as rest FROM `usuarios_restaurantes` WHERE ID_Usuario=".$ID_Usuario);
		$f=mysql_fetch_array($re);
		$ID_Cuenta=$f['rest'];
		
		//MUESTRA HISTORIAL DE PEDIDOS CONFIRMADOS
			$re=mysql_query("SELECT ventas.ID_Pedido as numeropedido, restaurantes.Nombre as rest, usuarios.Nombre as nombre, ventas.Imagen as imagen, ventas.Descripcion as platillo, ventas.Precio as precio, ventas.Cantidad as cantidad, ventas.SubTotal as subtotal FROM `ventas` JOIN usuarios ON usuarios.ID_Usuario= ventas.ID_Cliente JOIN restaurantes ON ventas.ID_Restaurante= restaurantes.ID_Restaurante WHERE ventas.ID_Restaurante=".$ID_Cuenta." order by ventas.ID_Pedido DESC");
			$numeropedido=0;
			while ($f=mysql_fetch_array($re)) {
					
					if($numeropedido	!=$f['numeropedido']){
						echo '<tr><td colspan="7"><hr color="#000000"></td></tr>';
						echo '<tr><td>Pedido Número: '.$f['numeropedido'].' </td></tr>';
					}		
					$numeropedido=$f['numeropedido'];
					$sqltest="SELECT usuarios.Nombre, usuarios.Apellido, ventas.ID_Pedido as numeropedido, ventas.Imagen as imagen, ventas.Descripcion as nombre, ventas.Precio as precio, ventas.Cantidad as cantidad, ventas.SubTotal as subtotal FROM `ventas` JOIN usuarios ON ventas.ID_Cliente=usuarios.ID_Usuario WHERE ID_Cliente=4 order by ventas.ID_Pedido DESC";	//PRUEBA ESTO			
					echo '<tr>
						<td><img src="../'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['platillo'].'</td>
						<td>'.$f['rest'].'</td>
						<td>'.$f['nombre'].'</td>	
						<td>$'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>$'.$f['subtotal'].'</td>
						<td rowspan="2"></td>				
					</tr>
					<tr><td></td></tr>';			
			}	
		?>
	</table>
    </div>
    <br>
    <br>
     <center><a class="envio" href="../index.php">Volver</a></center>
	</section>
</body>

</html>