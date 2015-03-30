<?php
// Feedback v.0.1
// Balakadesign, 2013
// info@yuriybalaka@gmail.com
//


// ========== MESSAGE LANGUAGE ==========
// Just delete "//" comment slashes to translate feedback messages to your language

// ENGLISH
require 'lang_en.php';

// RUSSIAN
//require 'lang_ru.php';



// ========== FORM MESSAGE TEMPLATE FILE ==========

require 'template.php';


// Getting POST data from form
$name = htmlspecialchars($_POST['name']);
$from = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$company = htmlspecialchars($_POST['company']);

// If name empty
if($name==""){ die($err_tpl_begin . $err_msg_noname . $err_tpl_end);}

// If email empty
if($from==""){ die($err_tpl_begin . $err_msg_noemail . $err_tpl_end);}

// If phone empty
if($phone==""){ die($err_tpl_begin . $err_msg_nomessage . $err_tpl_end);}

// If email contains wrong symbols
$email_exp = '/^[a-zа-я0-9._%-]+@[a-zа-я0-9.-]+\.[a-zа-я]{2,8}$/iu';
if(!preg_match($email_exp,$from)) { die($err_tpl_begin . $err_msg_wrongmail . $err_tpl_end);}


// ========== LETTER CONFIGURATION & RECEIVING ==========

$to = 'yuriybalaka@gmail.com'; // Just write your e-mail here
$subject = "Feedback form message"; // E-mail theme here

$headers = "MIME-Version: 1.0 " . "\r\n";
$headers .="Content-Type: text/html; charset=\"UTF-8\"" . "\r\n";
$headers .="From: $name <$from>" . "\r\n";
$headers .="Reply-To: $from" . "\r\n";
$headers .="X-Mailer: PHP/" . phpversion();


// ========== LETTER BODY ==========

$message = "<html>" . "\r\n";
$message .="    <head>" . "\r\n";
$message .="        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />" . "\r\n";
$message .="        <title>" . $subject . " from " . $from . "</title>" . "\r\n";
$message .="    </head>" . "\r\n";
$message .="    <body>" . "\r\n";
$message .="        <style>" . "\r\n";
$message .="            body { font-family: Arial, Helvetica, sans-serif; font-size: 16px;	line-height: 22px; }" . "\r\n";
$message .="        </style>" . "\r\n";
$message .="        <h2>" . $subject . " from  <a href=\"mailto:". $from . "\">". $from . "</a>" . "</h2>" . "\r\n";
$message .="        <h3 style=\"border:solid 2px #cc1433; padding:25px; font-size:24px; margin-top:20px;\"> " . $phone . "</h3>" . "\r\n";
$message .="        <h3 style=\"border:solid 2px #cc1433; padding:25px; font-size:24px; margin-top:20px;\"> " . $company . "</h3>" . "\r\n";
$message .="    </body>" . "\r\n";
$message .="</html>" . "\r\n";


// Receiving data
try {
    mail($to, $subject, $message, $headers);
    echo "PRINYAL";
} catch (Exception $ex) {
    echo $ex->getMessage();
}