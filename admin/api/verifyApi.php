<?php
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
try {
  JWT::decode($token,new Key($privateKey,'HS256'));
  http_response_code(200);
  echo "token verified";
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}

 ?>
