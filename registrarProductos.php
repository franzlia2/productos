<?php 

$conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");



        $Nombre = $_POST['Nombre'];
		$Descripcion = $_POST['Descripcion'];
	    $Cantidad = $_POST['Stock'];
		$PrecioVenta = $_POST['PrecioVenta'];







		//$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

		//RECIBIMOS LOS DATOS DE LA IMAGEN

		$nombreImagen=$_FILES['Imagen']['name'];
		$tipoImagen=$_FILES['Imagen']['type'];
		$tamagnoImagen=$_FILES['Imagen']['size'];

		

		echo $tipoImagen;

		

		//echo '<script language="javascript">alert("$tipoImagen"); return false;</script>';


		if($tamagnoImagen<=3000000){


					if ($tipoImagen=="image/jpeg" || $tipoImagen=="image/jpg" ||$tipoImagen=="image/png" ||$tipoImagen=="image/gif"  ) {
						
				
						//RUTA DE LA CARPETA DESTINO DEL SERVIDOR

						$carpetaDestino=$_SERVER['DOCUMENT_ROOT'].'/adminViews/images/';

						//MOVEMOS LA IMAGEN DE DESTINO TEMPORAL AL DIRECTORIO ESCOGIDO

						move_uploaded_file($_FILES['Imagen']['tmp_name'],$carpetaDestino.$nombreImagen);

					}
					else{

						echo "solo se pueden subir imagenes jpg/jpeg/png/gif";
				}

			
			}else{
				echo "el tamaño es mayor a los 3 MB";
		}












		$consulta = "INSERT INTO producto(Nombre, Descripcion, Stock, PrecioVenta, Imagen, FechaCreacion) 
		VALUES ('$Nombre','$Descripcion','$Cantidad','$PrecioVenta','$nombreImagen',now())";

		$resultado = mysqli_query($conexion,$consulta);
		if ($resultado == 1) {
			header('Location: aupro.php');
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    

?>