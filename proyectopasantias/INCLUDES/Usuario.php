<?php
require_once 'conexion.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function existeEmail($email) {
        $stmt = $this->conn->prepare("SELECT ID_Usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    public function registrar($email ,$nombre, $apellido, $password, $rol = 'Usuario') {

        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime("+1 day"));

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (Email,Nombre, Apellido ,Contraseña, Rol , token_verificacion , token_expira) VALUES (?, ?, ?, ?, ? , ?, ?)");

        $this->enviarMail($email, $token);

        return $stmt->execute([$email, $nombre, $apellido , $hash, $rol , $token , $expira]);

    }

    public function enviarMail($email , $token){

        require_once '../vendor/autoload.php';

        $resend = Resend::client('re_KXsZ9Yuv_4gLK5VHWy5Lz6LvE6mEPhkmy');

        $link = "http://localhost/proyectopasantias/PHP/verificar.php?token=".$token;

        $resend->emails->send([
        'from' => 'Módulo23 <soporte-modulo23@resend.dev>',
        'to' => $email,
        'subject' => 'Verificar tu cuenta',
        'html' => "<p>Gracias por registrarte. Haz click en el siguiente enlace para activar tu cuenta:</p>
                    <p><a href='$link'>$link</a></p>"
        ]);

    }

    public function verificar($token){

        $stmt = $this->conn->prepare("SELECT ID_Usuario, Email ,token_expira, verificado FROM usuarios WHERE token_verificacion = ?");
        $stmt->execute([$token]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (strtotime($usuario['token_expira']) > time()) {
                $update = $this->conn->prepare("UPDATE usuarios SET verificado = 1, token_verificacion = NULL, token_expira = NULL WHERE ID_Usuario = :ID_Usuario");
                $update->execute([':ID_Usuario' => $usuario['ID_Usuario']]);
                ?>
                    <div class='alert alert-success' style="text-align: center;">Cuenta verificada correctamente! ya puedes <a href="login.php"><b>Iniciar Sesión</b></a></div>
                <?php
                        
            } 
            else {
                
                ?>
                    <div class='alert alert-danger' style="text-align: center;">
                        
                        <div>
                            El tiempo para verificar tu cuenta ha expirado. Haz click en <b>Reenviar Mail</b> para recibir un nuevo link para verificar tu cuenta.
                        </div>

                        <div style="padding-top:5%">
                            <a href="reenviar.php?email=<?php echo urlencode($usuario['Email']); ?>" class="btn" style="padding-left: 60px;padding-right: 60px;" >Reenviar Mail</a>
                        </div>

                    </div>
                <?php
            }
                
        } 
        else {
            ?>
             <div class='alert alert-danger' style="text-align: center;">Link invalido o cuenta ya verificada</div>
            <?php
        }

    }

    public function reenviarMail($email){

        $stmt = $this->conn->prepare("SELECT ID_Usuario , verificado ,token_verificacion, token_expira FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            if ($usuario['verificado'] == 1) {

                ?>
                    <div class='alert alert-success' style="text-align: center;padding-top:5%">Tu cuenta ya esta verificada. <br> Puedes <a href="login.php"><b>Iniciar Sesión</b></a></div>
                <?php

            }

            else if (strtotime($usuario['token_expira']) > time()) {
                ?>
                    <div class="alert alert-warning" role="alert" style="text-align:center;padding-top:5%">Ya se envió un mail para verificar tu cuenta. <br> Revisa tu correo</div>
                <?php
            }

            else{

                $token = bin2hex(random_bytes(32));
                $expira = date("Y-m-d H:i:s", strtotime("+1 day"));

                $stmt = $this->conn->prepare("UPDATE usuarios SET token_verificacion = ?, token_expira = ? WHERE ID_Usuario = ?");
                $stmt->execute([$token, $expira, $usuario['ID_Usuario']]);

                $this->enviarMail($email, $token);

                ?>
                    <div class='alert alert-success' style="text-align: center;padding-top:5%">Se ha enviado un nuevo mail para verificar tu cuenta!</a></div>
                <?php

            } 

        }

        else {
            ?>
             <div class='alert alert-danger' style="text-align: center;">Error al intentar reenviar el mail . Intente de nuevo mas tarde</div>
            <?php
        }

    }

    public function noEstaVerificado($email){

        $stmt = $this->conn->prepare("SELECT verificado FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            return $usuario['verificado'] == 0; // true si no esta verificado false si lo esta
        }

        return false;

    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['Contraseña'])) {
            return $usuario;
        }

        return false;
    }

    public function olvide($email){

        $stmt = $this->conn->prepare("SELECT ID_Usuario  , token_password , password_expira FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            if (strtotime($usuario['password_expira']) > time()) {
                ?>
                    <div class="alert alert-warning" role="alert" style="text-align:center;padding-top:5%">Ya se envió un mail para restablecer tu contraseña. <br> Revisa tu correo</div>
                <?php
            }

            else{
                
                $token = bin2hex(random_bytes(32));
                $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

                $stmt = $this->conn->prepare("UPDATE usuarios SET token_password = ?, password_expira = ? WHERE ID_Usuario = ?");
                $stmt->execute([$token, $expira , $usuario['ID_Usuario']]);

                require_once '../vendor/autoload.php';

                $resend = Resend::client('re_KXsZ9Yuv_4gLK5VHWy5Lz6LvE6mEPhkmy');

                $link = "http://localhost/proyectopasantias/PHP/restablecer.php?token=".$token;

                $resend->emails->send([
                'from' => 'Módulo23 <soporte-modulo23@resend.dev>',
                'to' => $email,
                'subject' => 'Restablecer tu contraseña',
                'html' => "<p>Haz click en el siguiente enlace para restablecer tu contraseña:</p>
                            <p><a href='$link'>$link</a></p>"
                ]);

                ?>
                    <div class='alert alert-success' style="text-align: center;padding-top:5%">Se ha enviado un mail a tu correo para restablecer tu contraseña.</a></div>
                <?php

            }

        }

        else{

            ?>
            <div class="alert alert-danger" role="alert" style="text-align:center">El correo electronico ingresado es incorrecto o no existe</div>
            <?php

        }

    }

    public function restablecer($token){

        $stmt = $this->conn->prepare("SELECT ID_Usuario , password_expira FROM usuarios WHERE token_password = ?");
        $stmt->execute([$token]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario){

            if (strtotime($usuario['password_expira']) > time()) {
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {

                    $hash = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
                    $stmt = $this->conn->prepare("UPDATE usuarios SET Contraseña = ?, token_password = NULL, password_expira = NULL WHERE ID_Usuario = ?");

                    $stmt->execute([$hash, $usuario['ID_Usuario']]);

                    ?>
                        <div class='alert alert-success' style="text-align: center;padding-top:5%">Contraseña actualizada. <br> Ya puedes <a href="login.php"><b>Iniciar Sesión</b></a></div>
                    <?php

                }

                ?>

                    <form method="post" id="formulario">

                        <h1 style="font-size:25px">Restablecer Contraseña</h1>

                        <div class="cajadetexto">

                            <input type="password" name="contraseña" id="contraseña" placeholder="Ingrese una nueva Contraseña" required>

                            <img src="../IMG/cerrado.png" class="icono" id="ojo" style="cursor: pointer;">

                        </div>

                        <div class="cajadetexto">

                            <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" placeholder="Repita su Contraseña" required>

                            <img src="../IMG/cerrado.png" class="icono" id="ojo1" style="cursor: pointer;">

                            <span id="error" class="error"></span>

                        </div>


                        <div class="boton">

                            <button type="submit" class="btn" name="actualizar" style="padding-left: 60px;padding-right: 60px;">Actualizar Contraseña</button>

                        </div>
                        
                    </form>

                <?php
                
            }

            else{

                ?>
                    <div class='alert alert-danger' style="text-align: center;">
                        El tiempo para restablecer tu contraseña ha expirado . Vuelve al <a href="login.php"><b>Inicio de Sesion</b></a> para intentarlo de nuevo
                    </div>
                <?php

            }

        }

        else{

            ?>
             <div class='alert alert-danger' style="text-align: center;">Link invalido o contraseña ya actualizada</div>
            <?php

        }

    }

}
