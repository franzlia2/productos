<?php 
$conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");

		if(isset($_GET['IdProducto'])){

			$IdProducto=$_GET['IdProducto'];
		}else{
			echo "Ocurrio un error inesperado.";   
		}
        $query = "DELETE FROM producto WHERE IdProducto='$IdProducto'";

        $resultado=mysqli_query($conexion,$query);

		if($resultado == 1) {
			header('Location: ../../adminViews/aupro.php');
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }

?>