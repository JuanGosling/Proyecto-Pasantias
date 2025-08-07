<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    
        <div class="inicio">

            <!-- Se Incluye el Archivo php . Funciona para Mostrar mensajes de Error o Exito provenientes del Archivo php !-->

            <?php include ("registerphp.php")?>

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

                    <p>Ya tienes una Cuenta?<a href="../php/login.php" style="padding-left: 10px;">Iniciar Sesión</a></p>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</html>