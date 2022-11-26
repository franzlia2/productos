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
            <a href="registroCita.php"><button class="btn_reg" type="submit" name="register">Registrar Cita</button></a>
            <br><br><br>
            <div class="grupo">
                <select class="sPro" name="tipoCliente" style="width: 120px" onchange="window.location.href=this.value">
                    <option value="" selected disabled>Ver Estados Citas</option>
                    <option value="CitasPendiente.php">Pendiente</option>
                    <option value="CitasRealizado.php">Realizado</option>
                    <option value="CitasPospuesto.php">Pospuesto</option>
                    <option value="CitasCancelado.php">Cancelado</option>
                </select>
            </div>
            <div class="bloque">
                <span class="cita-form-title">Registro de las Citas</span><br><br><br>
        <?php 
      
        echo '<table class="tabla2" border="3" cellspacing="30" cellpadding="8" BGCOLOR="#FFD1DC">
              <tr> 
                  <td>Nombre Cliente</td> 
                  <td>Apellido Cliente</td> 
                  <td>Fecha de la cita</td>
                  <td>Hora de la cita</td>
                  <td>Tipo de cliente</td>
                  <td>Estado</td>
                  <td>Tipo de Servicio</td>
                  <td>Empleado a realizar</td>
                  <td>Editar</td> 
                  <td>Eliminar</td> 
              </tr>';
        
        $conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
        $query = "SELECT c.idCita, cli.NombreCliente, cli.ApellidoCliente, c.Fecha, c.Hora, c.TipoCliente, c.Estado, c.TipoServicio, usu.Nombre 
        FROM cita c INNER JOIN cliente cli ON c.idCliente= cli.idCliente INNER JOIN usuario usu ON c.idUsuario = usu.idUsuario";

        $consulta=$conexion->query($query);

            while ($fila = $consulta->fetch_assoc()) {

                echo '<tr>  
                          <td>'.$fila["NombreCliente"].'</td> 
                          <td>'.$fila["ApellidoCliente"].'</td> 
                          <td>'.$fila["Fecha"].'</td> 
                          <td>'.$fila["Hora"].'</td> 
                          <td>'.$fila["TipoCliente"].'</td> 
                          <td>'.$fila["Estado"].'</td> 
                          <td>'.$fila["TipoServicio"].'</td> 
                          <td>'.$fila["Nombre"].'</td> 
                          <td><a href="../create/updateCi.php?idCita='.$fila["idCita"].';"><button class="btn_edit"><span class="icon"><ion-icon name="pencil-sharp"></ion-icon></span></button></a></td> 
                          <td><a href="../create/deleteCi.php?idCita='.$fila["idCita"].';"><button class="btn_elim"><span class="icon"><ion-icon name="trash-sharp"></ion-icon></span></button></a></td>  
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