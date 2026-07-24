<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
$catId = $_POST['id'];
$catName = $_POST['category'];
try {
 $decodeToken = JWT::decode($token, new Key($privateKey,'HS256'));
 if($decodeToken->role=='admin'){
  $updateCode = "UPDATE category SET category_name='$catName' WHERE id='$catId'";
  $db->query($updateCode);
  http_response_code(200);
  echo "update success";
 }else {
   http_response_code(401);
   echo "unauthorized...";
 }
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}

 ?>
