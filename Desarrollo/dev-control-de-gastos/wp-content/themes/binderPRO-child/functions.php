<?php
/**
 * Child Theme Functions File
 */

/**
 * To extend or modify the functions present in the parent theme, both in functions.php or in extras.php
 * files, copy the function to this file and modify it according to your needs.
 *
 * Keep in mind that this file (unlike what happens with the style.css file) will load BEFORE the parent
 * theme functions.php file, which is why any function declared both here and in the original functions.php
 * file will be overriden for whatever you include here.
 */

// Happy editing...

add_action('phpmailer_init','send_smtp_email');
function send_smtp_email( $phpmailer )
{
    // Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La dirección del HOST del servidor de correo SMTP p.e. smtp.midominio.com
    $phpmailer->Host = "smtp.gmail.com";
 
    // Uso autenticación por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "587";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "aacevedo@dayscript.com";
 
    // Contraseña para la autenticación SMTP
    $phpmailer->Password = "Afar900412506061013611324";
 
    // El tipo de encriptación que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    $phpmailer->From = "aacevedo@dayscript.com";
    $phpmailer->FromName = "Ariel";
}

