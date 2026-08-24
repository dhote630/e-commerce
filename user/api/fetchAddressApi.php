<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";
$token = $_GET['token'];

try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->data->role='user'){
    $userid = $decodeToken->data->id;
    $sqlCode = "SELECT * FROM address WHERE userid='$userid'";
    $res = $db->query($sqlCode);
    if($res->num_rows>0){
     $data = $res->fetch_assoc();
     http_response_code(200);
     echo json_encode($data);
    }else{
      http_response_code(404);
      echo "Data Not Found";
    }
  } else {
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
   http_response_code(401);
   echo $e->getMessage();
}

 ?>
