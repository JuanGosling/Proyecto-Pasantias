<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una Cuenta</title>
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    
        <div class="inicio">

            <?php

                require_once '../INCLUDES/Usuario.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {

                    $error = true;

                    $email = trim($_POST['email']);
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $contraseña = $_POST['contraseña'];

                    if ( $email === '' || $nombre === '' || $apellido === '' ||$contraseña === ''){
                        ?>
                            <div class="alert alert-danger" role="alert" style="text-align:center">Porfavor llena todos los campos solicitados.</div>
                        <?php
                        $error = false;
                    }

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        ?>
                            <div class="alert alert-danger" role="alert" style="text-align:center">El email no es valido.</div>
                        <?php
                        $error = false;
                    }

                    $user = new User();

                    if ($user->existeEmail($email)) {
                        ?>
                            <div class="alert alert-danger" role="alert" style="text-align:center">El correo electronico al parecer esta en uso . Intenta iniciar sesion.</div>
                        <?php
                        $error = false;
                    }

                    if($error){
                        $user->registrar($_POST['email'],$_POST['nombre'],$_POST['apellido'], $_POST['contraseña']);

                        ?>
                        <div class="alert alert-success" role="alert" style="text-align:center">Cuenta registrada! <b>Te hemos enviado un mail a tu correo para verificar tu cuenta.</b></div>
                        <?php
                    }

                }

            ?>

            <form method="post" id="formulario" >

                <h1>Crear una Cuenta</h1>

                <div class="cajadetexto">

                    <input type="email" name="email" id="email" placeholder="Ingrese su Correo Electronico" required>

                    <img src="../IMG/mail.png" class="icono">

                </div>

                <div class="cajadetexto">

                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre" required>

                    <img src="../IMG/user.png" class="icono">

                </div>

                <div class="cajadetexto">

                    <input type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido" required>

                    <img src="../IMG/user.png" class="icono">


                </div>

                <div class="cajadetexto">

                    <input type="password" name="contraseña" id="contraseña" placeholder="Ingrese una Contraseña" required>

                    <img src="../IMG/cerrado.png" class="icono" id="ojo" style="cursor: pointer;">

                </div>

                <div class="cajadetexto">

                    <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" placeholder="Repita su Contraseña" required>

                    <img src="../IMG/cerrado.png" class="icono" id="ojo1" style="cursor: pointer;">

                    <span id="error" class="error"></span>

                </div>


                <div class="boton">

                    <button type="submit" class="btn" name="registrar">Crear Cuenta</button>

                </div>

                <div class="iniciar">

                    <p>Ya tienes una Cuenta?<a href="login.php" style="padding-left: 10px;">Iniciar Sesión</a></p>

                </div>

            </form>

        </div>

        <script>

            // ----- Ver y ocultar las contraseñas

            let ojo = document.getElementById("ojo");
            let contraseña = document.getElementById("contraseña");

            ojo.onclick = function(){

                if(contraseña.type == "password"){
                    contraseña.type = "text";
                    ojo.src = "../IMG/abierto.png";
                }

                else{
                    contraseña.type = "password";
                    ojo.src = "../IMG/cerrado.png";
                }

            }

    

            let ojo1 = document.getElementById("ojo1");
            let confirmar_contraseña = document.getElementById("confirmar_contraseña");

            ojo1.onclick = function(){

                if(confirmar_contraseña.type == "password"){
                    confirmar_contraseña.type = "text";
                    ojo1.src = "../IMG/abierto.png";
                }

                else{
                    confirmar_contraseña.type = "password";
                    ojo1.src = "../IMG/cerrado.png";
                }

            }

            // ----- Verificar que las contraseñas coincidan

            const formulario = document.getElementById('formulario');
            const errorMessage = document.getElementById('error');

            formulario.addEventListener('submit', function (event) {
                if (contraseña.value !== confirmar_contraseña.value) {
                    event.preventDefault(); // Detiene el envío del formulario
                    errorMessage.textContent = "Las contraseñas no coinciden.";
                } else {
                    errorMessage.textContent = ""; // Limpia el mensaje si todo está bien
                }
            });

        </script>

</body>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>