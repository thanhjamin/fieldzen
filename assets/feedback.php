<?php

require 'lang_en.php';
require 'template.php';

// use actual sendgrid username and password in this section
$url = 'https://api.sendgrid.com/'; 
$user = 'app35153254@heroku.com'; // place SG username here
$pass = '0atdyurc2304'; // place SG password here

// grabs HTML form's post data; if you customize the form.html parameters then you will need to reference their new new names here
$name = htmlspecialchars($_POST['name']);
$from = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$company = htmlspecialchars($_POST['company']);
$message = "Hello, I would like a free Jova demo";


// note the above parameters now referenced in the 'subject', 'html', and 'text' sections
// make the to email be your own address or where ever you would like the contact form info sent
$params = array(
    'api_user'  => "$user",
    'api_key'   => "$pass",
    'to'        => "Brian@resolutiontube.com", // set TO address to have the contact form's email content sent to
    'subject'   => "Jova Free Demo Request", // Either give a subject for each submission, or set to $subject
    'html'      => "<html><head><title>Contact Form</title><body>
    Name: $name\n<br>
    Email: $from\n<br>
    Phone: $phone\n<br>
    Company: $company\n<br>
    Message: $message<body></title></head></html>", // Set HTML here.  Will still need to make sure to reference post data names
    'text'      => "
    Name: $name\n
    Email: $from\n
    Company: $company\n
    Phone: $phone",
    'from'      => "$from", // set from address here, it can really be anything
  );

try {
  curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
  $request =  $url.'api/mail.send.json';

  // Generate curl request
  $session = curl_init($request);
  // Tell curl to use HTTP POST
  curl_setopt ($session, CURLOPT_POST, true);
  // Tell curl that this is the body of the POST
  curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
  // Tell curl not to return headers, but do return the response
  curl_setopt($session, CURLOPT_HEADER, false);
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

  // obtain response
  $response = curl_exec($session);
  curl_close($session);

  // print everything out
    
    echo "PRINYAL";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>