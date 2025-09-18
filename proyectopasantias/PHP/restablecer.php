<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraseña</title>
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    
    <div class="inicio">

        <?php

            require_once "../INCLUDES/Usuario.php";

            if (isset($_GET['token'])) {
                $usuario = new User();
                $usuario->restablecer($_GET['token']);
            }

        ?>

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
</html>