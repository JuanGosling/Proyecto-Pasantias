<?php

require_once '../vendor/autoload.php';

$resend = Resend::client('re_KXsZ9Yuv_4gLK5VHWy5Lz6LvE6mEPhkmy');

$email = 'holaverdemejor360@gmail.com';

$resend->emails->send([
        'from' => 'Módulo 23 <soporte-modulo23@resend.dev>',
        'to' => $email,
        'subject' => 'Verificar tu cuenta',
        'html' => "<p>Gracias por registrarte. Haz clic en el siguiente enlace para activar tu cuenta:</p>
                    <p><a href=''>TEST</a></p>"
        ]);