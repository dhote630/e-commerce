<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
$id = $_POST['brandId'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=="admin"){
   $deleteCode = "DELETE FROM brand WHERE id='$id'";
   $res = $db->query($deleteCode);
   if($res){
     http_response_code(200);
     echo "delete success";
   }else {
     http_response_code(501);
     echo "internal error";
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
