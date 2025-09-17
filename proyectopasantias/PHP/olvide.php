<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" href="../IMG/Logo4.png" type="image/png">
    <link rel="stylesheet" href="../BOOTSTRAP_v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
        <div class="inicio">

            <?php
                require_once '../INCLUDES/Usuario.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviarmail'])) {

                    $email = trim($_POST['email']);

                    if ( $email === ''){
                        ?>
                            <div class="alert alert-danger" role="alert" style="text-align:center">Porfavor llena todos los campos solicitados.</div>
                        <?php
                    }

                    else{

                        $usuario = new User();

                        $usuario->olvide($_POST['email']);


                    }

                }
    
            ?>

            <form method="post">

                <h1 style="font-size:25px">Restablecer Contraseña</h1>

                <div class="cajadetexto">

                    <p style="text-align:center">Escribe tu Email para enviar un correo para restablecer tu contraseña</p>

                </div>

                <div class="cajadetexto">

                    <input type="email" placeholder="Correo Electronico" name="email" id="email" required>

                    <img src="../IMG/mail.png" class="icono">

                </div>


                <div class="boton">

                    <button type="submit" class="btn" name="enviarmail">Enviar Mail</button>

                </div>
                
            </form>

        </div>

</body>

<script src="../BOOTSTRAP_v5.3/js/bootstrap.bundle.min.js"></script>

</html>