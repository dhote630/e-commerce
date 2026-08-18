<?php

include("../../vendor/autoload.php");
include("db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkEmail = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$res = $db->query($checkEmail);
if($res->num_rows>0){
 $checkStatus = "SELECT * FROM users WHERE email='$email' AND password='$password'AND status='active'";
 $response = $db->query($checkStatus);
 if($response->num_rows>0){
   $userData = $response->fetch_assoc();
   $currentTime = time();
   $exp = time()+3600;
   $data = [
     "id"=>$userData['id'],
     "email"=>$userData['email'],
     "role"=>"user"
   ];
   $payload = [
     "data"=>$data,
     "iat"=>$currentTime,
     "exp"=>$exp
   ];
   $privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";
   $token = JWT::encode($payload,$privateKey,'HS256');
   http_response_code(200);
   echo json_encode(["token"=>$token,"msg"=>"Login success"]);
 }else {
   $data = $res->fetch_assoc();
   $fname = $data['fname'];
   $otp = rand(0,999999);
   sendOtpEmail($email,$otp,$fname);
   $updateOtp = "UPDATE users SET otp='$otp' WHERE email='$email'";
   $db->query($updateOtp);
   http_response_code(405);
 }
} else {
  http_response_code(404);
  echo "unauthenticated !!!";
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
