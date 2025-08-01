<?php

    

    // Se solicita la conexion a la Base de Datos para continuar

    include ("conexion.php");

    // Se cargan los Datos solo si hay un Metodo POST y si se dio click al boton de Crear una Cuenta ( Registrar )

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])){

        // Se verifica que los Campos no esten vacios y se continua para Ingresar Sesion - En caso contrario se manda un mensaje de error que dice que se llenen los Campos

        if(
            strlen($_POST['email']) >=1 &&
            strlen($_POST['nombre']) >=1 &&
            strlen($_POST['apellido']) >=1 &&
            strlen($_POST['contraseña'])>=1
        ) {

            // Se almacena en variables lo que puso el Usuario en los Campos

            $email = trim($_POST['email']);
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            // Aca a su vez se Encripta la Contraseña

            $contraseña = password_hash($_POST['contraseña'],PASSWORD_DEFAULT); 

            // Se hace una consulta para verificar si el Email ingresado por el usuario esta en la Base de Datos

            $consulta = "SELECT * FROM usuario WHERE Email = '$email' ";

            $resultado = mysqli_query($conexion,$consulta);

            $numero_registros = mysqli_num_rows($resultado);

            // Se verifica que el Email exista , es decir si es 0 no existe , si es 1 existe

            if($numero_registros != 0){

                // En caso de que exista Se manda un mensaje de error diciendo que el Email Ingresado ya esta en nuestra Base de Datos
                
                ?>
                <div class="alert alert-danger" role="alert" style="text-align:center">El correo electronico al parecer esta en uso . Intenta iniciar sesion</div>
                <?php

            }

            // En caso de que no exista el Email en la Base de Datos se cargan los Datos a la Base de Datos

            else {
                
                $consulta = "INSERT INTO usuario (ID_Usuario,Email,Nombre,Apellido,Contraseña) VALUES(null,'$email','$nombre','$apellido','$contraseña')";

                $resultado = mysqli_query($conexion,$consulta);

                if($resultado){

                    // Se muestra un mensaje de que se cargaron los Datos (Un mensaje inutil debido a que no se llega a ver)

                    ?>
                    <div class="alert alert-success" role="alert" style="text-align:center">Cuenta registrada! <a href="login.php">Iniciar Sesión</a></div>
                    <?php

                    // Realizar una Verificacion de Email y del Email redirigir al Inicio de Sesion

                }

                // En caso de que no se puedan Cargar los Datos a la Base de Datos se muestra un error

                else{

                    ?>
                    <div class="alert alert-danger" role="alert" style="text-align:center">Ups! Ocurrio un Error . Intente denuevo mas tarde</div>
                    <?php
            
                }

            }

        }

        // En caso de no se hallan llenado los Campos al principio se envia un mensaje para que se llenen los campos

        else {

            ?>
            <div class="alert alert-danger" role="alert" style="text-align:center">Porfavor llena todos los campos solicitados.</div>
            <?php

        }

    }   

?>