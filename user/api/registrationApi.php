<?php
include("../../vendor/autoload.php");
include("db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = md5($_POST['password']);

$checkEmail = "SELECT * FROM users WHERE email='$email'";
$res = $db->query($checkEmail);
if($res->num_rows>0){
 http_response_code(409);
 echo "user exists";
}else {
  $otp =rand(0,999999);
  sendOtpEmail($email,$otp,$fname);
  $newUser = "INSERT INTO users (fname,lname,email,mobile,password,otp)
  VALUES('$fname','$lname','$email','$mobile','$password','$otp')";
  $response = $db->query($newUser);
  if($response){
    http_response_code(200);
  } else {
    http_response_code(501);
    echo "Internal error";
  }
}



function sendOtpEmail($email,$otp,$fname){
  //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com' ;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dhote630@gmail.com';                     //SMTP username
    $mail->Password   = 'ukhf ptfw mfwt fypj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dhote630@gmail.com', 'Mailer');
    $mail->addAddress($email, $fname);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ecom verification';
    $mail->Body    = "Thanks for choosing our service your otp is<b>{$otp}</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "We have sent otp on your email";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
 ?>
