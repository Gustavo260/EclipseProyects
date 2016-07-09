<html>
<body>
	<?php 
	/*
		$cadena1="";
		$nuevacadena="-";
		$cadenavacia=" ";
			for($i=1;$i<=4;$i++)
			{
				$cadena1= $nuevacadena."Hola como estas <br>"; //agrega un espacio en blanco al princio de la cadena 4 veces
				echo $cadena1;
			}


			for($i=1;$i<=4;$i++)
			{
				$cadena2 = substr($cadena1, 1);
				echo $cadena2;
			}	*/
			/*
			$cadena1="";
			$vacio=".";
			$i=1;
			while($i<=4)
			{
				$cadena1=$vacio."Hola como estas <br>";
				$i++;
				$vacio=$vacio.$vacio;
				echo $cadena1;
			}
			$j=0;
			while($j<4)
			{
				$cadena2=substr($cadena1, $j);
				echo $cadena2;
				$j++;
			}*/
			$naturales=array("0", "1", "2", "3");
			$suma=0;
			for($i=0;$i<count($naturales);$i++)
			{
				echo $naturales[$i]."<br>";
				$suma=$suma+$naturales[$i];
			}
			echo $suma;
			
	
	?>
</body>
</html>