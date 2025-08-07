<?php

    // Se definen la conexion teniendo en cuenta nuestra Base de Datos

    // Verificar que en PhpMyAdmin la Base de Datos tenga el mismo Nombre que especificamos aca

    define('servidor','localhost');
    define('usuario','root');
    define('contraseña','');
    define('bdd','proyectopasantias');

    // Se hace la Conexion a la Base de Datos

    $conexion = mysqli_connect(servidor,usuario,contraseña,bdd);

    // En caso de que halla un error se muestra un mensaje

    if($conexion === false){
        die("ERROR EN LA CONEXÍON " . mysqli_connect_error());
    }

    /*

    Para corroborar la conexion

    else{
        echo 'CONEXION EXITOSA';
    }
    
    */

?>