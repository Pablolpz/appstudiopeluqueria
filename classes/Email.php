<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        
        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado una cuenta en AppSalon, confirma
        tu cuenta para poder validar tu usuario</p>";
        $contenido .= "<p>Haz Click aqui: <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token="
         . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste una cuenta, ignora este mensaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;

        $mail->send();

        // Debuguear los errores
        if($mail->send()){
            echo 'Mensaje enviado';
        }else{
            echo 'El mensaje no puede ser enviado';
            echo 'PHPMailer Error: ' . $mail->ErrorInfo;
        }
    } 

    public function enviarInstrucciones() {
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu contraseña';
        
        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Sigue el siguiente enlace para poder 
        reestablecer tu contraseña</p>";
        $contenido .= "<p>Haz Click aqui: <a href='" . $_ENV['APP_URL'] . "/recuperar?token="
         . $this->token . "'>Reestablecer contraseña</a> </p>";
        $contenido .= "<p>Si tu no solicitaste una cuenta, ignora este mensaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;

        $mail->send();

        // Debuguear los errores
        if($mail->send()){
            echo 'Mensaje enviado';
        }else{
            echo 'El mensaje no puede ser enviado';
            echo 'PHPMailer Error: ' . $mail->ErrorInfo;
        }        
    }
}