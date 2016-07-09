<?php
session_start();
require("../basedatos/conexion_bd.php");
require("funciones.php");

		$ID_Usuario=$_SESSION['ID_Usuario'];
		$ID_Restaurante=$_GET['txtRestaurante'];
		$arreglo=$_SESSION['carrito'];
		
		$numeropedido=0;
		$re=mysql_query("select * from ventas order by ID_Pedido DESC limit 1") or die(mysql_error());	
		while (	$f=mysql_fetch_array($re)) {
					$numeropedido=$f['ID_Pedido'];	
		}
		if($numeropedido==0){
			$numeropedido=1;
		}else{
			$numeropedido=$numeropedido+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			mysql_query("insert into ventas (ID_Pedido, ID_Restaurante, ID_Cliente, Descripcion, Precio, Cantidad, Imagen, Subtotal) values(
				".$numeropedido.",
				".$ID_Restaurante.",
				".$ID_Usuario.",
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".$arreglo[$i]['Imagen']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}
		$totalreal=$_GET['total'];
		EnviarSMS($totalreal);
		//unset($_SESSION['carrito']);
		//header("Location: ../inforestaurante.php?txtRestaurante=".$_GET['txtRestaurante']);
		//header("Location: ../experimentos/script_enviarmail.php?txtRestaurante=".$_GET['txtRestaurante']."&total=".$_GET['total']);
		
//FUNCION SMS
function EnviarSMS($dinero)
{
    //DATOS DE CUENTA TXTLOCAL
        $User="pedidosvaldivia@hotmail.com";
        $Pass="69Etern4l90";
        $From="PValdivia";
        
        //DATOS DEL USUARIO Y ENVIO
        $Nombre=$_SESSION['Nombre'];
		$Apellido=$_SESSION['Apellido'];
		
        $Telefono="569".$_SESSION['Telefono']; //56966823207 CLIENTE
		$TelefonoVista=$_SESSION['Telefono']; //56966823207 CLIENTE
		$Telefono2="56966823207"; //56966823207 RESTAURANTE
		
        $Subtotal=$_GET['total'];
		
		//MENSAJE AL CLIENTE
        $Mensaje="Hola  ".$Nombre.", tu pedido se ha confirmado con un total de $".$Subtotal." y llegara dentro de 15 min aproximadamente, gracias por preferir nuestro servicio de Pedidos Valdivia :).";
		
		//MENSAJE AL RESTAURANTE
        $Mensaje2="Se a solicitado un pedido de ".$Nombre." ".$Apellido.", con un total de $".$Subtotal." sin costo de envio, contacte al numero movil ".$TelefonoVista." para saber mas detalles del pedido o revisarlo en tu cuenta de pedidos pendientes, gracias por preferir nuestro servicio de Pedidos Valdivia que tenga un buen dia.";
       
        
        //PARAMETROS GENERALES
        $Test="0";
        $Info="1";
    
        $Mensaje = str_replace(' ', '+', $Mensaje);
        //echo '<script>alert("'.$Mensaje.'");</script>';
		unset($_SESSION['carrito']);
		
		//ENVIO DE SMS AL CLIENTE
        //echo '<script type="text/javascript">location.href="http://txtlocal.com/sendsmspost.php?uname='.$User.'&pword='.$Pass.'&message='.$Mensaje.'&from='.$From.'&number='.$Telefono.'&info='.$Info.'&test='.$Test.'";</script>';  
		
		//ENVIO DE SMS AL RESTAURANTE
        echo '<script type="text/javascript">location.href="http://txtlocal.com/sendsmspost.php?uname='.$User.'&pword='.$Pass.'&message='.$Mensaje2.'&from='.$From.'&number='.$Telefono2.'&info='.$Info.'&test='.$Test.'";</script>';  
}
?>
?>