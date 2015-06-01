// <?php

// // require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
// require '../vendor/autoload.php';
// // Feedback v.0.1
// // Balakadesign, 2013
// // info@yuriybalaka@gmail.com
// //


// // ========== MESSAGE LANGUAGE ==========
// // Just delete "//" comment slashes to translate feedback messages to your language

// // ENGLISH
// // require 'lang_en.php';

// // RUSSIAN
// //require 'lang_ru.php';



// // ========== FORM MESSAGE TEMPLATE FILE ==========

// // require 'template.php';

// $post = (!empty($_POST)) ? true : false;

// if($post) {
// 	$sendgrid = new SendGrid('app35153254@heroku.com', '0atdyurc2304');
// 	$email = new SendGrid\Email();
// 	$email
// 	    ->addTo('tdhuynh08@gmail.com')
// 	    ->setFrom('thanhjamin@yahoo.com')
// 	    ->setSubject('Subject goes here')
// 	    ->setText('Hello World!')
// 	    ->setHtml('<strong>Hello World!</strong>')
// 	;

// 	$sendgrid->smtp->send($email);
// 	echo 'mail sent';
// }


 $url = 'https://api.sendgrid.com/';
 $user = 'app35153254@heroku.com';
 $pass = '0atdyurc2304'; 

 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      'to' => 'thanhjamin@yahoo.com',
      'subject' => 'testing from curl',
      'html' => 'testing body',
      'text' => 'testing body',
      'from' => 'thanhjamin@yahoo.com',
   );

 $request = $url.'api/mail.send.json';

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);

 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the response
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 $response = curl_exec($session);
 curl_close($session);

 // print everything out
 print_r($response);

// // Getting POST data from form
// $name = htmlspecialchars($_POST['name']);
// $from = htmlspecialchars($_POST['email']);
// $phone = htmlspecialchars($_POST['phone']);
// $company = htmlspecialchars($_POST['company']);

// // If name empty
// if($name==""){ die($err_tpl_begin . $err_msg_noname . $err_tpl_end);}

// // If email empty
// if($from==""){ die($err_tpl_begin . $err_msg_noemail . $err_tpl_end);}

// // If phone empty
// if($phone==""){ die($err_tpl_begin . $err_msg_nophone . $err_tpl_end);}

// // If email contains wrong symbols
// $email_exp = '/^[a-zа-я0-9._%-]+@[a-zа-я0-9.-]+\.[a-zа-я]{2,8}$/iu';
// if(!preg_match($email_exp,$from)) { die($err_tpl_begin . $err_msg_wrongmail . $err_tpl_end);}


// // ========== LETTER CONFIGURATION & RECEIVING ==========

// $to = 'tdhuynh08@gmail.com'; // Just write your e-mail here
// $subject = "Sign Up Request"; // E-mail theme here

// $headers = "MIME-Version: 1.0 " . "\r\n";
// $headers .="Content-Type: text/html; charset=\"UTF-8\"" . "\r\n";
// $headers .="From: $name <$from>" . "\r\n";
// $headers .="Reply-To: $from" . "\r\n";
// $headers .="X-Mailer: PHP/" . phpversion();


// // ========== LETTER BODY ==========

// $message = "<html>" . "\r\n";
// $message .="    <head>" . "\r\n";
// $message .="        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />" . "\r\n";
// $message .="        <title>" . $subject . " from " . $from . "</title>" . "\r\n";
// $message .="    </head>" . "\r\n";
// $message .="    <body>" . "\r\n";
// $message .="        <style>" . "\r\n";
// $message .="            body { font-family: Arial, Helvetica, sans-serif; font-size: 16px;	line-height: 22px; }" . "\r\n";
// $message .="        </style>" . "\r\n";
// $message .="        <h2>" . $subject . " from  <a href=\"mailto:". $from . "\">". $from . "</a>" . "</h2>" . "\r\n";
// $message .="        <h3 style=\"border:solid 2px #cc1433; padding:25px; font-size:24px; margin-top:20px;\"> " . $phone . "</h3>" . "\r\n";
// $message .="        <h3 style=\"border:solid 2px #cc1433; padding:25px; font-size:24px; margin-top:20px;\"> " . $company . "</h3>" . "\r\n";
// $message .="    </body>" . "\r\n";
// $message .="</html>" . "\r\n";


// // Receiving data
// try {
//     mail($to, $subject, $message, $headers);
//     echo "PRINYAL";
// } catch (Exception $ex) {
//     echo $ex->getMessage();
// }
?>