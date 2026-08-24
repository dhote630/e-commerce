<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";
$token = $_POST['token'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$country = $_POST['country'];
$landmark = $_POST['landmark'];

try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->data->role=='user'){
    $userid = $decodeToken->data->id;
    $checkAddress = "SELECT * FROM address WHERE userid='$userid'";
    $response = $db->query($checkAddress);
    if($response->num_rows>0){
      $updateAdd = "UPDATE address SET city='$city',state='$state',
      pincode='$pincode',country='$country',landmark='$landmark'";
      $db->query($updateAdd);
      http_response_code(200);
      echo "address created";
    } else {
      $sqlCode = "INSERT INTO address(userid,city,state,pincode,country,landmark)
      VALUES ('$userid','$city','$state','$pincode','$country','$landmark')";
      $res= $db->query($sqlCode);
      if($res){
        http_response_code(200);
        echo "address created";
      }else {
        http_response_code(404);
        echo "Internal error";
      }
    }
  }else {
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}


 ?>
