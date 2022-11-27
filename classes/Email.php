<?php


namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){

        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        
        // CREAR EL OBJETO DE EMAIL

        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8c9ea64acdc21b';
        $mail->Password = '9066b930a537d0';
        $mail->setFrom('cuantaSam@appsalon.com');
        $mail->addAddress('cuentaSam@appsalon.com','AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // USAMOS HTML

        $mail->isHTML(TRUE);
        $mail->CharSet ='UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p> Presiona aqui: <a href='https://aqueous-earth-44156.herokuapp.com/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // ENVIAR EMAIL

        $mail -> send();
    }

    public function enviarInstrucciones(){
         // CREAR EL OBJETO DE EMAIL

        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8c9ea64acdc21b';
        $mail->Password = '9066b930a537d0';
        $mail->setFrom('cuantaSam@appsalon.com');
        $mail->addAddress('cuentaSam@appsalon.com','AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

         // USAMOS HTML
        $mail->isHTML(TRUE);
        $mail->CharSet ='UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p> Presiona aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a> </p>";
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        // ENVIAR EMAIL

        $mail -> send();
    }
}
