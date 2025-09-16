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
        $expira = date("Y-m-d H:i:s", strtotime("+1 second"));

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

        $stmt = $this->conn->prepare("SELECT ID_Usuario , token_verificacion, token_expira FROM usuarios WHERE Email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            if (strtotime($usuario['token_expira']) > time()) {
                ?>
                    <div class="alert alert-warning" role="alert" style="text-align:center;padding-top:5%">Ya se envió un enlace de verificación. Revisa tu correo</div>
                <?php
            }

            else{

                $token = bin2hex(random_bytes(32));
                $expira = date("Y-m-d H:i:s", strtotime("+1 day"));

                $stmt = $this->conn->prepare("UPDATE usuarios SET token_verificacion = ?, token_expira = ? WHERE ID_Usuario = ?");
                $stmt->execute([$token, $expira, $usuario['ID_Usuario']]);

                $this->enviarMail($email, $token);

                ?>
                    <div class='alert alert-success' style="text-align: center;padding-top:5%">Se ha enviado un nuevo mail para verificar tu cuenta!</b></a></div>
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

}
