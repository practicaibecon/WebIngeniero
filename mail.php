<?php

$to      = $_POST['email'];
$subject = $_POST['edad']
$message = 'hello';
$headers = 'From: javiermartinezdiaz@vps399718.ovh.net' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>