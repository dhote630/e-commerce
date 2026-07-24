<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_GET['token'];
$brandId = $_GET['id'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=='admin'){
    $sqlCode = "SELECT * FROM brand WHERE id='$brandId'";
    $res = $db->query($sqlCode);
    if($res->num_rows>0){
      $data = $res->fetch_assoc();
      http_response_code(200);
      echo json_encode($data);
    }else {
      http_response_code(404);
      echo "Brand Not Found";
    }
  } else {
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
   http_response_code(401);
   echo "unauthorized...";
}

 ?>
