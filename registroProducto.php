<?php
     session_start();
     error_reporting(0);
     $varsesion = $_SESSION['Username'];
     if($varsesion == null || $varsesion==''){
         echo 'No autorización - inicie sesión.';
         die();
     }


     $txtImagen=(isset($_FILES['txtImagen']['name'] ))?$_FILES['txtImagen']['name']:"";

/*
     

*/



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Links css, bootstrap, librerias-->
	<link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="ssstyle.css">
  <link rel="stylesheet" type="text/css" href="stylefr.css">
	<!-- ---------------------------------------------------------------------------------------------------->
  <title>Administrador | PELUQUERIA</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<body class="bd menu"> 
<div class="container">

<!-- MENU IZQUIERDA-->
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
<!-- MENU IZQUIERDA-->



        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
<!-- BUSCADOR-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Busca aquí">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <!-- IMAGEN-->
                <div class="user">
                    <img src="images/user.jpg">
                </div>
            </div>


<!-- CONTENEDOR DE REGISTRO DE PRODUCTO-->

         
          
          



     

            
                <div class="content-area col-lg-7 col-md-12 col-sm-12 col-xs-12">
                  <div class="col-lg-15 col-md-10 col-sm-2">
                
                
                  <form class="cita-form" method="post" action="registrarProductos.php" enctype="multipart/form-data">
                    <div class="formCita">
                    <h1>Registro de Productos</h1> 

                            <div class="col-12">
                            Nombre: <br>
                              <input type="text" class="form-control" name="Nombre" id="Nombre" onkeypress="return soloLetras(event)">
                            </div>

                            <div class="col-12">
                            Descripcion: <br>
                              <input style="height:120px"; type="text" class="form-control" placeholder="Descripcion" name="Descripcion" id="Descripcion">
                            </div>

                            <div class="col-12">
                            Cantidad: <br>
                              <input type="number" class="form-control" placeholder="Cantidades existentes" name="Stock" id="Stock" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required/>
                            </div>

                            <div class="col-12">
                            Precio: <br>
                              <input type="number" class="form-control" placeholder="Precio Venta (decimales)" name="PrecioVenta" id="PrecioVenta">
                            </div>





                            <div class="col-12">
                            Imagen: <br>
                              
                                 
                              <input type="file" name="Imagen"  id="Imagen"  placeholder="IMAGEN" accept="image/*" />
                            </div>


                            



                              
                         


                            <div class="col-12">
                            Fecha: <br>
                              <input type="text"  class="form-control" placeholder="FechaCreacion" name="FechaCreacion" id="FechaCreacion" disabled>
                            </div>


                            <br><br><br><br>

                            <div class="col-12" style="text-align:center;">
                              <button style="background-color:rgb(176,20,43); border-color:rgb(176,20,43);" type="submit" class="btn btn-primary" name="register">Registrar</button>
                            </div>
                      </div><br><br>
                  </form>
                </div>
              </div>


            </div><!-- MAIN-->
    



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
        <script>
            function soloLetras(e) {
          var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;
      
          for (var i in especiales) {
            if (key == especiales[i]) {
              tecla_especial = true;
              break;
            }
          }
      
          if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
          }
        }
        
    </script>

</body>

</html>