<?php
include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$email = $_POST['email'];
$pass = md5($_POST['password']);
$checkUser = "SELECT * FROM users WHERE email='$email' AND role='admin'";
$userRes = $db->query($checkUser);
if($userRes->num_rows>0){
  $checkPass = "SELECT * FROM users WHERE email='$email' AND password='$pass' AND role='admin'";
  $passRes = $db->query($checkPass);
  if($passRes->num_rows>0){
    $checkStatus = "SELECT * FROM users WHERE email='$email' AND password='$pass'
     AND role='admin' AND status='active'";
     $statusRes = $db->query($checkStatus);
     if($statusRes->num_rows>0){
       $userData = $statusRes->fetch_assoc();
       $userId = $userData['id'];
       $data = ['id'=>$userId,'email'=>$email];
       $currentTime = time();
       $exp = time()+3600;
       $payload  = [
         "data"=>$data,
         "iat"=>$currentTime,
         "exp"=>$exp,
         "role"=>"admin"
       ];
       $privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
       $token = JWT::encode($payload,$privateKey,'HS256');
       http_response_code(200);
       echo json_encode(["msg"=>"login success","token"=>$token]);
     }else{
       http_response_code(409);
       echo "login pending";
     }
  }else {
    http_response_code(401);
    echo "unAuthorized a !!";
  }
}else{
  http_response_code(401);
  echo "unAuthorized b !!";
}


 ?>
