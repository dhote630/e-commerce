<?php

include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$token = $_GET['token'];
$privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";

try {
  $decodeToken = JWT::decode($token, new Key($privateKey,'HS256'));
  if($decodeToken->data->role=='user'){
     http_response_code(200);
     echo "user verified";
  }else {
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}


 ?>
