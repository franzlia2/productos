<?php 

$conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
	if (strlen($_POST['Nombre']) >= 1 && strlen($_POST['Descripcion']) >= 1 && strlen($_POST['Stock']) >= 1  && strlen($_POST['PrecioVenta']) >= 1 && strlen($_POST['Imagen']) >= 1 && strlen($_POST['FechaCreacion']) >= 1) {
	    //consulta
		if(isset($_GET['IdProducto'])){
			$IdProducto=$_GET['IdProducto'];
		}else{
			echo "Ocurrio un error inesperado.";   
		}

		$Nombre = trim($_POST['Nombre']);
        $Descripcion = trim($_POST['Descripcion']);
		$Stock = trim($_POST['Stock']);

		$PrecioVenta = trim($_POST['PrecioVenta']);
        $Imagen = trim($_POST['Imagen']);
		$FechaCreacion = trim($_POST['FechaCreacion']);


		$conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
        $query = "UPDATE producto 
		SET Nombre='$Nombre'   ,   Descripcion='$Descripcion'   ,    Stock='$Stock'    ,  PrecioVenta='$PrecioVenta'   ,   Imagen='$Imagen'   ,    FechaCreacion='$FechaCreacion'
		WHERE IdProducto='$IdProducto'";

        $resultado=mysqli_query($conexion,$query);

		
		if($resultado == 1) {
			header('Location: ../../adminViews/aupro.php');
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }  else {
		?> 
		<h3 class="bad">¡xd!</h3>
	   <?php
	}

?>

		
