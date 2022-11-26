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
    <!-- ---------------------------------------------------------------------------------------------------->
    <title>Administrador | PELUQUERIA</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

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
            <div class="content-area col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-15 col-md-10 col-sm-2">
                    <form class = "cita-form" action="registrarCita.php" method="POST" name="register">
                        <div class="formCita">
                            <span class="cita-form-title">Registro de nueva Cita</span>
                            <div class="grupo">
                                <label1>Cliente</label1><span class="barra"></span>
                                <select name="idCliente" id="idCliente">
                                    <option value="" selected disabled>Seleccione el Cliente</option>
                                    <?php
                                    $conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
                                    $query = "SELECT * FROM cliente";
                                    $resultado = mysqli_query($conexion, $query);
                                    ?>
                                    <?php foreach ($resultado as $opciones) : ?>
                                        <option value="<?php echo $opciones['idCliente'] ?>"><?php echo $opciones['NombreCliente'] ?> <?php echo $opciones['ApellidoCliente'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="grupo">
                                <label1>Empleado a realizar:</label1><span class="barra"></span>
                                <select name="idUsuario" id="idUsuario">
                                    <option value="" selected disabled>Seleccione el Empleado</option>
                                    <?php
                                    $conexion=mysqli_connect("localhost", "u277099965_Beaty", "Beatysalon123", "u277099965_Beatysalon");
                                    $query = "SELECT * FROM usuario";
                                    $resultado = mysqli_query($conexion, $query);
                                    ?>
                                    <?php foreach ($resultado as $opciones) : ?>
                                        <option value="<?php echo $opciones['idUsuario'] ?>"><?php echo $opciones['Nombre'] ?> <?php echo $opciones['Apellido'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="grupo">
                                <label1>Fecha de Cita</label1>
                                <input type="date" value="2022-10-25" min="2022-10-25" max="2022-11-25" name="fechaCita" id="fechaCita" required><span class="barra"></span>

                            </div><br>
                            <div class="grupo">
                                <label for="">Hora de Cita</label>
                                <input type="time" min="08:00" max="21:00" name="hrCita" id="hrCita" required><span class="barra"></span>
                            </div>
                            <div class="grupo">
                                <label1>Tipo de cliente</label1></br></br>
                                <select class="select sProductos" name="tipoCliente">
                                    <option value="" selected disabled>Seleccione el tipo de Cliente</option>
                                    <option value="Cliente Nuevo">Cliente Nuevo</option>
                                    <option value="Cliente Regular">Cliente Regular</option>
                                </select>
                            </div>
                            <div class="grupo">
                                <label1>Tipo de Servicio</label1></br></br>
                                <select class="select sProductos" name="tipoServicio">
                                    <option value="" selected disabled>Seleccione el tipo de Servicio</option>
                                    <option value="Primer Servicio">Primer Servicio</option>
                                    <option value="Segundo Servicio">Segundo Servicio</option>
                                    <option value="Tercer Servicio">Tercer Servicio</option>
                                    <option value="Cuarto Servicio">Cuarto Servicio</option>
                                </select>
                            </div>
                            <button class="btn btnRegistrarCita" type="submit">Registrar</button>
                            <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            navigation.classList.toggle('active')
            main.classList.toggle('active')
        }

        let list = document.querySelectorAll('.navigation li');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink));
    </script>

</body>

</html>