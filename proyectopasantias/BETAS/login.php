<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
        <div class="inicio">

            <!-- Se Incluye el Archivo php . Funciona para Mostrar mensajes de Error o Exito provenientes del Archivo php !-->

            <?php include ("loginphp.php")?>

            <form method="post">

                <h1>Inicio de Sesión</h1>

                <div class="cajadetexto">

                    <input type="email" placeholder="Correo Electronico" name="email" id="email" required>

                    <img src="../IMG/mail.png" class="icono">

                </div>

                <div class="cajadetexto">

                    <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" required>

                    <img src="../IMG/cerrado.png" class="icono" id="ojo" style="cursor: pointer;">

                </div>

                <div class="boton">

                    <button type="submit" class="btn" name="iniciarsesion">Iniciar Sesión</button>

                </div>
                

                <div class="registrarse">

                    <p>No tienes una Cuenta? <a href="../php/register.php" style="padding-left: 10px;">Crear una Cuenta</a></p>

                </div>

                <div class="recordarme-contraseña" style="justify-content : center">

                    <a href="">Olvide mi Contraseña</a>

                </div>

            </form>

        </div>

        <script>

            // ----- Ver y ocultar la contraseña

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

        </script>

</body>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>