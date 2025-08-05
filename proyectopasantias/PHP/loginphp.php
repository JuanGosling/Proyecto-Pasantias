<?php

    session_start();

    // Se solicita la conexion a la Base de Datos para continuar

    include ("conexion.php");

    // Se cargan los Datos solo si hay un Metodo POST y si se dio click al boton de Iniciar Sesion

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['iniciarsesion'])){

        // Se verifica que los Campos no esten vacios y se continua para Ingresar Sesion - En caso contrario se manda un mensaje de error que dice que se llenen los Campos

        if(
            strlen($_POST['email']) >=1 &&
            strlen($_POST['contraseña']) >=1
        ) {

        // Se almacena en variables lo que puso el Usuario en los Campos

        $email = trim($_POST['email']) ;
        $contraseña = $_POST['contraseña'];

        // Se hace una consulta para verificar que el Email ingresado por el usuario esta en la Base de Datos

        $consulta = "SELECT * FROM usuario WHERE Email = '$email' ";

        $resultado = mysqli_query($conexion,$consulta);

        $numero_registros = mysqli_num_rows($resultado);

        // Se Obtiene la Contraseña Encriptada de la Base de Datos para poder compararla con la que escribio el Usuario

        $stmt = $conexion->prepare("SELECT Contraseña FROM usuario WHERE Email = '$email'");
        $stmt->execute();
        $result = $stmt->get_result();

        // Se verifica que el Email exista , es decir si es 0 no existe , si es 1 existe

        if($numero_registros != 0){

            // Se sigue la operacion para obtener la Contraseña Encriptada de la Base de Datos para poder compararla con la que escribio el Usuario

            $row = $result->fetch_assoc();
            $contraseña_hasheada = $row['Contraseña'];

            // Se compara la Contraseña ingresada por el usuario con la Contraseña Encriptada que hay en la Base de Datos para poder Iniciar Sesion

            if(password_verify($contraseña, $contraseña_hasheada)){

                // Se manda un mensaje el cual indica que se Inicio Sesion ( Lo mas probable es que este mensaje no se llegue a ver )

                ?>
                    <div class="alert alert-success" role="alert" style="text-align:center">Inicio de sesión exitoso!</div>
                <?php

                //Se redirige a la Pagina Principal
                //Faltaria Agregar el Inicio de la Sesion

                $_SESSION['email'] = $email;

                header("Location:../index1.php");
                exit();

            }  
            
            // En caso de que la contraseña este mal escrita se manda un mensaje de error

            else{
                ?>
                    <div class="alert alert-danger" role="alert" style="text-align:center">El email y/o contraseña son incorrectos</div>
                <?php
            }  

        }

        // En caso de que no se encuentre el Email Ingresado se manda un mensaje el cual dice que no existe en nuestra Base de Datos

        else{

            $consulta = "SELECT * FROM usuario WHERE Email = '$email'";
            
            $resultado = mysqli_query($conexion,$consulta);

            $numero_registros = mysqli_num_rows($resultado);

            if($numero_registros === 0){
                ?>
                    <div class="alert alert-danger" role="alert" style="text-align:center">El email y/o contraseña son incorrectos</div>
                <?php
            }

        }

        }
        
        /* En caso de que no se halla cumplido la condicion de que los campos esten completados se manda un error 
        (Este es un mensaje que tampoco se podria ver , debido a que en el formulario se especifico que los campos tienen que ser rellenados gracias a la funcion "required")
        por lo tanto es inutil , pero en caso de que halla errores es una segunda medida para que no se envien formularios vacios
        */

        else{
        ?>
            <div class="alert alert-danger" role="alert" style="text-align:center">Porfavor llena todos los campos solicitados.</div>
        <?php
        }

    }

    

?>