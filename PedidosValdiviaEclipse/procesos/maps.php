<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
	require("../basedatos/conexion_bd.php");
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClI2HojkcEtpd1yNXYHZSneWHQkmnl3pw&&libraries=geometry,places,spherical&sensor=true"></script>

<script type="text/javascript">
function localizar()
{
		 	if (navigator.geolocation)
			{
                navigator.geolocation.getCurrentPosition(initMap);
            }
            else
            {
                alert('Tu navegador no soporta geolocalizacion.');
            }
}

function initMap(pos) {
	
  var latPersona = pos.coords.latitude;
  var lonPersona = pos.coords.longitude;
  var latRestaurante ="<?php echo $_GET['lat']; ?>";
 
  var lonRestaurante ="<?php echo $_GET['lon']; ?>";
 
  
  var Valdivia = {lat: latPersona, lng: lonPersona};
  var Temuco = {lat: <?php echo $_GET['lat']; ?>, lng: <?php echo $_GET['lon']; ?>};
	
  var map = new google.maps.Map(document.getElementById('map'), {
    center: Valdivia,
    scrollwheel: false,
    zoom: 5
  });
  	var Origen="Valdivia";
	var Destino="Temuco";
    var x1=new google.maps.LatLng(latPersona, lonPersona);
	var x2=new google.maps.LatLng(latRestaurante, lonRestaurante);
	var distancia = google.maps.geometry.spherical.computeDistanceBetween(x1, x2);
	var kilometros= ((Math.round(distancia/100))/10)+"Km";
	document.getElementById("label").innerText = kilometros;

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: Valdivia,
    origin: Temuco,
    travelMode: google.maps.TravelMode.DRIVING
  };

  // Pass the directions request to the directions service.
  var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // Display the route on the map.
      directionsDisplay.setDirections(response);
    }
  });
}

</script>
<style type="text/css">
.subpanel
{
	background:white;
	color:black;
	float:left;
	width:580px;
	height:450px auto;
	text-align:left;
	margin-top:10px;
	border:1px solid #E2E2E2;
	border-radius:10px;
}
.panel
{
	background:#ECF1F2;
	width:580px;
	height:580px auto;	
}
</style>
<body bgcolor="#ECF1F2">
<div class="panel">
	<div class="subpanel">
   <h2>Horarios</h2>
    <table>
	<?php
	$dias= array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
	$restaurante=$_GET['restaurante'];
        $SQL = "SELECT Dias, primer_horario as p1, segundo_horario as p2 FROM restaurantes JOIN horarios_restaurantes ON restaurantes.ID_Restaurante=horarios_restaurantes.ID_Restaurante WHERE restaurantes.ID_Restaurante=".$restaurante;
            $re = mysql_query($SQL);
            $num = mysql_num_rows($re);
            if($num > 0)
            {
                    //Visualizar em Tela
                   while($resp = mysql_fetch_array($re))
                   {
                        if($resp['Dias']=="Lunes/Viernes")
                        {
                            $cont=0;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            while($cont<="4")
                            {
                                echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                                $cont++;
                            } 
                        }
                       
                        elseif($resp['Dias']=="Sabados")
                        {
                            $cont=5;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                            
                        }
                        elseif($resp['Dias']=="Domingos")
                        {
                            $cont=6;
                            if($resp['p1']=="null" || $resp['p1']=="")
                            {
                                $p1="No disponible";
                            }
                            else
                            {
                                $p1=$resp['p1'];
                            }
                            
                            if($resp['p2']=="null" || $resp['p2']=="")
                            {
                                $p2="No disponible";
                            }
                            else
                            {
                                $p2=$resp['p2'];
                            }
                            echo "<tr><td>".$dias[$cont]."</td><td>".$p1." - ".$p2."</td></tr>";
                        }
                        else
                        {
                            echo "Errol!";
                        }
                   }
            }
			?>
    </table>
    </div>
    <br />
    <div class="subpanel">
      <h2>Ubicación geográfica</h2>
      <?php
	  	$sql="SELECT maps FROM restaurantes WHERE ID_Restaurante=".$restaurante;
		$resp=mysql_query($sql);
		$mapa=mysql_fetch_array($resp);
	  ?>
    	<iframe src="<?php echo $mapa['maps']; ?>" width="580" height="450" frameborder="0" style="border:0" allowfullscreen>
        
        </iframe>
    </div>
	
	<div class="subpanel">
      <h2>Ruta mas corta para llegar</h2>
      <?php
	  	$sql="SELECT maps FROM restaurantes WHERE ID_Restaurante=".$restaurante;
		$resp=mysql_query($sql);
		$mapa=mysql_fetch_array($resp);
	  ?>
    	<div  id="map" style="width: 580px; height:450px;"></div>
		<input type="button" onclick="localizar()" value="Mostrar Ruta" />
    </div>
</div>
</body>
</html>

