<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../estilos/estilosCSS2.css">
</head>
<?php
	require("../../basedatos/conexion_bd.php");
?>
<body>
<center><h1>Agregar un nuevo Platillo</h1></center>
	<form action="procesos/altaplatillo.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Menu<br>
			<select id="Menu" name="Menu">
				<?php 
                $sql="SELECT ID_Menu, Descripcion FROM menus WHERE Estado=1";
                $sesion=mysql_query($sql); 
                if(mysql_num_rows($sesion)>0)
                {
                    while($sesionON=mysql_fetch_array($sesion))
                    {
                        ?>
                         <option value="<?php echo $sesionON['ID_Menu']; ?>"><?php echo $sesionON['Descripcion']; ?></option>        
                        <?php
                    }
                }
                ?>  
            </select>
        </fieldset>
		<fieldset>
			Descripcion<br>
			<center><input type="text" required="required"  id="DescripcionPlatillo" name="DescripcionPlatillo"></center>
		</fieldset>
		<fieldset>
			Componentes<br>
			<center><textarea id="Componentes" required="required" name="Componentes" style="resize:horizontal;" rows="5px" cols="50px"></textarea></center>
		</fieldset>
		<fieldset>
			Valorización<br>
			<select id="Valorizar" name="Valorizar">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                       <option value="5">5</option>
                    </select>
		</fieldset>
        <fieldset>
			Categoria<br>
            <select id="Categoria" name="Categoria">
                          <option value="Pizzas">Pizzas</option>
                           <option value="Ensaladas">Ensaladas</option>
                            <option value="Pastas">Pastas</option>
                            <option value="Sopas">Sopas</option>
                            <option value="Guisos">Guisos</option>
             </select>
		</fieldset>
        <fieldset>
			Imagen<br>
			<center><input type="file" name="filePlatillo" id="filePlatillo"></center>
		</fieldset>
         <fieldset>
			Precio<br>
			<center><input type="text" id="Precio" name="Precio"></center>
		</fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
	</form>
</body>
</html>