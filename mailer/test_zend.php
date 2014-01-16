
<?php

$directorio_raiz_zend = "/home/avieylka/public_html/"; /* El directorio que contiene el Zend Framework */

ini_set('include_path',ini_get('include_path').':'.$directorio_raiz_zend.'Zend');
ini_set('include_path',ini_get('include_path').':'.$directorio_raiz_zend);
 
/**
Incluir los scripts necesarios y solo los necesarios ;-)
 */
include $directorio_raiz_zend.'Zend/Mail.php';
include $directorio_raiz_zend.'Zend/Mail/Protocol/Smtp/Auth/Login.php';
include $directorio_raiz_zend.'Zend/Mail/Transport/Smtp.php';


$config = array('ssl' => 'ssl',
                'port' => 465,
                'auth' => 'login',
                'username' => '{AKIAJBPZYHSFLZN5RQ6Q}',
                'password' => '{AnH/c7At4nNXKOtsoJ1KjOKLtTg4eTaGG8ugnQleL19L}');

$smtp_host      = "email-smtp.us-east-1.amazonaws.com"; 

$transport      = new Zend_Mail_Transport_Smtp($smtp_host, $config);

$mail           = new Zend_Mail();
$mail->setBodyText('Texto de un email de texto');
$mail->setFrom('do_not_reply@myfiveby.com', 'myfiveby.com   '); /* Tiene que estar verificado en Amazon SES */
$mail->addTo('garciatoscano@gmail.com', 'Nombre destinatario');
$mail->setSubject('Prueba de envio');
$mail->send($transport);

?>