<?php
     session_start();
     error_reporting(0);
     $varsesion = $_SESSION['Username'];
     if($varsesion == null || $varsesion==''){
         echo 'No autorización - inicie sesión.';
         die();
     }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Links css, bootstrap, librerias-->
	<link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="ssstyle.css">
	<!-- ---------------------------------------------------------------------------------------------------->
  <title>Administrador | PELUQUERIA</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<body class="bd menu"> 
<div class="container">
<div class="navigation">
            <ul>
                <li>
                    <a href="admin.php">
                        <span class="icon"><ion-icon name="logo-amplify"></ion-icon></span>
                        <span class="title">PT Beaty Salon</span>
                    </a>
                </li>
                
                <li>
                    <a href="ausu.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Empleados</span>
                    </a>
                </li>

                <li>
                    <a href="aucli.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="aupro.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Productos</span>
                    </a>
                </li>

                <li>
                    <a href="auci.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Citas</span>
                    </a>
                </li>

                <li>
                    <a href="../cerrar_sesion.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Cerrar Sesion</span>
                    </a>
                </li>

            </ul>
        </div>


        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Busca aquí">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="user">
                </div>
            </div>

            <!-- boton registrar-->
            <a href="registroProducto.php"><button class="btn_reg" type="submit" name="register">Registrar Producto</button></a>
            <br><br><br>
            <div class="bloque">
        <?php 
              
              
             

              echo '<table class="tabla2" border="3" cellspacing="30" cellpadding="8" BGCOLOR="#FFD1DC">

                      <tr> 
                          <th>Nombre</th> 
                          <th>Descripcion</th> 
                          <th>Stock</th> 
                          <th>PrecioVenta</th> 
                          <th>Imagen</th> 
                          <th>FechaCreacion</th> 
                          <th>Editar</th> 
                          <th>Eliminar</th> 
                      </tr>';
                      $conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
                      $query = "SELECT * FROM producto";

                    // $resultado=mysqli_query($conexion,$query);

                    // $filas=mysqli_fetch_array($resultado);
                    $consulta=$conexion->query($query);


                          while ($filas = $consulta->fetch_assoc()) {
                        $IdProducto = $filas["IdProducto"];
                        $Nombre = $filas["Nombre"];
                        $Descripcion = $filas["Descripcion"];
                        $Stock = $filas["Stock"];
                        $PrecioVenta = $filas["PrecioVenta"]; 
                        $Imagen = $filas["Imagen"];
                        $FechaCreacion = $filas["FechaCreacion"];

                        echo '<tr> 
                                    
                                    <td>'.$Nombre.'</td> 
                                  <td>'.$Descripcion.'</td> 
                                  <td>'.$Stock.'</td> 
                                  <td>'.$PrecioVenta.'</td>
                                  <td>
                                    <img src="/adminViews/images/'.$Imagen.'" width="150"/> </td>

                                  <td>'.$FechaCreacion.'</td>

                                  <td BGCOLOR="#cfc584" ><a href="../create/producto/updatePro.php?IdProducto='.$IdProducto.';"><button class="btn_edit">Editar</button></a></td> 
                                  <td BGCOLOR="#cfc584" ><a href="../create/producto/deletePro.php?IdProducto='.$IdProducto.';"><button class="btn_elim">Eliminar</button></a></td>  
                              </tr>';
                    }          
                ?>
      </div>

        </div>
    </div>  

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active')
            main.classList.toggle('active')
        }

        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item)=>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item)=>
        item.addEventListener('mouseover',activeLink));
    </script>


</body>

</html>