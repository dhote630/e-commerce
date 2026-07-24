<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey
= "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=='admin'){
    $catId = $_POST['catId'];
    $brandName = strtolower($_POST['brandName']);
    $code = "SELECT * FROM brand WHERE cat_id='$catId' AND brand_name='$brandName'";
    $res = $db->query($code);
    if($res->num_rows>0){
      http_response_code(409);
      echo "brand already axist";
    }else {
      $sqlCode = "INSERT INTO brand(cat_id,brand_name)
      VALUES('$catId','$brandName')";
      $db->query($sqlCode);
      http_response_code(200);
      echo "Brand Created";
    }
  }else {
    http_response_code(401);
    echo "anauthoried...";
  }
} catch (\Exception $e) {
   http_response_code(401);
   echo $e->getMessage();
}


 ?>
