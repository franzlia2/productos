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
	<link rel="stylesheet" type="text/css" href="../../adminViews/Style.css">
	
	<!-- ---------------------------------------------------------------------------------------------------->
  <title>Administrador | PELUQUERIA</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<body class="bd menu"> 
<div class="container">
        <div class="navigation">c
        <ul>
                <li>
                    <a href="/adminViews/admin.php">
                        <span class="icon"><ion-icon name="logo-amplify"></ion-icon></span>
                        <span class="title">PT Beaty Salon</span>
                    </a>
                </li>
                
                <li>
                    <a href="/adminViews/ausu.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="/adminViews/aucli.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="/adminViews/aupro.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Productos</span>
                    </a>
                </li>

                <li>
                    <a href="/adminViews/auci.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Citas</span>
                    </a>
                </li>

                <li>
                    <a href="../../cerrar_sesion.php">
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
                    <img src="images/user.jpg">
                </div>
            </div>
        <div class="bloque">
        <?php 
    
            if(isset($_GET['IdProducto'])){
            $IdProducto=$_GET['IdProducto'];

            $conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
            $query = "SELECT * FROM producto WHERE IdProducto='$IdProducto'";

            $resultado=mysqli_query($conexion,$query);
            $fila=mysqli_fetch_array($resultado);
                
            }else{
                echo "Ocurrio un error inesperado.";   
            }
   ?>

   <div style="height: 680px;padding-top:50px">

        <h2 style="text-align:center; color:rgb(176,20,43);"class="center">Actualizar Producto</h2><br><br><br>

         <form class="row g-3" method="post" action="actualizarPro.php?<?php echo 'IdProducto='.$IdProducto.''?>" >


                <div class="formCita">
                               

                    <div class="grupo">
                        <label for="">Nombre Producto</label><br><br>
                        <input type="text" name="Nombre" id="Nombre" required value="<?php echo $fila['Nombre'];?>"><span class="barra"></span>
                    </div>


                    <div class="grupo">
                        <label for="">Descripcion</label><br><br>
                        <input type="text" name="Descripcion" id="Descripcion" required value="<?php echo $fila['Descripcion'];?>"><span class="barra"></span>
                    </div>




                    <div class="grupo">
                        <label for="">Stock</label><br><br>
                        <input type="number" name="Stock" id="Stock" required value="<?php echo $fila['Stock'];?>"><span class="barra"></span>
                    </div>


                    <div class="grupo">
                        <label for="">PrecioVenta</label><br><br>
                        <input type="number" name="PrecioVenta" id="PrecioVenta" required value="<?php echo $fila['PrecioVenta'];?>"><span class="barra"></span>
                    </div>



                    <div class="grupo">
                        <label for="">Imagen</label><br><br>
                        <input type="file" name="Imagen" id="Imagen" required value="<?php echo $fila['Imagen'];?>"><span class="barra"></span>
                    </div>




                    <div class="grupo">
                        <label1>FechaCreacion</label1><br><br>
                        <input type="text" name="FechaCreacion" id="FechaCreacion" required value="<?php echo $fila['FechaCreacion'];?>"><span class="barra"></span>
                    </div>       
                    
                    
                    <button class="btn btnRegistrarUsuario"type="submit" name="register" style="text-align:center">Registrar</button>


                </div><br><br>



            </form> 
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
