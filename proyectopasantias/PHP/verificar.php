<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar tu Cuenta</title>
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
                $usuario->verificar($_GET['token']);
            }

        ?>

    </div>

</body>
</html>