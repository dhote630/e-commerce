<?php

include("db.php");
$email = $_POST['email'];
$otp = $_POST['otp'];
$checkOtp = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
$res = $db->query($checkOtp);
if($res->num_rows>0){
 $updateStatus = "UPDATE users SET status='active' WHERE email='$email'";
 $updateRes = $db->query($updateStatus);
 if($updateRes){
   http_response_code(200);
   echo "otp verified";
 } else {
   http_response_code(501);
   echo "try again";
 }
}else {
  http_response_code(401);
  echo "wrong otp try again";
}

 ?>
